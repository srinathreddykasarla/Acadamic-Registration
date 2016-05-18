<?php
//Start the session to see if the user is authencticated user.
   
    session_start();
    
    
//Check if the session variable for user authentication is set, if not redirect to login page.
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){
$email=$_SESSION['email'];
$courseid=$_GET['key'];
$link = mysql_connect('localhost', 'root');
//Check link to the mysql server
if(!$link){
	die('Failed to connect to server: ' . mysql_error());
}
//Select database
$db = mysql_select_db('bsnl');
if(!$db){
	die("Unable to select database");
}
$qry='INSERT INTO userdata VALUES(\''.$email.'\',\''.$courseid.'\')';
$result=mysql_query($qry);
//if($results == FALSE)
//	echo mysql_error() . '<br>';
 //else{

echo '<h2>Registered successfully!</h2>';
include("allcourses.php");
}
else
include("login.php");

?>