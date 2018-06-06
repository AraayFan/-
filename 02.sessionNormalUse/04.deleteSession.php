<?php
    // 开启session
    session_start();

    // 删除session 就是 删除 $_SESSION中的建对应的值即可
    // unset 一次只能删除一个键值对
    unset($_SESSION['foodList']);
    unset($_SESSION['chinaFood']);
    unset($_SESSION['chinaFood2']);

    // 暴力的删除 全部删掉
    // 使用频率 一般 
    // session_destroy();
?>