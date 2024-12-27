<?php 
include("../Assets/Connection/Connection.php"); 
session_start();
include("Head.php");

if(isset($_POST["btn_submit"]))
		{
		$newpassword = $_POST["txt_newpassword"];
		$confirmpassword = $_POST["txt_confirmpassword"];
				
		
  $sel = "select * from tbl_user where user_id = '".$_SESSION["uid"]."'";
  $result = $con -> query($sel);
  $data = $result -> fetch_assoc();
  $DBpassword = $data["user_password"];

		if($newpassword == $confirmpassword)
		
		
		{
			$update = "update tbl_user set user_password = '".$newpassword."' where user_id = '".$_GET["cid"]."'";
			
			
	if ($con -> query($update))					
		{


		echo "<script>
				alert('updated'); 
				window.location = 'Login.php';
				</script>";

				}

			}

        }


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>

    form {
        width: 50%;
        margin: 50px auto;
        padding: 50px;
        border-radius: 10px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        background-color: #E0F2F1;

    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 10px;
        text-align: left;
    }

    td:first-child {
        width: 30%;
        font-weight: bold;
        color: #555;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    input[type="submit"], input[type="reset"] {
        padding: 10px 20px;
        border: none;
        background-color: #28a745;
        color: white;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover, input[type="reset"]:hover {
        background-color: #218838;
    }

    input[type="reset"] {
        background-color: #dc3545;
    }

    input[type="reset"]:hover {
        background-color: #c82333;
    }

    td[colspan="2"] {
        text-align: center;
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table align ="center">
    
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

<?php include("Foot.php")?>