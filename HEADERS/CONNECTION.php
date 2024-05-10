<?php
$hostname='localhost';
$username='root';
$password='';
$dbname='example';
$init = mysqli_init();
$dbc=mysqli_connect($hostname,$username,$password,$dbname);
	if(!$dbc)
	{
		die('notconnected with database'.mysqli_error($init));
	}
	$sds=mysqli_select_db($dbc,$dbname);
	if(!$sds)
	{
		die('not connected with instance'.mysqli_error($dbc));
	}
?>	