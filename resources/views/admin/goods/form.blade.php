{{-- 这里提交的路径一定不要写错了 --}}
<form method="POST" action="{{ isset($model) ? url('admin/goods/'.$model->id) : url('admin/goods')}}" >
    
    @if(isset($model))
    <input type="hidden" name="_method" value="PATCH">
    @endif
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
      <label>标题</label>
      <input type="text" class="form-control" name="model[title]" value="{{ old('model.title') ? old('model.title') : (isset($model) ? $model->title : '')}}">
    </div>

    <div class="form-group">
      <label>内容</label>
      <textarea rows="10" class="form-control" name="model[body]">{{ old('model.body') ? old('model.body') : (isset($model) ? $model->body : '')}}</textarea>
    </div>

  <button type="submit" class="btn btn-primary">保存</button>
</form>

@section('script')
@parent

@stop


