<head>
<title>Phermacy
<style>
.mySlides {display:none;}
</style>
</title>

<style type="text/css">
input[type=date] {
   width:20%;
    border:2px solid #aaa;
	border-radius: 26px;
    margin:8px 0;
    outline:none;
    padding:8px;
    box-sizing:border-box;
    transition:.3s;
}
input[type=date]:focus{
    border-color:dodgerBlue;
    box-shadow:0 0 8px 0 dodgerBlue;
  }
</style>
</head>
<?php
session_start();
?>
<?php
if(isset($_SESSION['uid']))
		{
			include('HEADERS\ADMINHEADER.php');		
		}
	else
		{
			?>
			<script>
	window.location = "../ADMIN.php";
    </script>
    <?php
		}
include('HEADERS\CONNECTION.php');
?>
<HTML>
<link rel="stylesheet"  href="../CSS/SEARCHBOX.CSS">
<body>
<FORM ACTION="ADDMEDICINE.php" METHOD="post" enctype="multipart/form-data">
<CENTER><BR>
<font color="#666666" size="6">ADD MEDICINE DETAILS</font><BR><BR>
<font size="4" color="#666666"><center>MEDICINE NAME:</center></font>
<input type="text" name="MNAME" id="MNAME"required><BR>
<font size="4" color="#666666"><center>COMPANY NAME:</center></font>
<input type="text" name="BNAME" id="BNAME"><BR>
<font size="4" color="#666666"><center>MEDICINE PRICE:</center></font>
<input type="text" name="PRICE" id="PRICE"><BR>
<font size="4" color="#666666"><center>NO. OF MEDICINES:</center></font>
<input type="text" name="QTY" id="QTY"><BR>
<font size="4" color="#666666"><center>MANUFACTURING DATE:</center></font>
<input type="DATE" name="MFD" id="MFD"><BR>
<font size="4" color="#666666"><center>EXPIRY DATE:</center></font>
<input type="DATE" name="EXP" id="EXP"><BR><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;add image<input type="file" name="IMAGE" id="IMAGE"><BR><BR>
<INPUT TYPE="SUBMIT" NAME="SUB"VALUE="OK"></CENTER>
		<?php
			include('HEADERS\BOTTOMHEADER2.php');
		?>
		</td>
      </tr>
    </table>
</FORM>
</body>
</html>

<?php
include('HEADERS\CONNECTION.php');
if(isset($_POST['SUB']))
{
$MNAME=$_POST['MNAME'];
$BNAME=$_POST['BNAME'];
$PRICE=$_POST['PRICE'];
$QTY=$_POST['QTY'];
$MFD=$_POST['MFD'];
$EXP=$_POST['EXP'];
$IMGNAME=$_FILES['IMAGE']['name'];
$TEMPNAME=$_FILES['IMAGE']['tmp_name'];
$ID='QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789';
		$ID=str_shuffle($ID);
		$ID=substr($ID, 0, 4);
		
move_uploaded_file($TEMPNAME,"DATAIMG/$IMGNAME");


	$qry="INSERT INTO `medicine`(`ID`, `MNAME`, `BNAME`, `PRICE`, `QTY`, `MFD`, `EXP`, `IMAGE`) VALUES ('$ID','$MNAME','$BNAME','$PRICE','$QTY','$MFD','$EXP','$IMGNAME')";
	if(mysqli_query($dbc, $qry))
	{
		?>
		<script>
		alert('Data Submission Successfully.');
		window.location = "STORE.php";
		</script>
		<?php
	}
else
	{
		?>
		<script>
		alert('Data Submission Unsuccessfully.');
		</script>
		<?php
	}
}
?>
