@extends('layouts.admin')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">文章列表</h1>
    
    <div class="collapse navbar-collapse">
        <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    </div>
    
    <!--<h2 class="sub-header">Section title</h2>-->
    
    <div class="table-responsive">
      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th>序号</th>
            <th>标题</th>
            <th>内容</th>
            <th>作者</th>
            <th>更新时间</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>
            @foreach($data as $key=>$item)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $item->title }}</td>
              <td>{{ $item->body }}</td>
              <td>{{ $item->user_id }}</td>
              <td>{{ $item->updated_at }}</td>
              <td>编辑 删除</td>
            </tr>
            @endforeach
        </tbody>
      </table>
        
        <div class="bs-example">
            <nav>
              <ul class="pagination">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </nav>
         </div>
    </div>
</div>
@endsection
