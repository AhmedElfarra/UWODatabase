<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styles.css">
<h1><center>Other University Databases</center></h1>
<a href="./index.php"><center>HOME</center></a>
<a href="./OtherUniversity.php"><center>OTHER UNIVERSITIES DATABASES</center></a>
<h2>Select The Date:<h2>
<?php include
      'connectdb.php';
?>

<?php
   // The query selects the western course codes from western university
 $query = "SELECT westernCourseCode FROM WesternUniversityCourses";
   $result = mysqli_query($connection,$query); // stores the query and connects to the database
   echo "<form action='' method='POST'>"; // echos a form
    while($row = mysqli_fetch_assoc($result)){ // makes an array out of our query
           $courseCodes = $row["westernCourseCode"]; // stores the western course code into a variable
             // prints out a radio button
           echo "<input type='radio' name='courseINFO' value='$courseCodes'/>
           <label>$courseCodes</label><br>";

      }
   echo "<input type='date' name='Dates'/>";
   echo "<input type='submit' name='submit' value='Submit'/>"; // prints out the submit button
   $info = $_POST['courseINFO'];// stores all the western courses codes by using the POST command and retrives it from the from
  // prints out a table and the column names seen below
   $date = $_POST["Dates"];
   // stores the date by using the POST command and retrives it from the from prints out a table and the column names seen below
   echo "</form>"; // end of the form
  // prints out a table and the column names seen below
   echo '<table border="0" cellspacing="2" cellpadding="2">
        <tr>
          <th><center>University name </center></a></th>
          <th>Outside Course Name </th>
          <th>Outside Course Number</th>
          <th>Weight</th>
          <th>Equvialent Date</th>

        </tr>';

    if(isset($_POST['submit'])){
      // checks if the user clicked the submit button
      // The following query selects the western course code name and weight from the table of western university
      // where the user selected the following course number which is stored in the $info variable
        $query = "SELECT oc.otherCourseName,ou.nameofUniversity, oc.courseCode, e.dateStamp, oc.weight
        FROM equivalence as e,OtherCourses as oc, OtherUniversity as ou, WesternUniversityCourses as w
        WHERE e.courseCode = oc.courseCode
        AND e.uniID = oc.uniID
        AND ou.uniID = oc.uniID
        AND w.westernCourseCode = e.westernCourseCode
        AND w.westernCourseCode='$info'
        AND e.dateStamp<= '$date'";

        $result = mysqli_query($connection,$query);
        // stores the following query into a variable and connects it to the database
        // the following while loop stores the result into an array and were able to access the array one by one and then
        // print out the information needed into a table by row
        while($row = mysqli_fetch_assoc($result)){
             $otherUniversityName = $row["nameofUniversity"]; // the otherUniversityName variable stores the name of the university
             $courseNames = $row["otherCourseName"]; // the course name variable stores the course name into the variable
             $courseCodes = $row["courseCode"]; // course code variable stores the course code
             $weight = $row["weight"]; // stores the weight into the variable
             $dateStamps = $row["dateStamp"]; // stores the date of the decision
            // echos out the variables into the table by rows.
                echo "<tr>
                          <td>$otherUniversityName</td>
                          <td>$courseNames</td>
                          <td>$courseCodes</td>
                          <td>$weight</td>
                          <td>$dateStamps</td>

                          </tr>";
                    }
          }
    mysqli_close($connection); // closes the connection of mysql
?>
</html>

