<?php
 //Start the session to see if the user is authencticated user.
 
setcookie('roll',$_POST['rollno']);
 $rollno=$_POST['rollno'];
 $link = mysql_connect('localhost', 'root');
//Check link to the mysql server
if(!$link){
die('Failed to connect to server: ' . mysql_error());
}
//Select database
$db = mysql_select_db('ARDB');
if(!$db){
die("Unable to select database");
}
//Create query

$qry = 'SELECT * FROM STUDENTS WHERE ROLLNO='.$rollno;
$qrycourses='SELECT * FROM COURSES,STUDENTS WHERE COURSES.SEM=(CURRENTSEM+1) AND DEPARTMENT=DEPT AND ROLLNO='.$rollno;
//Execute query
$result = mysql_query($qry);
$row = mysql_fetch_assoc($result);
$resultcour=mysql_query($qrycourses);

echo '<h1>Your Details are - </h1>';
//Draw the table for Players
echo '
<table border="0" cellspacing="10">
<tr>
<th>Roll No:</th>
<td>'.$row['ROLLNO'].'</td>
</tr>
<tr>
<th>Name:</th>
<td>'.$row['NAME'].'</td>
</tr>
<tr>
<th>Father\'s Name:</th>
<td>'.$row['FATHERSNAME'].'</td>
</tr>
<tr>
<th>Department:</th>
<td>'.$row['DEPT'].'</td>
</tr>
<tr>
<th>Batch:</th>
<td>'.$row['BATCH'].'</td>
</tr>
<tr>
<th>Current Sem:</th>
<td>'.$row['CURRENTSEM'].'</td>
</tr>';

//Show the rows in the fetched resultset one by one
echo '</table>

<form action = "edit_studentdetails.php" method = "post">

<table cellpadding = "20">
<tr>

<td><input type="submit" name="submit" value="Edit" /></td>

</tr>
</table>
</form>';


echo '</table>
  <hr>
  <h1>Courses List</h1>
  <table  border="1" cellpadding="10" cellspacing="0">
<th>Course Id</th>
<th>Course Name</th>
<th>Department</th>';
//Show the rows in the fetched resultset one by one
while ($rowcour = mysql_fetch_assoc($resultcour))
{ 
echo '<tr>
<td>'.$rowcour['COURSE_ID'].'</td>
<td>'.$rowcour['COURSENAME'].'</td>
<td>'.$rowcour['DEPARTMENT'].'</td>

</tr>';
}
echo '</table>

<form action = "Second.php" method = "post">

<table cellpadding = "20">
<tr>
<td><input type="submit" name="submit" value="Continue"></td>

</tr>
</table>
</form>';



 ?>
