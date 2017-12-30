<?php
require_once("init.php");
@$email=$_REQUEST['email'];
if($email==null){
die("email required");
}
$sql="SELECT * FROM pet_user WHERE email='$email'";
 $result=mysqli_query($conn,$sql);
 if($result==false){
  echo '{"code":202,"msg":"查询失败"}';
 }else{
 
 $row=mysqli_fetch_row($result);
 if($row!=null){
 echo '{"code":201,"msg":"邮箱已存在!"}';
 }else{
 
  echo '{"code":200,"msg":"邮箱可用"}';
 }
 }
?>