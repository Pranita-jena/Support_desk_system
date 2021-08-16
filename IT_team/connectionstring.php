<?php

$dsn="mysql:dbname=it_support_db;hostname=localhost";
$username="root";
$password="";


$conn=new PDO($dsn,$username,$password,array(PDO::ATTR_AUTOCOMMIT=>false));

session_start();

?>