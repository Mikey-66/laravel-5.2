<nav class="navbar navbar-default">
    <ul class="metismenu nav" id="menu">
        <li <?= $share['controller'] =='site' ? 'class="active"' : '' ?>>
            <a href="{{ url('admin/site/index') }}">首页</a>
        </li>
        <li class="divider"></li>
        
        <li <?= $share['controller'] =='goods' ? 'class="active"' : '' ?> >
            <a class="has-arrow" href="javascript:;" aria-expanded="{{ $share['controller'] =='goods' ? 'true' : 'false' }}">商品管理</a>
            <ul aria-expanded="false" class="collapse nav nav-sub-level">
                <li><a>商品列表</a></li>
                <li><a href="{{ url('admin/goods/create') }}">添加商品</a></li>
                <li>
                    <a class="has-arrow" href="javascript:;" aria-expanded="false">subMenu 1</a>
                    <ul aria-expanded="false" class="collapse nav nav-sub-level">
                        <li><a>one</a></li>
                        <li><a>tow</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;" aria-expanded="false">subMenu 2</a>
                    <ul aria-expanded="false" class="collapse nav nav-sub-level">
                        <li><a>three</a></li>
                        <li><a>four</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        
        <li <?= $share['controller'] =='category' ? 'class="active"' : '' ?>>
            <a class="has-arrow" href="javascript:;" aria-expanded="<?= $share['controller'] =='category' ? 'true' : 'false' ?>">分类管理</a>
            <ul aria-expanded="false" class="nav nav-sub-level">
                <li><a href="{{ url('admin/category/create') }}">添加分类</a></li>
                <li><a href="{{ url('admin/category') }}">分类列表</a></li>
            </ul>
        </li>

        <li <?= $share['controller'] =='article' ? 'class="active"' : '' ?>>
            <a class="has-arrow" href="javascript:;" aria-expanded="{{ $share['controller'] =='article' ? 'true' : 'false' }}">文章管理</a>
            <ul aria-expanded="false" class="nav nav-sub-level">
                <li><a href="{{ url('admin/article/create') }}">添加文章</a></li>
                <li><a href="{{ url('admin/article') }}">文章列表</a></li>
            </ul>
        </li>
    </ul>
</nav>
