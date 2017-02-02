<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LD后台管理-@yield('title')</title>

    <link href="http://cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/metisMenu/2.6.2/metisMenu.min.css" rel="stylesheet" >
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    {{--各个页面单独加载的css文件 --}}
    @section('css')
    @show

  </head>
  <body>
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
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
<!--                <div class="panel-group" id="myAccordion">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#myAccordion" data-target="#panel1">商品管理</a>
                            </h4>
                        </div>
                        <div class="panel-collapse collapse in" id="panel1">
                            <div class="panel-body">
                                商品管理对应内容
                            </div>
                            <div class="panel-body">
                                商品管理对应内容
                            </div>
                            <div class="panel-body">
                                商品管理对应内容
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#myAccordion" data-target="#panel2">商品管理</a>
                            </h4>
                        </div>
                        <div class="panel-collapse collapse" id="panel2">
                            <div class="panel-body">
                                商品管理对应内容
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    
                </div>-->
<aside class="sidebar">
<nav class="sidebar-nav">
<ul class="metismenu nav" id="menu">
    <li class="active">
        <a class="has-arrow" href="javascript:;" aria-expanded="true">Menu 1</a>
        <ul aria-expanded="true" class="collapse in">
            <li>one</li>
            <li>tow</li>
            <li>
                <a class="has-arrow" href="javascript:;" aria-expanded="false">subMenu 1</a>
                <ul aria-expanded="false" class="collapse">
                    <li>one</li>
                    <li>tow</li>
                </ul>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;" aria-expanded="false">subMenu 2</a>
                <ul aria-expanded="false" class="collapse">
                    <li>three</li>
                    <li>four</li>
                </ul>
            </li>
        </ul>
    </li>
    <li>
        <a class="has-arrow" href="javascript:;" aria-expanded="false">Menu 2</a>
        <ul aria-expanded="false" >
            <li>one</li>
            <li>tow</li>
        </ul>
    </li>
</ul>
</nav>    
</aside>

            </div>
            <div class="col-md-10">
                <div>右侧内容</div>
            </div>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/metisMenu/2.6.2/metisMenu.min.js"></script>
    <script src="{{ asset('js/public/global.js') }}"></script>
    
    {{--各个页面单独加载的js库文件 --}}
    @section('js')
    @show
    
    {{-- 各个子视图单独需要的js代码片段 --}}
    @section('script')
    <script>
        $("#menu").metisMenu();
    </script>
    @show
  </body>
</html>
