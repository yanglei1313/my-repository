<?php
require_once("../../config.php");
require_once("../../functions.php");
// 连接数据库查询出分类相关的数据, 返回给前端即可

// 1 连接数据库
$connect = connect();
// 2 准备sql语句
$sql = "SELECT * FROM categories";
// 3 执行查询
$queryResult = query($connect, $sql);
//  4 判断是否查到数据, 返回前端
$response = ["code" => 0, "msg" => "操作失败"];
if($queryResult){
    $response["code"] = 1;
    $response["msg"] = "操作成功";
    $response["data"] = $queryResult;
}

// 5 以json格式返回数据
header("content-type: application/json;charset=utf-8");
echo json_encode($response);
?>
