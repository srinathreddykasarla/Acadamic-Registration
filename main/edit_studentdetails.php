<?php 
//Start the session to see if the user is authenticated user. 

$rollno=$_COOKIE['roll'];
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

echo '<form name="myForm" action="main_page_acad.php" method="post">
	<table border=1>
	<tr><td colspan="2" align="center"> <h4>- Edit Details-</h4></td></tr>
	<tr><td>RollNo-</td>
		<td><input type="text"  name="Roll no" value='.$row['ROLLNO'].'></td></tr>
	<tr><td>Name -</td>
		<td><input type="text"  name="name" value='.$row['NAME'].'></td></tr>
	<tr><td>FatherName -</td>
		<td><input type="text" name="fathername"value='.$row['FATHERSNAME'].'></td></tr>
	<tr><td>Department -</td>
		<td><input type="text" name="department"value='.$row['DEPT'].'></td></tr>
	<tr><td>Batch-</td>
		<td><input type="text" name="batch"value='.$row['BATCH'].'></td></tr>
	<tr><td>Current Sem -</td>
		<td><input type="text" name="currentsem" value='.$row['CURRENTSEM'].' ></td></tr>
	<tr align="center"><td colspan="2"><input type="submit" value="Update" /></td></tr>
	</table>
	</form>';

?>