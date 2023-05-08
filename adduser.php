<?php include("connection.php"); ?>

<?php
  if(isset($_POST['submit_btn'])){
    $firstname = $_POST['txtfname'];
  	$middlename = $_POST['txtmname'];
  	$lastname = $_POST['txtlname'];
  	$birthdate = $_POST['birthdate'];
  	$gender = $_POST['gender'];
    $course = $_POST['course'];
    $address = $_POST['txtaddress'];

    $insert = mysqli_query($con,
      "INSERT INTO tblaccount (fname, mname, lname, gender, birthdate, course, address)
      VALUES('$firstname', '$middlename', '$lastname', '$gender', '$birthdate', '$course', '$address')
      ");

    if(!$insert){
		    die(mysqli_error($insert));
  	}else{
      header("location: home.php");
  	}
  }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Add User</title>
	</head>
	<body>
		<h1>Add User</h1>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<div><input type="text" name="txtfname" placeholder="FirstName"/></div>
			<div><input type="text" name="txtmname" placeholder="Middle Name"/></div>
			<div><input type="text" name="txtlname" placeholder="Last Name"/></div>
			<div><input type="date" name="birthdate" placeholder="Birthdate"/></div>
			<div>
				<input type="radio" name="gender" value="Male"/>Male
				<input type="radio" name="gender" value="Female"/>Female
      </div>
      <div>
          <select name="course">
              <option value="BSIT">Bachelor of Science in Information Technology</option>
              <option value="BSCS">Bachelor of Science in Computer Technology</option>
          </select>
      </div>
      <div>
        <input type="text" name="txtaddress" placeholder="Address"/>
      </div>
			<div><input type="submit" name="submit_btn" value="Register"/></div>
		</form>

	</body>
</html>

<?php include("closeconnection.php");?>
