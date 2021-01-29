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
<?php
  // Selects everything from other unversity and sorts it by province
   $query = "SELECT * FROM OtherUniversity ORDER BY province ASC";
   $result = mysqli_query($connection,$query); // executes the query and connects to the database
   echo "<form action='' method='POST'>"; // echos a form
    while($row = mysqli_fetch_assoc($result)){ // makes an array the of our query and goes row by row
           $universityID = $row["uniID"]; // stores the university ID into a variable
           $uniName = $row["nameofUniversity"]; // stores the province code into a variable
           //echos radio button to store information
           echo "<input type='radio' name='courseINFO' value='$universityID'/>
           <label>$uniName</label><br>";
      }
  echo "<input type='submit' name='submit' value='Submit'/>"; // prints out the submit button
  echo "</form>"; // end of form
  // stores all the university ID  by using the POST command and retrives it from the from
  $info = $_POST['courseINFO'];
    // prints out a table and the column names seen below
  echo '<table border="0" cellspacing="2" cellpadding="2">
        <tr>
          <th>University ID</th>
          <th><center>University Name</center></a></th>
          <th>City</th>
          <th>Province</th>
          <th>Abbreviation</th>
        </tr>';

if(isset($_POST['submit'])){   // checks if the user clicked the submit button
    // selects all the information from the other university and uniID is equal to the university ID selected
  $query =  "SELECT * FROM OtherUniversity WHERE uniID='$info'";
  $result = mysqli_query($connection,$query); // executes the following query into a variable and connects it to the database
  // the following while loop stores the result into an array and were able to access the array one by one and then
  // print out the information needed into a table by row
  while($row = mysqli_fetch_assoc($result)){
      $uniID = $row["uniID"]; // stores the university ID into the variable
      $uniName = $row["nameofUniversity"]; // stores the university name into the variable so we can store it into the table
      $city = $row["city"]; // stores the city into the variable
      $province = $row["province"]; // stores the province into the variable
      $abbreviation = $row["abbreviation"]; // stores the abbrevation into the variable so we can store it into the table
      // echos out the variables into the table by rows.
      echo "<tr>
                          <td>$uniID</td>
                          <td>$uniName</td>
                          <td>$city</td>
                          <td>$province</td>
                          <td>$abbreviation</td>
                      </tr>";
  }

}
    // prints out a table and the column names seen below
  echo '<table border="0" cellspacing="2" cellpadding="2">
        <tr>
          <th>Course Code</th>
          <th><center>Course Name</center></a></th>
          <th>Year of Course</th>
          <th>Weight</th>
          <th>University ID</th>
        </tr>';
  if(isset($_POST['submit'])){  // checks if the user clicked the submit button
        // selects all the information from the other university and uniID is equal to the university ID selected
    $query =  "SELECT * FROM OtherCourses WHERE uniID='$info'";
    $result = mysqli_query($connection,$query); // executes the following query into a variable and connects it to the database
   // the following while loop stores the result into an array and were able to access the array one by one and then
  // print out the information needed into a table by row
    while($row = mysqli_fetch_assoc($result)){
        $courseCodes = $row["courseCode"];
        $courseNames = $row["otherCourseName"];
        $courseYears = $row["courseYear"];
        $weights = $row["weight"];
        $universityIDS = $row["uniID"];
        // echos out the variables into the table by rows.
        echo "<tr>
                            <td>$courseCodes</td>
                            <td>$courseNames</td>
                            <td>$courseYears</td>
                            <td>$weights</td>
                            <td>$universityIDS</td>
                        </tr>";
  }
}

?>
</body>
</html>

