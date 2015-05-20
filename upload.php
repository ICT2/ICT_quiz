<?php
session_start();
include('includes/connection.php');
if(isset($_GET['quizid']))
{
	$_SESSION['quizid']=$_GET['quizid'];
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upload Questions Here</title>
	<!-- BOOTSTRAP STYLES-->
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
<script src="http://code.jquery.com/jquery-latest.js"></script>
             <script type="text/javascript">
                 $(document).ready(function () {
					 $('#div1').hide('fast');
					 $('#div2').hide('fast');
                      $('#div3').hide('fast'); 
					 
                    $('#choice').click(function () {
                       $('#div1').show('fast');
					   $('#div2').hide('fast');
					   $('#div3').hide('fast');
                       
                });
                $('#tf').click(function () {
                      $('#div1').hide('fast');
                      $('#div2').show('fast');
					  $('#div3').hide('fast');
                 });
				 
				 $('#blank').click(function () {
                      $('#div1').hide('fast');
                      $('#div2').hide('fast');
					  $('#div3').show('fast');
                 });
               });
			   
			   
			   
			   
			  
			   
</script>
<script>

function test(a) {
window.answer = a.selectedIndex;

}

function mul_choice_upload(b) 
			   {
					
					if (window.XMLHttpRequest) {
					  // code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					} else { // code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange=function() {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						 
						 
						document.getElementById("status").innerHTML=xmlhttp.responseText;
					  }
					}
  var q1=document.mult_choice.q1.value;
  var option1=document.mult_choice.option1.value;
  var option2=document.mult_choice.option2.value;
  var option3=document.mult_choice.option3.value;
  var option4=document.mult_choice.option4.value;
  var answer=document.mult_choice.answer.value;
   
  
  xmlhttp.open("GET","mul_choice_upload.php?q1=" + q1 + "&option1=" + option1 + "&option2=" + option2 + "&option3=" + option3 + "&option4=" + 
  option4 + "&answer=" + answer, true);
   xmlhttp.send();
					 }
					 
					 
			
function tf_upload() 
   {
		
		if (window.XMLHttpRequest) {
		  // code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		} else { // code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			 
			 
			document.getElementById("status").innerHTML=xmlhttp.responseText;
		  }
		}
	var q2=document.tf.q2.value;
	
	function get_radio_value() 
	{
		  var inputs = document.getElementsByName("answer");
		  for (var i = 0; i < inputs.length; i++) 
		  {
			if (inputs[i].checked) 
			{
			  return inputs[i].value;
			}
		  }
   }
	
	var tf_answer = get_radio_value();

	xmlhttp.open("POST","tf_upload.php?q2=" + q2 + "&answer=" + tf_answer, true);  					 	
	xmlhttp.send();
		 }
					 
					 

function blank_upload() 
			   {
					
					if (window.XMLHttpRequest) {
					  // code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					} else { // code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange=function() {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200) {
						 
						 
						document.getElementById("status").innerHTML=xmlhttp.responseText;
					  }
					}
				
				var q3_1=document.blank.q3_1.value;
				alert(q3_1);
				var q3_2=document.blank.q3_2.value;
				var blank_answer=document.blank.blank_answer.value;
				
				xmlhttp.open("POST","blank_upload.php?q3_1=" + q3_1 + "&q3_2=" + q3_2+ "&blank_answer=" +blank_answer, true);  					 				xmlhttp.send();
					 }


function test(a) 
{
//window.subject_id = a.selectedIndex.value;

window.subject = document.getElementById('subject').options[document.getElementById('subject').selectedIndex].value
document.getElementById("quizid").style.display='block';
}

					 
</script>

</head>

<body>
    <div id="wrapper">
       <?php  include 'includes/nav.php';?>
        <div id="page-wrapper">
        <div id="status">
        </div>
        <div id="status1">
        </div>
        <div class="col-sm-12">
        <h1 class="bg-primary">Upload Your Questions For Quiz Id <?php echo $_SESSION['quizid']; ?></h1>
        
                   <div class="col-sm-8">
            
            <button class="btn-primary" id="choice" value="" onclick='choice(this.value)'>Mulitiple Choice</button>
            <button class="btn-primary" id="tf" onclick='true_false(this.value)'>True/False</button>
            <button class="btn-primary" id="blank" onclick='blanks(this.value)'>Fill In The Blanks</button>
            
            </div>
                         
             <div class="col-sm-12" id="div1">
             <br>
            <br>
             <form name="mult_choice">
             <div class="col-sm-10">
             <input type="text"  placeholder="Enter Your Question" class="col-sm-6" required id="q1" />?
             </div>
             <div class="col-sm-10">
             <input type="text" placeholder="option1" class="col-sm-6"  required="required" id="option1" required />
             <input type="text" placeholder="option2" class="col-sm-6" required id="option2" required />
             </div>
             <div class="col-sm-10">
             <input type="text" placeholder="option3" class="col-sm-6" required id="option3" required />
             <input type="text" placeholder="option4" class="col-sm-6" required id="option4" required/>
            </div>
            <div class="col-sm-10">
             <select name="answer" onchange="test(this)">
             <option value="0">Select Correct option</option>
             <option value="1">Option1</option>
             <option value="2">Option2</option>
             <option value="3">Option3</option>
             <option value="4">Option4</option>
             </select>
             
            <input type="button" class="btn-success" value="Upload" onclick="mul_choice_upload();" >
            </div>
             </form>
             </div>
             
             <div id="div2" class="col-sm-12">
             <br>
            <br>
              <form name="tf">
              <div class="col-sm-10">
              <input type="text" placeholder="Enter Your Question" class="col-sm-6" id="q2" />?
              </div>
              <div class="col-sm-10">
              <input type="radio" name="answer" value="1"  />True
               <input type="radio" name="answer" value="0"  />False
               </div>
               <div class="col-sm-10">
               <input type="button" class="btn-success" value="Upload" onclick="tf_upload();">
               </div>
                           </form>   
             </div>
             
             <div id="div3" class="col-sm-12">
            <br>
            <br>
              <form name="blank">
              <div class="col-sm-10">
              <input type="text" placeholder="question part1" id="q3_1"/>answer here<input type="text" placeholder="question part2" id="q3_2" />?
              </div>
              <div class="col-sm-10">
              <input type="text" placeholder="answer" class="col-sm-12" id="blank_answer" />
              </div>
              <div class="col-sm-4">
              <input type="button" class="btn-success" value="Upload" onclick="blank_upload();">
              </div>
                           </form>   
             </div>
             <button>
             </div>
            </div>
            
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
    
   
</body>
</html>
