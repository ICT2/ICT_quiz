<?php
session_start();
include('includes/connection.php');
$quiz_id=$_GET['quizid'];
$subject=$_GET['subject'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->

   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

<script>

function show(answer,id)
{
	 
				   if (window.XMLHttpRequest) 
				   {
					  // code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					} else 
					{ // code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange=function() 
					{
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
					   {
						 
						 
						document.getElementById("score").innerHTML=xmlhttp.responseText;
					   }
					}
					
  	 var question_id=id;
	 var user_answer=answer;
	 //alert(question_id+user_answer);
   
  
  xmlhttp.open("GET","mul_choice_validate.php?question_id=" + question_id + "&user_answer=" + user_answer , true);
   xmlhttp.send();
					 }
	 
	 </script>
   
     <script>
	 
	 
function tf(value)
{ 
alert("hi ra");
}	 
	 	 </script>
         
         
        

<title>Untitled Document</title>
</head>

<body>
<div id="wrapper">
<div id="score">
</div>
       <?php  include 'includes/student_nav.php';?>
        <div id="page-wrapper" >
            
             <div class="col-sm-12">
                   <h4>Multiple Choice Questions</h4>
                   <form name="mul_choice">
                   		<?php 
						$sql="select *from multiple_choice where quiz_id=$quiz_id  ";
						$result=mysql_query($sql) or die(mysql_error());
						while($row=mysql_fetch_array($result))
						{
						?>
                         <div class="col-sm-12">
                         1.<?php echo $row['question'];?>?
                         </div>
                   
                 <div class="col-sm-8">
                       <div class="col-sm-4">
                       1.<input type="radio" name="<?php echo $row['question_id']; ?>" onclick="show(this.value,<?php echo $row['question_id']; ?>);" value="1"  /><?php echo $row['option1'];?>
                       </div>
                        <div class="col-sm-4">
                       2.<input type="radio" name="<?php echo $row['question_id']; ?>" onclick="show(this.value,<?php echo $row['question_id']; ?>);" value="2"  /><?php echo $row['option2'];?>
                       </div>
                 </div>
                 
                 
                  <div class="col-sm-8">
                        <div class="col-sm-4">
                       3.<input type="radio" name="<?php echo $row['question_id']; ?>" onclick="show(this.value,<?php echo $row['question_id']; ?>);" value="3" /><?php echo $row['option3'];?>
                       </div>
                        <div class="col-sm-4">
                       4.<input type="radio" name="<?php echo $row['question_id']; ?>" onclick="show(this.value,<?php echo $row['question_id']; ?>);" value="4"  /><?php echo $row['option4'];?>
                       </div>
                 </div>
              
                         <?php
						}
						?>
                        
             </div>
             
             		</form>

             <div class="col-sm-12">
             <h4>True OR False</h4>
             <script>
			 
			 function tf(){ alert("world");}
			 </script>
             <form name="tf">
             <?php 
						$sql1="select *from true_false where quiz_id=$quiz_id and subject='$subject' limit 10 ";
						$result1=mysql_query($sql1) or die(mysql_error());
						while($row1=mysql_fetch_array($result1))
						{
						?>
             <div class="col-sm-12">
             1.<?php echo $row1['question'];?>?
             </div>
             
             <div class="col-sm-8">
                   <div class="col-sm-4">
                   1.<input type="radio" name="<?php echo $row1['question_id']; ?>" value="1" onclick="tf();" />True
                   </div>
                    <div class="col-sm-4">
                   2.<input type="radio" name="<?php echo $row1['question_id']; ?>" value="0" onclick="tf();" />False
                   </div>
             </div>
                         

                         <?php
						}
						?>
             </form>
             </div>
             
             
             <div id="quizzes" class="col-sm-12">
             <h4>Fill In the Blanks</h4>
             <form name="fill_balnk">
             <?php 
						$sql2="select *from fill_blanks where quiz_id=$quiz_id and subject='$subject' limit 10 ";
						$result2=mysql_query($sql2) or die(mysql_error());
						while($row2=mysql_fetch_array($result2))
						{
						?>
                         <div class="col-sm-12">
                         1.<?php echo $row2['question1']; ?>
						 <input type="text" name="" id="<?php echo $row2['question_id']; ?>"/>
                        
                         <?php
						  if($row2['question2']!="")
						  { 
						  echo $row2['question2'];
						   echo '<input type="text" />';
						   }
						    ?>
                         </div>
                   
                                                                         
                         <?php
						}
						?>
             </form>
             
             </div>
            
            
             <div class="col-sm-12" style="text-align:center;">
             <button>&nbsp;&nbsp;Finish&nbsp;&nbsp; </button>
             </div>
            </div>
            
         <!-- /. PAGE WRAPPER  -->
        </div>
</body>
</html>