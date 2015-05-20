<?php
session_start();
include('includes/connection.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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




<title>Untitled Document</title>
</head>

<body>
<div id="wrapper">
       <?php  include 'includes/student_nav.php';?>
        <div id="page-wrapper" >
            <?php
			 $jcid=$_SESSION['s_jc_id'];
			 $query1=mysql_query("select *from student where s_jc_id='$jcid'");
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
                   
                   <td>  <?php echo $row['s_jc_id']; ?>     </td>
                  
             </tr>
             <tr>
                   <td>E-mail</td>
                   
                   <td>    <?php echo $row['email']; ?>   </td>
                  
             </tr>
             </table>
             
             
             
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
</body>
</html>