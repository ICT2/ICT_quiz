<?php
include 'includes/connection.php';

if(isset($_POST['register_as']) && isset($_POST['jc_id']) && isset($_POST['password']))
{
	$register_as=$_POST['register_as'];
	$jcid=$_POST['jc_id'];
	$password=$_POST['password'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	
		  if($register_as==lecturer)
		  {
			  $sql1="insert into lecturer (firstname,lastname,l_jc_id,email,password) values('$firstname','$lastname','$jcid','$email','$password')";
					mysql_query($sql1) or die(mysql_error());
					header('location:index.php');		  

		  }elseif($register_as==student)
		  {
			   $sql2="insert into student (firstname,lastname,s_jc_id,email,password) values('$firstname','$lastname','$jcid','$email','$password')";
				mysql_query($sql2) or die(mysql_error());
				header('location:index.php');
		  }
}

?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Registration</title>

  
  
    <link rel="stylesheet" href="css/login.css" media="screen" type="text/css" />
    
    <script>
  function jc_validation()
  {
	  var jc_id=document.register.jc_id.value;
	  var sub_jc_id1=jc_id.substring(0,2);
	  
	  if(sub_jc_id1!="jc")
	  {
	  alert("jc id must start with jc");
	  document.getElementById('jc_id').value = "";
	  }
	  
	}
  </script>

   
</head>

<body background="bag.png">
<center><img src="title.png" alt="Title" style="width:200px;height:75px"></center>
<!--<body style="background-color:#4D4D4D;">-->
<!--<center><h1 >JCUB QUIZ</h1></center>-->
<!--font-size:20px;-->

  <div style="float:left; margin-top:5%; width:100%"> 
  
   <div class="login-card" style="background-color:#C90000;">
     <p style="font-size:20px; text-align:center;"><a href="register.php" style="color:#0F9;" >Register Here</a>&nbsp;&nbsp;<!--|&nbsp;&nbsp;<a href="register.php">Register</a>--></p><br>
  <form name="register" action="#" method="POST">
   
                      <h4>  <input type="radio" value="lecturer" name="register_as" required >Lecturer
                        <input type="radio"  value="student" name="register_as" required checked>Student</h4>
                        
            <input type="text" name="firstname" id="firstname" placeholder="Firstname" required>
            <input type="text" name="lastname" id="lastname" placeholder="Lastname" required>      
                  
           <input type="email" name="email" id="email" placeholder="Enter Your Email" required>         
           <input type="text" name="jc_id" id="jc_id" placeholder="Enter JC Number" required>
           
           <input type="password" name="password" id="password" placeholder="Password" required>
           <input type="password" name="cnf_password" id="cnf_password" placeholder="Retype Password" required>
           
    
     
     <button type="submit" class="login login-submit" style="padding:8px 15px 10px 15px;"  name="register" onClick="jc_validation();">Register</button>
    <!--<input type="submit" name="login" class="login login-submit" value="login">-->
  </form>

  <div class="login-help">
    
  </div>

</div> 


</div>



 
</body>

</html>