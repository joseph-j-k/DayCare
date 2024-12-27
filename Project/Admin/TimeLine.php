<?php include("Head.php") ?>
<?php 
include("../Assets/Connection/Connection.php");



if(isset($_GET['aid']))
{
$_SESSION['ToddlerAtt'] = $_GET['aid'];
echo "<script>
window.location= 'TimeLine.php';
</script>";
 
}



if(isset($_POST["btn_submit"]))

	{	
		$attendence = $_POST['btn_attendence'];
		$intime = $_POST["txt_intime"]; 
		$outtime = $_POST["txt_outtime"];
		$hid = $_POST["txt_hidden"];
		
		
	if($hid == "")
	{
					
					
         $insQry = "insert into  tbl_toddlerattendance(attendance_date,toddler_intime,toddler_outtime,attendance_status,toddler_id)values(curdate(),'".$intime."','". $outtime."','".$attendence."','".$_SESSION['ToddlerAtt']."')";
	
		if($con -> query($insQry))	
				
		{
		
		echo "<script>
	   alert('Inserted');
	   window.location= 'TimeLine.php';
	   </script>";
		
		}
	
	}
		
	else
	  {
			
		
		    $update = "update tbl_toddlerattendance set attendance_date ='".$date."', toddler_intime = '".$intime."', toddler_outtime = '".            $outtime."' where toddleratendance_id  = '".$hid."'";
		
		
					if($con -> query($update))	
							
					{
					
					echo "<script>
				   alert('Updated');
				   window.location= 'TimeLine.php';
				   </script>";
					
					}			
	}
		
				
}
				
	
	
	$eid="";		
	$edate ="";
	$ein = "";
	$eout="";	
	
	if(isset($_GET["eid"]))	
	{
		
		$sel = "select * from tbl_toddlerattendance where toddleratendance_id  = '".$_GET["eid"]."'";
		$result = $con -> query($sel);
		if($row = $result -> fetch_assoc())
		{
			$eid = $row["toddleratendance_id"];
			$edate = $row["attendance_date"];
			$ein = $row["toddler_intime"];
			$eout = $row["toddler_outtime"];
			
			
			}
		
		
		}
			
			



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TimeLine</title>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            margin-top: 20px;
        }

        table {
            width: 60%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid aliceblue;
            padding: 8px;
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

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="time"] {
            padding: 8px;
            width: 90%;
        }

        form {
            background-color: white;
            padding: 20px;
            margin: 20px auto;
            width: 60%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .center {
            text-align: center;
        }

        .a {
			background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        .a:hover {
            text-decoration: underline;
        }

        /* Custom Radio Button Styling */
        .custom-radio {
            display: inline-block;
            margin-right: 15px;
            position: relative;
            padding-left: 35px;
            cursor: pointer;
            font-size: 16px;
            color: #333;
        }

        .custom-radio input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        .custom-radio .radio-btn {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #eee;
            border-radius: 50%;
            transition: 0.3s;
        }

        .custom-radio input:checked + .radio-btn {
            background-color: #4CAF50;
        }

        .custom-radio .radio-btn:after {
            content: "";
            position: absolute;
            display: none;
        }

        .custom-radio input:checked + .radio-btn:after {
            display: block;
        }

        .custom-radio .radio-btn:after {
            top: 6px;
            left: 6px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }

    </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 colspan="2" align="center">TODDLERATTENDANCE</h1>
  <table align="center">
    <tr>
      <td>Attendence</td>
      <td><label for="txt_intime"></label>
      <input type="radio" name="btn_attendence" id="btn_attendence" value="1" />Present
       <input type="radio" name="btn_attendence" id="btn_attendence" value="2" />Absent
      
      </td>
    </tr>
    
    <tr>
      <td>Intime</td>
      <td><label for="txt_intime"></label>
      <input type="time" name="txt_intime" id="txt_intime" value="<?php echo $ein ?>" /></td>
    </tr>
    <tr>
      <td>0uttime</td>
      <td><label for="txt_outtime"></label>
      <input type="time" name="txt_outtime" id="txt_outtime" value="<?php echo $eout ?>" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
        <br /><br />
  <table  align="center">
    <tr>
      <td>SlNo</td>         
      <td>DATE</td>
       <td>INTIME</td>
       <td>OUTTIME</td>
      <td colspan="2" align="center">Action</td>
    </tr>
   <?php
	$i=0;
	 $sel ="select * from tbl_toddlerattendance where toddler_id =  ".$_SESSION['ToddlerAtt'];
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
     <td><a href="TimeLine.php?eid=<?php echo $data['toddleratendance_id'] ?>" class="a">Edit</a></td>
      </td>
    </tr>
    <?php } ?>
  </table>
</form>
</body>
</html>

<?php include("Foot.php") ?>