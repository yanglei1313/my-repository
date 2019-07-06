<?php 
require_once("../../config.php");
require_once("../../function.php");

$currentPage = $_POST["currentPage"];

$pageSize = $_POST["pageSize"];

$offset = ($currentPage - 1) * $pageSize;

$connect = connect();


$sql = "select c.id, c.author, c.content, c.created, c.`status`, p.title from comments c left join posts p on p.id = c.post_id limit {$offset}, {$pageSize} ";

$queryResult = query($connect,$sql);

$countSql = "select count(*) as count from comments";
$countArr = query($connect, $countSql);
$count = $countArr[0]['count'];
$pageCount = ceil($count / $pageSize);

$response = ["code" => 0,"msg" => "操作失败"];

if($queryResult){
    $response["code"] = 1;
    $response["msg"] = "操作成功";
    $response["data"] = $queryResult;
    $response["pageCount"] = $pageCount;
}

header("content-type: application/json;charset=utf-8");

echo json_encode($response);


// $currentPage = $_POST['currentPage'];
// $pageSize = $_POST['pageSize'];

// // 计算从哪里开始获取数据
// $offset = ($currentPage - 1) * $pageSize;

// // 连接数据库
// $connect = connect();

// // sql语句
// $sql = "select c.id, c.author, c.content, c.created, c.`status`, p.title from comments c left join posts p on p.id = c.post_id limit {$offset}, {$pageSize} ";

// // 执行sql语句
// $queryResult = query($connect, $sql);

// // 查询评论的总数
// $countSql = "select count(*) as count from comments";
// $countArr = query($connect, $countSql);
// $count = $countArr[0]['count'];
// // 计算页码的最大值 = ceil(文章总数 / 每页的数据条数)
// $pageCount = ceil($count / $pageSize);

// // 把结果返回给前端
// $response = ['code'=>0,"msg"=>"操作失败"];
// if($queryResult){
//     $response['code'] = 1;
//     $response['msg'] = "操作成功";
//     $response['data'] = $queryResult;
//     $response['pageCount'] = $pageCount;
// }

// header("content-type: application/json;charset=utf-8");
// echo json_encode($response);

?>