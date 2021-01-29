<?php // this page connects to the database that was part of assignment 2
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "cs3319";
$dbname = "aelfarr2assign2db";
$connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
if (mysqli_connect_errno()) {
     die("database connection failed :" .
     mysqli_connect_error() .
     "(" . mysqli_connect_errno() . ")"
         );
    }
?>


