<?php
    
    session_start();
    
    //Check if the session variable for user authentication is set, if not redirect to login page.
    if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){
        $email=$_SESSION['email'];
    //$_SESSION['COURSE']=$course;
    $i=1;
    $link = mysql_connect('127.0.0.1', 'root', '');
    if(!$link){
        die('Failed to connect to server: ' . mysql_error());
    }
    $db = mysql_select_db('BSNL');
    if(!$db){
        die("Unable to select database");
    }
        
        
        $qry1='SELECT * FROM USER WHERE Email =\''.$email.'\'';
        $result1=mysql_query($qry1);
        while($row1 = mysql_fetch_assoc($result1))
        {
            $name1=$row1['FirstName'];
        }

    $qry = "SELECT * FROM impcourses";
    $result = mysql_query($qry);
    while($row = mysql_fetch_assoc($result)){
        $id[$i]=$row['courseid'];
        $name[$i]=$row['keyname'];
        $i=$i+1;
    }
    $k=mysql_num_rows($result);
    //echo $k;
    echo'
    <html>
    <head>
   
    ';
    echo'
    <title>BRBRAITT</title><link href="files1/home.css" rel="stylesheet" type="text/css">
    <script src="files1/routes.js"></script><script src="files1/204.js" data-requiremodule="_204" data-requirecontext="204js" async="" charset="utf-8"></script>
    </head>
    <body>
    <table align="center" height="700" cellspacing="0" border="1">
    
    <tr>
    <td colspan=2>
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
    </tr>
    <tr>
    <td colspan=2> <div ></div><div><div><div class="brbraitt-header" ><div class="brbraitt-header-secondary">
    <a href="allcourses.php" class="brbraitt-header-link internal-home">Courses</a>
    <a  data-popup-bind-open="mouseenter" data-popup-item="a" data-popup-direction="se" class="brbraitt-header-link brbraitt-header-account">About<span></span></a>
    <span style="margin:0px -2px 0px 2px;color:#717171;">|</span>
    <a href="dashboard.php" class="brbraitt-header-link brbraitt-header-link-special">'.$name1.'\'s Dashboard</a>
    <a href="signout.php" class="brbraitt-header-link brbraitt-header-link-special">Signout</a></div></div></div>

    </td>
    </tr>
    <tr><td width="250px">
    ';
    echo'<table>
    <form name="course" action="allcourses1.php" method="post">
    ';
    for($j=1;$j<=mysql_num_rows($result);$j++){
    
        echo '
        <tr><td>
        <a href=allcourses1.php?key='.$id[$j].'>'.$name[$j].'</a><hr>
        </td></tr>
        ';
        // echo $id[$j];
    }
    //echo $_SESSION['COURSE'];
    echo'
    </table>
    </td>
    <td>';
    
        $courseid1=$_GET['key'];
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
            $keyname[$i]=$row['keyname'];
            $coursename[$i]=$row['coursename'];
            $picture[$i]=$row['picture'];
            $links[$i]=$row['link'];
            $duration[$i]=$row['duration'];
            $for[$i]=$row['for'];
            $venue[$i]=$row['venue'];
            $date[$i]=$row['startson'];
            $i=$i+1;
        }
        echo '
        <table width="961" height="492" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
        <td width="647" height="211"><p><font  style="animation:infinite" face="Times New Roman, Times, serif" size="+4"><em><strong>'.$coursename[0].'</strong></em></font></p>
        <!--<form id="button1" name="form1" method="post" action="">
        <p>
        <input type="submit" name="button1" id="button2" value="register" />
        </p>
        </form>-->
        
        <p>&nbsp;</p></td>
        <td width="304"><a href="'.$links[0].''.$courseid[0].'"><img src="'.$picture[0].'" width="300" height="200" longdesc="http://ddvsdv" /></a></td>
        </tr>
        <tr>
        <td><font  style="animation:infinite" face="Times New Roman, Times, serif" text-align:center; size="5"> Starts On :
        <font  style="animation:infinite" face="Times New Roman, Times, serif" text-align:center; size="5">'.$date[0].'</td>
        <td align="right"><font  style="animation:infinite" face="Times New Roman, Times, serif" text-align:center; size="+2" color="red"><a href=register.php?key='.$courseid1.'>Register</a></td>
        </tr>
        <tr>
    
        <td height="98"><font  style="animation:infinite" face="Times New Roman, Times, serif" text-align:center; size="5">Description:
        <font  style="animation:infinite" face="Times New Roman, Times, serif" text-align:justify; size="3">'.$description[0].'</td>
        
        <td><table width="307" height="96" border="0" cellspacing="0" cellpadding="0">
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
        
        </table>';
        

    
    echo'
    </td>
    </tr>
    </table>
    </body>
    </html>
    ';
    }
    else
    {
        $i=1;
        $link = mysql_connect('127.0.0.1', 'root', '');
        if(!$link){
            die('Failed to connect to server: ' . mysql_error());
        }
        $db = mysql_select_db('BSNL');
        if(!$db){
            die("Unable to select database");
        }
        
        $qry = "SELECT * FROM impcourses";
        $result = mysql_query($qry);
        while($row = mysql_fetch_assoc($result)){
            $id[$i]=$row['courseid'];
            $name[$i]=$row['keyname'];
            $i=$i+1;
        }
        $k=mysql_num_rows($result);
        //echo $k;
        echo'
        <html>
        <head>
      
        ';
        echo'
        <title>BRBRAITT</title><link href="files1/home.css" rel="stylesheet" type="text/css">
        <script src="files1/routes.js"></script><script src="files1/204.js" data-requiremodule="_204" data-requirecontext="204js" async="" charset="utf-8"></script>
        </head>
        <body>
        <table align="center" height="700" cellspacing="0" border="1">
        
        <tr>
        <td colspan=2>
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
        </tr>
        <tr>
        <td colspan=2> <div ></div><div><div><div class="brbraitt-header" ><div class="brbraitt-header-secondary">
        <a href="allcourses.php" class="brbraitt-header-link internal-home">Courses</a>
        <a  data-popup-bind-open="mouseenter" data-popup-item="a" data-popup-direction="se" class="brbraitt-header-link brbraitt-header-account">About<span></span></a>
        <span style="margin:0px -2px 0px 2px;color:#717171;">|</span>
        <a href="login.php" class="brbraitt-header-link brbraitt-header-link-special">Sign In</a>
        <a href="signup/signup.php" class="brbraitt-header-link brbraitt-header-link-special">Sign Up</a></div></div></div>
        
        </td>
        </tr>
        <tr><td width="250px">
        ';
        echo'<table>
        <form name="course" action="allcourses1.php" method="post">
        ';
        for($j=1;$j<=mysql_num_rows($result);$j++){
            
            echo '
            <tr><td>
            <a href=allcourses1.php?key='.$id[$j].'>'.$name[$j].'</a><hr>
            </td></tr>
            ';
            // echo $id[$j];
        }
        //echo $_SESSION['COURSE'];
        echo'
        </table>
        </td>
        <td>';
        
        $courseid1=$_GET['key'];
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
            $keyname[$i]=$row['keyname'];
            $coursename[$i]=$row['coursename'];
            $picture[$i]=$row['picture'];
            $links[$i]=$row['link'];
            $duration[$i]=$row['duration'];
            $for[$i]=$row['for'];
            $venue[$i]=$row['venue'];
            $date[$i]=$row['startson'];
            $i=$i+1;
        }
        echo '
        <table width="961" height="492" border="0" cellpadding="0" cellspacing="0" align="center">
        <tr>
        <td width="647" height="211"><p><font  style="animation:infinite" face="Times New Roman, Times, serif" size="+4"><em><strong>'.$coursename[0].'</strong></em></font></p>
        <!--<form id="button1" name="form1" method="post" action="">
        <p>
        <input type="submit" name="button1" id="button2" value="register" />
        </p>
        </form>-->
        
        <p>&nbsp;</p></td>
        <td width="304"><a href="'.$links[0].''.$courseid[0].'"><img src="'.$picture[0].'" width="300" height="200" longdesc="http://ddvsdv" /></a></td>
        </tr>
        <tr>
        <td><font  style="animation:infinite" face="Times New Roman, Times, serif" text-align:center; size="5"> Starts On :
        <font  style="animation:infinite" face="Times New Roman, Times, serif" text-align:center; size="5">'.$date[0].'</td>
        <td align="right"><font  style="animation:infinite" face="Times New Roman, Times, serif" text-align:center; size="+2" color="red"><a href=register.php?key='.$courseid1.'>Register</a></td>
        </tr>
        <tr>
        
        <td height="98"><font  style="animation:infinite" face="Times New Roman, Times, serif" text-align:center; size="5">Description:
        <font  style="animation:infinite" face="Times New Roman, Times, serif" text-align:justify; size="3">'.$description[0].'</td>
        
        <td><table width="307" height="96" border="0" cellspacing="0" cellpadding="0">
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
        
        </table>';
        
        
        
        echo'
        </td>
        </tr>
        </table>
        </body>
        </html>
        ';
    }

    ?>