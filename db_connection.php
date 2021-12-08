<?php
/*
$sname= "localhost";
$uname= "root";
$password = "";
$db_name = "mini_project_f";

*/
$sname= "remotemysql.com:3306";
$uname= "BukTiTkr9E";
$password = "CpbvPsMSai";
$db_name = "BukTiTkr9E";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}