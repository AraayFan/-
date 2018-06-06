<?php
header('content-type:text/html;charset=utf-8');
// 引入函数
include_once './tool/tools.php';
// 接收数据
$userName = $_REQUEST['userName'];
$userPass = $_REQUEST['userPass'];

// 准备sql语句
$sql = "select * from chat_user where userName='$userName' and userPass='$userPass'";

// 调用函数 执行sql语句
$data = my_SELECT($sql);
// var_dump($data);

// 判断 结果集的行数
if(count($data)==1){
    // 为1 成功
    // 保存状态 记录已经登陆了
    session_start();
    // $_SESSION['isLogin']='yes';
    // 继续保存用户信息
    $_SESSION['userInfo'] = $data[0];
    // var_dump($data);
    // 去首页
    header('location:./index.php');

}else{
    // 为0 失败
    echo '<h2>用户名或密码错误</h2>';
    // echo '<a href="./02.login.html">返回登录页</a>';

}


