<?php
    
    
    $courseid1="BSNL2";
    //$_post['courseid'];
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
    $qry='SELECT * FROM impcourses where courseid = \''.$courseid1.'\'';
    //WHERE EMAILID =\''.$email.'\'';
    $result=mysql_query($qry);
    $i=0;
    while($row = mysql_fetch_assoc($result))
    {
        $description[$i]=$row['description'];
        $courseid[$i]=$row['courseid'];
        $coursename[$i]=$row['coursename'];
        $picture[$i]=$row['picture'];
        $links[$i]=$row['link'];
        $duration[$i]=$row['duration'];
        $for[$i]=$row['for'];
        $venue[$i]=$row['venue'];
        $date[$i]=$row['startson'];
        $i=$i+1;
    }

echo '<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<td colspan="2" height="100">
        <table align="center" width="1124" border="0" cellpadding="1" cellspacing="1">
            <tr>
                <td align="left"><img src="image-slider/images/brbraitt.jpg" height="100" width="100"/></td>
                <td width="824">
                    <h3 align="center">Bharat Ratna Bhim Rao Ambedkar Institute of Telecom Training</h3>
                    <h6 align="center">(A Premier National Level Telecommunication Training Centre of BSNL - Since 1942)</h6>
                </td>
                <td align="right"><img src="image-slider/images/bsnl.jpg" height="100" width="100"/></td>
            </tr>
        </table>
    </td>
	
	<title>BRBRAITT</title><link href="files1/home.css" rel="stylesheet" type="text/css">
	<script src="files1/routes.js"></script><script src="files1/204.js" data-requiremodule="_204" data-requirecontext="204js" async="" charset="utf-8"></script></head>
	<body><div ></div><div><div><div class="brbraitt-header" ><div class="brbraitt-header-secondary">
	<a href="https://www.brbraitt.org/courses" class="brbraitt-header-link internal-home">Courses</a>
	<a  data-popup-bind-open="mouseenter" data-popup-item="a" data-popup-direction="se" class="brbraitt-header-link brbraitt-header-account">About<span></span></a>
	<span style="margin:0px -2px 0px 2px;color:#717171;">|</span>
	<a href="login1.php" class="brbraitt-header-link brbraitt-header-link-special">Sign In</a>
	<a href="https://accounts.brbraitt.org/signup" class="brbraitt-header-link brbraitt-header-link-special">Sign Up</a></div></div></div>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>


<body>
<table width="961" height="492" border="0" align="center">
  <tr>
    <td width="647" height="211"><p><font  style="animation:infinite" face="Times New Roman, Times, serif" size="+4"><em><strong>'.$coursename[0].'</strong></em></font></p>
      <form id="button1" name="form1" method="post" action="">
        <p>
          <input type="submit" name="button1" id="button2" value="register" />
        </p>
      </form>
      <p><a href="register.html">register</a></p>
    <p>&nbsp;</p></td>
    <td width="304"><a href="course.html"><img src="'.$picture[0].'" width="300" height="200" longdesc="http://ddvsdv" /></a></td>
  </tr>
  <tr>
    
    <td height="98"><font  style="animation:infinite" face="Times New Roman, Times, serif" text-align:center; size="5">description:
    <font  style="animation:infinite" face="Times New Roman, Times, serif" text-align:center; size="3">'.$description[0].'</td>
    
    <td><table width="307" height="96" border="0">
      <tr>
        <td width="135" height="30"><font  style="animation:infinite" face="Times New Roman, Times, serif" size="+2">Duration :</font></td>
        <td width="162"><font  style="animation:infinite" face="Times New Roman, Times, serif" size="+2"> '.$duration[0].'</font></td>
      </tr>
      <tr>
          <td height="30"><font  style="animation:infinite" face="Times New Roman, Times, serif" size="+2">venue:</font></td>
          <td><font  style="animation:infinite" face="Times New Roman, Times, serif" size="+2">'.$venue[0].'</font></td>
      </tr>
      <tr>
          <td height="30"><font  style="animation:infinite" face="Times New Roman, Times, serif" size="+2">For:</font></td>
        <td><font  style="animation:infinite" face="Times New Roman, Times, serif" size="+2">'.$for[0].'</font></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><font  style="animation:infinite" face="Times New Roman, Times, serif" text-align:center; size="5"> Starts On :
    <font  style="animation:infinite" face="Times New Roman, Times, serif" text-align:center; size="5">'.$date[0].'</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>'
    ?>
