<?php
require_once("../../config.php");
require_once("../../function.php");
//调用文件
$connect = connect();
//连接数据库
session_start();
//每次使session都必须先启动
$userId = $_SESSION["userId"];
//调用登陆时存入session的ID
$sql = "SELECT * FROM users WHERE id = '{$userId}'";

$postArr = query($connect, $sql);
//将数据库数据转化为二维数组
$response = ["code" => 0, "msg" => "操作失败"];
//默认返回操作失败
if ($postArr) {
    $response["code"] = 1;
    $response["msg"] = "操作成功";
    $response["avatar"] = $postArr[0]["avatar"];
    $response["nickname"] = $postArr[0]["nickname"];
}
//如果二维数组中有数据，修改返回值中的code和msg，一起将需要的数据返回
header("content-type: application/json;charset=utf-8");

echo json_encode($response);
//转化为JSON数据