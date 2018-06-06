<?php
    header('content-type:text/html;charset=utf-8');
    // 开启session
    session_start();

    // 取值直接使用超全局变量即可
    var_dump($_SESSION);

?>