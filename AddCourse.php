<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styles.css">

<?php include
      'connectdb.php'; // Connection to database
    ?>
<form action="" method = "POST"  >
        <label>Course Code</label>
        <input type = "text" name = "coursecode" value = "" required/>
        <label>Course Name:</label>
        <input type = "text" name = "coursename" value = "" required />
        <label>Weight:</label>
        <input type = "text" name = "weight" value = "" required/>
        <label>Suffix:</label>
        <input type = "text" name = "suffix" value = "" required/>
        <input type="submit" name="Submit" value="Insert">
</form>
<?php
if(isset($_POST['Submit'])){ // checks if the user hit the  submit button
  $courseCode = $_POST['coursecode']; // sets a variable to the course code the user has entered
  $CourseName = $_POST['coursename']; // sets a variable to the course name the user has entered
  $suffix = $_POST['suffix']; // sets a variable to the suffix that the user has entered
  $weight = $_POST['weight']; // sets a variabale to the weight that the user has entered
  // The query variable below stores a query that inserts the values given by the user into the database
  $query =  "INSERT INTO WesternUniversityCourses VALUES ('$courseCode','$CourseName','$weight','$suffix')";
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

