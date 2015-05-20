<?php
session_start();
include('includes/connection.php');
$question_id=$_GET['question_id'];
$user_answer=$_GET['user_answer'];
$question_type="mul_choice";
$s_jcid=$_SESSION['s_jc_id'];;

if(!isset($_SESSION['mul_score']))
{
$_SESSION['mul_score']=0;
}

$query1=mysql_query("select user_answer from quizlog where question_id=$question_id") or die(mysql_error());
$count=mysql_affected_rows();

if($count==0)
{
	$query1=mysql_query("insert into quizlog(question_id,user_answer,jc_id,question_type) values('$question_id','$user_answer','$s_jcid','$question_type')") or die(mysql_error());
}
elseif($count==1)
{
	$query2=mysql_query("update quizlog set user_answer=$user_answer where question_id=$question_id") or die(mysql_error());
		
}

$query3=mysql_query("select * from multiple_choice where question_id=$question_id") or die(mysql_error());
$row3=mysql_fetch_array($query3);

$query4=mysql_query("select * from quizlog where question_id=$question_id") or die(mysql_error());
$row4=mysql_fetch_array($query4);
$final_user_answer=$row4['user_answer'];


if($row3['answer']==$final_user_answer)
{
	
	$_SESSION['mul_score']=$_SESSION['mul_score']+1;
	
	}



?>