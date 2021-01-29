<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styles.css">
<h1><center>Other University Databases</center></h1>
<a href="./index.php"><center>HOME</center></a>
<a href="./OtherUniversity.php"><center>OTHER UNIVERSITIES DATABASES</center></a>
<h2>List the names and nicknames of universities<h2>
<?php include
      'connectdb.php';
?>
<?php
// Echos a table with the columns University name and their nickname
 echo '<table border="0" cellspacing="2" cellpadding="2">
        <tr>
          <th><center>University Name</center></a></th>
          <th>Abbreviation</th>
        </tr>';
  // performs a query to retrive where the universities dont have the same equivalences from western university
   $uniID =  "SELECT uniID, nameofUniversity, province, abbreviation FROM OtherUniversity WHERE uniID NOT IN (SELECT uniID FROM OtherCourses)";
  $result = mysqli_query($connection,$uniID); // stores the result inside a query and connects it to the database from assignment 2
  while($row = mysqli_fetch_assoc($result)){ // stores the result into a array where we can access the databases by its row
        $uniName = $row["nameofUniversity"]; // stores the name of the university in to the variable uniName
        $abbreviation = $row["abbreviation"]; // stores the nickname of the universitys into the variable abbrevation
        // echos the variables into the variables by rows
        echo "<tr>
                <td>$uniName</td>
                <td>$abbreviation</td>
          </tr>";
        }

?>
</body>
</html>

