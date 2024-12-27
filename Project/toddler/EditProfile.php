<?php 

include("../Assets/Connection/Connection.php");
session_start();

if(isset($_POST["btn_submit"]))
{
	
	$name = $_POST["txt_name"];
	$contact = $_POST["txt_contact"];
	$address = $_POST["txt_address"];
	$email = $_POST["txt_email"];
	
	
	
	
	
	$updQry = "update tbl_toddler  set toddler_name = '".$name."',toddler_contact = '".$contact."',toddler_address = '".$address."', toddler_email= '".$email."' where	toddler_id = '".$_SESSION["tid"]."'";
	
	
	
	
	
		
	if($con ->query($updQry))
	
	{
		echo" <script>
		alert('updated');
		window.location ='EditProfile.php';
		</script>";
		
	}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 colspan="2" align="center"> Edit Profile</h1>
<?php  
 $sel = "select * from tbl_toddler t inner join  tbl_place p on t.place_id = p.place_id inner join tbl_district d on d.district_id = p.district_id where 	toddler_id = '".$_SESSION["tid"]."'";
 $result = $con -> query($sel);
  if($data = $result -> fetch_assoc())
{

?>
<table align="center" border="1">
  <tr>
    <td>Name</td>
    <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name"value= "<?php echo $data["toddler_name"] ?>"/></td>
  </tr>
  <tr>
    <td>Contact</td>
    <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact"value= "<?php echo $data["toddler_contact"] ?>"/></td>
  </tr>
  <tr>
    <td>Address</td>
    <td><label for="txt_address"></label>
      <input type="text" name="txt_address"id="txt_address"value= "<?php echo $data["toddler_address"] ?>"/></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email"value= "<?php echo $data["toddler_email"] ?>"/></td>
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