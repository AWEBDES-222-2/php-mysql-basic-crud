<?php
  /*Step 1: Database Connection*/
  $con = mysqli_connect('localhost','root','');
  if(!$con){
    die(mysqli_error());
  }

  /*Step 2: Select a Database*/
  $db_select = mysqli_select_db($con, 'dbusers');
  if(!$db_select){
    die(mysqli_error());
  }
?>
