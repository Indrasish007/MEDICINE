<?php
session_start();
if(isset($_SESSION['gmail']))
		{
			?>
			<script>
	window.location = "INDEX.php";
    </script>
    <?php 
		}
?>
<?php
include('HEADERS\HEADER.php');
?>
<HTML>
<link rel="stylesheet"  href="CSS/SEARCHBOX.CSS">
<body>
		<FORM ACTION="REG.php" METHOD="post">
		<br><strong><font color="#666666" size="5"><CENTER>WELCOME TO OUR WEBSITE!
		</FONT></strong><br>
		<INPUT TYPE="TEXT" NAME="UN" PLACEHOLDER="FULL NAME" required><br>
        <INPUT TYPE="PASSWORD" NAME="PW" ID="PW" PLACEHOLDER="PASSWORD(at least 8 characters)" required>&nbsp; &nbsp;<input type="checkbox" onClick="password()"><br>
        <INPUT TYPE="PASSWORD" NAME="CPW" ID="CPW" PLACEHOLDER="CONFIRM PASSWORD" required>&nbsp; &nbsp;<input type="checkbox" onClick="cpassword()"><br>
        <INPUT TYPE="EMAIL" NAME="GMAIL" PLACEHOLDER="EMAIL-ID" required><br>
        <INPUT TYPE="EMAIL" NAME="CGMAIL" PLACEHOLDER="Re-Type EMAIL-ID" required><br>
        <INPUT TYPE="NUMBER" NAME="PHN" PLACEHOLDER="PHONE NUMBER" required><br>
        <font color="#666666" size="4">GENDER&nbsp;<input type="radio" name="gender" value="male" required>male
			<input type="radio" name="gender" value="female" required>female<br></font>
            <INPUT TYPE="SUBMIT" NAME="SUB"VALUE="OK"><br>
            <p>*WE HOPE THAT Y0U WILL GET A GOOD EXPERIENCE*</p></center>
		<?php
			include('HEADERS\BOTTOMHEADER2.php');
		?>
		
</table>
</FORM>
</body>
</html>
<?php
if(isset($_POST['SUB']))
{
include('CONNECTION.php');
$b=$_POST['UN'];
$p1=$_POST['PW'];
$p2=$_POST['CPW'];
$g=$_POST['GMAIL'];
$s=$_POST['CGMAIL'];
$gender=$_POST['gender'];
$phn=$_POST['PHN'];

if((!(strcmp($p1,$p2))) && (!(strcmp($g,$s))))
{
	if(strlen($phn)==10){
	if(strlen($p1)>7){
$query3="select GMAIL from reg where GMAIL='".$g."'";
$result=mysqli_query($dbc, $query3);
$row=mysqli_num_rows($result);
if($row  >0)
{
	?>
	<script>
	alert('Gmail already exist');
	window.location = "LOGIN.php";
    </script>
    <?php
	
}
else
	{
		
	$query="INSERT INTO `reg`(`UNAME`, `PASSWORD`, `GMAIL`, `GENDER`, `PH`) VALUES ('$b','$p1','$g','$gender','$phn')";
	if(mysqli_query($dbc, $query))
	{	
		?>
	<script>
	alert('You Registered Successfully');
	window.location = "LOGIN.php";
    </script>
    <?php
	}
else
	{
		?>
	<script>
	alert('Data Submission Unsuccessfull');
    </script>
    <?php
	}
	}
}
else
{
	?>
	<script>
	alert('Your Password is too Short');
    </script>
    <?php
}}
else
{
	?>
	<script>
	alert('Your Phone Number is Incorrect');
    </script>
    <?php
}
}
else
{	
		?>
	<script>
	alert('Given Data is Wrong');
    </script>
    <?php
}
}	
?>
<script>
function password() {
  var x = document.getElementById("PW");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  
}
function cpassword() {
  var Y = document.getElementById("CPW");
  if (Y.type === "password") {
    Y.type = "text";
  } else {
    Y.type = "password";
  }
  
}
</SCRIPT>