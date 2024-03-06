<?php



$db = "u253188904_dbsmm";//Your database name
$dbu = "u253188904_root";//Your database username
$dbp = "mamen2425";//Your database users' password
$host = "mysql.idhostinger.com";//MySQL server - usually localhost

// Connect to server and select database.
$dblink = mysqli_connect($host,$dbu,$dbp,$db);

if (!$dblink) {
error_log( "Error: Unable to connect to MySQL." . PHP_EOL);
error_log("Debugging errno: " . mysqli_connect_errno() . PHP_EOL);
error_log("Debugging error: " . mysqli_connect_error() . PHP_EOL);
exit;
}

if (isset($_GET['name']) && isset($_GET['score']) && isset($_GET['layout'])){
$name = strip_tags(mysqli_real_escape_string($dblink, $_GET['name']));//get data from column name
$score = strip_tags(mysqli_real_escape_string($dblink, $_GET['score']));//get data from column score
$layout = strip_tags(mysqli_real_escape_string($dblink, $_GET['layout']));//get data from column score
$sql=("SELECT * FROM scores WHERE name='$name';");//choose scores table from database where column name
$result = $dblink->query($sql);//execute database

if ($result->num_rows > 0){ //if result > 0, if any data on tables 

$row = $result->fetch_assoc(); //fetching table row
if ((int)$row['score']< (int)$score){ //choose score column
$sql=("UPDATE scores SET score=$score WHERE name='$name';"); //updating score value where column name on table scores
if ($dblink->query($sql) === TRUE) {
echo "Record updated successfully"; //if true will show this
} else {
echo "Error updating record: " . $dblink->error; //this is if failed or error
}
}
}
else{ // if no data on tables
$sql=("INSERT INTO scores (name, score, layout ) VALUES ('$name', $score , $layout);"); //insert score value into name & score column on table scores
if ($dblink->query($sql) === TRUE) {
echo "Record inserted successfully";//if true will show this
} else {
echo "Error updating record: " . $dblink->error;//this is if failed or error
}
}
}
// echo not effect
?>
