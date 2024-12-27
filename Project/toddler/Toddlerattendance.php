<?php 
include("../Assets/Connection/Connection.php");
session_start();


if(isset($_POST["btn_submit"]))

	{	

		$date = $_POST["txt_date"];
		$intime = $_POST["txt_intime"]; 
		$outtime = $_POST["txt_outtime"];
			
					
					
$insQry = "insert into  tbl_toddlerattendance(attendance_date,toddler_intime,toddler_outtime,toddler_id)values('".$date ."','".$intime."','".$outtime."','".$_SESSION["tid"]."')";
	
	
		if($con -> query($insQry))	
				
		{
		
		echo "<script>
	   alert('Inserted');
	   window.location= 'Toddlerattendance.php';
	   </script>";
		
		}			
				
				
				}
				
				
				
$eid="";
$ename="";
$eguardian="";
$edate="";
$eintime="";
$eouttime="";
if(isset($_GET["eid"]))
{
	
	$sel ="select *from tbl_toddlerattendance where toddleratendance_id ='".$_GET["eid"]."'";
	$result=$con ->query($sel);
	 if($row = $result ->fetch_assoc())
	 {
		 $eid =$row["toddleratendance_id"];
		$edate =$row["attendance_date"];
		$eintime=$row["toddler_intime"];
		$eouttime=$row["toddler_outtime"];
	 }
	
	
	
}


if(isset($_GET["mid"]))
{
	
$update = "update tbl_toddlerattendance  set attendance_status ='1' where 	toddleratendance_id='".$_GET["mid"]."'";



		if($con ->query($update))
	{
		
		echo "<script>
				alert('mark');
				window.location = 'Toddlerattendance.php';
			</script>";
		
		}
	
}

if(isset($_GET["umid"]))


	{
	
	 $update = "update tbl_toddlerattendance  set attendance_status ='2' where toddleratendance_id='".$_GET["umid"]."'";



		if($con ->query($update))
	{
		
		echo "<script>
				alert('unmark');
				window.location ='Toddlerattendance.php';
			</script>";
		
		}
	

	}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 colspan="2" align="center">TODDLERATTENDANCE</h1>
  <table align="center" border="1">
    <tr>
      <td>Date</td>
      <td><label for="txt_date"></label>
      <input type="text" name="txt_date" id="txt_date" /></td>
    </tr>
    <tr>
      <td>Intime</td>
      <td><label for="txt_intime"></label>
      <input type="text" name="txt_intime" id="txt_intime" /></td>
    </tr>
    <tr>
      <td>0uttime</td>
      <td><label for="txt_outtime"></label>
      <input type="text" name="txt_outtime" id="txt_outtime" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
        <br /><br />
  <table  border="1" align="center">
    <tr>
      <td>SlNo</td>         
      <td>DATE</td>
       <td>INTIME</td>
       <td>OUTTIME</td>
      <td colspan="2" align="center">Action</td>
    </tr>
   <?php
	$i=0;
	 $sel ="select * from  tbl_toddlerattendance  m inner join   tbl_toddler t on t.toddler_id  = m.	toddler_id where attendance_status='0'";
     $result =$con -> query($sel);
	while($data = $result -> fetch_assoc())
	{
		$i++                            
		?>                         
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['attendance_date']?></td>
       <td><?php echo $data['toddler_intime']?></td>
      <td><?php echo $data['toddler_outtime']?></td>
      <td>
    <a href="Toddlerattendance.php?mid= <?php echo $data['toddleratendance_id']?>">mark</a>
  <a href="Toddlerattendance.php?umid= <?php echo $data['toddleratendance_id']?>">unmark</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>