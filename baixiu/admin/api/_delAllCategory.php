<?php
    require_once("../../config.php");
    require_once("../../function.php");

    $ids =$_POST["ids"];

    $connect = connect();

    $sql = "delete from categories where id in ('". implode("','", $ids) ."')";

    $result = mysqli_query($connect,$sql);

    $response = ["code" => 0,"msg" => "操作失败"];

    if($result){
        $response["code"] = 1;
        $response["msg"] = "操作成功";
    }
    
    header("content-type: application/json;charset=utf-8");
    echo json_encode($response);
?>