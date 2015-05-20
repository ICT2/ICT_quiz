<?php
include 'includes/connection.php';
if(isset($_POST['login_as']) && isset($_POST['jc_id']) && isset($_POST['password']))
{
	$loginas=$_POST['login_as'];
	$jcid=$_POST['jc_id'];
$password=$_POST['password'];
$sub_jc = substr($jcid, 0, 2);
$jcid_length=strlen($jcid);
$msg="";
		  if($loginas==lecturer)
		  {
			  $sql="select * from lecturer where l_jc_id='$jcid' and password='$password' ";
						  $result=mysql_query($sql) or die(mysql_error());
						  $row=mysql_fetch_array($result) or die(mysql_error());
						  $status=$row['status'];
						  if($jcid=$row['l_jc_id'] && $password=$row['password'] )
							  {
								  if($status==inactive)
								  {
									  header('location:lecturer_approve.php');
								   }
								  else
									 {
								  $username=$row['firstname']."&nbsp;".$row['lastname'];
								  session_start();
								  $_SESSION['username']=$username;
								  $_SESSION['jc_id']=$row['l_jc_id'];
								  header('location:lecturer.php');
									 }
							  }
							  
							 elseif(!$sql){
								  echo "<script>alert('hi')</script>";
								  }
													  
		  }
		  elseif($loginas==student)
		  {
			  $sql1="select * from student where s_jc_id='$jcid' and password='$password' and  status='active' ";
						  $result1=mysql_query($sql1) or die(mysql_error());
						  $row1=mysql_fetch_array($result1) or die(mysql_error());
						  
						  if(mysql_affected_rows() == 1)
							  {
								  $username=$row1['firstname']."&nbsp;".$row1['lastname'];
								  session_start();
								  $_SESSION['username']=$username;
								  $_SESSION['s_jc_id']=$row1['s_jc_id'];
								  header('location:student.php');
							  }
							  else{ header('location:index.php');}
							  
							  
		  }
		  elseif($loginas==admin)
		  {
			 
						  
						  if($password == admin)
							  {
								  
								  header('location:admin.php');
							  }
							  else{ header('location:index.php');}
							  
							  
		  }


}
?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Welcome! Login Here</title>

  
  
    <link rel="stylesheet" href="css/login.css" media="screen" type="text/css" />
    <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script>
  function jc_validation()
  {
	  var jc_id=document.login.jc_id.value;
	  var sub_jc_id1=jc_id.substring(0,2);
	  
	  if(sub_jc_id1!="jc")
	  {
	  alert("jc id must start with jc");
	  document.getElementById('jc_id').value = "";
	  }
	  
	}
	
	function admin()
	{
		document.getElementById('jc_id').value = "jcadmin";
	}
	function lecturer()
	{
		document.getElementById('jc_id').value = "";
	}
	function student()
	{
		document.getElementById('jc_id').value = "";
	}
		
	
  </script>
</head>

<!--<body style="background-color:#4D4D4D;">-->
<body background="bag.png">
<center><img src="title1.png" alt="Title" style="width:200px;height:75px"></center>

<!--<center><h1 >JCUB QUIZ</h1></center>-->



  <div style="float:left; margin-top:5%; width:100%"> 
  <div class="login-card" style="background-color:#C90000;">
  
    <p style="font-size:20px; text-align:center;"><a href="index.php" style="color:#0F9;">Log-in</a>
    <!--&nbsp;&nbsp;|&nbsp;&nbsp;
    <a href="register.php" style="color:#0F9;">Register</a>--></p><br>
  
   <form name="login" method="POST" action=""><small style="color:#F00;"><?php echo $msg1; ?></small>
                      <h4>  <input type="radio" value="lecturer" name="login_as" onClick="lecturer()" required  >Lecturer
                        <input type="radio"  value="student" name="login_as" onClick="student()"  required checked>Student
                        <input type="radio"  value="admin" name="login_as" onClick="admin()" required>Admin</h4>
                    <small style="color:#F00;"><?php echo $msg; ?></small><br>
    <small style="color:#F00;"><?php echo $msg3; ?></small>
    
    <input type="text" name="jc_id" id="jc_id" placeholder="Enter JC Number" required  />
    <input type="password" name="password" id="password" placeholder="Password" required />
    <button type="submit" class="login login-submit"  style="padding:8px 15px 10px 15px;" name="login" onClick="jc_validation()">Login</button>
    <a href="register.php"><button type="button" class="login login-submit"  style="padding:8px 15px 10px 15px;" name="register" id="register" >Register</button></a>
    </form>
     
</div> 


</div>

<!-- <div id="error"><img src="https://dl.dropboxusercontent.com/u/23299152/Delete-icon.png" /> Your caps-lock is on.</div> -->

  

</body>

</html>