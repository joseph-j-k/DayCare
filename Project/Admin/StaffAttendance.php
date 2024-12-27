<?php include("Head.php") ?>
<?php 
include("../Assets/Connection/Connection.php");


if(isset($_POST["btn_submit"]))

	{	
	    $date = $_POST['txt_date'];
		$intime = $_POST["txt_intime"]; 
		$outtime = $_POST["txt_outtime"];		
					
					
$insQry = "insert into  tbl_staffattendance(attendance_date,attendance_intime,attendance_outtime,staff_id)values('".$date ."','".$intime."','".$outtime."','".$_SESSION["stid"]."')";
	
	
		if($con -> query($insQry))	
				
		{
		
		echo "<script>
	   alert('Inserted');
	   window.location= 'StaffAttendance.php';
	   </script>";
		
		}			
				
				
				}
				
				
				
$eid="";
$edate="";
$eintime="";
$eouttime="";
if(isset($_GET["eid"]))
{
	
	$sel ="select *from tbl_staffattendance where attendance_id='".$_GET["eid"]."'";
	$result=$con ->query($sel);
	 if($row = $result ->fetch_assoc())
	 {
		 $eid =$row["attendance_id"];
		$edate =$row["attendance_date"];
		$eintime=$row["attendance_intime"];
		$eouttime=$row["attendance_outtime"];
	 }
	
	
	
}


if(isset($_GET["mid"]))
{
	
$update = "update  tbl_staffattendance  set attendance_status ='1' where attendance_id='".$_GET["mid"]."'";



		if($con ->query($update))
	{
		
		echo "<script>
				alert('mark');
				window.location = 'StaffAttendance.php';
			</script>";
		
		}
	
}

if(isset($_GET["umid"]))


	{
	
	 $update = "update tbl_staffattendance  set attendance_status ='2' where attendance_id='".$_GET["umid"]."'";



		if($con ->query($update))
	{
		
		echo "<script>
				alert('unmark');
				window.location ='StaffAttendance.php';
			</script>";
		
		}
	

	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Staff Attendance</title>
<style>

    h1 {
        text-align: center;
        color: #4CAF50;
        margin-top: 20px;
    }

    table {
        width: 70%;
        margin: 20px auto;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid #ddd;
        padding: 10px;
    }

    th {
        background-color: #4CAF50;
        color: white;
        text-align: center;
    }

    td {
        text-align: center;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    input[type="text"], input[type="time"] {
        width: 90%;
        padding: 8px;
        margin: 5px 0;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 12px 24px;
        cursor: pointer;
        font-size: 16px;
        border-radius: 5px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        margin-top: 10px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
        transform: scale(1.05);
    }

    form {
        background-color: white;
        padding: 20px;
        margin: 20px auto;
        width: 60%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .a {
        display: inline-block;
        color: white;
        text-decoration: none;
        padding: 2px;
        background-color: #4CAF50;
        border-radius: 5px;
        transition: background-color 0.3s ease, transform 0.2s ease;
        margin:5px
    }

    .a:hover {
        background-color: #45a049;
        transform: scale(1.05);
    }

    /* Mobile responsiveness */
    @media screen and (max-width: 768px) {
        table {
            width: 100%;
        }

        form {
            width: 90%;
        }
    }

</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">Staff Attendance</h1>
  <table align="center" border="1">
  <tr>
      <td>Date</td>
      <td><label for="txt_date"></label>
      <input type="radio" name="txt_date" id="txt_date" value="1" />Present
       <input type="radio" name="txt_date" id="txt_date" value="2" />Absent
      
      </td>
    </tr>
      <td>att&nbsp;intime</td>
      <td><label for="txt_intime"></label>
      <input type="time" name="txt_intime" id="txt_intime" value="<?php echo $eintime  ?>"/></td>
    </tr>
    <tr>
      <td>Att&nbsp;outtime</td>
      <td><label for="txt_outtime"></label>
      <input type="time" name="txt_outtime" id="txt_outtime" value="<?php echo $eouttime ?>" /></td>
    </tr>
    <tr>
      <td  colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
      <br /><br />
  <table  border="1" align="center">
    <tr>
      <td>SlNo</td> 
      <td>DATE</td>
      <td>Name</td>        
       <td>INTIME</td>
       <td>OUTTIME</td>
      <td colspan="2" align="center">Action</td>
    </tr>
   <?php
	 $i=0;
	 $sel ="select * from tbl_staffattendance  m inner join  tbl_staff s on s.staff_id  = m.staff_id where  attendance_status='0' ";
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
        <a href="StaffAttendance.php?mid=<?php echo $data['attendance_id']?>" class="a">Mark</a>
        <a href="StaffAttendance.php?umid=<?php echo $data['attendance_id']?>" class="a">Unmark</a>
      </td>
    </tr>
    <?php } ?>
  </table>

</form>
</body>
</html>
<?php include("Foot.php") ?>