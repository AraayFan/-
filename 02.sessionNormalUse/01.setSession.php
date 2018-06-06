<?php
    // session的使用
    // 步骤1 必须 开启session
    session_start();

    // 所有对session的操纵 通过超全局变量即可
    $_SESSION['foodList'] = array('肠粉','艇仔粥','煲仔饭','隆江猪脚饭');
    $_SESSION['chinaFood'] = array('辣条','老干妈','北京烤鸭','南京盐水鸭','周黑鸭','啤酒鸭','绝味鸭脖');
    $_SESSION['chinaFood2'] = array('沙县','兰州拉面','木桶饭','黄焖鸡','麻辣烫');

    /*
        session常见面试题
            session跟cookie有关吗?
                有关系需要使用cookie保存一个 "钥匙"
            session数据保存的位置?
                服务器
    */
?>