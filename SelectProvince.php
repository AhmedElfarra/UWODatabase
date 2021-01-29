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
<h2>SELECT THE PROVINCE TO DISPLAY INFO<h2>
<?php
    $query = "SELECT DISTINCT province FROM OtherUniversity ORDER BY province ASC";
   $result = mysqli_query($connection,$query);
   echo "<form action='' method='POST'>";
    while($row = mysqli_fetch_assoc($result)){
           $universityID = $row["uniID"];
           $provinces = $row["province"];
           echo "<input type='radio' name='courseINFO' value='$provinces'/>
           <label>$provinces</label><br>";
      }
  echo "<input type='submit' name='submits' value='Submit'/>";
  echo "</form>";
  $info = $_POST['courseINFO'];
  echo '<table border="0" cellspacing="2" cellpadding="2">
        <tr>
          <th><center>University Name</center></a></th>
          <th>Abbreviation</th>
        </tr>';
if(isset($_POST['submits'])){
  $query =  "SELECT * FROM OtherUniversity WHERE province='$info'";
  $result = mysqli_query($connection,$query);
  while($row = mysqli_fetch_assoc($result)){
      $uniName = $row["nameofUniversity"];
      $abbreviation = $row["abbreviation"];
      echo "<tr>
                          <td>$uniName</td>
                          <td>$abbreviation</td>
                      </tr>";
  }

}



?>
</body>
</html>
