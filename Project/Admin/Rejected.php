<?php include("Head.php") ?>
<?php  include("../Assets/Connection/Connection.php"); 
 

if(isset($_GET["aid"]))
{
	
	 $update = "update tbl_staff set staff_status ='1' where staff_id='".$_GET["aid"]."'";



		if($con ->query($update))
	{
		
		echo "<script>
				alert('Accepted');
				window.location = 'Rejected.php';
			</script>";
		
		}
	
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rejact Staff</title>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f0f0f5;
        margin: 0;
        padding: 0;
        color: #333;
        width:100%;
    }

    h1 {
        text-align: center;
        color: #4CAF50;
        font-size: 36px;
        margin: 30px 0;
        font-weight: bold;
    }

    table {
        width: 90%;
        margin: 20px auto;
        border-collapse: collapse;
        background-color: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    table, th, td {
        border: 1px solid #ddd;
        padding: 15px;
        text-align: center;
    }

    th {
        background-color: #4CAF50;
        color: white;
        font-size: 18px;
    }

    td {
        font-size: 16px;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    img {
        border-radius: 50%;
    }

    .a {
        text-decoration: none;
        color: white;
        background-color: #4CAF50;
        padding: 8px 16px;
        border-radius: 5px;
        transition: background-color 0.3s, transform 0.3s;
        display: inline-block;
        margin: 5px;
    }

    .a:hover {
        background-color: #388E3C;
        transform: scale(1.05);
    }

    .action-buttons {
        display: flex;
        justify-content: space-around;
    }

    @media (max-width: 768px) {
        table {
            width: 100%;
        }

        td, th {
            font-size: 14px;
        }
    }
</style>
</head>

<body>

<form id="form1" name="form1" method="post" action="">
<h1 align="center">Rejected</h1>
  <table  border="1">
    <tr>
      <td>#</td>
      <td>PHOTO</td>
      <td>NAME</td>
      <td>GENDER</td>
      <td>QUALIFICATION</td>
      <td>ADDRESS</td>
      <td>CONTACT</td>
      <td>EMAIL</td>
       <td>ACTION</td>
    </tr>
 <?php
  $i=0;
 $sel ="select * from  tbl_staff st inner join  tbl_place p on st.place_id = p.place_id inner join tbl_district d on d.district_id = p.district_id where 
 staff_status='2' " ;
 
   $result =$con -> query($sel);
   while($data =$result-> fetch_assoc())
   {
	   $i++;
?>
    <tr>
      <td><?php echo $i ?></td>
      <td><img src="../Assets/File/Staff//<?php echo $data["staff_photo"]?>"height="50" width="50"/></td>
      <td><?php echo $data["staff_name"]?></td>
      <td><?php echo $data["staff_gender"] ?></td>
      <td><?php echo $data["staff_qualification"] ?></td>
      <td><?php echo $data["staff_address"] ?></td>
      <td><?php echo $data["staff_contact"] ?></td>
      <td><?php echo $data["staff_email"] ?></td>
      <td>      
      <a href="Rejected.php?aid=<?php echo $data ['staff_id'] ?>" class="a">Accept</a>
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