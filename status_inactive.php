<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include 'includes/connection.php';
$l_jc_id=$_GET['jcid'];
$result=mysql_query("UPDATE lecturer SET status='inactive' where l_jc_id='$l_jc_id'") or die(mysql_error());
if($result){
	echo "<p class='alert alert-success'>"."lecturer set to inactive"."</p>";}

?>
</body>
</html>