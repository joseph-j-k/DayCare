<?php  include("../Assets/Connection/Connection.php"); 

session_start();
include("Head.php");
 ?>

 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile</title>
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
<?php  
 $sel = "select * from tbl_user u inner join  tbl_place p on u.place_id = p.place_id inner join tbl_district d on d.district_id = p.district_id where user_id = '".$_SESSION["uid"]."'";
 $result = $con -> query($sel);
 if($data = $result -> fetch_assoc())
{

?>
  <table  border="1" align="center">
    <tr>
      <td colspan="2" align="center"><img  src="../Assets/File/User/<?php echo $data["user_photo"] ?>" height="300" width="300"/></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><?php echo $data["user_name"] ?></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><?php echo $data["user_gender"] ?></td>
    </tr>
    <tr>
      <td>Age</td>
      <td><?php echo $data["user_age"] ?></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><?php echo $data["user_contact"] ?></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><?php echo $data["user_email"] ?></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><?php echo $data["user_password"] ?></td>
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
      <a href="EditProfile.php" class="a">Edit Profile</a>
      <a href="ChangePassword.php" class="a">Change Password</a>
      </td>
    </tr>
  </table>
   <?php } ?>
</form>
</body>
</html>		
<?php include("Foot.php") ?>										