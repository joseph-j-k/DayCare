<?php  include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_submit"]))

	{		
					
					$name = $_POST["txt_day"];
					
					
					
	$insQry = " insert into  tbl_foodsection(foodsection_name) values ('".$name."')";
	
	
		if($con -> query($insQry))	
				
		{
		
		echo "<script>
	   alert('Inserted');
	   window.location= 'FoodSection.php';
	   </script>";
		
		}			
				
				
				}
			
			

if(isset($_GET["did"]))
{
	
	$del = "delete from  tbl_foodsection where foodsection_id  ='".$_GET["did"]."'";
	if($con -> query($del))
	{
		 
	echo "<script>
				alert('deleted');
				window.location = 'FoodSection.php';
			  </script>";
	}
	
	
	
	}


$eid="";
$ename="";
if(isset($_GET["eid"]))
{
	
	$sel ="select *from tbl_foodsection where foodsection_id ='".$_GET["eid"]."'";
	$result=$con ->query($sel);
	 if($row = $result ->fetch_assoc())
	 {
		 $eid =$row["foodsection_id"];
		 $ename =$row["foodsection_name"];
	 }
	
	
	
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Food Section</title>
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
<h1 align="center">FoodSection</h1>
  <table align ="center" border="1">
    <tr>
      <td>Day</td>
      <td><label for="txt_day"></label>
      <input type="text" name="txt_day" id="txt_day" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit"  id="btn_submit" value="Add" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel" /></td>
    </tr>
  </table>
    
  </table>
  <br /><br/>
  <table border="1" cols="2" align="center">
    <tr>
      <td>S1 NO</td>
      <td>DAY</td>
      <td>ACTION</td>
    </tr>
    <?PHP
	$i=0;
	$selQry ="select * from tbl_foodsection ";
	$result = $con -> query($selQry);
	while($data = $result -> fetch_assoc())
	{
		$i++
		?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $data['foodsection_name'] ?></td>
      <td>
      <a href="FoodSection.php?did=<?php echo $data['foodsection_id']?>" class="a">Delete</a>
      </td>
    </tr>
    <?php 
	}
	?>
  </table>
  
</form>
</body>
</html>