<?php
require_once("../../config.php");
require_once("../../function.php");

$currentPage = $_POST["currentPage"];

$pageSize = $_POST["pageSize"];

$offset = ($currentPage - 1) * $pageSize;

$connect = connect();

$sql = "SELECT p.id,p.title,p.created,p.`status`,u.nickname,c.`name` FROM posts p
left JOIN users u ON u.id = p.user_id
LEFT JOIN categories c ON c.id = p.category_id
LIMIT {$offset},{$pageSize}";

$result = query($connect,$sql);

$countSql = "SELECT count(*) as count FROM posts";
// 执行总数的查询
$countArr = query($connect,$countSql);
$postCount = $countArr[0]['count'];
// 计算页码的最大值 = ceil(文章总数 / 每页的数据条数) -- 再计算最大页码数
$pageCount = ceil($postCount / $pageSize);

$response = ["code" => 0,"msg" => "操作失败"];

if($result){
    $response["code"] = 1;
    $response["msg"] = "操作成功";
    $response["data"] = $result;
    $response["pageCount"] = $pageCount;
}
header("content-type: application/json");
echo json_encode($response);
?>