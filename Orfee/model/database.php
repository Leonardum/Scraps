<?php

$host = 'localhost';
$username = 'skilwnwi_user';
$databasePassword = 'a6da5502c6ba818c4e053bed193d47b9';
$database = 'orfee';

$db = new mysqli($host,$username,$databasePassword,$database);

/* Make sure the connection to the database passes on the information in the UFT-8 charset */
$db->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

$error_message = $db->connect_error;
if ($error_message != NULL) {
    include 'errors/db_error_connect.php';
    exit();
}

function display_db_error($error_message) {
    global $app_path;
    include 'errors/db_error.php';
    exit();
}

?>