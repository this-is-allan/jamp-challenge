<?php
include('vendor/rmccue/requests/library/Requests.php');

Requests::register_autoloader();

if (isset($_SERVER['REDIRECT_URL'])) {
	$requested_page = $_SERVER['REDIRECT_URL'];
} else {
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
		include(__DIR__."/404.html");
}