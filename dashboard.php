<?php
 //Start the session to see if the user is authencticated user.
session_start();

 //Check if the session variable for user authentication is set, if not redirect to login page.
 if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){
 $email=$_SESSION['email'];
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
$qry='SELECT * FROM USER WHERE Email =\''.$email.'\'';
$result=mysql_query($qry);
while($row = mysql_fetch_assoc($result))
{
	$name=$row['FirstName'];
}
echo'
<html>
<body>
    <class="supports-svg" xmlns:fb="http://ogp.me/ns/fb#" itemtype="http://schema.org"><head>
     <td colspan="2" height="100">
     <table align="center" width="1124" border="0" cellpadding="1" cellspacing="1">
     <tr>
     <td align="left"><a href="index.php" class="brbraitt-header-link brbraitt-header-link-special"><img src="image-slider/images/brbraitt.jpg" height="100" width="100"/></td>
     <td width="824">
     <h3 align="center">Bharat Ratna Bhim Rao Ambedkar Institute of Telecom Training</h3>
     <h6 align="center">(A Premier National Level Telecommunication Training Centre of BSNL - Since 1942)</h6>
     </td>
     <td align="right"><img src="image-slider/images/bsnl.jpg" height="100" width="100"/></td>
     </tr>
     </table>
     </td>

     
    </script><title>BRBRAITT</title><link href="files1/home.css" rel="stylesheet" type="text/css">
	<script src="files1/routes.js"></script><script src="files1/204.js" data-requiremodule="_204" data-requirecontext="204js" async="" charset="utf-8"></script></head>
	<body><div ></div><div><div><div class="brbraitt-header" ><div class="brbraitt-header-secondary">
	<a href="allcourses.php" class="brbraitt-header-link internal-home">Courses</a>
	<a  data-popup-bind-open="mouseenter" data-popup-item="a" data-popup-direction="se" class="brbraitt-header-link brbraitt-header-account">About<span></span></a>
	<span style="margin:0px -2px 0px 2px;color:#717171;">|</span>
	<a href="dashboard.php" class="brbraitt-header-link brbraitt-header-link-special">'.$name.'';
	echo'\'s Dashboard</a>
    <a href="signout.php" class="brbraitt-header-link brbraitt-header-link-special">Signout</a></div></div></div>
	
     <link href="image-slider/theme/js-image-slider.css" rel="stylesheet" type="text/css" />
     <script src="image-slider/theme/js-image-slider.js" type="text/javascript"></script>
     <link href="generic.css" rel="stylesheet" type="text/css" />
     <style type="text/css">
     body {background-color:#ffffff;}
         .cap  {width:190px;height:240px;display:inline-block;background:white url(image-slider/images/caption1.gif) no-repeat 0 0;border-radius:4px;}
         .cap2 {background-image:url(image-slider/images/caption2.gif)}
         .cap3 {background-image:url(image-slider/images/caption3.gif)}
         .cap4 {background-image:url(image-slider/images/caption4.gif)}
         </style>
         ';
    echo'<div class="container"><div class="brbraitt-front-sections"><div class="brbraitt-front-courses"><div>
	<a href="allcourses.php" class="internal-home brbraitt-view-all-link brbraitt-to-catalog-link browse_all_top">View all courses</a>
	<div class="brbraitt-front-course-listing brbraitt-front-course-soon no-margin"><div style="" class="brbraitt-course-card">';
	echo '<font face="Times New Roman" size="+1"><p>You are registered in these courses</p></font>';
	$qry2='SELECT * FROM userdata WHERE EMAILID=\''.$email.'\'';
	$result2=mysql_query($qry2);
	while($row = mysql_fetch_assoc($result2))
	{
	echo'<table cellspacing="10" cellpadding="10" border=0>';
	$CourseID=$row['CourseID'];
	$imageqry='SELECT picture,link,courseid FROM impcourses WHERE courseid=\''.$CourseID.'\'';
	$imageresult=mysql_query($imageqry);
	while($imagerow=mysql_fetch_assoc($imageresult))
		{	echo'<tr><td>';
			echo'<div class="brbraitt-course-card-image"><a href=\''.$imagerow['link'].''.$imagerow['courseid'].' \' class="internal-home brbraitt-front-to-course-link">';
			echo'<img src=\''.$imagerow['picture'].'\'>';
			echo'</td></div><td>';
			$detailsqry='SELECT * FROM impcourses WHERE courseid=\''.$CourseID.'\'';
			$detailsresult=mysql_query($detailsqry);
			while($detailsrow=mysql_fetch_assoc($detailsresult))
				{
				$coursename=$detailsrow['coursename'];
				$duration=$detailsrow['duration'];
				$for=$detailsrow['for'];
				$venue=$detailsrow['venue'];
				$start_date=$detailsrow['startson'];
				}
			echo '<table border=0 width=500><tr><font style="animation:infinite" face="Times New Roman, Times, serif" size="+1"><em>';
			echo '&nbsp;&nbsp;&nbsp;'.$coursename.'<br></tr><tr>';
			echo '&nbsp;&nbsp;&nbsp;'.$duration.'<br></tr><tr>';
			echo '&nbsp;&nbsp;&nbsp;'.$for.'<br></tr><tr>';
			echo '&nbsp;&nbsp;&nbsp;'.$venue.'<br></tr><tr>';
			echo '&nbsp;&nbsp;&nbsp;'.$start_date.'</tr></table></strong></em></font>';
		}
	echo '</table>';
	}/*
	echo'<div class="brbraitt-endpage"></div></div></div></div><div class="brbraitt-footer" role="menubar"><div class="container"><div class="row-fluid">
	<div class="brbraitt-footer-content-primary"><a href="https://www.brbraitt.org/about" class="internal-home brbraitt-footer-link">About</a>
	<a href="https://www.brbraitt.org/about/jobs" class="internal-home brbraitt-footer-link">Careers</a>
	<a href="https://www.brbraitt.org/about/team" class="internal-home brbraitt-footer-link">Team</a>
	<a href="http://store.brbraitt.org/" class="brbraitt-footer-link">Store</a>
	<a href="https://www.brbraitt.org/about/contact" class="internal-home brbraitt-footer-link">Contact</a>
	<a href="https://www.brbraitt.org/about/press" class="internal-home brbraitt-footer-link">Press</a>
	<a href="https://www.brbraitt.org/about/terms" class="internal-home brbraitt-footer-link">Terms</a>
	<a href="http://help.brbraitt.org/" class="brbraitt-footer-link">Help</a></div><div class="brbraitt-footer-content-secondary">
	<a target="_blank" href="https://plus.google.com/111950594039269281469" title="Follow brbraitt on Google Plus" class="brbraitt-footer-link">Google+</a>
	<a target="_blank" href="http://twitter.com/brbraitt" title="Follow brbraitt on Twitter" class="brbraitt-footer-link">Twitter</a>
	<a target="_blank" href="http://facebook.com/brbraitt" title="Follow brbraitt on Facebook" class="brbraitt-footer-link">Facebook</a>
	<a target="_blank" href="http://blog.brbraitt.org/" title="Read the brbraitt blog" class="brbraitt-footer-link">Blog</a></div></div></div></div></div></div></div>
	*/
	echo'</body>
	</html>';
	}
 else{ 
 header('location:../../index.php'); 
 }
 exit();
?>