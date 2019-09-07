<?php

ob_start(); // Prevent HTTP header from sending too soon.

/* the define function allows to declare constants, which are are automatically global and can be used across the entire script. */
define('project', '/yummie/');
define('documentRoot', $_SERVER['DOCUMENT_ROOT'].project);
define('home', documentRoot.'view/home.php');

/* The control file loads some methods from these pages in order to pass the necessary parameters to the views, therefor they must be included. */
require('./model/database.php');
require('./model/functions.php');
// require('./model/user_object.php');
// require('./model/file_object.php');

/* The controller file uses the action parameter to see what page should be displayed next. Depending on the value of the action parameter, different things can happen. Therefore this parameter is first filtered, in case it was sent in by another script. If it wasn't sent in (and the value of $action = NULL), then a default value is given. In this case, the default value is 'home'. */
$action = filter_input (INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input (INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'home';
    }
}

$userId = filter_input (INPUT_POST, 'userId');
if ($userId == NULL) {
	$userId = filter_input (INPUT_GET, 'userId');
}
$senderPage = filter_input (INPUT_POST, 'senderPage');
if ($senderPage == NULL) {
    $senderPage = filter_input (INPUT_GET, 'senderPage');
}


if ($action == 'home') {
    include('./view/home.php');
} else if ($action == 'about') {
    include('./view/about.php');
} else if ($action == 'contact') {
    include('./view/contact.php');
} else if ($action == 'contactSuccessful') {
    include('./view/contactSuccessful.php');
} else if ($action == 'loanCalculator') {
    include('./view/loanCalculator.php');
} else if ($action == 'timeValueOfMoney') {
    include('./view/timeValueOfMoney.php');
} else if ($action == 'terms') {
    include('./view/terms.php');
}

ob_end_flush();

?>