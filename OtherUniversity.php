<!-- THIS PAGE SERVES TO INCLUDE HEADERS
  AND HREF LINKS TO THE PAGE WITH THE FUNCTIONS REQUIRED BY THE ASSIGNMENT-->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>University Database Assignment 3</title>

<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1><center>Other University Databases</center></h1>
<a href="./index.php"><center>HOME</center></a>
<a href="./OtherUniversity.php"><center>OTHER UNIVERSITIES DATABASES</center></a>
<h2>Select The University To Display Info:<h2>
<a href ='./SelectUniversity.php'>Click Here</a>
<h2>Select Province Code To Display University Info:<h2>
<a href ='./SelectProvince.php'>Click Here</a>
<h2>Select Western Course by Number:<h2>
<a href ='./SelectCourseNumber.php'>Click Here</a>
<h2>Select The Date:<h2>
<a href ='./SelectDate.php'>Click Here</a>
<h2>List the names and nicknames of universities<h2>
<a href ='./ListNickName.php'>Click Here</a>
<h2>CREATE A COURSE EQUIVALENCY<h2>
<a href ='./CreateEqual.php'>Click Here</a>
</body>
</html>


