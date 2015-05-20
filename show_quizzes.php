<html>
<body>
<table class="table table-bordered">
     <thead>
      <tr>
        <!-- <th>S.no</th>-->
         <th>Subject</th>
         <th>Quiz ID</th>
         <th>Duration</th>
         <th>Action</th>
      </tr>
   </thead> 
 <?php
session_start();
include('includes/connection.php');

            $sub=$_GET['subject'];
			
            $sql1="select * from quiz where subject='$sub' ";
            $result1=mysql_query($sql1) or die(mysql_error());
            while($row1 = mysql_fetch_array($result1))
                  {
                    			
					$quiz_id=$row1['quiz_id'];			
										
					echo '<tr>';
					//echo "<th>";
//                    echo $row1['sno'];
//					echo "</th>";
					
					echo '<td>';
                    echo $row1['subject'];
					echo '</td>';
					
					echo '<td>';
                    echo $row1['quiz_id'];
					echo '</td>';
					
					echo '<td>';
                     echo $row1['duration'];
					echo '</td>';
					
					//echo '<td>';
//					if($row1['status']==1){
//						$status="Active";
//						}
//						else $status="Inactive";
//                    echo $status;
//					echo '</td>';
					
					echo '<td>';
                    echo "<button value='$quiz_id'  onclick='participate(this.value)' class='btn btn-info'>participate</button>";
					echo '</td>';
                    echo "<br>";
                    
                  
                  }
        
            
            ?>
</table>
</body>