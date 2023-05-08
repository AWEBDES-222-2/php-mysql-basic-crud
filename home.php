<?php
  include('connection.php');

  /*Step 3: Retrieve Data*/
  $retrieve = mysqli_query($con, "SELECT * FROM tblaccount");
  if(!$retrieve){
    die(mysqli_error());
  }

  if(isset($_GET['m'])){
    if($_GET['m'] == "delete"){
      echo "<strong>Record deleted successfully!</strong><hr/>";
    }elseif($_GET['m'] == "update"){
      echo "<strong>Record updated successfully!</strong><hr/>";
    }
  }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Homepage</title>
	</head>
	<body>
		<h2>Account Records</h2>
		<table border="1" class="mytable">
      <thead>
        <tr>
          <th>ID</th>
          <th>Fullname</th>
          <th>Birthdate</th>
          <th>Gender</th>
          <th>Course</th>
          <th>Address</th>
          <th>Operation</th>
        </tr>
      </thead>
      <tbody>
          <?php
            while($row = mysqli_fetch_array($retrieve)){ ?>
              <tr>
                  <td><?php echo $row['ID']; ?></td>

                  <?php
                    $fullname = $row['fname'] . " " . $row['mname'] . " " . $row['lname'];
                    $date = date('F d, Y', strtotime($row['birthdate']));
                  ?>

                  <td><?php echo $fullname; ?></td>
                  <td><?php echo $date; ?></td>
                  <td><?php echo $row['gender']; ?></td>
                  <td><?php echo $row['course']; ?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td>
                    <a href="updateuser.php?id=<?php echo $row['ID']; ?>">Update</a>
                  </td>
              </tr>

          <?php } ?>
      </tbody>

        <tr>
		</table>
		<p><a href="adduser.php">Add New User</a></p>
	</body>
</html>
<?php include('closeconnection.php');?>
