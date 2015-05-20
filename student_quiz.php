<?php
session_start();
include('includes/connection.php');

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
window.onload=function()
{
document.getElementById("quizbutton").style.display='none';
}
					
function test(a) 
{
//window.subject_id = a.selectedIndex.value;

window.subject = document.getElementById('subject').options[document.getElementById('subject').selectedIndex].value
document.getElementById("quizbutton").style.display='block';
}

function show_quiz()
{
	//alert(subject);
	
	if (window.XMLHttpRequest) {
					  // code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					} else { // code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange=function() {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						 
						 
						document.getElementById("quizzes").innerHTML=xmlhttp.responseText;
					  }
					}
				
				var sub=subject;

				xmlhttp.open("POST","show_quizzes.php?subject=" + sub , true);  					 				
				xmlhttp.send();
	
	
}

function participate(a)
{
	var quiz_id=a;
	var sub=subject;
	window.location="participate_quiz.php?quizid="+ quiz_id + "&subject=" +sub,'_blank';
	
}



</script>

<title>Untitled Document</title>


</head>

<body>
<?php  include 'includes/student_nav.php';?>
<div id="wrapper">
       
        <div id="page-wrapper" >
            
             
             <div class="col-sm-8">
           <h2>Select Subject And Participate In The Quiz</h2>
            <select name="answer" id="subject"  onchange="test(this)">
             <option value="0">Select Subject</option>
            <option value="oracle">Oracle</option>
             <option value="advancedesecurity">Advanced E-Security</option>
             <option value="ebusinesstechnologies">E-Bussiness Technologies</option>
             <option value="dataminingandknowledgediscovery">Data Mining And knowledge Discovery</option>
              </select>
             </div>
             
             <div class="col-sm-8">
             <button id="quizbutton" onClick="show_quiz();">Show Avaliable Quizzes</button>
             </div>
             <div id="quizzes" class="col-sm-8">
             </div>
             
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
</body>
</html>