<?php

     // 为1 成功
    // 保存状态 记录已经登陆了
    session_start();
    // unset($_SESSION['isLogin']);
    // 继续保存用户信息
    unset($_SESSION['userInfo']);
    // 去首页
    header('location:./02.login.html');
?>