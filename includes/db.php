<?php
$localhost='localhost';
$username='root';
$password='';
$database='social';
$connection=mysqli_connect($localhost,$username,$password,$database);



function string_escape($string){
	global $connection;
	return mysqli_real_escape_string($connection,$string);
}
function html_char($string){
	return htmlspecialchars($string);
}
function query($query){
	global $connection;
	return mysqli_query($connection,$query);
}
function confirm($result){
	global $connection;
	if(!$result){
		die("Query Failed".mysqli_error($connection));
	}
}
function fetch_array($result){
	return mysqli_fetch_array($result);
}

?>