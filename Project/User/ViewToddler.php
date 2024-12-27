
<?php  include("../Assets/Connection/Connection.php"); ?>
<?php
session_start();
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f4f8; /* Light background */
        margin: 0;
        padding: 0;
    }

    h1 {
        color: #4CAF50; /* Green heading */
        text-align: center;
        margin-top: 20px;
        font-size: 36px;
    }

    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th, td {
        padding: 15px;
        text-align: center;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    img {
        border-radius: 50%;
    }

    a {
        text-decoration: none;
        color: #4CAF50;
        font-weight: bold;
    }

    a:hover {
        color: #388E3C;
    }

    @media (max-width: 768px) {
        table {
            width: 100%;
        }
    }
</style>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">View Toddler</h1>
  <table  border="1">
    <tr>
      <td>S1 NO</td>
      <td>PHOTO</td>
      <td>NAME</td>
      <td>GENDER</td>
      <td>DOB</td>
      <td>CONTACT</td>
      <td>ADDRESS</td>
      <td>GUARDIAN</td>
      <td>DOJ</td>
       <td>ACTION</td>
    </tr>
 <?php
  $i=0;
 $sel ="select * from  tbl_toddler t inner join  tbl_user u on t.user_id = u.user_id where t.user_id='".$_SESSION["uid"]."'";
 
   $result =$con -> query($sel);
   while($data =$result-> fetch_assoc())
   {
	   $i++;
?>
    <tr>
      <td><?php echo $i ?></td>
        <td><img src="../Assets/File/Toddler//<?php echo $data["toddler_photo"]?>"height="50" width="50"/></td>
      <td><?php echo $data["toddler_name"]?></td>
      <td><?php echo $data["toddler_gender"] ?></td>
      <td><?php echo $data["toddler_dob"] ?></td>
      <td><?php echo $data["toddler_contact"] ?></td>
      <td><?php echo $data["toddler_address"] ?></td>
      <td><?php echo $data["toddler_guardian"] ?></td>
      <td><?php echo $data["toddler_doj"] ?></td>
      <td>
      <a href="ViewAttendance.php?aid=<?php echo $data['toddler_id']?>">ViewAttendance</a>    
      </td>
    </tr>
    <?php 
	}
	?>
    <tr>
 
  </table>
</form>
</body>
</html>

<?php include("Foot.php") ?>