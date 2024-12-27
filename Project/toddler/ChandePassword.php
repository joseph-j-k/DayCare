<?php 
 include("../Assets/Connection/Connection.php"); 
session_start();


if(isset($_POST["btn_submit"]))
		{
		$oldpassword = $_POST["txt_oldpassword"];
		$newpassword = $_POST["txt_newpassword"];
		$confirmpassword = $_POST["txt_confirmpassword"];
				
		
  $sel = "select * from tbl_toddler where 	toddler_id = '".$_SESSION["tid"]."'";
  $result = $con -> query($sel);
  $data = $result -> fetch_assoc();
  $DBpassword = $data["toddler_password"];

	if($DBpassword == $oldpassword)
	{
		if($newpassword == $confirmpassword)
		
		
		{
			$update = "update tbl_toddler set toddler_password = '".$newpassword."' where toddler_id = '".$_SESSION["tid"]."'";
			
			
	if ($con -> query($update))					
		{


		echo "<script>
				alert('updated'); 
				window.location = 'ChangePassword.php';
				</script>";

				}

			}


		else
			{


		echo "<script>
				alert('password mismatch'); 
				window.location = 'ChangePassword.php';
				</script>";



				}


		}


	else
		{
        		echo "<script>
				alert('password incorrect'); 
				window.location = 'ChangePassword.php';
				</script>";
		}

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">ChangePassword</h1>
  <table align ="center" border="1">
    <tr>
      <td>Old&nbsp;Password</td>
      <td><label for="txt_oldpassword"></label>
      <input type="text" name="txt_oldpassword" id="txt_oldpassword" /></td>
    </tr>
    <tr>
      <td>New&nbsp;Password</td>
      <td><label for="txt_newpassword"></label>
      <input type="text" name="txt_newpassword" id="txt_newpassword" /></td>
    </tr>
    <tr>
   <td>Confirm&nbsp;Password</td>
   <td><label for="txt_confirmpassword"></label>
 <input type="text" name="txt_confirmpassword" id="txt_confirmpassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>
