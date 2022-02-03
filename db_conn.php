<?php  

$sname = "localhost";
$uname = "devweb";
$password = "R!E.vl_RZWRcO8HN";

$db_name = "jec_vagas";

$conn  = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}