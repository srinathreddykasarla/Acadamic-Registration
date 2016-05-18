<?php 
    setcookie('email',$_POST['email']);
	if ($_POST['submit'] == 'Login'){ 
	//Collect POST values
	$login = $_POST['email']; 
	$password = $_POST['password']; 
	if($login && $password){
		//Connect to mysql server
		$link = mysql_connect('localhost', 'root');
		//Check link to the mysql server 
		if(!$link) { 
		die('Failed to connect to server: ' . mysql_error()); 
		} 
		//Select database
		$db = mysql_select_db('bsnl');
		if(!$db) {
		die("Unable to select database");
		} //Create query
		$qry='SELECT * FROM user WHERE Email = \''.$login.'\' AND Password = \''.$password.'\'';
		//Execute query
		$result=mysql_query($qry);
		//Check whether the query was successful or not
		if($result){
		$count = mysql_num_rows($result);
		}
		else
		{
		//Login failed
		include('login1.php');
		echo '<center>Incorrect Username or Password !!!<center>'; 
		exit(); 
		} 
		//if query was successful it should fetch 1 matching record from the table. 
		if( $count == 1){
		//Login successful set session variables and redirect to main page.
		session_start(); $_SESSION['IS_AUTHENTICATED'] = 1;
		$_SESSION['email'] = $login;
		header('location:../bsnl/index.php');
		} 
		else{ 
		//Login failed
		include('login.php');
		echo '<center>Incorrect Username or Password !!!<center>'; 
		exit();
		} 
		}
		else{ 
		include('login.php');
		echo '<center>Username or Password missing!!</center>';
		exit();
		}
		}
		else{
		header("location:../bsnl/index.php");
		exit();
		}
		?>