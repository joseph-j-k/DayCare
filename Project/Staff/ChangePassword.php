<?php 
 include("../Assets/Connection/Connection.php"); 
session_start();
include("Head.php");


if(isset($_POST["btn_submit"]))
		{
		$oldpassword = $_POST["txt_oldpassword"];
		$newpassword = $_POST["txt_newpassword"];
		$confirmpassword = $_POST["txt_confirmpassword"];
				
		
  $sel = "select * from  tbl_staff  where staff_id = '".$_SESSION["stid"]."'";
  $result = $con -> query($sel);
  $data = $result -> fetch_assoc();
  $DBpassword = $data["staff_password"];

	if($DBpassword == $oldpassword)
	{
		if($newpassword == $confirmpassword)
		
		
		{
			$update = "update tbl_staff set staff_password = '".$newpassword."' where staff_id = '".$_SESSION["stid"]."'";
			
			
	if ($con ->query($update))					
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
<title>Change Passwword</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }
    form {
        width: 100%;
        padding: 0;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);

    }


    h1 {
        color: #333;
        text-align: center;
        padding: 20px;
        font-size: 2.5em;
        margin-bottom: 20px;
    }

    table {
        width: 50%;
        border-collapse: collapse;
        margin: 0 auto;
        background-color: #E0F2F1;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        border-radius: 10px;
    }

    table, td {
        border: none;
        padding: 15px;
        text-align: left;
        font-size: 1.1em;
        background-color: #E0F2F1;
    }

    td {
        color: #555;
    }

    table tr:nth-child(odd) {
        background-color: #f9f9f9;
    }

    table img {
        border-radius: 50%;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .a {
        text-decoration: none;
        color: #fff;
        background-color: #64B5F6;
        padding: 10px 20px;
        border-radius: 5px;
        margin-right: 10px;
        font-weight: bold;
    }

    .a:hover {
        background-color: #218838;
    }

    td[colspan="2"] {
        text-align: center;
    }

</style>
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
<?php include("Foot.php") ?>	