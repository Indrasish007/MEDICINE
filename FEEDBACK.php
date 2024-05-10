<?php
session_start();
if(isset($_SESSION['gmail']))
		{
			include('HEADERS\HEADERL.php');			
		}
	else
		{
			include('HEADERS\HEADER.php');
		}
include('HEADERS\CONNECTION.php');
?>
<HTML>
<link rel="stylesheet"  href="CSS/SEARCHBOX.CSS">
<body>
        <p align="center"><FONT color="#666666" size="5"><strong>SHARE YOUR FEEDBACK  !</strong></FONT></p>
		<FORM ACTION="FEEDBACK.php" METHOD="post"><BR>
		<p align="center"><INPUT TYPE="TEXT"
			NAME="NM"  placeholder="FULL NAME" required><BR>
       <INPUT TYPE="EMAIL"
			NAME="EM"  placeholder="EMAIL-ID" required><BR>
        <textarea name = "FEEDBACK" rows="5"></textarea><BR>
        <INPUT TYPE="SUBMIT"
			NAME="SUB"VALUE="OK"></p>         		   
		</FORM><FONT color="#666666" size="4"><center>
        <?php
if(isset($_POST['SUB']))
{  
$name=$_POST['NM'];
$email=$_POST['EM'];
$feedback=$_POST['FEEDBACK'];

    $query6="INSERT INTO feedback(NAME,EMAIL,FEEDBACK) VALUES('$name','$email','$feedback')";
	$result=mysqli_query($dbc,$query6);
	if($result==TRUE)
		{
        echo"<br>THANK YOU FOR YOUR FEEDBACK";
   		}
   else{
		echo"<br>SOME PROBLEM OCCUR";
   	   }
}	
?></center></FONT>
</body>

</html>
<?php
include('HEADERS\BOTTOMHEADER2.php');
?>

