<?php

// First, include Requests
include('vendor/rmccue/requests/library/Requests.php');
Requests::register_autoloader();

if (isset($_GET['page'])) {
$requested_page = $_GET['page'];
}
else {
$requested_page = 'home';
}

// var_dump($requested_page);

// a better way would be to put this into an array, but I think a switch is easier to read for this example
switch($requested_page) {
   case "search":
      include(__DIR__."/search-results.php");
      break;
   case "home":
      include(__DIR__."/home.php");
      break;
   default:
      include(__DIR__."/404.php");
}