<?php  include("../Assets/Connection/Connection.php"); ?>

<?php 
session_start();
include("Head.php");
if(isset($_POST["btn_submit"]))
{
	$place = $_POST["selPlace"];
	$boarding = $_POST["selname"];
  $location =$_POST["txt_loc"];
	$name = $_POST["txt_name"];
	$gender = $_POST["radio"];
	$dob = $_POST["txt_dob"];
	$contact = $_POST["txt_contact"];
	$address = $_POST["txt_address"];
	$guardian = $_POST["txt_guardian"];
	$doj = $_POST["txt_doj"]; 
	$photo = $_FILES["photo"]["name"];
	$temp = $_FILES["photo"]["tmp_name"];
	 move_uploaded_file($temp, '../Assets/File/Toddler/' . $photo);
	
	
	
	$insQry = "INSERT INTO  tbl_toddler(toddler_location,toddler_name,toddler_gender,toddler_dob,toddler_contact,toddler_address,	toddler_guardian,toddler_doj,toddler_photo,place_id,boardingtype_id,user_id) 
	 VALUES('" . $location. "','" . $name . "', '" . $gender . "', '" . $dob . "', '" . $contact . "','" . $address . "','" . $guardian . "','" . $doj . "','" . $photo . "', '" . $place . "','". $boarding ."','".$_SESSION["uid"]."')";

	if($con ->query($insQry))
	{
		
		echo "<script>
				alert('Inserted');
				window.location = 'ToddlerRegistration.php';
			</script>";
		
		}
	
	
	
	
	
	}





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Toddler Registration</title>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #E0F2F1;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }

  h1 {
    text-align: center;
    color: #2C3E50;
    font-weight: bolder;
    margin-bottom: 20px;
  }

  table {
    width: 600px;
    background-color: #E0F2F1;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    border: 1px solid #ddd;
  }
  form {
        width: 60%;
        margin: 50px auto;
        padding: 50px;
        border-radius: 10px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        background-color: #E0F2F1;

    }

  td {
    padding: 12px;
    font-size: 16px;
    color: #333;
    vertical-align: top;
  }

  input[type="text"], input[type="file"], select {
    width: 100%;
    padding: 10px;
    margin-top: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 14px;
  }

  input[type="radio"] {
    margin-right: 8px;
  }

  input[type="submit"], input[type="reset"] {
    width: 120px;
    padding: 10px;
    color: white;
    background-color: #2C3E50;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
  }

  input[type="reset"] {
    background-color: #e74c3c;
  }

  input[type="submit"]:hover {
    background-color: #34495e;
  }

  input[type="reset"]:hover {
    background-color: #c0392b;
  }

  tr:nth-child(even) {
    background-color: #f8f9fa;
  }

  tr:nth-child(odd) {
    background-color: #ffffff;
  }

  /* Improved Responsive Design */
  @media only screen and (max-width: 768px) {
    table {
      width: 95%;
    }

    input[type="text"], input[type="file"], select {
      font-size: 15px;
    }

    td {
      font-size: 15px;
    }
  }

</style>
</head>

<body>
<form id="form1" name="form1" method="post" action=""	 enctype="multipart/form-data">
  <h1 align="center">Register Toddler </h1>
  <table   align="center">
    <tr>
      <td>District</td>
      <td><select name="selDistrict" id="selDistrict" onchange="getPlace(this.value)">
          <option>---District---</option>
          <?php 
          $sel = "select * from tbl_district";
          $result = $con -> query($sel);
          while($data = $result -> fetch_assoc())
          {
          ?>
          <option value="<?php  echo $data["district_id"]?>">
          <?php  echo $data["district_name"]?>
          </option>
          <?php } ?>
        </select></td>
    </tr>
    <tr>
      <td>Place</td>
      <td><select name="selPlace" id="selPlace">
          <option>---Place---</option>
        </select></td>
    </tr>
    <tr>
      <td>location</td>
      <td><label for="txt_loc"></label>
      <input type="text" name="txt_loc" id="txt_loc" /></td>
    </tr>
    <tr>
     <td>Boardingtype</td>
           <td>
      <select name="selname" id="selname">
      <option>---Select---</option>
      <?php 
	  $sel = "select * from  tbl_boardingtype";
	  $result = $con -> query($sel);
	  while($data = $result -> fetch_assoc())
	  {
	  
	  ?>
          <option value="<?php echo $data["boardingtype_id"] ?>"><?php echo $data["boardingtype_name"]?></option>
      <?php } ?>
      </select>
      </td>
    </tr>
    <tr>
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
        <input type="text" name="txt_name"  id="txt_name" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><label for="radio_male">Male</label>
        <input type="radio" name="radio" id="radio" value="male" />
        <label for="radio_female">Female</label>
        <input type="radio" name="radio" id="radio" value="female" /></td>
    </tr>
    <tr>
      <td>DOB</td>
      <td><label for="txt_dob"></label>
      <input type="date" name="txt_dob" id="txt_dob" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
        <input type="text" name="txt_contact" id="txt_contact" required pattern="[0-9]{10,10}"  title="Phone number with 7-9 and remaing 9 digit with 0-9"  autocomplete="off" placeholder="+91" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <input type="text" name="txt_address" id="txt_address" /></td>
    </tr>
    <tr>
      <td>Guardian</td>
      <td><label for="txt_guardian"></label>
      <input type="text" name="txt_guardian" id="txt_guardian" /></td>
    </tr>
    <tr>
      <td>DOJ</td>
      <td><label for="txt_doj"></label>
      <input type="date" name="txt_doj" id="txt_doj" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="photo"></label>
     	  <input type="file" name="photo" id="photo" /></td>
    </tr>
    
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input type="reset" name="btn_reset" id="btn_reset" value="Cancel" /></td>
    </tr>
  </table>
</form>
<script src="../Assets/JQ/jQuery.js"></script> 
<script>
function getPlace(did)
{
	
	$.ajax({
		
		url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
		success: function(html){
			$("#selPlace").html(html);
			
			
			}
		
		
		
		});
	
	
	}
	
</script>
 
</body>
</html>
<?php include("Foot.php") ?>
 