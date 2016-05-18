<!DOCTYPE html>
<html>
<head>
	<title>Academic Registration</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="content-language" content="en" />
	
	<!-- Style Sheets -->
	<link href="common/css/style.css"	rel="stylesheet" type="text/css" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
	<!-- Style Sheets ends here -->
	<title>Student Login</title>
	<link rel="stylesheet" href="normalize.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="mainContainer">
		<div class="htmltabs">
			<!-- The tabs -->
			<ul class="tabs">
				<li class="tab1">
					<a class="tab1 tab">
						Student Login					
					</a>
				</li>
				<li class="tab2">
					<a class="tab2 tab">
						Employee Login
					</a>
				</li>
				
			</ul>
			<!-- tab 1 -->
			<div class="tab1 tabsContent">
				<div>	<section class="loginform cf" >
	
		<form name="login" action="student/login_check.php" method="post">
			<table border="0">
			<tr>
			<td colspan="2" align="center"><div><h2 class="title">Student Login</h2></div></td></tr>
				<tr>
				<td>Roll No:</td>
				<td>	<input type="text" name="login" ></td>
				</tr>
				
				<tr>
				<td>Password: &nbsp </td>
				<td>	<input type="password" name="password" ></td></tr>
				<tr>
				<td colspan="2" align="center">	<input type="submit" name="submit" value="Login"/></td>
				</tr>
			</table>
		</form>
	</section></div>
			</div><!-- end of t1 -->
			<!-- tab 2 -->
			<div class="tab2 tabsContent">
				<div><section class="loginform cf" >
	
		<form name="login" action="acad/login_check.php" method="post">
			<table border="0">
			<tr>
			<td colspan="2" align="center"><div><h2 class="title">Employee Login</h2></div></td></tr>
				<tr>
				<td>User ID:</td>
				<td>	<input type="text" name="login" ></td>
				</tr>
				
				<tr>
				<td>Password: &nbsp </td>
				<td>	<input type="password" name="password" ></td></tr>
				<tr>
				<td colspan="2" align="center">	<input type="submit" name="submit" value="Login"/></td>
				</tr>
			</table>
		</form>
	</section></div>
			</div><!-- end of t2 -->
			<!-- tab 3 -->
			<!-- end of t7 -->
		</div><!-- tabbed ends here-->
	</div><!-- mainContainer ends here-->
	<!-- Javascript files -->
	<script type="text/javascript" src="common/javascript/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="common/javascript/script.js"></script>
	<!-- Javascript files ends from here -->
</body>
</html>