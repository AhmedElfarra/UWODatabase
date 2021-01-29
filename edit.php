<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php include
      'connectdb.php';
?>
<link rel="stylesheet" type="text/css" href="styles.css">

<head>
  <title>Insert Data</title>

</head>

<body>
<form action="" method="POST">
<table width="25%" border="0">
<tbody><tr>
 <td>Course Name</td>
 <td><input type="text" name="CourseName" value=""></td>
</tr>
<tr>
<td>Course Weight</td>
 <td><input type="text" name="weight" value=""></td>
</tr>
<tr>
 <td>Course Suffix</td>
<td><input type="text" name="suffix" value=""></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="Submit" value="Update"></td>
</tr>
</tbody></table>
</form>
 <?php
   if(isset($_GET['westernCourseCode'])){ // checks if we can get the western course code
         $courseCode = $_GET['westernCourseCode']; // if its true we set the western course code inside the variable
   } else { // else it echos that we failed to retrive the western course code
  echo "failed";
   }

if(isset($_POST['Submit'])){ // if the user clicks submit then we do the following operations
  $CourseName = $_POST['CourseName']; // sets a variable to the course code the user has entered
  $suffix = $_POST['suffix'];  // sets a variable to the suffix that the user has entered
  $weight = $_POST['weight']; // sets a variabale to the weight that the user has entered
  // The query variable below stores a query that inserts the values given by the user into the database
  $query =  "UPDATE WesternUniversityCourses SET courseName='$CourseName',weight='$weight',suffix='$suffix'
             WHERE westernCourseCode='$courseCode'";
  if(mysqli_query($connection, $query)){ // connects to the mysql database and querys the result
    echo "Record was updated successfully."; // prints it if it was recorded successfully
   } else { // tells us if it wasn't recorded successfully
  echo "ERROR: Could not able to execute $sql. "
                            . mysqli_error($connection);
  }
  mysqli_close($connection); // closes the connection of mysql
  header("Location: index.php"); // redirects you back to the index page (the home page)
}

?>

</body>
</html>
