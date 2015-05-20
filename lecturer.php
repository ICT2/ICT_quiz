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
function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","action.php?lic_num="+str,true);
  xmlhttp.send();
}
</script>

</head>

<body>
    <div id="wrapper">
       <?php  include 'includes/nav.php';?>
        <div id="page-wrapper" >
            
             <?php
			 $jcid=$_SESSION['jc_id'];
			 $query1=mysql_query("select *from lecturer where l_jc_id='$jcid'");
			 $row=mysql_fetch_array($query1);
			 
			
			 
			 ?>
             
             <table class="table table-bordered">
             <tr>
             <th colspan="2">Profile Info</th>
             </tr>
             <tr>
                   <td>First Name</td>
                   
                   <td>   <?php echo $row['firstname']; ?>   </td>
             </tr>
             <tr>
                   <td>Last Name</td>
                   
                   <td>  <?php echo $row['lastname']; ?>     </td>
             </tr>
             <tr>
                   <td>JC Number</td>
                   
                   <td>  <?php echo $row['l_jc_id']; ?>     </td>
                  
             </tr>
             <tr>
                   <td>E-mail</td>
                   
                   <td>    <?php echo $row['email']; ?>   </td>
                  
             </tr>
             </table>
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
    
   
</body>
</html>
