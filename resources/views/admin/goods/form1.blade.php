{{-- 这里提交的路径一定不要写错了 --}}
<form method="POST" action="{{ isset($model) ? url('admin/goods/'.$model->id) : url('admin/goods')}}" >
    
    @if(isset($model))
    <input type="hidden" name="_method" value="PATCH">
    @endif
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <ul class="nav nav-tabs nav-justified">
        <li class="active"><a data-toggle="tab" data-target="#tab1">基本信息</a></li>
        <li><a data-toggle="tab" data-target="#tab2">商品相册</a></li>
        <li><a data-toggle="tab" data-target="#tab3">规格属性</a></li>
        <li><a data-toggle="tab" data-target="#tab4">详细信息</a></li>
    </ul>
    
    <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
            <div class="form-group">
                <label>标题</label>
                <input type="text" class="form-control" name="model[title]" value="{{ old('model.title') ? old('model.title') : (isset($model) ? $model->title : '')}}">
            </div>

            <div class="form-group">
              <label>内容</label>
              <textarea rows="10" class="form-control" name="model[body]">{{ old('model.body') ? old('model.body') : (isset($model) ? $model->body : '')}}</textarea>
            </div>
        </div>
        <div class="tab-pane fade" id="tab2">
            <div class="form-group">
                <label>标题</label>
                <input type="text" class="form-control" name="model[title]" value="{{ old('model.title') ? old('model.title') : (isset($model) ? $model->title : '')}}">
            </div>

            <div class="form-group">
              <label>内容</label>
              <textarea rows="10" class="form-control" name="model[body]">{{ old('model.body') ? old('model.body') : (isset($model) ? $model->body : '')}}</textarea>
            </div>
        </div>
        <div class="tab-pane fade" id="tab3">
            <div class="form-group">
                <label>标题</label>
                <input type="text" class="form-control" name="model[title]" value="{{ old('model.title') ? old('model.title') : (isset($model) ? $model->title : '')}}">
            </div>

            <div class="form-group">
              <label>内容</label>
              <textarea rows="10" class="form-control" name="model[body]">{{ old('model.body') ? old('model.body') : (isset($model) ? $model->body : '')}}</textarea>
            </div>
        </div>
        <div class="tab-pane fade" id="tab4">
            <div class="form-group">
                <label>标题</label>
                <input type="text" class="form-control" name="model[title]" value="{{ old('model.title') ? old('model.title') : (isset($model) ? $model->title : '')}}">
            </div>

            <div class="form-group">
              <label>内容</label>
              <textarea rows="10" class="form-control" name="model[body]">{{ old('model.body') ? old('model.body') : (isset($model) ? $model->body : '')}}</textarea>
            </div>
        </div>
    <div>

  <button type="submit" class="btn btn-primary">保存</button>
</form>

@section('script')
@parent

@stop


