<?php 
    
	if ($_POST['submit'] == 'Login'){ 
	//Collect POST values
	$login = $_POST['login']; 
	$password = $_POST['password']; 
	if($login && $password){
		//Connect to mysql server
		$link = mysql_connect('localhost', 'root');
		//Check link to the mysql server 
		if(!$link) { 
		die('Failed to connect to server: ' . mysql_error()); 
		} 
		//Select database
		$db = mysql_select_db('ARDB');
		if(!$db) {
		die("Unable to select database");
		} //Create query
		$qry='SELECT * FROM LOGIN_ACAD WHERE LOGIN_ID = \''.$login.'\' AND PASSWORD = \''.$password.'\'';
		//Execute query
		$result=mysql_query($qry);
		//Check whether the query was successful or not
		if($result){
		$count = mysql_num_rows($result);
		}
		else
		{
		//Login failed
		include('login_form_acad.php');
		echo '<center>Incorrect Username or Password !!!<center>'; 
		exit(); 
		} 
		//if query was successful it should fetch 1 matching record from the table. 
		if( $count == 1){
		//Login successful set session variables and redirect to main page.
		session_start(); $_SESSION['IS_AUTHENTICATED'] = 1;
		$_SESSION['USER_ID'] = $login; 
		header('location:acad_roll.php');
		} 
		else{ 
		//Login failed
		include('login_form_acad.php');
		echo '<center>Incorrect Username or Password !!!<center>'; 
		exit();
		} 
		}
		else{ 
		include('login_form_acad.php');
		echo '<center>Username or Password missing!!</center>';
		exit();
		}
		}
		else{
		header("location: login_form_acad.php");
		exit();
		}
		?>