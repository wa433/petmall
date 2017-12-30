<?php
 require_once("init.php");
 @$uname=$_REQUEST['uname'];
 @$upwd=$_REQUEST['upwd'];
 @$cpwd=$_REQUEST['cpwd'];
 @$email=$_REQUEST['email'];
 @$phone=$_REQUEST['phone'];
 if($uname===null){
  die('uname required');
 }
 if($upwd===null){
  die('upwd required');
 }
 if($cpwd===null){
  die('cpwd required');
 }
 if($email===null){
  die('email required');
 }
 if($phone===null){
  die('phone required');
 }
 
 $sql="INSERT INTO pet_user VALUES(null,'$uname','$upwd','$email','$phone','',null,null)";
 $result=mysqli_query($conn,$sql);
 if($result===true){
  echo '{"code":200,"msg":"注册成功"}';
 }else{
  echo '{"code":201,"msg":"注册失败"}';
 };
 
?>