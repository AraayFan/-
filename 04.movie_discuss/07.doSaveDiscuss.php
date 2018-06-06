<pre>
    <?php
    // 设置编码
    header('content-type:text/html;charset=utf-8');

    // 引入函数
    include_once './tool/tools.php';

    // 接收数据
    $review_content = $_REQUEST['content'];
    $movie_id = $_REQUEST['movie_id'];
    // 接收图片
    $review_img = my_move_upload_file('picture','./img/');

    // 通过session获取用户id
    session_start();
    $user_id = $_SESSION['userInfo']['user_id'];

    // 准备sql
    $sql ="insert into moviereview (review_content,review_img,movie_id,user_id) values('$review_content','$review_img',$movie_id,$user_id)";
    // 执行sql
    $rowNum = my_ZSG($sql);
    // echo $rowNum;
    // 从哪来 回哪去
    header('location:'.$_SERVER['HTTP_REFERER']);

?>
</pre>