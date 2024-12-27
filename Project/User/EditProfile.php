<?php 

include("../Assets/Connection/Connection.php");
session_start();
include("Head.php");

if(isset($_POST["btn_submit"]))
{
	$name = $_POST["txt_name"];
	$contact = $_POST["txt_contact"];
	$email = $_POST["txt_email"];
	
	
	
	$updQry = "update tbl_user set user_name = '".$name."', user_contact = '".$contact."', user_email = '".$email ."' where user_id='".$_SESSION["uid"]."'";
	
	
	if($con ->query($updQry))
	
	{
		echo" <script>
		alert('update');
		window.location = 'EditProfile.php';
		</script>";
		
	}
}
	

    ?>
    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
<style>

    form {
        width: 50%;
        margin: 50px auto;
        background-color: #ffffff;
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
<h1 colspan="2" align="center"> Edit Profile</h1>
<?php  
 $sel = "select * from tbl_user u inner join  tbl_place p on u.place_id = p.place_id inner join tbl_district d on d.district_id = p.district_id where user_id = '".$_SESSION["uid"]."'";
 $result = $con -> query($sel);
 if($data = $result -> fetch_assoc())
{

?>

  <table   colspan="2" align="center"> 
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name"value= "<?php echo $data["user_name"] ?>"/></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact"value="<?php echo $data["user_contact"] ?>" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email"value="<?php echo $data["user_email"] ?>"/></td>
    </tr>

    <tr>
     <td colspan="2" align="center">
    <label for="btn_submit"></label>
      <input type="submit" name="btn_submit"id="btn_submit" value="Edit" />
       <label for="btn_cancel"></label>
      <input type="reset" name="btn_cancel"id="btn_cancel"  value="cancel" />
      </td>
    </tr>
  </table>
  <?php } ?>
</form>
</body>
</html>

<?php include("Foot.php") ?>	