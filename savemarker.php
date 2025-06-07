<?php
// savemarker.php - saves a Google Map marker and info window
require_once("config.php"); // get config
$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD); // connect to db
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("drpayne_test", $con); // select db

$title= mysql_real_escape_string($_GET['title']);
$desc= mysql_real_escape_string($_GET['desc']);
$lat = mysql_real_escape_string($_GET['lat']);
$lng = mysql_real_escape_string($_GET['lng']);
$geo = mysql_real_escape_string($_GET['geo']);

// save those to the database
$q = "INSERT INTO maps (date, title, descr, lat, lng, geo) ".
     "VALUES (NOW(), '$title', '$desc',$lat, $lng,'$geo')";
echo $q;

$result = mysql_query($q); // run the query

if (mysql_affected_rows() > 0 )
// respond that all's fine
echo "Marker for " . $title . "\n" . $desc . "\nAt (" . $lat . ", " . $lng . "), with geocode information:\n" 
      . $geo . "\nsaved successfully.";

else echo mysql_error();

?>









