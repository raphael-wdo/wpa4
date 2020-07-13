<?php
  session_start();

// Put your PHP functions and modules here
function preShow( $arr, $returnAsString=false ) {
  $ret  = '<pre>' . print_r($arr, true) . '</pre>';
  if ($returnAsString)
    return $ret;
  else
    echo $ret;
}
//
// preShow($_POST); // ie echo a string
// preShow($_SESSION);
//
// $aaarg = preShow($my_bad_array, true); // ie return as a string
// echo "Why is \n $aaarg \n not working?";

function printMyCode() {
  $lines = file($_SERVER['SCRIPT_FILENAME']);
  echo "<pre class='mycode'><ol>";
  foreach ($lines as $line)
     echo '<li>'.rtrim(htmlentities($line)).'</li>';
  echo '</ol></pre>';
}

// printMyCode(); // prints all lines of code in this file with line numbers

function php2js( $arr, $arrName ) {
  $lineEnd="";
  echo "<script>\n";
  echo "/* Generated with A4's php2js() function */";
  echo "  var $arrName = ".json_encode($arr, JSON_PRETTY_PRINT);
  echo "</script>\n\n";
}

// $pricesArrayPHP = array ( ... );
// php2js($pricesArrayPHP, 'pricesArrayJS'); // ie echos javascript equivalent code

function validateFormPHP() {
  // Do some server side validation here
  $errorMsgs = array();
  $id = $day = $hour = $STA = $STP = $STC = $FCA = $FCP = $FCC = $name = $email = $phone = $card = $expiry = "";
  $movie = array("id"=>$id, "day"=>$day, "hour"=>$hour);
  $seats = array("STA"=>$STA, "STP"=>$STP, "STC"=>$STC, "FCA"=>$FCA, "FCP"=>$FCP, "FCC"=>$FCC);
  $cust = array("name"=>$name, "email"=>$email, "phone"=>$phone, "card"=>$card, "expiry"=>$expiry);

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["cust"]["name"])) {
      $errorMsgs += array("name"=>"Please enter your name (e.g. John Smith)");
    } else {

      $cust["name"] = test_input($_POST["cust"]["name"]);
    }
    if(empty($_POST["cust"]["email"])) {
      $errorMsgs += array("email"=>"Please enter your email (e.g. example@email.com)");
    } else {
      if (!filter_var($_POST["cust"]["email"], FILTER_VALIDATE_EMAIL)) {
        $errorMsgs += array("email"=>"Please enter a proper email address (e.g. example@email.com)");
      } else {
        $cust["email"] = test_input($_POST["cust"]["email"]);
      }
    }
    if(empty($_POST["cust"]["mobile"])) {
      $errorMsgs += array("mobile"=>"Please enter your mobile number (e.g. 0412 345 678)");
    } else {
      if (!preg_match("/^(\(04\)|04|\+614)[ ]?\d{1,4}?[ ]?\(?\d{1,3}?\)?[ ]?\d{1,4}[ ]?\d{1,4}[ ]?\d{1,9}$/", $_POST["cust"]["mobile"])) {
        $errorMsgs += array("mobile"=>"Please enter a proper phone number (e.g. 0412 345 678)");
      } else {
        $cust["mobile"] = test_input($_POST["cust"]["mobile"]);
      }
    }
    if(empty($_POST["cust"]["card"])) {
      $errorMsgs += array("card"=>"Please enter your credit card number (VISA or Mastercard, e.g. 1234 5678 1234 5678)");
    } else {
      if (!preg_match("/^(\d{4}[-. ]?){4}|\d{4}[-. ]?\d{6}[-. ]?\d{5}$/", $_POST["cust"]["card"])) {
        $errorMsgs += array("card"=>"Please enter a proper VISA or Mastercard credit card (e.g. 1234 5678 1234 5678)");
      } else {
        $cust["card"] = test_input($_POST["cust"]["card"]);
      }
    }
    if(empty($_POST["cust"]["expiry"])) {
      $errorMsgs += array("expiry"=>"Please enter a valid expiry year and month (e.g. 2020-01)");
    } else {
      if (!preg_match('/^\d{4}-\d{2}$/', $_POST["cust"]["expiry"])) {
        $errorMsgs += array("expiry"=>"Please enter the expiry date in YYYY-MM format! (e.g. 2020-01)");
      } else {
        $monthyear = date("Y-m");
        if ($_POST["cust"]["expiry"] > $monthyear) {
           $cust["expiry"] = test_input($_POST["cust"]["expiry"]);
        }
        else {
          $errorMsgs += array("expiry"=>"Sorry, but your credit card has expired.");
        }
      }
    }
  }
  return $errorMsgs;
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function bookMovie() {

  $fp = fopen('bookings.txt', 'a');
  $data = array();
  $data[] = date("Y-m-d");
  $data[] = $_SESSION["cart"]["cust"]["name"];
  $data[] = $_SESSION["cart"]["cust"]["email"];
  $data[] = $_SESSION["cart"]["cust"]["mobile"];

  foreach($_SESSION["cart"]["movie"] as $movieData) {
    $data[] = $movieData;
  }
  foreach($_SESSION["cart"]["seats"] as $seatsData) {
    $data[] = $seatsData;
  }

  $day = $_SESSION["cart"]["movie"]["day"];
  $hour = $_SESSION["cart"]["movie"]["hour"];

  if ($day == "MON" || $day == "WED" || ($hour == "T12" && ($day == "TUE" || $day == "THU" || $day == "FRI")))
  {
    $STA = 14.00;
    $STP = 12.50;
    $STC = 11.00;
    $FCA = 24.00;
    $FCP = 22.50;
    $FCC = 21.00;
  }
  else {
    $STA = 19.80;
    $STP = 17.50;
    $STC = 15.30;
    $FCA = 30.00;
    $FCP = 27.00;
    $FCC = 24.00;
  }

  $total = $STA * $_SESSION["cart"]["seats"]["STA"] + $STP * $_SESSION["cart"]["seats"]["STP"] + $STC * $_SESSION["cart"]["seats"]["STC"] + $FCA * $_SESSION["cart"]["seats"]
  ["FCA"] + $FCP *$_SESSION["cart"]["seats"]["FCP"] + $FCC * $_SESSION["cart"]["seats"]["FCC"];

  $total = round($total, 2);

  $data[] = $total;
  $_SESSION["cart"] += array("total"=>$total);
  $_SESSION["cart"] += array("GST"=>calculateGST($total));

  fputcsv($fp, $data, "\t");

  fclose($fp);
}

function calculateGST($totalPrice) {
  return round(($totalPrice / 11),2);
}

?>
