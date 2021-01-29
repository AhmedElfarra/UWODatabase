<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styles.css">
<?php
include 'connectdb.php'; // connects to the database
?>
<?php
   if(isset($_GET['westernCourseCode'])){ // checks if we can get the western course code
         $wCourseCode = $_GET['westernCourseCode']; // if its true we set the western course code inside the variable
   } else { // else it echos that we failed to retrive the western course code
    echo "FAILED!!!";
   }
    // echos a warning to a user
    echo "<p align='center'> <font color=red size='16pt'> WARNING YOU ARE ABOUT TO DELETE THE FOLLOWING COURSE: </font> <font color=red size='16pt'>$wCourseCode</font></p>";
    echo "<p align='center'> <font color=red size='8pt'> THE FOLLOWING ARE EQUIVALENT COURSES TO </font> <font color=red size='12pt'>$wCourseCode</font></p>";
    // the query variable below stores a query where it selects all the equivalences where they equal to the wesern course code submitted
    $query = "SELECT * FROM equivalence WHERE westernCourseCode='$wCourseCode'";
    // echos the table headers
    echo '<table style="margin-left:auto;margin-right:auto;" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <th>WesternCourseCode</th>
            <th><center>Course Code</center></a></th>
            <th>UniversityID</th>
            <th>Date Stamp</th>
          </tr>';
    // stores the query into the a result variable and then connects it to the database in assignment 2
    $result = mysqli_query($connection,$query);
    // The while stores an array of results into the variable row and the stores the variables of the course code and then prints it
    // out into a table
    while($row = mysqli_fetch_assoc($result)){
                $westernCourseCode = $row["westernCourseCode"];
                $courseCode = $row["courseCode"];
                $UniversityID = $row["uniID"];
                $DateStamp = $row["dateStamp"];
                //echos the variables into a table form.
                echo "<tr>
                          <td>$westernCourseCode</td>
                          <td>$courseCode</td>
                          <td>$UniversityID</td>
                          <td>$DateStamp</td>
                      </tr>";
            }
?>
</body>
<form action="" method="POST">
   <button type="submit" name="Delete">Delete</button>
    <button type="submit" name="Cancel">Cancel</button>
</form>
<?php
 if(isset($_GET['westernCourseCode'])){ // checks if we can get the western course code
         $wCourseCode = $_GET['westernCourseCode']; // if its true we set the western course code inside the variable
   } else { // else it echos that we failed to retrive the western course code
    echo "failed";
   }
if(isset($_POST['Delete'])){ // Checks if the user clicked the delete button
  // if user did click the delete button then we store it into a query and delete the course code the user clicked on
  $query =  "DELETE FROM WesternUniversityCourses WHERE westernCourseCode='$wCourseCode'";
  if(mysqli_query($connection, $query)){ // checks if the user connected to the database
    echo "Record was deleted successfully."; //  echos to the screen that the record has been succesfully added
   } else { // else it tells if didnt
    echo "ERROR: Could not able to execute $sql. "
                            . mysqli_error($connection);
  }
  mysqli_close($connection); // disconnects from the database
  header("Location: index.php"); // returns us to the home page
}
if(isset($_POST['Cancel'])){ // if the user clicks cancel button then we return to the home page without performing any queries
  mysqli_close($connection); // disconnects from the database
  header("Location: index.php");
}
?>

</html>
