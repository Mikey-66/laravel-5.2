<nav class="navbar navbar-default">
    <ul class="metismenu nav" id="menu">
        <li class="active">
            <a class="has-arrow" href="javascript:;" aria-expanded="true">商品管理</a>
            <ul aria-expanded="true" class="collapse in nav">
                <li><a>商品列表</a></li>
                <li><a href="{{ url('admin/goods/create') }}">添加商品</a></li>
                <li>
                    <a class="has-arrow" href="javascript:;" aria-expanded="false">subMenu 1</a>
                    <ul aria-expanded="false" class="collapse nav">
                        <li><a>one</a></li>
                        <li><a>tow</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;" aria-expanded="false">subMenu 2</a>
                    <ul aria-expanded="false" class="collapse nav">
                        <li><a>three</a></li>
                        <li><a>four</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;" aria-expanded="false">分类管理</a>
            <ul aria-expanded="false" class="nav">
                <li><a>one</a></li>
                <li><a>tow</a></li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;" aria-expanded="false">文章管理</a>
            <ul aria-expanded="false" class="nav">
                <li><a>one</a></li>
                <li><a>tow</a></li>
            </ul>
        </li>
    </ul>
</nav>
