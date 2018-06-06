<?php
    // 开启
     session_start();
     unset($_SESSION['userInfo']);
     // 去首页
     header('location:./index.php');
?>