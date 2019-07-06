<?php


function checkLogin(){
    // 一定要记得, 如果要使用session就必须先开启
    session_start();
    // 先完成登录的验证 - 除了登录页面, 都需要做登录的验证
    // 1 没有isLogin这个key, 有isLogin, 但是值跟我们在登录的时候存储的不一样
    if(!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != 1){
        header("Location:login.php");
    }
}
function connect(){
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
    return $connect;
}

function query($connect,$sql){
    $result = mysqli_query($connect,$sql);
    return fecth($result);
}

function fecth($result){
    $arr = [];
    while($row = mysqli_fetch_assoc($result)){
        $arr[] = $row; 
      }
      return $arr;
}

?>