<?php
$fname = $lname = $email = $contact = $profession = $stream = $branch = $year =  $gender=$bdate=$bmonth=$byear=$dob="NULL";
             
			  $password = $terms = "NULL";  
				
				if(isset($_POST['fname']))
				{
				$fname=$_POST['fname'];
				
				}
				
				if ($fname == '')
				{
				echo '<center> <h1>Enter a First name</h1></center>';
				include('signup.php');
				exit;
				}
				
				if(isset($_POST['lname']))
				{
				$lname=$_POST['lname'];
				}
				if ($lname == '')
				{
				echo '<center> <h1>Enter a Last name</h1></center>';
				include('signup.php');
				exit;
				
				}
				if(isset($_POST['email']))
				{
				$email=$_POST['email'];
				}
				if ($fname == '')
				{
				echo '<center> <h1>Enter an email id</h1></center>';
				include('signup.php');
				exit;
				
				}
				if(isset($_POST['contact']))
				{
				$contact=$_POST['contact'];
				}
				if ($email == '')
				{
				echo '<center> <h1>Enter a phone no</h1></center>';
				include('signup.php');
				exit;
				
				}
				if((isset($_POST['password'])) && (isset($_POST['repassword'])))
				{
				if(($_POST['password']) == ($_POST['repassword']))
				{
				$password = $_POST['password'];
				}
				else
				{
				if ($password == '')
				{
				echo '<center> <h1>Enter a password</h1></center>';
				include('signup.php');
				exit;
				}
				else
				{
				echo '<center> <h1>Passwords donot match</h1></center>';
				include('signup.php');
				exit;
				}
				
				}
				}
				
				if(isset($_POST['profession']))
				{
				  if($_POST['profession'] != "Profession")
				  {
				  switch($_POST['profession'])
				  {
					case "student":
					$profession="Student";
					break;
					
					case "graduate":
					$profession="Graduate";
					break;
					
					case "indpro":
					$profession="Industry Professional";
					break;
					
					case "retdefper":
					$profession="Retired Defence Personnel";
					break;
					
					case "others":
					if(isset($_POST['specifyprofession']))
					{
					$profession = $_POST['specifyprofession'];
					}
					break;
				  }
				  
				  }
				  
				}
				if ($profession == '')
				{
				echo '<center> <h1>Select a profession</h1></center>';
				include('signup.php');
				exit;
				
				}
				
				if(isset($_POST['stream']))
				{
				
				  if($_POST['stream'] > 0)
				  {
				  switch($_POST['stream'])
				  {
					case 1:
					$stream="BE/BTech";
					break;
					
					case 2:
					$stream="BCA";
					break;
					
					case 3:
					$stream="MCA";
					break;
					
					case 4:
					$stream="Diploma";
					break;
					
				  }
				  
				  }
				  
				
				}
				
				if(isset($_POST['branch']))
				{
				if($_POST['branch'] > 0)
				  {
				  switch($_POST['branch'])
				  {
					case 1:
					$branch = "Electrical/Electronics";
					break;
					
					case 2:
					$branch= "Computer Science/Information Technology";
					break;
					
				  }
				  
				  }
				
				}
				if(isset($_POST['year']))
				{
				if($_POST['year'] > 0)
				  {
				  switch($_POST['year'])
				  {
					case 1:
					$year= "First";
					break;
					
					case 2:
					$year="Second";
					break;
					
					case 3:
					$year="Third";
					break;
					
					case 4:
					$year="Fourth";
					break;
				  }
				  
				}
				
				}
				
				if(isset($_POST['gender']))
				{
				$gender = $_POST['gender'];
				}
				
				if(isset($_POST['date']) && isset($_POST['month']) && isset($_POST['year']))
				{
				$bdate = $_POST['date'];
				$bmonth = $_POST['month'];
				$byear = $_POST['byear'];
				
				$dob = $byear.'/'.$bmonth.'/'.$bdate;
				}
				if(isset($_POST['terms']))
				{
				$terms = $_POST['terms'];
				}
				else
				{
				echo '<center> <h1>Accept the terms and conditions</h1></center>';
				include('signup.php');
				exit;
				}
				
				$link = mysql_connect('127.0.0.1','root','');
				
                if(!$link){
                    die('Failed to connect to server: '.mysql_error());
                }
                $db = mysql_select_db('BSNL');
                if(!$db){
                    die("Unable to select Database");
                }
				$random = rand(0,1000000);
                $qry="INSERT INTO USER VALUES ('$fname','$lname','$email','$contact','$profession','$stream','$branch','$year','$dob','$gender','$password','$random')";
				
				//echo $qry;
                $result=mysql_query($qry);
				
				header('location: ../login.php');

?>