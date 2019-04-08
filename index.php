<?php

// First, include Requests
include('vendor/rmccue/requests/library/Requests.php');
Requests::register_autoloader();

// if ($_SERVER['REQUEST_URI'] == '/help') {
//     include 'help.php';
// } elseif ($_SERVER['REQUEST_URI'] == '/calendar') {
//     include 'calendar.php';
// } else {
//     include 'notfound.php';
// }


if (isset($_SERVER['REDIRECT_URL'])) {
$requested_page = $_SERVER['REDIRECT_URL'];
}
else {
$requested_page = 'home';
}

switch($requested_page) {
   case "/search":
      include(__DIR__."/search-results.php");
      break;
   case "home":
      include(__DIR__."/home.php");
      break;
   default:
      include(__DIR__."/404.php");
}