<?php 
require dirname(dirname(__FILE__)) . '/helper.php';
require dirname(dirname(__FILE__)) . '/dbLink.class.php';
require dirname(dirname(__FILE__)) . '/UserIdentity.php';
?>
    
<?php 

UserIdentity::autoLogin();

if (!UserIdentity::isLogin()){
    header('Location:login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>个人中心</title>

    <link href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/metisMenu/2.6.2/metisMenu.min.css" rel="stylesheet" >

  </head>
  <body>
    
    <!-- 头部导航-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div style="padding-top: 100px;">
        
        <div class="container">
            <div class="row">
                
                <div class="col-md-2">
                    <nav class="navbar navbar-default">
                        <ul class="metismenu nav" id="menu">
                            <li class="active">
                                <a href="">首页</a>
                            </li>
                            <li class="divider"></li>

                            <li>
                                <a class="has-arrow" href="javascript:;" aria-expanded="false">分类管理</a>
                                <ul aria-expanded="false" class="nav nav-sub-level">
                                    <li><a href="">添加分类</a></li>
                                    <li><a href="">分类列表</a></li>
                                </ul>
                            </li>

                            <li>
                                <a class="has-arrow" href="javascript:;" aria-expanded="false">文章管理</a>
                                <ul aria-expanded="false" class="nav nav-sub-level">
                                    <li><a href="">添加文章</a></li>
                                    <li><a href="">文章列表</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                
                <div class="col-md-10">
                    <div class="jumbotron">
                        <h1>Welcome <?= isset($_SESSION['user_username']) ? $_SESSION['user_username'] : '游客'?></h1>
                        <p>...</p>
                        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    
  </body>
</html>

