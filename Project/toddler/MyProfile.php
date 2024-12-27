<?php  include("../Assets/Connection/Connection.php"); 

session_start();

 ?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h1 align="center">My Profile</h1>

<form id="form1" name="form1" method="post" action="">
<?php  
 $sel = "select * from tbl_toddler t inner join  tbl_place p on t.place_id = p.place_id inner join tbl_district d on d.district_id = p.district_id where 	toddler_id = '".$_SESSION["tid"]."'";
$result = $con -> query($sel);
  if($data = $result -> fetch_assoc())
{

?>
  <table align="center" border="1">
       <tr>
       <td colspan="2" align="center"><img src="../Assets/File/Toddler/<?php echo $data["toddler_photo"] ?>" height="300" width="300"/></td>
    <tr>
      <td>Name</td>
      <td><?php echo $data["toddler_name"]?></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><?php echo $data["toddler_gender"]?></td>
    </tr>
    <tr>
      <td>DOB</td>
      <td><?php echo $data["toddler_dob"]?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["toddler_contact"]?></td>
    <tr>
      <td>Email</td>
      <td><?php echo $data["toddler_email"]?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data["toddler_address"]?></td>
    </tr>
    <tr>
      <td>Guardian</td>
      <td><?php echo $data["toddler_guardian"]?></td>
    </tr>
    <tr>
      <td>DOJ</td>
      <td><?php echo $data["toddler_doj"]?></td>
      </tr>
    <tr>
      <td>Password</td>
      <td><?php echo $data["toddler_password"]?></td>
    </tr>
    <tr>
      <td>District</td>
      <td><?php echo $data["district_name"] ?></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><?php echo $data["place_name"] ?></td>
    </tr>
     <tr>
      <td colspan="2" align="center">
    <a href="">Edit Profile</a>
    <a href="">Change Password</a>
      </td>
    </tr>
  </table>
  <?php } ?>
</form>
</body>
</html>