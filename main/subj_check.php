<?php
if($_POST['subj']){
$rollno=$_COOKIE['rollno'];
$subj=$_POST['subj'];
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
$qrycourses='SELECT SUM(CREDITS) FROM COURSES,STUDENTS WHERE COURSES.SEM =(CURRENTSEM+1) AND (DEPT = DEPARTMENT OR DEPARTMENT =4 ) AND (COURSETYPE=\'P\' OR COURSETYPE=\'C\') AND ROLLNO='.$rollno;
$result=mysql_query($qrycourses);
$row = mysql_fetch_assoc($result);
$qry='SELECT CREDITS FROM COURSES WHERE COURSE_ID=';
$subjectcount=count($subj);
$esum=0;
$qry_sem='SELECT SEM,CREDITS FROM SEMCREDITS,STUDENTS WHERE ROLLNO='.$rollno.' AND SEM=(CURRENTSEM+1)';
$qry_update='INSERT INTO TAKES VALUES '.$rollno;
$result_sem=mysql_query($qry_sem);
$row_sem = mysql_fetch_assoc($result_sem);
for($i=0;$i<$subjectcount;$i++)
{

	$resultsum=mysql_query($qry.'\''.$subj[$i].'\'');
	$rows = mysql_fetch_assoc($resultsum);
	$esum=$esum+$rows['CREDITS']; 
	
}
$taken=$row['SUM(CREDITS)']+$esum;
if($taken<=$row_sem['CREDITS'])
{
//$result_update=mysql_query($qry_update.' ')
header("location: second.php");
}
else
{
echo '<h3 align="center">Credits Exceeded!!</h3>';
	include('main_page.php');
	exit();
}
}
else
{
    echo '<h3 align="center">Select an elective course!!</h3>';
	include('main_page.php');
	exit();
}
?>