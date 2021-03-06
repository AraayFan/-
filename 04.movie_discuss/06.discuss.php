<?php
// 判断是否登录
// 开启session
session_start();
// 判断是否登录
if (isset($_SESSION['userInfo'])) {
    // 是
    // header('location:./06.discuss.php');
} else {
    // 否 去登录页 首页
    header('location:./02.login.html');
}

// 代码如果可以执行到这里 说明登录成功了
// 查询逻辑即可
// 引入函数
include_once './tool/tools.php';
// 接收数据
$movieId = $_REQUEST['movieId'];
// 准备sql
$sql = "select * from movieinfo where movie_id = $movieId";
// 执行sql
$data = my_SELECT($sql)[0];
// 渲染页面
// var_dump($data);

// 根据电影id 连表查询出 评论的信息
$sql_discuss = "
  select
  moviereview.review_content,
  moviereview.review_img,
  user.user_name,
  user.user_icon
  from moviereview
  inner join user
  on moviereview.user_id = user.user_id
  where movie_id = $movieId";

$discussData = my_SELECT($sql_discuss);
// var_dump($discussData);

?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap 101 Template</title>

  <!-- Bootstrap -->
  <link href="lib/css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
  <style>
    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
      border: 1px solid rgba(0, 0, 0, 0);
    }

    .page-header {
      margin-top: 20px;
    }

    h1 {
      margin: 0;
    }

    body {
      display: flex;
      flex-direction: column;
    }

    .container-fluid {
      width: 100%;
      flex: 1;
    }

    .row {
      height: 100%;
    }

    .col-xs-8 {
      height: 100%;
    }

    .bg-success {
      height: 80%;
      overflow-y: scroll;
      padding-top: 10px;
    }

    .text-muted {
      font-size: 12px;
    }
    .media-object{
      width: 80px !important;
      height: 80px !important;
    }
    .navbar-right li:first-child a{
      padding: 0 !important;
    }
    .navbar-right img{
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin-right: 10px;
    }
    .media-body img{
      max-width:500px;
    }
  </style>
</head>

<body class='bg-warning'>
  <div class="page-header">
    <h1>评论</h1>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
            aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="./index.php">首页</a></li>
              </ul>
          <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="#" >
                <img src="./img/<?php echo $_SESSION['userInfo']['user_icon']; ?>" alt="">
                  <?php echo $_SESSION['userInfo']['user_name']; ?>
                </a>
            </li>
            <li><a href="./03.doLogout.php">注销</a></li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-4">
        <div class="jumbotron">
          <h3><?php echo $data['movie_title']; ?></h3>
          <p>评分: <span class="text-danger"><?php echo $data['movie_score']; ?></span></p>
          <img class='img-thumbnail' src="<?php echo $data['movie_img']; ?>" alt="...">
        </div>
      </div>
      <div class="col-xs-8 info">
        <div class="container-fluid bg-success">
          <!-- 聊天内容 -->
          <?php for ($i = 0; $i < count($discussData); $i++): ?>
            <div class="media">
              <div class="media-left">
                <a href="#">
                      <img class="media-object" src="img/<?php echo $discussData[$i]['user_icon']; ?>" alt="...">
                    </a>
              </div>
              <div class="media-body">
                <h4 class="media-heading"><?php echo $discussData[$i]['user_name']; ?></h4>
                <p>
                  <?php echo $discussData[$i]['review_content']; ?>
                </p>
                <p>
                  <img src="img/<?php echo $discussData[$i]['review_img']; ?>" alt="">
                </p>
              </div>
            </div>
          <?php endfor;?>
        </div>
        <form action="./07.doSaveDiscuss.php" method="post" enctype="multipart/form-data" >
        <input type="hidden" name="movie_id" value="<?php echo $movieId; ?>">
        <div class="input-group">
            <input style="width:95%;" type="text" name="content" class="form-control" placeholder="Search for...">
            <span style="position: absolute;font-size:30px;" class="my-icon glyphicon glyphicon-picture"></span>
            <input style="width:5%;opacity: 0;" type="file" name="picture" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
            <button class="btn btn-danger" type="submit">发表评论</button>
          </span>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="lib/js/jquery-1.12.4.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="lib/js/bootstrap.min.js"></script>