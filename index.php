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
        $qry1='SELECT * FROM USER WHERE Email =\''.$email.'\'';
        $result1=mysql_query($qry1);
        while($row1 = mysql_fetch_assoc($result1))
        {
            $name=$row1['FirstName'];
        }
        $qry='SELECT * FROM impcourses';
        //WHERE EMAILID =\''.$email.'\'';
        $result=mysql_query($qry);
        $i=0;
        while($row = mysql_fetch_assoc($result))
        {
            $courseid[$i]=$row['courseid'];
            $coursename[$i]=$row['coursename'];
            $picture[$i]=$row['picture'];
            $links[$i]=$row['link'];
            $duration[$i]=$row['duration'];
            $for[$i]=$row['for'];
            $venue[$i]=$row['venue'];
            $i=$i+1;
        }
        
        
        echo'
        <html class="supports-svg" xmlns:fb="http://ogp.me/ns/fb#" itemtype="http://schema.org"><head>
        </script><title>BRBRAITT</title><link href="files1/home.css" rel="stylesheet" type="text/css">
        <script src="files1/routes.js"></script><script src="files1/204.js" data-requiremodule="_204" data-requirecontext="204js" async="" charset="utf-8"></script>
        </head>
        <body>
        
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
        
        
        <tr>
        <td align = "right" colspan="3" >
        
        <div ></div><div><div><div class="brbraitt-header" ><div class="brbraitt-header-secondary">
        <a href="allcourses.php" class="brbraitt-header-link internal-home">Courses</a>
        <a  data-popup-bind-open="mouseenter" data-popup-item="a" data-popup-direction="se" class="brbraitt-header-link brbraitt-header-account">About<span></span></a>
        <span style="margin:0px -2px 0px 2px;color:#717171;">|</span>
        	<a href="dashboard.php" class="brbraitt-header-link brbraitt-header-link-special">'.$name.'\'s Dashboard</a>
        <a href="signout.php" class="brbraitt-header-link brbraitt-header-link-special">Signout</a></div></div></div>
        </td>
        </tr>
        </table>
        </td>
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
            
            <table width=auto height=auto border="0" cellpadding="1" cellspacing="1">
            <div id="sliderFrame">
            <div id="slider">
            <a href="http://www.menucool.com/"><img src="image-slider/images/slider-1.jpg" alt="#htmlcaption1" /></a>
            <a class="lazyImage" href="image-slider/images/slider-2.jpg" title="#htmlcaption2">slide 2</a>
            <a href="http://www.menucool.com/javascript-image-slider">
            <b data-src="image-slider/images/slider-3.jpg" data-alt="#htmlcaption3">Image Slider</b>
            </a>
            <a class="lazyImage" href="image-slider/images/slider-4.jpg" title="#htmlcaption4">slide 4</a>
            </div>
            <!--thumbnails-->
            <div id="thumbs">
            <div class="thumb"><img src="image-slider/images/thumb-1.gif" /></div>
            <div class="thumb"><img src="image-slider/images/thumb-2.gif" /></div>
            <div class="thumb"><img src="image-slider/images/thumb-3.gif" /></div>
            <div class="thumb"><img src="image-slider/images/thumb-4.gif" /></div>
            </div>
            <!--captions-->
            <div style="display: none;">
            <div id="htmlcaption1">
            <div class="cap"></div>
            </div>
            <div id="htmlcaption2">
            <div class="cap cap2"></div>
            </div>
            <div id="htmlcaption3">
            <div class="cap cap3"></div>
            </div>
            <div id="htmlcaption4">
            <div class="cap cap4"></div>
            </div>
            </div>
            </div>
            </table>
            
            <div class="container"><div class="brbraitt-front-sections"><div class="brbraitt-front-courses"><div>
            <a href="allcourses.php" class="internal-home brbraitt-view-all-link brbraitt-to-catalog-link browse_all_top">View all courses</a>
            <div class="brbraitt-front-course-listing brbraitt-front-course-soon no-margin"><div style="" class="brbraitt-course-card">
            
            
            <div class="brbraitt-course-card-image">
            <a href="'.$links[0].''.$courseid[0].'" class="internal-home brbraitt-front-to-course-link">
            <img src="'.$picture[0].'"></a></div><div class="brbraitt-course-card-details">
            <a href="'.$links[0].'" class="internal-home brbraitt-front-to-course-link">
            <h3 class="brbraitt-course-card-name">'.$coursename[0].'</h3></a><div style="line-height:17px;">
            <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[0].' , '.$for[0].'</span></a>,
            <span class="brbraitt-course-card-startdate">Duration '.$duration[0].'</span></div></div></div><div style="" class="brbraitt-course-card">
            <div class="brbraitt-course-card-image">
            
            
            <a href="'.$links[1].''.$courseid[1].'" class="internal-home brbraitt-front-to-course-link">
            <img src="'.$picture[1].'"></a></div><div class="brbraitt-course-card-details">
            <a href="'.$links[1].'" class="internal-home brbraitt-front-to-course-link">
            <h3 class="brbraitt-course-card-name">'.$coursename[1].'</h3></a><div style="line-height:17px;">
            <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[1].' , '.$for[1].'</span></a>,
            <span class="brbraitt-course-card-startdate">Duration '.$duration[1].'</span></div></div></div><div style="" class="brbraitt-course-card">
            <div class="brbraitt-course-card-image">
            
            
            <a href="'.$links[2].''.$courseid[2].'" class="internal-home brbraitt-front-to-course-link">
            <img src="'.$picture[2].'"></a></div><div class="brbraitt-course-card-details">
            <a href="'.$links[2].'" class="internal-home brbraitt-front-to-course-link">
            <h3 class="brbraitt-course-card-name">'.$coursename[2].'</h3></a><div style="line-height:17px;">
            <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[2].' , '.$for[2].'</span></a>,
            <span class="brbraitt-course-card-startdate">Duration '.$duration[2].'</span></div></div></div><div style="" class="brbraitt-course-card">
            <div class="brbraitt-course-card-image">
            
            
            <a href="'.$links[3].''.$courseid[3].'" class="internal-home brbraitt-front-to-course-link">
            <img src="'.$picture[3].'"></a></div><div class="brbraitt-course-card-details">
            <a href="'.$links[3].'" class="internal-home brbraitt-front-to-course-link">
            <h3 class="brbraitt-course-card-name">'.$coursename[3].'</h3></a><div style="line-height:17px;">
            <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[3].' , '.$for[3].'</span></a>,
            <span class="brbraitt-course-card-startdate">Duration '.$duration[3].'</span></div></div></div><div style="" class="brbraitt-course-card">
            <div class="brbraitt-course-card-image">
            
            
            <a href="'.$links[4].''.$courseid[4].'" class="internal-home brbraitt-front-to-course-link">
            <img src="'.$picture[4].'"></a></div><div class="brbraitt-course-card-details">
            <a href="'.$links[4].'" class="internal-home brbraitt-front-to-course-link">
            <h3 class="brbraitt-course-card-name">'.$coursename[4].'</h3></a><div style="line-height:17px;">
            <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[4].' , '.$for[4].'</span></a>,
            <span class="brbraitt-course-card-startdate">Duration '.$duration[4].'</span></div></div></div><div style="" class="brbraitt-course-card">
            <div class="brbraitt-course-card-image">
            
            <a href="'.$links[5].''.$courseid[5].'" class="internal-home brbraitt-front-to-course-link">
            <img src="'.$picture[5].'"></a></div><div class="brbraitt-course-card-details">
            <a href="'.$links[5].'" class="internal-home brbraitt-front-to-course-link">
            <h3 class="brbraitt-course-card-name">'.$coursename[5].'</h3></a><div style="line-height:17px;">
            <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[5].' , '.$for[5].'</span></a>,
            <span class="brbraitt-course-card-startdate">Duration '.$duration[5].'</span></div></div></div><div style="" class="brbraitt-course-card">
            <div class="brbraitt-course-card-image">
            
            <a href="'.$links[6].''.$courseid[6].'" class="internal-home brbraitt-front-to-course-link">
            <img src="'.$picture[6].'"></a></div><div class="brbraitt-course-card-details">
            <a href="'.$links[6].'" class="internal-home brbraitt-front-to-course-link">
            <h3 class="brbraitt-course-card-name">'.$coursename[6].'</h3></a><div style="line-height:17px;">
            <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[6].' , '.$for[6].'</span></a>,
            <span class="brbraitt-course-card-startdate">Duration '.$duration[6].'</span></div></div></div><div style="" class="brbraitt-course-card">
            <div class="brbraitt-course-card-image">
            
            
            <a href="'.$links[7].''.$courseid[7].'" class="internal-home brbraitt-front-to-course-link">
            <img src="'.$picture[7].'"></a></div><div class="brbraitt-course-card-details">
            <a href="'.$links[7].'" class="internal-home brbraitt-front-to-course-link">
            <h3 class="brbraitt-course-card-name">'.$coursename[7].'</h3></a><div style="line-height:17px;">
            <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[7].' , '.$for[7].'</span></a>,
            <span class="brbraitt-course-card-startdate">Duration '.$duration[7].'</span></div></div></div><div style="" class="brbraitt-course-card">
            <div class="brbraitt-course-card-image">
            
            
            <a href="'.$links[8].''.$courseid[8].'" class="internal-home brbraitt-front-to-course-link">
            <img src="'.$picture[8].'"></a></div><div class="brbraitt-course-card-details">
            <a href="'.$links[8].'" class="internal-home brbraitt-front-to-course-link">
            <h3 class="brbraitt-course-card-name">'.$coursename[8].'</h3></a><div style="line-height:17px;">
            <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[8].' , '.$for[8].'</span></a>,
            <span class="brbraitt-course-card-startdate">Duration '.$duration[8].'</span></div></div></div></div></div></div></div>
            
            <div class="brbraitt-endpage"></div></div></div></div><div class="brbraitt-footer" role="menubar"><div class="container"><div class="row-fluid"><div class="brbraitt-footer-content-primary"><a href="https://www.brbraitt.org/about" class="internal-home brbraitt-footer-link">About</a><a href="https://www.brbraitt.org/about/jobs" class="internal-home brbraitt-footer-link">Careers</a><a href="https://www.brbraitt.org/about/team" class="internal-home brbraitt-footer-link">Team</a><a href="http://store.brbraitt.org/" class="brbraitt-footer-link">Store</a><a href="https://www.brbraitt.org/about/contact" class="internal-home brbraitt-footer-link">Contact</a><a href="https://www.brbraitt.org/about/press" class="internal-home brbraitt-footer-link">Press</a><a href="https://www.brbraitt.org/about/terms" class="internal-home brbraitt-footer-link">Terms</a><a href="http://help.brbraitt.org/" class="brbraitt-footer-link">Help</a></div><div class="brbraitt-footer-content-secondary"><a target="_blank" href="https://plus.google.com/111950594039269281469" title="Follow brbraitt on Google Plus" class="brbraitt-footer-link">Google+</a><a target="_blank" href="http://twitter.com/brbraitt" title="Follow brbraitt on Twitter" class="brbraitt-footer-link">Twitter</a><a target="_blank" href="http://facebook.com/brbraitt" title="Follow brbraitt on Facebook" class="brbraitt-footer-link">Facebook</a><a target="_blank" href="http://blog.brbraitt.org/" title="Read the brbraitt blog" class="brbraitt-footer-link">Blog</a></div></div></div></div></div></div></div>
            </body>
            </html>';
        }
        
        
        else{
   
    //Check if the session variable for user authentication is set, if not redirect to login page.
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
        $qry='SELECT * FROM impcourses';
    //WHERE EMAILID =\''.$email.'\'';
        $result=mysql_query($qry);
    $i=0;
        while($row = mysql_fetch_assoc($result))
        {
            $courseid[$i]=$row['courseid'];
            $coursename[$i]=$row['coursename'];
            $picture[$i]=$row['picture'];
            $links[$i]=$row['link'];
            $duration[$i]=$row['duration'];
            $for[$i]=$row['for'];
            $venue[$i]=$row['venue'];
            $i=$i+1;
        }

    
echo'
<html class="supports-svg" xmlns:fb="http://ogp.me/ns/fb#" itemtype="http://schema.org"><head>
            </script><title>BRBRAITT</title><link href="files1/home.css" rel="stylesheet" type="text/css">
            <script src="files1/routes.js"></script><script src="files1/204.js" data-requiremodule="_204" data-requirecontext="204js" async="" charset="utf-8"></script></head>
            <body>
    
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
       

    <tr>
    <td align = "right" colspan="3" >
    <div ></div><div><div><div class="brbraitt-header" ><div class="brbraitt-header-secondary">
	<a href="allcourses.php" class="brbraitt-header-link internal-home">Courses</a>
	<a  data-popup-bind-open="mouseenter" data-popup-item="a" data-popup-direction="se" class="brbraitt-header-link brbraitt-header-account">About<span></span></a>
	<span style="margin:0px -2px 0px 2px;color:#717171;">|</span>
	<a href="login.php" class="brbraitt-header-link brbraitt-header-link-special">Sign In</a>
	<a href="signup/signup.php" class="brbraitt-header-link brbraitt-header-link-special">Sign Up</a></div></div></div>
          </td>
            </tr>
            </table>
            </td>
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
        <table width=auto height=auto border="0" cellpadding="1" cellspacing="1">
                    <div id="sliderFrame">
                        <div id="slider">
                            <a href="http://www.menucool.com/"><img src="image-slider/images/slider-1.jpg" alt="#htmlcaption1" /></a>
                            <a class="lazyImage" href="image-slider/images/slider-2.jpg" title="#htmlcaption2">slide 2</a>
                            <a href="http://www.menucool.com/javascript-image-slider">
                                <b data-src="image-slider/images/slider-3.jpg" data-alt="#htmlcaption3">Image Slider</b>
                            </a>
                            <a class="lazyImage" href="image-slider/images/slider-4.jpg" title="#htmlcaption4">slide 4</a>
                        </div>
                        <!--thumbnails-->
                        <div id="thumbs">
                            <div class="thumb"><img src="image-slider/images/thumb-1.gif" /></div>
                            <div class="thumb"><img src="image-slider/images/thumb-2.gif" /></div>
                            <div class="thumb"><img src="image-slider/images/thumb-3.gif" /></div>
                            <div class="thumb"><img src="image-slider/images/thumb-4.gif" /></div>
                        </div>
                        <!--captions-->
                        <div style="display: none;">
                            <div id="htmlcaption1">
                                <div class="cap"></div>
                            </div>
                            <div id="htmlcaption2">
                                <div class="cap cap2"></div>
                            </div>
                            <div id="htmlcaption3">
                                <div class="cap cap3"></div>
                            </div>
                            <div id="htmlcaption4">
                                <div class="cap cap4"></div>
                            </div>
                        </div>
                    </div>
            </table>
        
	<div class="container"><div class="brbraitt-front-sections"><div class="brbraitt-front-courses"><div>
	<a href="allcourses.php" class="internal-home brbraitt-view-all-link brbraitt-to-catalog-link browse_all_top">View all courses</a>
	<div class="brbraitt-front-course-listing brbraitt-front-course-soon no-margin"><div style="" class="brbraitt-course-card">
	
                
                <div class="brbraitt-course-card-image">
                <a href="'.$links[0].''.$courseid[0].'" class="internal-home brbraitt-front-to-course-link">
                <img src="'.$picture[0].'"></a></div><div class="brbraitt-course-card-details">
                <a href="'.$links[0].'" class="internal-home brbraitt-front-to-course-link">
                <h3 class="brbraitt-course-card-name">'.$coursename[0].'</h3></a><div style="line-height:17px;">
                <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[0].' , '.$for[0].'</span></a>,
                <span class="brbraitt-course-card-startdate">Duration '.$duration[0].'</span></div></div></div><div style="" class="brbraitt-course-card">
                <div class="brbraitt-course-card-image">
                
                
                <a href="'.$links[1].''.$courseid[1].'" class="internal-home brbraitt-front-to-course-link">
                <img src="'.$picture[1].'"></a></div><div class="brbraitt-course-card-details">
                <a href="'.$links[1].'" class="internal-home brbraitt-front-to-course-link">
                <h3 class="brbraitt-course-card-name">'.$coursename[1].'</h3></a><div style="line-height:17px;">
                <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[1].' , '.$for[1].'</span></a>,
                <span class="brbraitt-course-card-startdate">Duration '.$duration[1].'</span></div></div></div><div style="" class="brbraitt-course-card">
                <div class="brbraitt-course-card-image">
                
                
                <a href="'.$links[2].''.$courseid[2].'" class="internal-home brbraitt-front-to-course-link">
                <img src="'.$picture[2].'"></a></div><div class="brbraitt-course-card-details">
                <a href="'.$links[2].'" class="internal-home brbraitt-front-to-course-link">
                <h3 class="brbraitt-course-card-name">'.$coursename[2].'</h3></a><div style="line-height:17px;">
                <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[2].' , '.$for[2].'</span></a>,
                <span class="brbraitt-course-card-startdate">Duration '.$duration[2].'</span></div></div></div><div style="" class="brbraitt-course-card">
                <div class="brbraitt-course-card-image">
                
                
                <a href="'.$links[3].''.$courseid[3].'" class="internal-home brbraitt-front-to-course-link">
                <img src="'.$picture[3].'"></a></div><div class="brbraitt-course-card-details">
                <a href="'.$links[3].'" class="internal-home brbraitt-front-to-course-link">
                <h3 class="brbraitt-course-card-name">'.$coursename[3].'</h3></a><div style="line-height:17px;">
                <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[3].' , '.$for[3].'</span></a>,
                <span class="brbraitt-course-card-startdate">Duration '.$duration[3].'</span></div></div></div><div style="" class="brbraitt-course-card">
                <div class="brbraitt-course-card-image">
                
                
                <a href="'.$links[4].''.$courseid[4].'" class="internal-home brbraitt-front-to-course-link">
                <img src="'.$picture[4].'"></a></div><div class="brbraitt-course-card-details">
                <a href="'.$links[4].'" class="internal-home brbraitt-front-to-course-link">
                <h3 class="brbraitt-course-card-name">'.$coursename[4].'</h3></a><div style="line-height:17px;">
                <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[4].' , '.$for[4].'</span></a>,
                <span class="brbraitt-course-card-startdate">Duration '.$duration[4].'</span></div></div></div><div style="" class="brbraitt-course-card">
                <div class="brbraitt-course-card-image">
                
                <a href="'.$links[5].''.$courseid[5].'" class="internal-home brbraitt-front-to-course-link">
                <img src="'.$picture[5].'"></a></div><div class="brbraitt-course-card-details">
                <a href="'.$links[5].'" class="internal-home brbraitt-front-to-course-link">
                <h3 class="brbraitt-course-card-name">'.$coursename[5].'</h3></a><div style="line-height:17px;">
                <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[5].' , '.$for[5].'</span></a>,
                <span class="brbraitt-course-card-startdate">Duration '.$duration[5].'</span></div></div></div><div style="" class="brbraitt-course-card">
                <div class="brbraitt-course-card-image">
                
                <a href="'.$links[6].''.$courseid[6].'" class="internal-home brbraitt-front-to-course-link">
                <img src="'.$picture[6].'"></a></div><div class="brbraitt-course-card-details">
                <a href="'.$links[6].'" class="internal-home brbraitt-front-to-course-link">
                <h3 class="brbraitt-course-card-name">'.$coursename[6].'</h3></a><div style="line-height:17px;">
                <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[6].' , '.$for[6].'</span></a>,
                <span class="brbraitt-course-card-startdate">Duration '.$duration[6].'</span></div></div></div><div style="" class="brbraitt-course-card">
                <div class="brbraitt-course-card-image">
                
                
                <a href="'.$links[7].''.$courseid[7].'" class="internal-home brbraitt-front-to-course-link">
                <img src="'.$picture[7].'"></a></div><div class="brbraitt-course-card-details">
                <a href="'.$links[7].'" class="internal-home brbraitt-front-to-course-link">
                <h3 class="brbraitt-course-card-name">'.$coursename[7].'</h3></a><div style="line-height:17px;">
                <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[7].' , '.$for[7].'</span></a>,
                <span class="brbraitt-course-card-startdate">Duration '.$duration[7].'</span></div></div></div><div style="" class="brbraitt-course-card">
                <div class="brbraitt-course-card-image">
                
                
                <a href="'.$links[8].''.$courseid[8].'" class="internal-home brbraitt-front-to-course-link">
                <img src="'.$picture[8].'"></a></div><div class="brbraitt-course-card-details">
                <a href="'.$links[8].'" class="internal-home brbraitt-front-to-course-link">
                <h3 class="brbraitt-course-card-name">'.$coursename[8].'</h3></a><div style="line-height:17px;">
                <a href="brbraitt.php" class="internal-home"><span class="brbraitt-course-card-uni">'.$venue[8].' , '.$for[8].'</span></a>,
                <span class="brbraitt-course-card-startdate">Duration '.$duration[8].'</span></div></div></div></div></div></div></div>
                
                
                
    <div class="brbraitt-endpage"></div></div></div></div><div class="brbraitt-footer" role="menubar"><div class="container"><div class="row-fluid"><div class="brbraitt-footer-content-primary"><a href="https://www.brbraitt.org/about" class="internal-home brbraitt-footer-link">About</a><a href="https://www.brbraitt.org/about/jobs" class="internal-home brbraitt-footer-link">Careers</a><a href="https://www.brbraitt.org/about/team" class="internal-home brbraitt-footer-link">Team</a><a href="http://store.brbraitt.org/" class="brbraitt-footer-link">Store</a><a href="https://www.brbraitt.org/about/contact" class="internal-home brbraitt-footer-link">Contact</a><a href="https://www.brbraitt.org/about/press" class="internal-home brbraitt-footer-link">Press</a><a href="https://www.brbraitt.org/about/terms" class="internal-home brbraitt-footer-link">Terms</a><a href="http://help.brbraitt.org/" class="brbraitt-footer-link">Help</a></div><div class="brbraitt-footer-content-secondary"><a target="_blank" href="https://plus.google.com/111950594039269281469" title="Follow brbraitt on Google Plus" class="brbraitt-footer-link">Google+</a><a target="_blank" href="http://twitter.com/brbraitt" title="Follow brbraitt on Twitter" class="brbraitt-footer-link">Twitter</a><a target="_blank" href="http://facebook.com/brbraitt" title="Follow brbraitt on Facebook" class="brbraitt-footer-link">Facebook</a><a target="_blank" href="http://blog.brbraitt.org/" title="Read the brbraitt blog" class="brbraitt-footer-link">Blog</a></div></div></div></div></div></div></div>
        </body>
        </html>';
                
            }
            exit();
?>