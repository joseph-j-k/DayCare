<?php  
include("Head.php");
include("../Assets/Connection/Connection.php"); 

if(isset($_POST["btn_submit"]))
{


	$place = $_POST["selPlace"];
  $location = $_POST["txt_loc"];
	$name = $_POST["txt_name"];
	$gender = $_POST["radio"];
	$age = $_POST["txt_age"];
	$contact = $_POST["txt_contact"];
	$email = $_POST["txt_email"];
	$password = $_POST["txt_password"];
	$photo = $_FILES["photo"]["name"];
	$temp = $_FILES["photo"]["tmp_name"];
	 move_uploaded_file($temp, '../Assets/File/User/' . $photo);
   $question = $_POST["selquestion"];
   $answer = $_POST["txt_answer"];
   



	$insQry = "INSERT INTO tbl_user(user_location,user_name,user_gender,user_age,user_contact,user_email,user_password,user_photo,place_id,user_squestion,user_sanswer)
	VALUES('". $location ."','". $name ."','" . $gender ."','". $age ."','". $contact ."','" . $email ."','". $password ."','".$photo."','". $place ."','". $question."','".$answer."')";
	
	
		if($con ->query($insQry))
	{
		
		echo "<script>
				alert('Inserted');
				window.location = 'UserRegistration.php';
			</script>";
		
		}
	
	
	
	
	
	}



?>

	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UserRegistration</title>
<style>
    body {
        background-color: #f0f2f5; /* Light gray background */
        font-family: Arial, sans-serif; /* Clean font */
    }

    form {
        max-width: 600px;
        margin: auto;
        background-color: #fff; /* White background for the form */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2); /* Subtle shadow */
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 10px;
        vertical-align: middle;
    }

    input[type="text"],
    input[type="file"],
    select {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    input[type="radio"] {
        margin-right: 10px;
    }

    input[type="submit"],
    input[type="reset"] {
        width: 120px;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #28a745; /* Green color */
        color: white;
        cursor: pointer;
        margin: 10px 5px;
    }

    input[type="reset"] {
        background-color: #dc3545; /* Red for cancel button */
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
        background-color: #218838; /* Darker green on hover for submit */
        color: white;
    }

    input[type="reset"]:hover {
        background-color: #c82333; /* Darker red on hover for reset */
    }
    
    select {
        appearance: none; /* For a consistent dropdown across browsers */
    }

    label {
        color: #555;
    }
    
    tr:nth-child(even) {
        background-color: #f9f9f9; /* Alternate row color for readability */
    }
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
<h1 colspan="2" align ="center">UserRegistration</h1>
  <table align="center" >
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
      <td>Location</td>
      <td><label for="txt_loc"></label>
      <input type="text" name="txt_loc" id="txt_loc" /></td>
    </tr>
    <tr>
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td>
      <input type="radio" name="radio" id="radio_male" value="male" />
      <label for="radio_male">Male
        <input type="radio" name="radio" id="radio_female" value="female" />
      Female</label></td>
    </tr>
    <tr>
      <td>Age</td>
      <td><label for="txt_age"></label>
      <input type="text" name="txt_age" id="txt_age" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact"  id="txt_contact" required pattern="[7-9]{1}[0-9]{9}"  title="Phone number with 7-9 and remaing 9 digit with 0-9" autocomplete="off" placeholder="+91"/>
     </td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" required autocomplete="off"  /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" required autocomplete="off" pattern="[0-9a-zA-Z!@#$%^&*]{8,}"/></td>
    </tr> 
    <tr>
      <td>Photo</td>
       <td><label for="photo"></label>
     	  <input type="file" name="photo" id="photo" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td>security question</td>
      <td><select name="selquestion" id="selquestion">
      <option value="">----Question-----</option>
        <option value="which is your fav colour">what is your fav colour</option>
        <option value="which is your fav place">what is your fav places</option>
        <option value="which is your fav flower">what is your fav flower</option></select></td>
    </tr>
    <tr>
      <td>Answer</td>
      <td><label for="txt_answer"></label>
      <input type="text" name="txt_answer" id="txt_answer" required autocomplete="off" /></td>
    </tr> 
    <tr>
      <td colspan="2" align="center">
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_reset" id="btn_reset" value="cancel" /></td>
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






 