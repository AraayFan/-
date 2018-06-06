<?php
header('content-type:text/html;charset=utf-8');
// session
// 开启session
session_start();
// 判断是否登录
if (isset($_SESSION['userInfo'])) {
    // 登陆了 可以进来
    var_dump($_SESSION);

} else {
    // 没有登录 打回登录页
    header('location:./02.login.html');
    // header('location:./index.php');
}

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
    form {
      display: inline-block;
    }

    .pagination {
      margin: 0;
    }

    .page-action {
      margin: 10px 0;
    }

    .navbar-brand img {
      max-width: 100%;
      max-height: 100%;
      border-radius: 50%;
    }

    ul.nav li img {
      width: 40px;
      margin: 5px;
      height: 40px;
      border-radius: 50%;
    }

    .img-a {
      padding: 0 !important;
    }

    .btn-batch {
      display: inline-block;
      margin: 10px;
    }

    .page-title {
      padding-bottom: 20px;
    }

    td {
      /* vertical-align:middle; */
      line-height: 90px !important;
      font-size: 30px;
    }

    th {
      font-size: 30px;
    }
  </style>
</head>

<body>
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
        <a class="navbar-brand" href="#">人员管理</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <form class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">搜索</button>
        </form>
        <ul class="nav navbar-nav navbar-right">

          <li>
            <a class='img-a' href="#"><?php echo $_SESSION['userInfo'][1]; ?>
              <img src="./images/icon/<?php echo $_SESSION['userInfo'][3]; ?>" alt="">
            </a>
          </li>
          <li>
            <a href="#">登陆</a>
          </li>
          <li>
            <a href="./04.doLogout.php">注销</a>
          </li>
          <li>
            <a href="#">回收站</a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>
  <div class="container-fluid">

    <div class="page-title">
      <h1>人员信息</h1>
    </div>
    <div class="page-action">
      <ul class="pagination pagination-sm pull-right">
        <li>
          <a href="#">上一页</a>
        </li>
        <li class='active'>
          <a href="#">1</a>
        </li>
        <li>
          <a href="#">2</a>
        </li>
        <li>
          <a href="#">3</a>
        </li>
        <li>
          <a href="#">下一页</a>
        </li>
      </ul>
    </div>
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th class="text-center" width="40">
            <input type="checkbox">
          </th>
          <th width='25%'>名字</th>
          <th width='25%'>头像</th>
          <th width='25%'>状态</th>
          <th width='25%' class="text-center" width="100">操作</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center">
            <input type="checkbox">
          </td>
          <td>丰饶女神德米特尔</td>
          <td>
            <img src="./images/icon/丰饶女神德米特尔_icon.png" alt="">
          </td>
          <td>待审核</td>
          <td class="text-center">
            <a href="javascript:void(0)" class="btn btn-lg btn-info ">通过</a>
            <a href="javascript:;" class="btn btn-lg btn-danger ">删除</a>
          </td>
        </tr>
        <tr>
          <td class="text-center">
            <input type="checkbox">
          </td>
          <td>黄道军双胞胎</td>
          <td>
            <img src="./images/icon/黄道军双胞胎_icon.png" alt="">
          </td>
          <td>通过</td>
          <td class="text-center">
            <a href="javascript:void(0)" class="btn btn-lg btn-warning ">驳回</a>
            <a href="javascript:;" class="btn btn-lg btn-danger ">删除</a>
          </td>
        </tr>

      </tbody>
    </table>
  </div>

</body>

</html>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="lib/js/jquery-1.12.4.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="lib/js/bootstrap.min.js"></script>