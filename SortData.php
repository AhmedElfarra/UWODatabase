 <?php include
      'connectdb.php';
    ?>
<form action="" method="post">
  <input type="radio" name="course" value="By Course Name"/>
         <label>Sort By Course Name</label><br>
        &nbsp;&nbsp;&nbsp;&nbsp;
         <input type="radio" name="sort" value="Ascending"/>
        <label>Ascending</label>
        &nbsp;&nbsp;&nbsp;
        <input type="radio" name="sort" value="Descending"/>
        <label>Descending</label><br>

  <input type="radio" name="course" value="By Course Code"/>
        <label>Sort By Course Code</label><br>
          &nbsp;&nbsp;&nbsp;&nbsp;
         <input type="radio" name="sort" value="Ascending"/>
        <label>Ascending</label>
        &nbsp;&nbsp;&nbsp;
        <input type="radio" name="sort" value="Descending"/>
        <label>Descending</label><br>

    <div>
    <button type="submit">Submit</button>
  </div>
</form>
<?php
   // echos a table and prints out the columns name shown below
   echo '<table border="0" cellspacing="2" cellpadding="2">
          <tr>
            <th>CourseCode</th>
            <th><center>Course Name</center></a></th>
            <th>Weight</th>
            <th>Suffix</th>
            <th>Action</th>
          </tr>';
    // The following query selects everything from western university and then orders it by coursename
    // this helps shows the table initially
   $query = 'SELECT * FROM WesternUniversityCourses ORDER BY courseName';
    $result = mysqli_query($connection,$query); // querys the result and connects to the database

  if( isset($_POST["course"])) { // checks if the user clicked on the either of the courses
      if($_POST['course'] == "By Course Name") { // checks if they clicked sort by course name
          // the following query selects everything from western university courses and orders it by the course name
          $query = 'SELECT * FROM WesternUniversityCourses ORDER BY courseName';
          $result = mysqli_query($connection,$query); // connects to the database and executes the query
          if($_POST['sort'] == "Ascending") {
                // check if the user selected ascending and then creates a query that sorts the course name by ascending
                $query = 'SELECT * FROM WesternUniversityCourses ORDER BY courseName ASC';
                $result = mysqli_query($connection,$query); // querys the result and connects to the database

             }
    if($_POST['sort'] == "Descending") {
              // check if the user selected descending and then creates a query that sorts the course name by descending
                $query = 'SELECT * FROM WesternUniversityCourses ORDER BY courseName DESC';
                $result = mysqli_query($connection,$query); // querys the result and connects to the databases
            }
          }
      }
  if($_POST['course'] == "By Course Code") {
           // checks if they clicked sort by course code
          // the following query selects everything from western university courses and orders it by the course code
          $query = 'SELECT * FROM WesternUniversityCourses ORDER BY westernCourseCode';
          $result = mysqli_query($connection,$query); // querys the result and connects to the databases
            if($_POST['sort'] == "Ascending") {
                // check if the user selected ascending and then creates a query that sorts the course code by ascending
                $query = 'SELECT * FROM WesternUniversityCourses ORDER BY westernCourseCode ASC';
                $result = mysqli_query($connection,$query);

             }
            if($_POST['sort'] == "Descending") {
                // check if the user selected descending and then creates a query that sorts the course code by descending
                $query = 'SELECT * FROM WesternUniversityCourses ORDER BY westernCourseCode DESC';
                $result = mysqli_query($connection,$query);
            }
    }
    // the following while loop stores the result into an array and were able to access the array one by one and then
    // print out the information needed into a table by row
    while($row = mysqli_fetch_assoc($result)){
                $courseCode = $row["westernCourseCode"]; // stores the western course code into the variable
                $courseName = $row["courseName"]; // stores the western course name into a variable
                $weight = $row["weight"]; // stores the weight assoicated with the course into a variable
                $suffix = $row["suffix"]; // stores the suffix associated with the course into a variable
                // echos out the variables into a table
                echo "<tr>
                          <td>$courseCode</td>
                          <td>$courseName</td>
                          <td>$weight</td>
                          <td>$suffix</td>
                          <td><a href ='./edit.php?westernCourseCode=$courseCode'>EDIT</a></td>
                          <td><a href='./delete.php?westernCourseCode=$courseCode' style='background: #D30000;'>DELETE</$
                      </tr>";
            }
  mysqli_close($connection); // closes the connection of mysql
?>
