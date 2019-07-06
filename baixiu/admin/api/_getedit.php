<?php
require_once("../../config.php");
require_once("../../function.php");

$id = $_POST["id"];

$connect = connect();

$sql = "update categories set ";
// 遍历$_POST之前, 要把id先从数组中去掉
unset($_POST["id"]);
// 遍历$_POST数组, 把每个键和值拼接到sql语句中
foreach($_POST as $key => $value) {
    $sql .= "{$key}='{$value}',";
}
// 循环导致sql语句的末尾多了一个逗号, 先把逗号去掉
$sql = substr($sql, 0, -1);
$sql .= " where id = '{$id}'";

// echo $sql;

$result = mysqli_query($connect,$sql);
// print_r($sql);
// print_r($result);

$response = ["code" => 0,"msg" => "操作失败"];

if($result){
    $response["code"] = 1;
    $response["msg"] = "操作成功";
}

// print_r($response);

header("content-type: application/json;charset=utf-8");
echo json_encode($response);
?>