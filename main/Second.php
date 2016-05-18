<?php
 //Start the session to see if the user is authencticated user.
 session_start();
 //Check if the session variable for user authentication is set, if not redirect to login page.
 if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){
 echo '<a href="log_out.php">Log Out </a> </br></br></br>';
$rollno=$_COOKIE['rollno'];
if($_POST['submit']='Continue'){
$link = mysql_connect('localhost', 'root');
//Check link to the mysql server
if(!$link){
die('Failed to connect to server: ' . mysql_error());
}
//Select database
$db = mysql_select_db('ardb');
if(!$db){
die("Unable to select database");
}
//Create query
$qry='SELECT * FROM dues WHERE ROLLNO='.$rollno;
$result = mysql_query($qry);
if($result!='NULL'){
$row = mysql_fetch_assoc($result);
echo'<h1 align="center"><b>ROLL NO:'.$rollno.'<b></h1>';
echo'<table border="0" align="center" cellpadding="10" cellspacing="0">
<th>S.NO</th>
<th align="center">DUE TYPE</th>
<th>DUE AMOUNT</th>
<th></th>
<tr><td >1</td>
    <td>LIBRARYDUES</td>
    <td align="center">'.$row['LIBRARYDUES'].'</td>
<td><form action = "http//www.allbankonline.com" method = "post">
<input type="submit" name="library" value="PAY">
<form></td>
</tr>
<tr><td>2</td>
    <td>MESSDUES</td>
    <td >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$row['MESSDUES'].'</td>
<td><form action = "http//www.allbankonline.com" method = "post">
<input type="submit" name="mess" value="PAY">
<form></td>
</tr>
 <tr><td>3</td>
    <td>HOSTELDUES</td>
    <td align="center">'.$row['HOSTELDUES'].'</td>
<td><form action = "http//www.allbankonline.com" method = "post">
<input type="submit" name="hostel" value="PAY">
<form></td>
</tr>
 <tr><td>4</td>
    <td>ACADEMICDUES</td>
    <td align="center">'.$row['ACADEMICDUES'].'</td>
<td><form action = "http//www.allbankonline.com" method = "post">
<input type="submit" name="academic" value="PAY">
<form></td>
</tr>
    </table>';
	}
	else{
	header('location:login_form.php'); 
 exit();
	}
	}
else{
	header('location:login_form.php'); 
 exit();
 }
 }
 else{
	header('location:login_form.php'); 
 exit();
 }
?>