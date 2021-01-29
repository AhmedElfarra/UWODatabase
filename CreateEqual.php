<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styles.css">

<?php include
      'connectdb.php';
    ?>

<h1><center>Other University Databases</center></h1>
<a href="./index.php"><center>HOME</center></a>
<a href="./OtherUniversity.php"><center>OTHER UNIVERSITIES DATABASES</center></a>
</body>
</html>
<?php
     // Query to select the western course codes from the table western university courses
     $query = "SELECT westernCourseCode FROM WesternUniversityCourses";
     $result = mysqli_query($connection,$query); // executes the query and connects the database
     // echos a font to select from the following western courses
     echo '<p style="color:red;">SELECT FROM THE FOLLOWING WESTERN COURSES:</p>';
     echo '<form action="" method="post">'; // beginning of form
     // the following while loop stores the result into an array and were able to access the array one by one and then
    // print out the information needed into a table by row
     while ($row=mysqli_fetch_assoc($result)) {
        $courseCodes = $row["westernCourseCode"];
        echo "<input type='radio' name='wesCode' value='$courseCodes'>";
        echo $courseCodes;
     }
      // Query to select the outside course codes from the table outside university courses
      $query1 = "SELECT DISTINCT courseCode FROM OtherCourses";
      $result1 = mysqli_query($connection,$query1);
      echo '<br>'; // new line to make it display better
       // echos a font to select from the following western courses
      echo '<p style="color:red;">SELECT FROM THE FOLLOWING OUTSIDE COURSES:</p>';
      // the following while loop stores the result into an array and were able to access the array one by one and then
    // print out the information needed into a table by row
     while ($row=mysqli_fetch_assoc($result1)) {
        $courseCodes = $row["courseCode"];
        echo "<input type='radio' name='oCode' value='$courseCodes'>";
        echo  $courseCodes;
     }
      echo '<br></br><input type="submit" name="wCodes" value="Create">'; // create button
      echo '</form>'; // end of form
      $info = $_POST["wesCode"]; // stores the selected western course code into the variable
      $info2 = $_POST["oCode"]; // store the select outside course into the variable

      // query to select all equivalences from western
      $query = "SELECT * FROM equivalence WHERE westernCourseCode='$info'";
      $result = mysqli_query($connection,$query); // executes the query and connects the database

        // checks if the query has an equivalent course
         if(mysqli_num_rows($result) >= 1) {
                // query to update course to currrent date
                $query1 = "UPDATE equivalence SET dateStamp=CURDATE()
                          WHERE courseCode='$info2'
                          AND westernCourseCode='$info'";
                $result1 = mysqli_query($connection,$query1); // executes the query and connects the database
           }else {  // if the query doesnt have an equivalent course
                 $query2 = "SELECT uniID
                  FROM OtherCourses WHERE
                  courseCode='$info2'";
                 $result2 = mysqli_query($connection,$query2); // executes the query and connects the database
                 $uniID = mysqli_fetch_assoc($result2); // university ID
                 $uniID =  $uniID["uniID"];
                 // query to insert the new equivalent course into the equivalence table
                 $query3 = "INSERT INTO equivalence Values('$info',
                            '$info2','$uniID', CURDATE())";
                 $result3 = mysqli_query($connection,$query3);  // executes the query and connects the database
                }

  mysqli_close($connection); // closes the connection of mysql

?>

</html>
