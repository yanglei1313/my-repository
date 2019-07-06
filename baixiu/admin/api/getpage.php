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

$response = ["code" => 0,"msg" => "操作失败"];

if($result){
    $response["code"] = 1;
    $response["msg"] = "操作成功";
    $response["data"] = $result;
}
header("content-type: application/json");
echo json_encode($response);

?>