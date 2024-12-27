<?php include("Head.php") ?>
<?php 
include("../Assets/Connection/Connection.php");
if (isset($_POST["btn_save"]))

{
	$hid = $_POST["txt_hidden"];
	$district = $_POST["txt_district"];
	
	
	
	if($hid!="")
	{
		$update = "update  tbl_district set district_name ='".$district."' where district_id ='".$hid."'";
		
		if($con -> query ($update))
		{
			echo "<script>
				alert('updated');
				window.location = 'District.php';
			  </script>";
		}
		
	}
	
else
{	
	
	$insQry ="insert into tbl_district(district_name) values ('".$district."')";
	
	if($con -> query($insQry))
	{
		echo "<script>
				alert('inserted');
				window.location = 'District.php';
			  </script>";
		}


	}
	
	
}
if(isset($_GET["did"]))
{
	
	$del = "delete from tbl_district where district_id ='".$_GET["did"]."'";
	if($con -> query($del))
	{
		 
	echo "<script>
				alert('deleted');
				window.location = 'District.php';
			  </script>";
	}
	
	
	
	}
	
$eid="";
$ename="";
if(isset($_GET["eid"]))
{
	
	$sel ="select *from tbl_district where district_id ='".$_GET["eid"]."'";
	$result=$con ->query($sel);
	 if($row = $result ->fetch_assoc())
	 {
		 $eid =$row["district_id"];
		 $ename =$row["district_name"];
	 }
	
	
	
	
	
	}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f4f7;
        color: #333;
    }

    .h1 {
        text-align: center;
        color: #4CAF50;
        font-size: 32px;
        margin-top: 20px;
    }

    table {
        width: 50%;
        margin: 0 auto;
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

    input[type="text"], input[type="hidden"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
        margin: 5px;
    }

    input[type="submit"]:hover {
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
<h1 align="center"> DISTRICT </h1>
  <table  border="1" align="center">
    <tr>
      <td>District&nbsp;Name</td>
      <td><label form="txt_district"></label>
      <input type="hidden" name="txt_hidden" id="txt_hidden" value="<?php echo $eid ?>"/> 
	  <input type="text" name="txt_district" id="txt_district" value="<?php echo $ename?>" /></td>
    </tr>
    <tr>
      <td colspan ="2" align="center">
      <input type="submit" name="btn_save" id="btn_save" value="save" />
      
      <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
    </tr>
  

  
  </table>
  <br /><br/>
  <table border="1" cols="2" align="center">
    <tr>
      <td>S1 NO</td>
      <td>DISTRICT</td>
      <td>ACTION</td>
    </tr>
    <?PHP
	$i=0;
	$selQry ="select * from tbl_district";
	$result = $con -> query($selQry);
	while($data = $result -> fetch_assoc())
	{
		$i++
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['district_name'] ?></td>
      <td>
      <a href="district.php?eid= <?php echo $data['district_id'] ?>" class="a">Edit </a>
      <a href="district.php?did= <?php echo $data['district_id'] ?>" class="a">delete </a>
      </td>
    </tr>
    <?php 
	}
	?>
  </table>
  
</form>
</body>
</html>
<?php include("Foot.php") ?>
