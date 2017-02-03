@extends('layouts.new')
@section('title', '文章列表')

@section('content')
<ol class="breadcrumb">
    <li><a>商品管理</a></li>
    <li><a>商品列表</a></li>
</ol>
<!-- 右侧内容也放入一个面板中 -->
<div>
    <h3>商品列表</h3>
    <hr>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="text-center">序号</th>
                <th>标题</th>
                <th>内容</th>
                <th>作者</th>
                <th>更新时间</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td><<面朝大海>></td>
                <td>非常邪恶</td>
                <td>刘杰</td>
                <td>2017-01-28 18:02:21</td>
                <td>无</td>
            </tr>
            <tr>
                <td>1</td>
                <td><<面朝大海>></td>
                <td>非常邪恶</td>
                <td>刘杰</td>
                <td>2017-01-28 18:02:21</td>
                <td>无</td>
            </tr>
            <tr>
                <td>1</td>
                <td><<面朝大海>></td>
                <td>非常邪恶</td>
                <td>刘杰</td>
                <td>2017-01-28 18:02:21</td>
                <td>无</td>
            </tr>
            <tr>
                <td>1</td>
                <td><<面朝大海>></td>
                <td>非常邪恶</td>
                <td>刘杰</td>
                <td>2017-01-28 18:02:21</td>
                <td>无</td>
            </tr>
        </tbody>
    </table>
</div>
@stop