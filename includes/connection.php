<?php
error_reporting(0);
//database connection starts here
$con = mysql_connect("localhost","root","") or die(mysql_error());

mysql_select_db("quiz", $con);



?>