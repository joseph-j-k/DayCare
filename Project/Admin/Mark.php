<?php include("Head.php") ?>
<?php  include("../Assets/Connection/Connection.php"); 

if(isset($_GET["umid"]))


	{
	
	 $update = "update tbl_staffattendance  set attendance_status ='2' where attendance_id='".$_GET["umid"]."'";



		if($con ->query($update))
	{
		
		echo "<script>
				alert('Unmarked');
				window.location ='Mark.php';
			</script>";
		
		}
	

	}




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staff Attendance Mark</title>
<style>
    

    h1 {
        color: #fff;
        background-color: #4CAF50;
        text-align: center;
        padding: 5px;
        border-radius: 10px;
        width: 20%;
        margin: 20px auto;
    }

    table {
        width: 70%;
        margin: 30px auto;
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: center;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .a {
        color: #ff4d4d;
        text-decoration: none;
        padding: 5px 10px;
        border: 1px solid #ff4d4d;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .a:hover {
        background-color: #ff4d4d;
        color: white;
    }

    form {
        width: 100%;
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">Mark</h1>
<table  align="center">
    <tr>
      <td>SlNo</td>         
      <td>DATE</td>
      <td>NAME</td>
       <td>INTIME</td>
       <td>OUTTIME</td>
      <td colspan="2" align="center">Action</td>
    </tr>
   <?php
	$i=0;
	 $sel ="select * from tbl_staffattendance  m inner join  tbl_staff s on s.staff_id  = m.staff_id where  attendance_status='1'";
     $result =$con -> query($sel);
	while($data = $result -> fetch_assoc())
	{
		$i++                            
		?>                         
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['attendance_date']?></td>
      <td><?php echo $data['staff_name']?></td>
       <td><?php echo $data['attendance_intime']?></td>
      <td><?php echo $data['attendance_outtime']?></td>
      <td>
      <a href="Mark.php?umid=<?php echo $data["attendance_id"]?>" class="a">Unmark</a>
      </td>
    </tr>
    <?php } ?>    <tr>
 
  </table>
</form>
</body>
</html>

<?php include("Foot.php") ?>