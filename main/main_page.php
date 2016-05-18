<?php
 //Start the session to see if the user is authencticated user.
 
 session_start();
 //Check if the session variable for user authentication is set, if not redirect to login page.
 if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){
 echo '<a href="log_out.php">Log Out </a> </br></br></br>';

 $rollno=$_COOKIE['rollno'];
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
$qrycourses='SELECT * FROM COURSES,STUDENTS WHERE COURSES.SEM =(CURRENTSEM+1) AND (DEPT = DEPARTMENT OR DEPARTMENT =4 ) AND ROLLNO='.$rollno;
$qrycoursedrop='SELECT * FROM STUDENTS,SPI WHERE STUDENTS.ROLLNO=SPI.ROLLNO AND STUDENTS.ROLLNO='.$rollno;
//Execute query
$result = mysql_query($qry);
$row = mysql_fetch_assoc($result);
$resultcour=mysql_query($qrycourses);
$resultcourdro=mysql_query($qrycoursedrop);

echo '<h1>Your Details are - </h1>';
//Draw the table for cources

echo '
<table border="1" cellspacing="0">
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
//Show the rows in the fetched resultset one by one
$rowcourdro = mysql_fetch_assoc($resultcourdro);
if((($rowcourdro['S1']+$rowcourdro['S2']+$rowcourdro['S3']+$rowcourdro['S4']+$rowcourdro['S5']+$rowcourdro['S6']+$rowcourdro['S7']+$rowcourdro['S8'])/$rowcourdro['CURRENTSEM'])>=4.5)
{
echo '</table>
  <hr>
  <h1>Professional Courses</h1>
  <table  border="1" cellpadding="10" cellspacing="0">
<th>Course Id</th>
<th>Course Name</th>
<th>Credits</th>';
while ($rowcour = mysql_fetch_assoc($resultcour))
{
if($rowcour['COURSETYPE']=='P')
{
echo '<tr>
<td>'.$rowcour['COURSE_ID'].'</td>
<td>'.$rowcour['COURSENAME'].'</td>
<td>'.$rowcour['CREDITS'].'</td>

</tr>';
}
}
$resultcour=mysql_query($qrycourses);
echo '</table>
  <hr>
  <h1>Common Courses</h1>
  <table  border="1" cellpadding="10" cellspacing="0">
  <th>Course Id</th>
  <th>Course Name</th>
  <th>Credits</th>';
while ($rowcour1 = mysql_fetch_assoc($resultcour))
{
if($rowcour1['COURSETYPE']=='C')
{
    echo '<tr>
    <td>'.$rowcour1['COURSE_ID'].'</td>
    <td>'.$rowcour1['COURSENAME'].'</td>
    <td>'.$rowcour1['CREDITS'].'</td>
    </tr>';
}
}
$resultcour=mysql_query($qrycourses);
echo '</table>
  <hr>
  <h1>Elective Courses List</h1>
  <form name="myForm" action = "subj_check.php" method = "post">
  
  <table  border="1" cellpadding="10" cellspacing="0">
  <th>Check</th>
  <th>Course Id</th>
  <th>Course Name</th>
  <th>Credits</th>';
while ($rowcour1 = mysql_fetch_assoc($resultcour))
{
if($rowcour1['COURSETYPE']=='E')
{
    echo '<tr>
	<td><input type="checkbox" name="subj[]" value="'.$rowcour1['COURSE_ID'].'"/>
    <td>'.$rowcour1['COURSE_ID'].'</td>
    <td>'.$rowcour1['COURSENAME'].'</td>
    <td>'.$rowcour1['CREDITS'].'</td>
	</td>
    </tr>';
}
}
}
else
{
echo '</table>
  <hr>
  <h1>Professional Courses</h1>
  <table  border="1" cellpadding="10" cellspacing="0">
<th>Course Id</th>
<th>Course Name</th>
<th>Credits</th>';
while ($rowcour = mysql_fetch_assoc($resultcour))
{
if($rowcour['COURSETYPE']=='P')
{
echo '<tr>
<td>'.$rowcour['COURSE_ID'].'</td>
<td>'.$rowcour['COURSENAME'].'</td>
<td>'.$rowcour['CREDITS'].'</td>

</tr>';
}
}
$resultcour=mysql_query($qrycourses);
echo '</table>
  <hr>
  <h1>Common Courses</h1>
  <table  border="1" cellpadding="10" cellspacing="0">
  <th>Course Id</th>
  <th>Course Name</th>
  <th>Credits</th>';
while ($rowcour1 = mysql_fetch_assoc($resultcour))
{
if($rowcour1['COURSETYPE']=='C')
{
    echo '<tr>
    <td>'.$rowcour1['COURSE_ID'].'</td>
    <td>'.$rowcour1['COURSENAME'].'</td>
    <td>'.$rowcour1['CREDITS'].'</td>
    </tr>';
}
}
}
	
echo '</table>

<table cellpadding = "20">
<tr>
<td><input type="submit" name="submit" value="Continue"></td>
</tr>
</table>
</form>';
 
 } 
 else{ 
 header('location:login_form.php'); 
 exit();
 }
 ?>
