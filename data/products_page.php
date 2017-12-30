<?php
header("Content-Type:application/json;charset=utf-8");
require("init.php");
 @$pno = $_REQUEST["pno"];
 @$kw =$_REQUEST['kw'];
  //5:如果当前页码参数不存在则显示第一页
  if(!$pno){
    $pno = 1;
  }else{
    $pno = intval($pno);//将字符串数据转换整数js parseInt()
  }
  if(!$kw){
    $kw = "woju";
  }else{
    $kw = $kw;
  }
 $output = ["recodeCount"=>0,     //满足条件的总记录数
            "pageCount"=>0,        //总页数
            "pno"=>$pno,           //当前数据所有页码
            "data"=>null,          //当前页中的数据
            "pageSize"=>9, //每个页大小
            ];
if($kw=="woju"){
 $sql = "SELECT COUNT(*) FROM pet_woju_products";
 $result = mysqli_query($conn,$sql);
 $row = mysqli_fetch_row($result);
 $output["recodeCount"]=intval($row[0]);
 $output["pageCount"]=ceil($output["recodeCount"]/$output["pageSize"]);
 $start = ($output["pno"]-1)*$output["pageSize"];
 $count = $output["pageSize"];
 $sql="SELECT * FROM pet_woju_products LIMIT $start,$count";
 $rows=fetch_all($sql);
 $output["data"]=$rows;
 echo json_encode($output);
}else if($kw=='cloth'){
 $sql = "SELECT COUNT(*) FROM pet_cloth_products";
 $result = mysqli_query($conn,$sql);
 $row = mysqli_fetch_row($result);
 $output["recodeCount"]=intval($row[0]);
 $output["pageCount"]=ceil($output["recodeCount"]/$output["pageSize"]);
 $start = ($output["pno"]-1)*$output["pageSize"];
 $count = $output["pageSize"];
 $sql="SELECT * FROM pet_cloth_products LIMIT $start,$count";
 $rows=fetch_all($sql);
 $output["data"]=$rows;
 echo json_encode($output);
}else if($kw=='clean'){
  $sql = "SELECT COUNT(*) FROM pet_clean_products";
 $result = mysqli_query($conn,$sql);
 $row = mysqli_fetch_row($result);
 $output["recodeCount"]=intval($row[0]);
 $output["pageCount"]=ceil($output["recodeCount"]/$output["pageSize"]);
 $start = ($output["pno"]-1)*$output["pageSize"];
 $count = $output["pageSize"];
 $sql="SELECT * FROM pet_clean_products LIMIT $start,$count";
 $rows=fetch_all($sql);
 $output["data"]=$rows;
 echo json_encode($output);
}else if($kw=='food'){
  $sql = "SELECT COUNT(*) FROM pet_food_products";
 $result = mysqli_query($conn,$sql);
 $row = mysqli_fetch_row($result);
 $output["recodeCount"]=intval($row[0]);
 $output["pageCount"]=ceil($output["recodeCount"]/$output["pageSize"]);
 $start = ($output["pno"]-1)*$output["pageSize"];
 $count = $output["pageSize"];
 $sql="SELECT * FROM pet_food_products LIMIT $start,$count";
 $rows=fetch_all($sql);
 $output["data"]=$rows;
 echo json_encode($output);
}else if($kw=='toy'){
  $sql = "SELECT COUNT(*) FROM pet_toy_products";
 $result = mysqli_query($conn,$sql);
 $row = mysqli_fetch_row($result);
 $output["recodeCount"]=intval($row[0]);
 $output["pageCount"]=ceil($output["recodeCount"]/$output["pageSize"]);
 $start = ($output["pno"]-1)*$output["pageSize"];
 $count = $output["pageSize"];
 $sql="SELECT * FROM pet_toy_products LIMIT $start,$count";
 $rows=fetch_all($sql);
 $output["data"]=$rows;
 echo json_encode($output);
}else{
 $sql = "SELECT COUNT(*) FROM pet_products where title like '%".$kw."%'";
 $result = mysqli_query($conn,$sql);
 $row = mysqli_fetch_row($result);
 $output["recodeCount"]=intval($row[0]);
 $output["pageCount"]=ceil($output["recodeCount"]/$output["pageSize"]);
 $start = ($output["pno"]-1)*$output["pageSize"];
 $count = $output["pageSize"];
 $sql="SELECT title,price,sold_count,comment_count,href,img FROM pet_products where title like '%".$kw."%' LIMIT $start,$count";
 $rows=fetch_all($sql);
 $output["data"]=$rows;
 echo json_encode($output);
}
?>