<?php

$connection = new mysqli('localhost', 'root', '', 'asetku');
	
	if(!$connection){
		die("Error: Can't connect to database");
	}

// $host="localhost";
// $user="root";
// $password="";
// $db="asetku";

// $connection = mysqli_connect($host, $user, $password, $db);