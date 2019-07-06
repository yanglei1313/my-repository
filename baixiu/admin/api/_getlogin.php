<?php
    require_once("../../config.php");
    require_once("../../function.php");

    $email = $_POST["email"];

    $password = $_POST["password"];

    $connect = connect();

    $sql = "SELECT * FROM users WHERE email = '{$email}' and `password` = '{$password}' and `status` = 'activated'";

    $postArr = query($connect,$sql);

    $response = ["code" => 0,"msg" => "操作失败"];

    if($postArr){
        session_start();
        $_SESSION["isLogin"] = 1;

        // $_SESSION["userId"] = $postArr[0]["id"];

        $response["code"] = 1;
        $response["msg"] = "登陆成功";
        $response["avatar"] = $postArr[0]["avatar"];
        $response["nickname"] = $postArr[0]["nickname"];
        $response["userId"] = $postArr[0]["id"];


    }

    

    header("content-type: application/json;charset=utf-8");
    echo json_encode($response);
