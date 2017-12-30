<?php
require_once("init.php");
@$uname=$_REQUEST['uname'];
if($uname==null){
die("uname required");
}
$sql="SELECT * FROM pet_user WHERE uname='$uname'";
 $result=mysqli_query($conn,$sql);
 if($result==false){
  echo '{"code":201,"msg":"查询失败"}';
 }else{
 
 $row=mysqli_fetch_row($result);
 if($row!=null){
 echo '{"code":201,"msg":"用户名已存在!"}';
 }else{
 
  echo '{"code":200,"msg":"用户名可用"}';
 }
 }
?>