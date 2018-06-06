<?php
    // 设置中文编码
    header('content-type:text/html;charset=utf-8');

    // 引入函数
    include_once './tool/tools.php';

    // 接收数据
     $userName =$_REQUEST['userName'];
     $userPass =$_REQUEST['userPass'];
    // 准备sql
    // 常见垃圾密码 111111 123456 888888 66666 生日
    // 常见高级密码 !@#$%^&*() 123456 !@#$%^
    $sql_select = "select * from user where user_name ='$userName'";

    // 执行sql->判断用户名是否被注册
    $data = my_SELECT($sql_select);

    if(count($data)==1){
        // 已被注册 提示用户
        echo '<h2>老铁,这个名字已被使用</h2>';
        echo "<h3>要不你用!! $userName 狂抓酷炫吊炸天</h3>";
        echo '<a href="./04.register.html">点我返回注册页</a>';
    }else{
        // 未被注册 继续注册
        // 保存图片
        $userIcon = my_move_upload_file('userIcon','./img/');
        // 准备插入的sql
        $sql_insert = "insert into user (user_name,user_pass,user_icon) values ('$userName','$userPass','$userIcon')";
        // 执行插入的sql
        echo  my_ZSG($sql_insert);
        // 去登录页
        header('location:./02.login.html');
    }



?>