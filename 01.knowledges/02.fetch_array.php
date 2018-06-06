<pre>
<?php
define('HOST','127.0.0.1');
define('USERNAME','root');
define('USERPASS','root');
define('DBNAME','test');
header('content-type:text/html;charset=utf-8');
    function my_SELECT($sql)
    {
        // 连接数据库
        $link = mysqli_connect(HOST, USERNAME, USERPASS,DBNAME);
        // 执行传入的sql语句
        $result = mysqli_query($link, $sql);
        // 解析结果
        // 0=>xxx,1=>xxx,2=>xx
        // 希望解析为 关系型数组
        $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
        // 关闭连接
        mysqli_close($link);
        // 返回
        return $data;
    }
    var_dump(my_SELECT("select * from chat_user"));
?>
</pre>