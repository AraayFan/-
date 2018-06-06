<?php
    // 设置编码格式
    header('content-type:text/html;charset=utf-8');

    // 引入函数
    include_once './tool/tools.php';
    // 接收数据
    $userName = $_REQUEST['userName'];
    $userPass = $_REQUEST['userPass'];

    // 准备sql语句
    $sql = "select * from user where user_name ='$userName' and user_pass ='$userPass'";

    // 调用函数执行sql语句
    $data = my_SELECT($sql);

    // 判断结果
    if(count($data)==1){
        // 对->首页 保存session(用户信息)
        // 开启session
        session_start();
        $_SESSION['userInfo'] = $data[0];
        // 去首页
        header('location:./index.php');
    }else{
        // 错->登录页
        header('location:./02.login.html');
    }
?>