@extends('layouts.new')   
@section('title', '分类列表')
@section('content')
<div style="padding-right: 30px;">
    <h3>分类列表</h3>
    <hr/>
    
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
        </button>
        <strong>{{ session('success')  }}</strong><br><br>
    </div>
    @endif
    
    <div class="collapse navbar-collapse">
        <form class="navbar-form navbar-left" method="GET" action="{{url('admin/article')}}">
            <div class="form-group">
              <input type="text" name="sword" class="form-control" placeholder="标题">
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
        </form>
    </div>
    
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th class="text-center">序号</th>
                <th>名称</th>
                <th>父级分类</th>
                <th>是否显示</th>
                <th>排序</th>
                <th>更新时间</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
                @foreach($data as $key=>$item)
                <tr>
                  <td class="text-center">{{ $key+1 }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->father ? $item->father->name : '顶级分类'}}</td>
                  <td>{{ $item->is_show ? '是' : '否' }}</td>
                  <td>{{ $item->sort }}</td>
                  <td>{{ $item->updated_at }}</td>
                  <td>
                        <a title="详情查看" href="{{ url("admin/category/{$item->id}") }}"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>&nbsp;
                        <a title="编辑" href="{{ url("admin/category/{$item->id}/edit") }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>&nbsp;
                        <a title="删除" pos="{{url("admin/category/{$item->id}")}}" class="lj_ajax-del" warning="确认删除?" href="javascript:;"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>&nbsp;
                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="pull-right">
            {!! $data->render() !!}
        </div>
    </div>
</div>
@endsection
