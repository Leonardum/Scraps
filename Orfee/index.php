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
$studentId = filter_input (INPUT_POST, 'studentId');
if ($studentId == NULL) {
	$studentId = filter_input (INPUT_GET, 'studentId');
}
$organisationId = filter_input (INPUT_POST, 'organisationId');
if ($organisationId == NULL) {
	$organisationId = filter_input (INPUT_GET, 'organisationId');
}
$companyId = filter_input (INPUT_POST, 'companyId');
if ($companyId == NULL) {
	$companyId = filter_input (INPUT_GET, 'companyId');
}
$skillId = filter_input (INPUT_POST, 'skillId');
if ($skillId == NULL) {
	$skillId = filter_input (INPUT_GET, 'skillId');
}
$eventId = filter_input (INPUT_POST, 'eventId');
if ($eventId == NULL) {
    $eventId = filter_input (INPUT_GET, 'eventId');
}
$senderPage = filter_input (INPUT_POST, 'senderPage');
if ($senderPage == NULL) {
    $senderPage = filter_input (INPUT_GET, 'senderPage');
}


if ($action == 'home') {
    include('./view/home.php');
} else if ($action == 'about') {
    include('./view/about.php');
} else if ($action == 'calendar') {
    include('./view/calendar.php');
} else if ($action == 'contact') {
    include('./view/contact.php');
} else if ($action == 'contactSuccessful') {
    include('./view/contactSuccessful.php');
} else if ($action == 'terms') {
    include('./view/terms.php');
} else if ($action == 'createAccount') {
    include('./view/accountCreation.php');
} else if ($action == 'accountCreated') {
    include('./view/accountCreated.php');
} else if ($action == 'resendActivation') {
    include('./view/resendActivation.php');
} else if ($action == 'activationMailLost') {
    include('./view/activationMailLost.php');
} else if ($action == 'welcome') {
    include('./view/welcome.php');
} else if ($action == 'logIn') {
    require('./model/student_object.php');
    include('./view/logIn.php');
} else if ($action == 'forgotPassword') {
    include('./view/forgotPassword.php');
} else if ($action == 'newPassActive') {
    include('./view/newPassActive.php');
} else if ($action == 'userPage') {
    include('./view/userPage.php');
} else if ($action == 'editAccount') {
	$load = "loadStudyAndUniversity();";
	$page = './view/editAccount.php';
	$auxlib = false;
	$script = true;
	require('./model/student_object.php');
    include('./view/userPage.php');
} else if ($action == 'profile') {
	$menu = "studentMenu.php";
	$load = "loadMicrodegrees();";
	$page = './view/profile.php';
	$auxlib = true;
	$script = true;
	require('./model/university_object.php');
	require('./model/study_object.php');
    include('./view/userPage.php');
} else if ($action == 'searchResults') {
    include('./view/searchResults.php');
} else if ($action == 'logOut') {
    include('./view/logOut.php');
} else if ($action == 'admin') {
	require('./model/establishment_object.php');
	require('./model/address_object.php');
    include('./view/admin.php');
}

ob_end_flush();

?>