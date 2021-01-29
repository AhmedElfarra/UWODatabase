<!-- THIS PAGE IS THE HOME PAGE SERVES TO INCLUDE HEADERS
  AND HREF LINKS TO THE PAGE WITH THE FUNCTIONS REQUIRED BY THE ASSIGNMENT-->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>University Database Assignment 3</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremF$

<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1> Western University Transfer Course Database</h1>
<a href="./index.php"><center>HOME</center></a>
<a href="./OtherUniversity.php"><center>OTHER UNIVERSITIES DATABASES</center></a>
<h2>Insert New Course Into The Database:</h2>
<?php
include 'AddCourse.php';
?>
<h2>Order Western Course Data By:</h2>
<?php
include 'SortData.php';
?>
</body>
</html>

