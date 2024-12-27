<?php 

include("../Assets/Connection/Connection.php");
session_start();
include("Head.php");

if(isset($_POST["btn_submit"]))
{
	
	$name = $_POST["txt_name"];
	$contact = $_POST["txt_contact"];
	$pincode = $_POST["txt_pincode"];
	$address = $_POST["txt_address"];
	$email = $_POST["txt_email"];
	
	
	
	
	
	$updQry = "update  tbl_staff   set staff_name = '".$name."',staff_contact = '".$contact."',staff_pincode = '".$pincode."'
	,staff_address = '".$address."',staff_email = '".$email."'where staff_id= '".$_SESSION["stid"]."'";
	
		
	if($con ->query($updQry))
	
	{
		echo" <script>
		alert('updated');
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
 $sel = "select * from tbl_staff st inner join  tbl_place p on st.place_id = p.place_id inner join tbl_district d on d.district_id = p.district_id where staff_id = '".$_SESSION["stid"]."'";
$result = $con -> query($sel);
  if($data = $result -> fetch_assoc())
{

?>
<table align="center">
  <tr>
    <td>Name</td>
    <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name"value= "<?php echo $data["staff_name"] ?>"/></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact"value= "<?php echo $data["staff_contact"] ?>"/></td>
  </tr>
  <tr>
    <td>Pincode</td>
    <td><label for="txt_pincode"></label>
      <input type="text" name="txt_pincode" id="txt_pincode"value= "<?php echo $data["staff_pincode"] ?>"/></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><label for="txt_address"></label>
      <input type="text" name="txt_address"id="txt_address"value= "<?php echo $data["staff_address"] ?>"/></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email"value= "<?php echo $data["staff_email"] ?>"/></td>
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