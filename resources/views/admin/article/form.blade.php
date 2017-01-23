{{-- 这里提交的路径一定不要写错了 --}}
<form method="POST" action="{{ isset($model) ? url('admin/article/'.$model->id) : url('admin/article')}}" >
    
    @if(isset($model))
    <input type="hidden" name="_method" value="PATCH">
    @endif
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
      <label>标题</label>
      <input type="text" class="form-control" name="model[title]" value="{{ $model->title or '' }}">
    </div>

    <div class="form-group">
      <label>内容</label>
      <textarea rows="10" class="form-control" name="model[body]">{{ $model->body or ''}}</textarea>
    </div>

  <button type="submit" class="btn btn-primary">保存</button>
</form>

<!--@section('script')
    @@parent
    <script>console.log(2)</script>
@section-->