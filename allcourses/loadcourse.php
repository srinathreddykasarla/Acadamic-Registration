<?php
    
    $course=$_GET['key'];
    //echo $course;
    $link = mysql_connect('127.0.0.1', 'root', '');
    if(!$link){
        die('Failed to connect to server: ' . mysql_error());
    }
    $db = mysql_select_db('BSNL');
    if(!$db){
        die("Unable to select database");
    }
    $qry = 'SELECT * FROM impcourses WHERE ID=\''.$course.'\'';
    $result = mysql_query($qry);
    //echo $result;
  /*  echo '
    <table border=1>
    <th>ID</th>
    <th>NAME</th>
    <th>IMAGE</th>
    <th>LINK</th>
    
    ';
    while($row = mysql_fetch_assoc($result)){
        echo '<tr>
        <td>'.$row['ID'].'</td>
        <td>'.$row['NAME'].'</td>
        <td>'.$row['IMAGE'].'</td>
        <td>'.$row['LINK'].'</td>
        </tr>';
    }
    echo '</table>';*/
  //  $k=mysql_num_rows($result);
    //echo 1;
    <form name="mycourse" action="allcourses1.php" method="POST">
    <input type="">
    </form>
    $_SESSION['DISP']=$course;
    $_SESSION['COURSE']=$course;
    header('location:allcourses1.php');
    
?>