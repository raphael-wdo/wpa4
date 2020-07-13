/* Insert your javascript here */
//global variables
//seat prices
var STA;
var STP;
var STC;
var FCA;
var FCP;
var FCC;
var movID;

//Navigation programming - updates navbar based on scroll
window.onscroll = function() {
  console.clear();
  updateNavOnScroll();
}

function updateNavOnScroll(){
	   //var sn = document.getElementById("sticky_nav");
     var navLinks = document.getElementsByTagName('nav')[0].getElementsByTagName('a');

     var sections = document.getElementsByTagName('main')[0].getElementsByTagName('section');

     var activeSection = -1;

     //offsetTop is deducted 10 value to fine tune the scroll value
     while (activeSection < sections.length -1 && window.scrollY > sections[activeSection + 1].offsetTop-10)
     {
       activeSection++;
     }

     //remove any active navLinks sections
     for (var i = 0; i < navLinks.length; i++)
     {
       navLinks[i].classList.remove('active');
     }

     console.log(activeSection);

     if (activeSection >= 0)
     {
       //set active on navLinks
       navLinks[activeSection].classList.add('active');
     }
	}

//changeMovieSynopsis - changes the synopsis content based on the movie selected
//The author of this website does not own any movie intellectual properties and belong to their respective owners
//Movie information are gathered from theses sources:
//https://www.imdb.com/title/tt2404639/
//https://www.imdb.com/title/tt3861390/
//https://www.imdb.com/title/tt7555072/
//https://www.imdb.com/title/tt4154796/
function changeSynopsis(movieID) {
  console.log(movieID);
  switch(movieID) {
    case 'ACT':
      document.getElementById("movieTitle").innerHTML = "Avengers: Endgame";
      document.getElementById("movieRating").innerHTML = "PG";
      document.getElementById("moviePlot").innerHTML = "After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos' actions and restore balance to the universe. "
      document.getElementById("movieTrailer").src = "https://www.imdb.com/videoembed/vi2163260441";
      document.getElementById("bookingTimeList").innerHTML =
      bookingTime("Wed - 2100") +
      bookingTime('Thu - 2100') +
      bookingTime('Fri - 2100') +
      bookingTime('Sat - 1800') +
      bookingTime('Sun - 1800');
      console.log(bookingTime("Wed - 2100"));
      break;
    case 'RMC':
      document.getElementById("movieTitle").innerHTML = "Top End Wedding";
      document.getElementById("movieRating").innerHTML = "PG";
      document.getElementById("moviePlot").innerHTML = "Lauren and Ned are engaged, they are in love, and they have just ten days to find Lauren's mother who has gone AWOL somewhere in the remote far north of Australia, reunite her parents and pull off their dream wedding. "
      document.getElementById("movieTrailer").src = "https://www.youtube.com/embed/yC0r4-LVLDU";
      document.getElementById("bookingTimeList").innerHTML =
      bookingTime('Mon - 1800') +
      bookingTime('Tue - 1800') +
      bookingTime('Fri - 2100') +
      bookingTime('Sat - 1500');
      break;
    case 'ANM':
      document.getElementById("movieTitle").innerHTML = "Dumbo";
      document.getElementById("movieRating").innerHTML = "G";
      document.getElementById("moviePlot").innerHTML = "A young elephant, whose oversized ears enable him to fly, helps save a struggling circus, but when the circus plans a new venture, Dumbo and his friends discover dark secrets beneath its shiny veneer. "
      document.getElementById("movieTrailer").src = "https://www.imdb.com/videoembed/vi2482814233";
      document.getElementById("bookingTimeList").innerHTML =
      bookingTime('Mon - 1200') +
      bookingTime('Tue - 1200') +
      bookingTime('Wed - 1800') +
      bookingTime('Thu - 1800') +
      bookingTime('Fri - 1800') +
      bookingTime('Sat - 1200') +
      bookingTime('Sun - 1200');
      break;
    case 'AHF':
      document.getElementById("movieTitle").innerHTML = "The Happy Prince";
      document.getElementById("movieRating").innerHTML = "PG";
      document.getElementById("moviePlot").innerHTML = "The untold story of the last days in the tragic times of Oscar Wilde, a person who observes his own failure with ironic distance and regards the difficulties that beset his life with detachment and humor. "
      document.getElementById("movieTrailer").src = "https://www.youtube.com/embed/4HmN9r1Fcr8";
      document.getElementById("bookingTimeList").innerHTML =
      bookingTime('Wed - 1200') +
      bookingTime('Thu - 1200') +
      bookingTime('Fri - 1200') +
      bookingTime('Sat - 2100') +
      bookingTime('Sun - 2100');
      break;
  }
  var synopsisScrollValue = document.getElementById("movieTitle").offsetTop;
  console.log(synopsisScrollValue);
  window.scrollTo(0, synopsisScrollValue-75);
  document.getElementById("movie-id").value = movieID;
}

function bookingTime(time) {
  console.log(time);
  return "<li><input class='bookingTime' type='button' value='" + time +"' onclick='selectMovie(\"" + time + "\")'></li>";
}

function generateSeatsNo() {
  var seatOptions = "<option value=''>Please Select</option>";
  for (var i=0; i <= 10; i++) {
    seatOptions += "<option value='"+i+"' onClick='calculatePrice()'>"+i+"</option>";
  }
  console.log("generateSeatsNo");
  return seatOptions;
}

function selectMovie(time) {
  console.log("selectMovie() function called");
  enableForm();
  var formMessage = document.getElementById("formMessage");
  formMessage.innerHTML = document.getElementById("movieTitle").innerHTML + " (" + time + ")";
  var day = time.slice(0,3).toUpperCase();
  var hour = 'T' + time.slice(6,8);
  document.getElementById("movie-day").value = day;
  document.getElementById("movie-hour").value = hour;
  calculatePrice();
  console.log(document.getElementById("movie-id").value);
  console.log(day);
  console.log(hour);
}

function enableForm() {
  var inputs = document.getElementsByTagName("input");
  var selects = document.getElementsByTagName("select");
  for (var i = 0; i < inputs.length; i++)
  {
    inputs[i].disabled = false;
  }
  for (var i = 0; i < selects.length; i++)
  {
    selects[i].disabled = false;
  }
  document.getElementById("submitButton").disabled = false;
}

function calculatePrice() {
  var STA;
  var STP;
  var STC;
  var FCA;
  var FCP;
  var FCC;
  var day = document.getElementById("movie-day").value;
  var hour = document.getElementById("movie-hour").value;

  if (day == "MON" || day == "WED" || (hour == "T12" && (day == "TUE" || day == "THU" || day == "FRI")))
  {
    STA = 14.00;
    STP = 12.50;
    STC = 11.00;
    FCA = 24.00;
    FCP = 22.50;
    FCC = 21.00;
  }
  else {
    STA = 19.80;
    STP = 17.50;
    STC = 15.30;
    FCA = 30.00;
    FCP = 27.00;
    FCC = 24.00;
  }

  var totalPriceValue = STA * document.getElementById("seats-STA").value
  + STP * document.getElementById("seats-STP").value
  + STC * document.getElementById("seats-STC").value
  + FCA * document.getElementById("seats-FCA").value
  + FCP * document.getElementById("seats-FCP").value
  + FCC * document.getElementById("seats-FCC").value ;

  document.getElementById("totalPrice").innerHTML = totalPriceValue.toFixed(2);
}

function validateForm() {
  var nameRegex = /^[a-z ,.'-]+$/i;
  var phoneRegex =  /^(\(04\)|04|\+614)[ ]?\d{1,4}?[ ]?\(?\d{1,3}?\)?[ ]?\d{1,4}[ ]?\d{1,4}[ ]?\d{1,9}$/g;
  var cardRegex = /^(\d{4}[-. ]?){4}|\d{4}[-. ]?\d{6}[-. ]?\d{5}$/gm;

  var name = document.forms["bookingForm"]["cust[name]"].value;
  var phone = document.forms["bookingForm"]["cust[mobile]"].value;
  var card = document.forms["bookingForm"]["cust[card]"].value;
  var expiry = document.forms["bookingForm"]["cust[expiry]"].value;

  var message = "";
  var valid = true;

  if (nameRegex.test(name) == false) {
    message += "Please enter a proper name (e.g. John Smith)\n";
    valid = false;
  }
  if (phoneRegex.test(phone) == false) {
    message += "Please enter a valid mobile number (e.g. 0412345678)\n";
    valid = false;
  }
  if (cardRegex.test(card) == false) {
    message += "Please use and enter a 12-digit credit card number (e.g. 1234 1234 1234 1234)\n";
    valid = false;
  }

  //check if card expires or not
  var today, someday;
  var exMonth=expiry.slice(5,7);
  var exYear=expiry.slice(0,4);
  today = new Date();
  someday = new Date();
  someday.setFullYear(exYear, exMonth, 1);

  if (someday < today) {
    message += "The expiry date is before today's date. Please select a valid expiry date";
    valid = false;
  }

  if (valid == false) {
    alert(message);
  }
  return valid;
}
