<?php
require_once("../../config.php");
require_once("../../function.php");

$connect = connect();

$sql = "SELECT * FROM categories";

$getArr = query($connect,$sql);

$response = ["code" => 0,"msg" => "操作失败"];

if($getArr){
    $response["code"] = 1;
    $response["msg"] = "登陆成功";
    $response["data"] = $getArr;

}

header("content-type: application/json;charset=utf-8");
echo json_encode($response);

?>