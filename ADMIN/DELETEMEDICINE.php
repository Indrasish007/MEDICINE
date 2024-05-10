<?php
session_start();
include('HEADERS\CONNECTION.php');
$l=$_POST['ID'];
$query33="SELECT * FROM `medicine` WHERE ID='$l'";
$result=mysqli_query($dbc, $query33);
$row=mysqli_num_rows($result);
if($row  >0){
	$qry="delete from medicine where ID='".$l."'";
	$result21=mysqli_query($dbc, $qry);
	?>
	<script>
	alert('Medicine Deleted Successfully');
	window.location = "STORE.php";
    </script>
    <?php
	
}
else
	{
		?>
	<script>
	alert('The Book does not Exist');
	window.location = "STORE.php";	
    </script>
    <?php
	}
?>
