<?php
 require_once("init.php");
 @$wid=$_REQUEST['wid'];
 @$cid=$_REQUEST['cid'];
 @$fid=$_REQUEST['fid'];
 @$tid=$_REQUEST['tid'];
 @$yid=$_REQUEST['yid'];
 
 if($yid){
  $sql="SELECT * FROM pet_cloth_products WHERE yid=$yid";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  echo json_encode($row);
 }
 if($wid){
  $sql="SELECT * FROM pet_woju_products WHERE wid=$wid";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  echo json_encode($row);
 }
 if($fid){
  $sql="SELECT * FROM pet_food_products WHERE fid=$fid";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  echo json_encode($row);
 }
 if($cid){
  $sql="SELECT * FROM pet_clean_products WHERE cid=$cid";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  echo json_encode($row);
 }
 if($tid){
  $sql="SELECT * FROM pet_toy_products WHERE tid=$tid";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  echo json_encode($row);
 }
?>