<?php
session_start();
include('includes/connection.php');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administration</title>
	
    <!--theme links-->
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

<!--for code-->
<script>
function set_status(str) {
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
  xmlhttp.open("GET","status_active.php?jcid="+str,true);
  xmlhttp.send();
  
  
}


function set_status_in(str) {
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
  xmlhttp.open("GET","status_inactive.php?jcid="+str,true);
  xmlhttp.send();
  
  
}

</script>

</head>

<body>
    <div id="wrapper">
       <?php  include 'includes/admin_nav.php';?>
        <div id="page-wrapper" >
            
            
            <!--inactive-->
            
                <div id="inactive">    
                <h3 class="bg-primary">Waiting For Approval</h3>    
             <table class="table table-bordered">
     <thead>
      <tr>
         <th>JC Number</th>
         <th>Firstname</th>
         <th>Lastname</th>
         <th>Email</th>
         <th>Action</th>
         <!--<th>Action2</th>-->
      </tr>
   </thead>
            
            <?php
          
            $sql1="select * from lecturer where status='inactive' ";
            $result1=mysql_query($sql1) or die(mysql_error());
            while($row1 = mysql_fetch_array($result1))
                  {
                    					
					echo '<tr>';
					echo "<th>";
                    echo $row1['l_jc_id'];
					echo "</th>";
					
					echo '<td>';
                    echo $row1['firstname'];
					echo '</td>';
					echo '<td>';
                     echo $row1['lastname'];
					echo '</td>';
					echo '<td>';
					
                    echo $row1['email'];
					echo '</td>';
					
					echo '<td>';
					$jcid=$row1['l_jc_id'];
					echo "<button value='$jcid' onclick='set_status(this.value)' class='btn btn-info'>Set Active</button>";
					echo '</td>';
					
					//echo '<td>';
//					echo "<button value='$jcid' onclick='set_status(this.value)' class='btn btn-info'></button>";
//					echo '</td>';
					
					
                  }
        
            
            ?>
            </table>
             </div>
             <div id="txtHint">
             <h2>status here</h2>
             </div>
             
             
             <!--active-->
              <div id="active">  
              <h3 class="bg-primary">Approved</h3>      
             <table class="table table-bordered">
     <thead>
      <tr>
         <th>JC Number</th>
         <th>Firstname</th>
         <th>Lastname</th>
         <th>Email</th>
         <th>Action</th>
         <!--<th>Action2</th>-->
      </tr>
   </thead>
            
            <?php
            
            $sql2="select * from lecturer where status='active' ";
            $result2=mysql_query($sql2) or die(mysql_error());
            while($row2 = mysql_fetch_array($result2))
                  {
                    					
					echo '<tr>';
					echo "<th>";
                    echo $row2['l_jc_id'];
					echo "</th>";
					
					echo '<td>';
                    echo $row2['firstname'];
					echo '</td>';
					echo '<td>';
                     echo $row2['lastname'];
					echo '</td>';
					echo '<td>';
					
                    echo $row2['email'];
					echo '</td>';
					echo '<td>';
					$jcid=$row2['l_jc_id'];
					echo "<button value='$jcid' onclick='set_status_in(this.value)' class='btn btn-info'>Set Inactive</button>";
					echo '</td>';
					
					//echo '<td>';
//					echo "<button value='$jcid' onclick='set_status(this.value)' class='btn btn-info'></button>";
//					echo '</td>';
					
					
                  }
        
            
            ?>
            </table>
             </div>
             
             
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    
    
   
</body>
</html>
