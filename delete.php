<?php
include("connection.php");

if(isset($_GET['id'])){
	$id = $_GET['id'];
}

$delete = mysqli_query($con, "DELETE FROM tblaccount WHERE ID = $id");

if(!$delete){
	die(mysqli_error());
}else{
	header("location: home.php?m=delete");
}

include("closeconnection.php");
