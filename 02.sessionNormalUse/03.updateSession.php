<?php
    // 开启session
    session_start();

    // 修改session 直接重新赋值即可
    $_SESSION['foodList'] = array('梅州腌面','手打牛肉丸','福建人');
?>