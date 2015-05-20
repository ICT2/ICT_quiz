<?php
session_start();
include 'includes/connection.php';
if(isset($_SESSION['quizid']))
{
$q3_1=$_GET['q3_1'];
$q3_2=$_GET['q3_1'];
$blank_answer=$_GET['blank_answer'];
$jcid=$_SESSION['jc_id'];
$quiz_id=$_SESSION['quizid'];

$query=mysql_query("select subject from quiz where quiz_id='$quiz_id'") or die(mysql_error());
$row=mysql_fetch_array($query);

$subject=$row['subject'];

$sql=mysql_query("insert into fill_blanks (question1,question2,answer,quiz_id,uploader_jcid,subject) values ('$q3_1','$q3_2','$blank_answer','$quiz_id','$jcid','$subject')");

if($sql){echo "<p style='color:#090'>"."Fill in The Blank Question Successfully Uploaded"."</p>";
}
}
else  echo "<p style='color:#F03'>"."Sorry! Failed To upload Question.&nbsp;Please Select Subject And Quiz Id To Upload Questions"."</p>";

?>