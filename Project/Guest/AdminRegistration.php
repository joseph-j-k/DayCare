
 <?php  include("../Assets/Connection/Connection.php"); ?>
<?php 
if(isset($_POST["btn_submit"]))

 
 
   {
	   $name = $_POST["txt_name"];
	   $email = $_POST["txt_email"];
	   $password = $_POST["txt_password"];
	   
	  
	  
	  $insQry = "INSERT INTO  tbl_admin(admin_name,	admin_email,admin_password)VALUES('". $name . "','". $email ."','". $password ."')";
 
 
 			
	if($con ->query($insQry))
	{
		
		echo "<script>
				alert('Inserted');
				window.location = 'AdminRegistration.php';
			</script>";
		
		}
	
	
	
	
	
	}





?>

 
 
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>AdminRegistration</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center" >AdminRegistration</h1>
  <table width="200" border="1" colspan="2" align="center">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" required autocomplete="off" pattern="[0-9a-zA-Z!@#$%^&*]{8,}"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="submit" name="btn_reset" id="btn_reset" value="cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>