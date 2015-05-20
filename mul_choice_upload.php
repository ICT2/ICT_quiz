<?php
session_start();
include 'includes/connection.php';
if(isset($_SESSION['quizid']))
{
$q1=$_GET['q1'];
$option1=$_GET['option1'];
$option2=$_GET['option2'];
$option3=$_GET['option3'];
$option4=$_GET['option4'];
$answer=$_GET['answer'];
$jcid=$_SESSION['jc_id'];
$quiz_id=$_SESSION['quizid'];

$query=mysql_query("select subject from quiz where quiz_id='$quiz_id'") or die(mysql_error());
$row=mysql_fetch_array($query);

$subject=$row['subject'];

$sql=mysql_query("insert into multiple_choice (question,option1,option2,option3,option4,answer,uploader_jcid,quiz_id,subject) values ('$q1','$option1','$option2','$option3','$option4','$answer','$jcid','$quiz_id','$subject')");

if($sql){echo "<p class='alert alert-success'>"."Multiple Choice Question Successfully Uploaded"."</p>";
}
}
else  echo "<p class='alert alert-danger'>"."Sorry! Failed To upload Question.&nbsp;Please Select Subject And Quiz Id To Upload Questions"."</p>";

?>
