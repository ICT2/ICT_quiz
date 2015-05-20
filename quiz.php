<?php
session_start();
include('includes/connection.php');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
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

<script>
window.onload=function()
{
document.getElementById("quizbutton").style.display='none';
document.getElementById("uploadbutton").style.display='none';
}
					
function test(a) 
{
//window.subject_id = a.selectedIndex.value;

window.subject = document.getElementById('subject').options[document.getElementById('subject').selectedIndex].value
document.getElementById("quizbutton").style.display='block';
}


function create_quiz(jcid)
{
    if (jcid=="")
   {
    document.getElementById("response").innerHTML="";
    return;
   }
   
		if (window.XMLHttpRequest) 
			{
			  // code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			} 
		else 
		{ // code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
  
  
			xmlhttp.onreadystatechange=function()
			 {
			  if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
					  document.getElementById("response").innerHTML=xmlhttp.responseText;
					}
			 }
  xmlhttp.open("GET","createquiz.php?jcid="+jcid+"&subject="+subject,true);
  xmlhttp.send();
  document.getElementById("quizbutton").style.display='none';
  document.getElementById("uploadbutton").style.display='block';
}
  
		
function upload(quizid)
{
	alert(quizid);
	window.location="upload.php?quizid="+quizid; 
}


</script>

<script>
function set_status(quizid)
{

alert(quizid);

}

</script>

</head>

<body>


    <div id="wrapper">
    
       <?php  include 'includes/nav.php'; ?>
        <div id="page-wrapper" >
        <div class="col-sm-12" >
         <h2 style="background-color:#666; width:100%; color:#000; font-size:20px; padding:2px; text-align:center;">Create A New Quiz</h2>
         </div>
            <div class="col-sm-2">
           
            <select name="answer" id="subject"  onchange="test(this)">
             <option value="0">Select Subject</option>
             <option value="oracle">Oracle</option>
             <option value="advancedesecurity">Advanced E-Security</option>
             <option value="ebusinesstechnologies">E-Bussiness Technologies</option>
             <option value="dataminingandknowledgediscovery">Data Mining And knowledge Discovery</option>
             </select>
             </div>
             
             <div class="col-sm-2">
             <button id="quizbutton" value="<?php echo $_SESSION['jc_id']; ?>" onClick="create_quiz(this.value);">Create New Quiz</button>
             <a href="upload.php" style="text-decoration:none;"><button id="uploadbutton">Upload Questions</button></a>
             </div>
             
             <div id="response" class="col-sm-12">
             <h2>Display Here</h2>
             </div>
             
             <div class="col-sm-12">
             <h2>Quizes Created By You</h2>
             <div class="col-md-6"  style="padding-left:0px;">
            <table class="table table-bordered">
     <thead>
      <tr>
         <th>Quiz ID</th>
         <th>Subject</th>
         <th>Duration</th>
         <th>Status</th>
         <th>Action1</th>
         <th>Action2</th>
      </tr>
   </thead>
            
            <?php
            $jcid=$_SESSION['jc_id'];
            $sql1="select * from quiz where created_by_jcid='$jcid' ";
            $result1=mysql_query($sql1) or die(mysql_error());
            while($row1 = mysql_fetch_array($result1))
                  {
                    					
					echo '<tr>';
					echo "<th>";
                    echo $row1['sno'];
					echo "</th>";
					
					echo '<td>';
                    echo $row1['subject'];
					echo '</td>';
					echo '<td>';
                     echo $row1['duration'];
					echo '</td>';
					echo '<td>';
					
                    echo $row1['status'];
					echo '</td>';
					echo '<td>';
					$quizid=$row1['quiz_id'];
					echo "<button value='$quizid' onclick='upload(this.value)' class='btn btn-info'>Upload</button>";
					echo '</td>';
					echo '<td>';
					if($row1['status']=="inactive")
					{
						$status_text="Set Active";
					}
					else {
						$status_text="Set Inactive";
					}
					echo "<button value='$quizid' onclick='set_status(this.value)' class='btn btn-info'>".$status_text."</button>";
					echo '</td>';
					
					
                  }
        
            
            ?>
            </table>
            </div>
             </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
    
   
</body>
</html>
