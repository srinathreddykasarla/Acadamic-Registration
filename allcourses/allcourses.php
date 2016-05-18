<?php
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
        $name[$i]=$row['coursename'];
        $i=$i+1;
    }
    $k=mysql_num_rows($result);
    //echo $k;
    echo'
    <html>
    <head>
    <style>
    a
    {
    color:#000000;
        text-align:center;
    padding:2px;
        text-decoration:none;
        text-transform:uppercase;
    }
    </style>
    ';
    echo'
    </head>
    <body>
    <table align="center" cellspacing="0" border="1">
    
    <tr>
    <td colspan=2>
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
    </tr>
    <tr>
    <td colspan=2>Links
    </td>
    </tr>
    <tr><td width="250px">
    ';
    echo'<table border="0" cellspacing="0" cellpadding="0" align="center" >
    <form name="course" action="allcourses1.php" method="post">
    ';
    for($j=1;$j<=mysql_num_rows($result);$j++){
    
        echo '
        <tr><td>
        <a href=allcourses1.php?key='.$id[$j].' class="nav">'.$name[$j].'</a>
        <hr>
        </td></tr>
        ';
        // echo $id[$j];
    }
    echo'
    </table>
    </td>
    <td>';
    $courseid1="BSNL1";
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
        $coursetype[$i]=$row['coursetype'];
        $picture[$i]=$row['picture'];
        $links[$i]=$row['link'];
        $duration[$i]=$row['duration'];
        $for[$i]=$row['for'];
        $venue[$i]=$row['venue'];
        $date[$i]=$row['startson'];
        $i=$i+1;
    }
    echo '
    <table width="961" height="492" border="0" cellpadding="0" cellspacing="0"align="center">
    <tr>
    <td width="647" height="211"><p><font  style="animation:infinite" face="Times New Roman, Times, serif" size="+4"><em><strong>'.$coursename[0].'</strong><strong>&nbsp;'.$coursetype[0].'</strong></em></font></p>
   <!-- <form id="button1" name="form1" method="post" action="">
    <p>
    <input type="submit" name="button1" id="button2" value="register" />
    </p>
    </form>-->
    <p>&nbsp;</p></td>
    <td width="304"><a href="course.html"><img src="'.$picture[0].'" width="300" height="200" longdesc="http://ddvsdv" /></a></td>
    </tr>
    <tr>
    <td><font  style="animation:infinite" face="Times New Roman, Times, serif" text-align:center; size="5"> Starts On :
    <font  style="animation:infinite" face="Times New Roman, Times, serif" text-align:center; size="5">'.$date[0].'</td>
    <td align="right"><a href="register.php">register</a></td>
    </tr>
    <tr>
    
    <td height="98"><font  style="animation:infinite" face="Times New Roman, Times, serif" text-align:center; size="5">Description:
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
   
    </table>';
    
    
    
    echo'

    </td>
    </tr>
    </table>
    </body>
    </html>
    ';
    ?>