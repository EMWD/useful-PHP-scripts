<?php

require_once "rb-mysql.php";
R::setup( 'mysql:host=localhost;dbname=testdb','root', '' );

$conn = new mysqli("localhost", "root", "", "testdb");


@session_start();

?>