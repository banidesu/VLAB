<?php
header('Access-Control-Allow-Origin: *');

$host="mysql.idhostinger.com"; // Host name 
$username="u253188904_root"; // Mysql username 
$password="mamen2425"; // Mysql password 
$db_name="u253188904_dbsmm"; // Database name 
$tbl_name="scores"; // Table name

// Connect to server and select database.
$mysqli = new mysqli("$host", "$username", "$password", "$db_name");


$layout = isset($_GET['layout']) ? $_GET['layout'] : "";

// Retrieve score value and ordering descending and limit 10 to showing from table scores
$result=$mysqli->query("SELECT * FROM scores WHERE layout = $layout ORDER BY `score` DESC LIMIT 10");



// Start looping rows in mysql database.
while($rows=mysqli_fetch_array($result)){
echo $rows['name'] . "|" . $rows['score'] . "|";

// close while loop 
}

// close MySQL connection 
mysqli_close();
?>