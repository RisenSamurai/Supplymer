<?php


include "config.inc.php";
$db_statement = 'Nothing to report!';


$connection = new mysqli(DB_HOSTNAME, DB_LOGIN,DB_PASSWORD, DB_NAME);

if($connection->error) die ($db_statement = 'Connection error!');
if($connection) {$db_statement = 'Database is ready!!'; }
