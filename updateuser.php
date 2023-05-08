<?php
include("connection.php");

if(isset($_GET['id'])){
	$id = $_GET['id'];
}

if(isset($_POST['update_btn'])){
	$firstname = $_POST['txtfname'];
	$middlename = $_POST['txtmname'];
	$lastname = $_POST['txtlname'];
	$birthdate = $_POST['birthdate'];
	$gender = $_POST['gender'];
	$course = $_POST['course'];
	$address = $_POST['txtaddress'];

	$update = mysqli_query($con, "UPDATE tblaccount SET fname='$firstname', mname = '$middlename',
		lname = '$lastname', birthdate = '$birthdate', gender = '$gender', course = '$course',
		address = '$address' WHERE ID = $id");

	if(!$update){
		die(mysqli_error());
	}else{
		header("location: home.php?m=update");
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Update User</title>
	</head>
	<body>
		<h1>Update User</h1>
		<?php

		$result = mysqli_query($con, "SELECT * FROM tblaccount WHERE ID = $id");
		if(!$result){
			die(mysqli_error());
		}

		while($row = mysqli_fetch_array($result)){?>

		<form method="POST" action="updateuser.php?id=<?php echo $id; ?>">
			<div>
				<input type="text" name="txtfname" placeholder="First Name" value="<?php echo $row['fname']?>"/>
			</div>
			<div>
				<input type="text" name="txtmname" placeholder="Middle Name" value="<?php echo $row['mname']?>"/>
			</div>
			<div>
				<input type="text" name="txtlname" placeholder="Last Name" value="<?php echo $row['lname']?>"/>
			</div>
			<div>
				<input type="date" name="birthdate" placeholder="Birthdate" value="<?php echo $row['birthdate']?>"/>
			</div>
			<div>
				<input type="radio" name="gender" value="Male"
				<?php
					if($row['gender'] == "Male"){
						echo "checked";
					}
				?>
				/>Male
				<input type="radio" name="gender" value="Female"
				<?php
					if($row['gender'] == "Female"){
						echo "checked";
					}
				?>
				/>Female
			</div>
			<div>
					<select name="course">
							<option value="BSIT"
							<?php
								if($row['course'] == "BSIT"){
									echo "selected";
								}
							?>
							>Bachelor of Science in Information Technology</option>

							<option value="BSCS"
							<?php
								if($row['course'] == "BSCS"){
									echo "selected";
								}
							?>
							>Bachelor of Science in Computer Science</option>

							<option value="CBA"
							<?php
								if($row['course'] == "CBA"){
									echo "selected";
								}
							?>
							>Bachelor of Science in Business Administration</option>

							<option value="BSHRM"
							<?php
								if($row['course'] == "BSHRM"){
									echo "selected";
								}
							?>
							>Bachelor of Science in Hospitality Management</option>
					</select>
			</div>
			<div>
				<input type="text" name="txtaddress" placeholder="Address" value="<?php echo $row['address']?>"/>
			</div>
			<br/>
			<div>
				<input type="submit" name="update_btn" value="Update"/>
				<a href="delete.php?id=<?php echo $row['ID']; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
			</div>
		</form>
		<?php } ?>
	</body>
</html>
<?php include("closeconnection.php");?>
