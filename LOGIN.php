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
include('HEADERS\CONNECTION.php');
include('HEADERS\HEADER.php');
?>
<HTML>
<link rel="stylesheet"  href="CSS/SEARCHBOX.CSS">
<body>
		<CENTER>
		<FORM ACTION="LOGIN.php" METHOD="post">
		  <br>
		<strong><font color="#666666" size="5"><CENTER>WELCOME BACK TO OUR SITE</center>
		</FONT></strong>
		<BR>
<INPUT TYPE="EMAIL" NAME="LUID" required placeholder="EMAIL-ID"><BR>
<INPUT TYPE="PASSWORD" NAME="LPW" ID="LPW" required placeholder="PASSWORD">&nbsp; &nbsp;<input type="checkbox" onClick="password()"><BR>
<INPUT TYPE="SUBMIT" NAME="SUB"VALUE="OK">
<P><a href="FORGOTPASS.php"><font color="#FF0000">FORGOT PASSWORD</font></a></P>
<P><a href="REG.php"><font color="#FF0000">DON'T HAVE ACCOUNT?CREATE ONE</font></a></P>
<P>&nbsp;</P>
        		<p>*THANK YOU FOR BEING WITH US*</p>
		</FORM>
		</CENTER>
		</td>
      </tr>
    </table>
	</td>
  </tr>
</table>
</body>
</html>
<?php
			include('HEADERS\BOTTOMHEADER2.php');
			include('HEADERS\CONNECTION.php');
		
if(isset($_POST['SUB']))
{
$l=$_POST['LUID'];
$p=$_POST['LPW'];
$query3="select PASSWORD,GMAIL from reg where GMAIL='".$l."' and PASSWORD='".$p."'";
$result=mysqli_query($dbc,$query3);
$row=mysqli_num_rows($result);
if($row  <1)
{
	?>
	<script>
	alert('Username or Password not matched');
    </script>
    <?php
	
}
else
	{
		$row_value=mysqli_fetch_array($result);
		$GMAIL=$row_value['GMAIL'];
		$_SESSION['gmail']=$GMAIL;
		?>
	<script>
	alert('Login Successfull.');
	window.location = "INDEX.php";
    </script>
    <?php
	}
}
?>
<script>
function password() {
  var x = document.getElementById("LPW");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  
}
</SCRIPT>