<?php include("Head.php") ?>
<?php 
include("../Assets/Connection/Connection.php");


if(isset($_POST["btn_submit"]))

	{		
		$date = $_POST["txt_date"];
		$activities = $_POST["selduty"]; 		
					
					
	$insQry = " insert into  tbl_assignduty(assign_date,dutytype_id,staff_id)values('".$date."','".$activities."','".$_SESSION["stid"]."')";
	
	
		if($con -> query($insQry))	
				
		{
		
		echo "<script>
	   alert('Inserted');
	   window.location= 'Assignduty.php';
	   </script>";
		
		}			
				
				
				}
				
				
				

if(isset($_GET["did"]))
{
	
	$del = "delete from tbl_assignduty where assign_id  ='".$_GET["did"]."'";
	if($con -> query($del))
	{
		 
	echo "<script>
				alert('deleted');
				window.location = 'Assignduty.php';
			  </script>";
	}
	
	
	
	}


				
$eid="";
$edate="";
if(isset($_GET["eid"]))
{
	
	$sel ="select *from tbl_assignduty where assign_id='".$_GET["eid"]."'";
	$result=$con ->query($sel);
	 if($row = $result ->fetch_assoc())
	 {
		 $eid =$row["assign_id"];
		$edate =$row["assign_date"];
	 }
	
	
	
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Assign Duity</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f4f7;
        color: #333;
    }

    h1 {
        text-align: center;
        color: #4CAF50;
        font-size: 32px;
        margin-top: 20px;
    }

    table {
        width: 60%;
        margin: 20px auto;
        border-collapse: collapse;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    table, th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: center;
    }

    th {
        background-color: #4CAF50;
        color: white;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    input[type="text"], select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"], input[type="reset"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
        margin: 5px;
    }

    input[type="submit"]:hover, input[type="reset"]:hover {
        background-color: #45a049;
    }

    .a {
        color: #4CAF50;
        text-decoration: none;
        font-weight: bold;
    }

    .a:hover {
        color: #45a049;
        text-decoration: underline;
    }

    .action-links {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .form-container {
        width: 50%;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
<h1 align="center">AssignDuty</h1>
  <table align="center" border="1">
    <tr>
    <td>Dutytype</td>
     <td>
      <select name="selduty" id="selduty">
      <option>---Select---</option>
        <?php 
	  $sel = "select * from  tbl_dutytype";
	  $result = $con -> query($sel);
	  while($data = $result -> fetch_assoc())
	  {
	  
	  ?>
      <option value="<?php echo $data["dutytype_id"] ?>"><?php echo $data["dutytype_activities"]?></option>
      <?php } ?>
      </select>
      
      </td>
    </tr>
    <tr>
    <td>Date</td>
    <td><label for="txt_date"></label>
     <input type="text" name="txt_date" id="txt_date" /></td>
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
      <td>DUTYTYPE</td>
      <td>DATE</td>
      <td colspan="2" align="center">Action</td>
    </tr>
   	<?php 
	$i=0;
	$sel = "select * from tbl_assignduty a inner join  tbl_dutytype d on d.dutytype_id = a.dutytype_id where staff_id = '".$_SESSION["stid"]."'";
	$result = $con -> query($sel);
	while($data = $result -> fetch_assoc())
	{
		$i++;
	?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['dutytype_activities']?></td>
      <td><?php echo $data['assign_date']?></td>
      <td>
      <a href="Assignduty.php?did=<?php echo $data['assign_id']?>" class="a">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </table> 
</form>
</body>
</html>

<?php include("Foot.php") ?>