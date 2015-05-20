<?php
include 'includes/connection.php';
session_start();
$subject=$_GET['subject'];
$jcid=$_GET['jcid'];
$result=mysql_query("SELECT * FROM quiz ORDER BY sno DESC LIMIT 1") or die(mysql_error());
$row=mysql_fetch_array($result);
$lastid=$row['quiz_id'];
$newid=$lastid+1;
$_SESSION['quizid']=$newid;
$query="insert into quiz (created_by_jcid,subject,quiz_id) values('$jcid','$subject','$newid')";
$result1=mysql_query($query) or die(mysql_error());
echo "New Quiz Created."; 
?>
