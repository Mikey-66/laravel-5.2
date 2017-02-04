{{-- 这里提交的路径一定不要写错了 --}}
<form class="form-horizontal" method="POST" action="{{ isset($model) ? url('admin/article/'.$model->id) : url('admin/article')}}" >
    
    @if(isset($model))
    <input type="hidden" name="_method" value="PATCH">
    @endif
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label class="col-md-2 text-right">标题</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="model[title]" value="{{ old('model.title') ? old('model.title') : (isset($model) ? $model->title : '')}}">
        </div>
        <div class="col-md-2">
            <span>格式有误,只能填数字</span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 text-right">内容</label>
        <div class="col-md-6">
            <textarea rows="10" class="form-control" name="model[body]">{{ old('model.body') ? old('model.body') : (isset($model) ? $model->body : '')}}</textarea>
        </div>
        <div class="col-md-2">
            <span>格式有误,只能填数字</span>
        </div>
    </div>

    <div class="col-md-offset-2">
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>

@section('script')
@parent
<script>
{!! require_once 'js/article/base.js'!!}
</script>
@stop


