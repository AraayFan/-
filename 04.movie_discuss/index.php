<pre>
<?php
  // 首页不登陆也可以进来哦
  // 设置中文编码
  header('content-type:text/html;charset=utf-8');
  // 引入函数
  include_once './tool/tools.php';

  // 准备sql
  $sql = "select * from movieinfo";

  // 通过函数执行sql
  $data = my_SELECT($sql);

  // 渲染页面
  // var_dump($data);

  // 开启session
  session_start();

?>
</pre>
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
      .page-header{
      margin-top: 20px;
    }
    h1{
      margin: 0;
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
    .col-xs-4 img{
      width: 310px;
      height: 454px;
    }

  </style>
</head>

<body class='bg-warning'>
  <div class="page-header">
    <h1>首页</h1>
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
                <li><a href="#">首页</a></li>
              </ul>  
          <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <?php 
              // var_dump($_SESSION);
            ?>
            <li>
              <a href="./02.login.html" >
                <img src="./img/<?php echo isset($_SESSION['userInfo'])?$_SESSION['userInfo']['user_icon']:'admin.png'; ?>" alt="">
                <?php echo isset($_SESSION['userInfo'])?$_SESSION['userInfo']['user_name']:'登录'; ?>
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
    <?php for($i=0;$i<count($data);$i++):  ?>
      <div class="col-xs-4">
          <div class="jumbotron">
              <h3><?php echo $data[$i]['movie_title']; ?></h3>
              <p>评分: <span class="text-danger"><?php echo $data[$i]['movie_score']; ?></span></p>
              <p>关键字: <span class="text-info"><?php echo $data[$i]['movie_tags']; ?></span></p>
              <a href="<?php echo $data[$i]['movie_url']; ?>">
                  <img class='img-thumbnail' src="<?php echo $data[$i]['movie_img']; ?>" alt="...">
              </a>
              <?php if(isset($_SESSION['userInfo'])): ?>
                <p><a class="btn btn-primary btn-lg" href="./06.discuss.php?movieId=<?php echo $data[$i]['movie_id'];?>" role="button">查看评论</a></p>
              <?php endif; ?>
            </div>
      </div>
    <?php endfor; ?>
    </div>
  </div>
</body>

</html>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="lib/js/jquery-1.12.4.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="lib/js/bootstrap.min.js"></script>