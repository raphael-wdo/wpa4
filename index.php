
<?php
include 'tools.php';
$validForm = false;
$errorMsgArray = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

     //check POST data is ok
     //OR set error messages
     $errorMsgArray = validateFormPHP($_POST);
     if (empty($errorMsgArray)) {
       $validForm = true;
     }
}
if ($validForm) {
    //add POST to SESSION
    $_SESSION['cart'] = $_POST;
    //redirect to receipt page
    header('Location: receipt.php');
  } else {
    //stay on this pages
  }

?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lunardo Cinema</title>

    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css">
    <script src='../wireframe.js'></script>
    <script src='script.js'></script>

    <!--webfont-->
    <link href="https://fonts.googleapis.com/css?family=Monoton|Open+Sans&display=swap" rel="stylesheet">
  </head>

  <body>

    <div id="navbar">
      <header>
        <div id='companyLogo'><a href="#"><img src='media/lunardo_logo.png' alt='Lunardo logo' />Lunardo Cinema</a></div>
      </header>

      <nav>
          <ul>
            <li id="aboutUsLink"><a href="#aboutUs" >ABOUT US</a></li>
            <li id ="pricesLink"><a href="#prices">PRICES</a></li>
            <li id="nowShowingLink"><a href="#nowShowing">NOW SHOWING</a></li>
          </ul>
      </nav>
    </div>



    <main>
      <div id="banner">
        <img src="media/cinema.png"/>

        <div class="bannertext">
          <h1>Entertainment Redefined</h1>
          <p>Experience the Comfort and Luxury of Movie Watching with Lunardo Cinema</p>
        </div>
      </div>

      <div class = "mainnav">
        <ul>
          <a href="#aboutUs" ><li><img src='media/aboutuslogo.png' alt='ABOUT US' />ABOUT US</li></a>
          <a href="#prices"><li><img src='media/pricelogo.png' alt='PRICES' />PRICES</li></a>
          <a href="#nowShowing"><li><img src='media/ticketlogo.png' alt='NOW SHOWING' />NOW SHOWING</li></a>
        </ul>
      </div>

      <section id='aboutUs'>
        <div class="box">
          <div class="boxText">
            <a name="aboutUs">
            <h2>ABOUT US</h2>
            <hr>
            <div id = 'AU-history'>
              <h3>Our History</h3>
              <p>Founded in 1972, Lunardo began as a local theater, serving for local residents in North Melbourne for 40 years and counting.
                 It has served over millions of customers from families and friends and has created many special moments. </p>
            </div>
            <hr>
            <div id = 'AU-renovation'>
              <h3>Renovated for the Future</h3>
              <img src="media/renovation.jpg" alt="Renovated cinema hall">
              <p>The latest renovation of the theater introduced many latest cinema technologies as well as expanding with additional
                 theater halls. With 2 new cinema halls expanded, bringing up the total number of cinema halls to 6. Each cinema hall
                  has been equipped with the latest technology in sound and design to drive watching experience second to none, as Lunardo promises
                   to deliver satisfaction of comfort and luxury during cinematic experience. </p>

            </div>
            <hr>
            <div id = 'AU-seats'>
              <h3>Upgraded seatings</h3>
              <p>All halls have been equipped with brand new seats from Profurn. Experience greater comfort with ergonomic seat design,
                 or upgrade your seat to experience first class recliner seats.</p>

              <div class="seatFeature">
                <h4>Standard Seats</h4>
                <img src="media/538.png" alt="Standard seats">
                <ul>
                  <li>Leather headrest</li>
                  <li>Foldable armrest</li>
                  <li>Ergonomic deisgn</li>
                </ul>
              </div>
              <div class="seatFeature">
                <h4>First Class Seats</h4>
                <img src="media/Verona-Twin.png" alt="Premium First Class Maximum Comfort Deluxe Seats">
                <ul>
                  <li>Full leather seats</li>
                  <li>Fully reclinable</li>
                  <li>Motor operated</li>
                  <li>Underseat lighting</li>
                </ul>
              </div>

            </div>
            <hr>
            <div id = 'AU-dolby'</div>
              <h3>3D Dolby Vision and Dolby Atmos</h3>
              <img src="media/Dolby-Atmos.png" alt="Dolby Atmos">
              <p>Watch the latest movies with immersive 3D experience with 3D Dolby Vision. Experience high octane action like
                 never before and feast your eyes with breathtaking visuals. Together complemented with the Dolby Atmos surround sound
                  system, listen to the crisp of the sound and immerse yourselves in emotional movie scenes.</p>

            </div>
          </a>
          </div>
        </div>
      </section>
      <section id='prices'>
        <a name="prices">
        <div class='box'>
          <div class='boxText'>
            <h2>PRICES</h2>
            <p>The Cinema offers discounted pricing weekday afternoons (ie weekday matinée sessions) and all day on Mondays and Wednesdays. </p>
            <table>
              <tr id='firstrow'>
                <th>Seat Type</th>
                <th>Seat Code</th>
                <th>All day Monday and Wednesday AND 12pm on Weekdays</th>
                <th>All other times</th>
              </tr>
              <tr>
                <td>Standard Adult</td>
                <td>STA</td>
                <td>14.00</td>
                <td>19.80</td>
              </tr>
              <tr>
                <td>Standard Concession</td>
                <td>STP</td>
                <td>12.50</td>
                <td>17.50</td>
              </tr>
              <tr>
                <td>Standard Child</td>
                <td>STC</td>
                <td>11.00</td>
                <td>15.30</td>
              </tr>
              <tr>
                <td>First Class Adult</td>
                <td>FCA</td>
                <td>24.00</td>
                <td>30.00</td>
              </tr>
              <tr>
                <td>First Class Concession</td>
                <td>FCP</td>
                <td>22.50</td>
                <td>27.00</td>
              </tr>
              <tr>
                <td>First Class Child</td>
                <td>FCC</td>
                <td>21.00</td>
                <td>24.00</td>
              </tr>
            </table>
          </div>
        </div>
        </a>
      </section>

      <section id='nowShowing'>
        <a name="nowShowing">
          <div class='box'>
            <div class='boxText'>
              <h2>NOW SHOWING</h2>
              <div class='screenTimes' onclick="changeSynopsis('ACT')">
                <img src='media/avengers-endgame-movie-poster-2.jpg' alt='Movie Poster'>
                <div class='movieInfo'>
                  <h3>Avengers: Endgame</h3>
                  <h4>PG</h4>
                  <ul>
                    <li>Wed - 2100</li>
                    <li>Thu - 2100</li>
                    <li>Fri - 2100</li>
                    <li>Sat - 1800</li>
                    <li>Sun - 1800</li>
                  </ul>
                </div>
              </div>
              <div class='screenTimes' onclick="changeSynopsis('RMC')">
                <img src='media/topendwedding.jpg' alt='Top End Wedding'>
                <div class='movieInfo'>
                  <h3>Top End Wedding</h3>
                  <h4>PG</h4>
                  <ul>
                    <li>Mon - 1800</li>
                    <li>Tue - 1800</li>
                    <li>Sat - 1500</li>
                    <li>Sun - 1500</li>
                  </ul>
                </div>
              </div>
              <div class='screenTimes' onclick="changeSynopsis('ANM')">
                <img src='media/Dumbo-Live-Movie-Poster.jpg' alt='Dumbo'>
                <div class='movieInfo'>
                  <h3>Dumbo</h3>
                  <h4>G</h4>
                  <ul>
                    <li>Mon - 1200</li>
                    <li>Tue - 1200</li>
                    <li>Wed - 1800</li>
                    <li>Thu - 1800</li>
                    <li>Fri - 1800</li>
                    <li>Sat - 1200</li>
                    <li>Sun - 1200</li>
                  </ul>
                </div>
              </div>
              <div class='screenTimes' onclick="changeSynopsis('AHF')">
                <img src='media/The-Happy-Prince-Movie-poster.jpg' alt='The Happy Prince'>
                <div class='movieInfo'>
                  <h3>The Happy Prince</h3>
                  <h4>PG</h4>
                  <ul>
                    <li>Wed - 1200</li>
                    <li>Thu - 1200</li>
                    <li>Fri - 1200</li>
                    <li>Sat - 2100</li>
                    <li>Sun - 2100</li>
                  </ul>
                </div>
              </div>
              <div class="synopsis">
                <h3 id="movieTitle">Avengers: Endgame</h3>
                <div class='synopsis-info'>
                  <h4 id="movieRating">PG</h4>
                  <h4>Plot Description</h4>
                  <p id="moviePlot">After the devastating events of Avengers: Infinity War (2018), the universe is in ruins.
                    With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos' actions and restore balance to the universe.</p>
                </div>
                <iframe id="movieTrailer" src="https://www.imdb.com/videoembed/vi2163260441" allowfullscreen width="854" height="400"></iframe>
                <h4 id='movieSelectTitle'>Now Showing:</h4>
                <ul id='movieSelectList'>
                  <li><input type="image" src="media/avengers-endgame-movie-poster-2.jpg" alt='Avengers: Endgame' onclick="changeSynopsis('ACT')"></li>
                  <li><input type="image" src='media/topendwedding.jpg' alt='Top End Wedding' onclick="changeSynopsis('RMC')"></li>
                  <li><input type="image" src='media/Dumbo-Live-Movie-Poster.jpg' alt='Dumbo' onclick="changeSynopsis('ANM')"></li>
                  <li><input type="image" src='media/The-Happy-Prince-Movie-poster.jpg' alt='The Happy Prince' onclick="changeSynopsis('AHF')"></li>
                </ul>
                <h4 id='bookingTitle'>Make a Booking</h4>
                <ul id="bookingTimeList">
                  <li><input class="bookingTime" type="button" value="Wed - 2100" onclick='selectMovie("Wed - 2100")'></li
                  ><li><input class="bookingTime" type="button" value="Thu - 2100" onclick='selectMovie("Thu - 2100")'></li
                  ><li><input class="bookingTime" type="button" value="Fri - 2100" onclick='selectMovie("Fri - 2100")'></li
                  ><li><input class="bookingTime" type="button" value="Sat - 1800" onclick='selectMovie("Sat - 1800")'></li
                  ><li><input class="bookingTime" type="button" value="Sun - 1800" onclick='selectMovie("Sun - 1800")'></li>
                </ul>
              </div>

              <div class="booking" id="booking">
                <h3>Booking Form</h3>
                <!-- <form name="bookingForm" action="index.php" method="post" onsubmit="return validateForm()"> -->
                <form name="bookingForm" action="#booking" method="post">
                  <input type="hidden" id="movie-id" name="movie[id]" value="ACT">
                  <input type="hidden" id="movie-day" name="movie[day]" value="">
                  <input type="hidden" id="movie-hour" name="movie[hour]" value="">
                  <p id="formMessage">Please select the movie and showtime above.</p>
                  <div id="seatForm">
                    <fieldset>
                      <legend>Standard Seats</legend>
                      <label>Adults: </label><select name="seats[STA]" id="seats-STA" disabled required>
                         <script>document.write(generateSeatsNo());</script>
                      </select> <br>
                      <label>Concession: </label><select name="seats[STP]" id="seats-STP" disabled required>
                         <script>document.write(generateSeatsNo());</script>
                      </select> <br>
                      <label>Children: </label><select name="seats[STC]" id="seats-STC" disabled required>
                         <script>document.write(generateSeatsNo());</script>
                      </select>
                    </fieldset>
                    <fieldset>
                      <legend>First Class Seats</legend>
                      <label>Adults: </label><select name="seats[FCA]" id="seats-FCA" disabled required>
                         <script>document.write(generateSeatsNo());</script>
                      </select><br>
                      <label>Concession: </label><select name="seats[FCP]" id="seats-FCP" disabled required>
                         <script>document.write(generateSeatsNo());</script>
                      </select><br>
                      <label>Children: </label><select name="seats[FCC]" id="seats-FCC" disabled required>
                         <script>document.write(generateSeatsNo());</script>
                      </select>
                    </fieldset>
                    <p id="total">Total: $<a id="totalPrice">0.00</a></p>
                  </div>
                  <div id="personalInfoForm">
                    <label>Name: </label><input type="text" name="cust[name]" id="cust-name" placeholder="e.g. John Smith" disabled required> <br>
                    <p class="warningMsg"><?php error_reporting(0); echo($errorMsgArray["name"]);?></p>
                    <label>Email: </label><input type="email" name="cust[email]" id="cust-email" placeholder="e.g. example@email.com" disabled required> <br>
                    <p class="warningMsg"><?php echo($errorMsgArray["email"])?></p>
                    <label>Mobile: </label><input type="tel" name="cust[mobile]" id="cust-mobile" placeholder="e.g. 0412 345 678" disabled required> <br>
                    <p class="warningMsg"><?php echo($errorMsgArray["mobile"])?></p>
                    <label>Credit Card: </label><input type="text" name="cust[card]" id="cust-card" placeholder="e.g. 1234 5678 1234 5678" disabled required> <br>
                    <p class="warningMsg"><?php echo($errorMsgArray["card"])?></p>
                    <label>Expiry: </label><input type="month" name="cust[expiry]" id="cust-expiry" placeholder="e.g. 2020-01" disabled required> <br>
                    <p class="warningMsg"><?php echo ($errorMsgArray["expiry"]);?></p>
                  </div>
                  <br>
                  <button id="submitButton" type="submit" name="order" value="Order Tickets" disabled>
                    <img src='media/ticketlogo.png'>Order Tickets
                  </button>
                </form>
              </div>
            </div>
          </div>
      </a>
      </section>
    </main>

    <footer>
      <div class="footer">
        <p>Contact us:</p>
        <ul>
          <li>Email: <a href="mailto:support@lunardo.com" target="_top">support@lunardo.com</a></li>
          <li>Phone: <a href="callto:+61312345678">(+61)03 1234 5678</a></li>
          <li>Address: <a href="https://goo.gl/maps/rbfjQx5wjuet6WAs5">72/82 Errol St, North Melbourne VIC 3051</a></li>
        </ul>
      </div>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Raphael Wong Doh Ong, s3735236.https://github.com/rmit-s3735236-raphael-wong/wp Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
      <div class="debug">
        <p>DEBUG MODULE</p>
        <p><?php echo "TESTING PHP ECHO WORKING" ?></p>
        <p>GET INFORMATION:<?php preShow($_GET); ?></p>
        <p>POST INFORMATION:<?php preShow($_POST); ?></p>
        <p>WARNINGS:<?php preShow($errorMsgArray)?></p>
        <p>VALID FORM:<?php echo $validForm?> </p>
        <p>SESSION INFORMATION:<?php preShow($_SESSION); ?></p>
        <p>PHP SCRIPT:<?php printMyCode(); ?></p>
      </div>
    </footer>

  </body>
</html>
