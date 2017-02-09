{{-- 这里提交的路径一定不要写错了 --}}
<form class="form-horizontal" method="POST" action="{{ isset($model) ? url('admin/category/'.$model->id) : url('admin/category')}}" >
    
    @if(isset($model))
    <input type="hidden" name="_method" value="PATCH">
    @endif
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group {{ $errors->has('model.name') ? 'has-error' : ( old('model.name') !== null ? 'has-success' : '' ) }}">
        <label class="col-md-2 text-right">名称</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="model[name]" value="{{ old('model.name') ? old('model.name') : (isset($model) ? $model->name : '')}}">
        </div>
        <div class="col-md-2">
            <?= $errors->has('model.name') ? $errors->first('model.name', '<p style="color:red;line-height:34px;">:message</p>') : ''?>
        </div>
    </div>
    
    <div class="form-group {{ $errors->has('model.alias') ? 'has-error' : ( old('model.alias') !== null ? 'has-success' : '' ) }}">
        <label class="col-md-2 text-right">别名</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="model[alias]" value="{{ old('model.alias') ? old('model.alias') : (isset($model) ? $model->alias : '')}}">
        </div>
        <div class="col-md-2">
            <?= $errors->has('model.alias') ? $errors->first('model.alias', '<p style="color:red;line-height:34px;">:message</p>') : ''?>
        </div>
    </div>

    <div class="form-group {{ $errors->has('model.pid') ? 'has-error' : ( old('model.pid') !== null ? 'has-success' : '' ) }}">
        <label class="col-md-2 text-right">上级分类</label>
        <div class="col-md-6">
            <select class="form-control" name="model[pid]">
                <option value="0">顶级分类</option>
                @foreach($cates as $value => $name)
                <option <?= isset($model) && $model->pid == $value ? 'selected="selected"' : '' ?> value="{{ $value }}">{{ $name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2">
            <?= $errors->has('model.body') ? $errors->first('model.body', '<p style="color:red;line-height:34px;">:message</p>') : '';?>
        </div>
    </div>
    
    <div class="form-group {{ $errors->has('model.link') ? 'has-error' : ( old('model.link') !== null ? 'has-success' : '' ) }}">
        <label class="col-md-2 text-right">链接地址</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="model[link]" value="{{ old('model.link') ? old('model.link') : (isset($model) ? $model->link : '')}}">
        </div>
        <div class="col-md-2">
            <?= $errors->has('model.link') ? $errors->first('model.link', '<p style="color:red;line-height:34px;">:message</p>') : ''?>
        </div>
    </div>
    
    <div class="form-group {{ $errors->has('model.is_show') ? 'has-error' : ( old('model.is_show') !== null ? 'has-success' : '' ) }}">
        <label class="col-md-2 text-right">是否显示</label>
        <div class="col-md-6">
            <select class="form-control" name="model[is_show]">
                <option <?= isset($model) && $model->is_show == '1' ? 'selected="selected"' : ''?> value="1">是</option>
                <option <?= isset($model) && $model->is_show == '0' ? 'selected="selected"' : ''?> value="0">否</option>
            </select>
        </div>
        <div class="col-md-2">
            <?= $errors->has('model.is_show') ? $errors->first('model.is_show', '<p style="color:red;line-height:34px;">:message</p>') : ''?>
        </div>
    </div>
    
    <div class="form-group {{ $errors->has('model.sort') ? 'has-error' : ( old('model.sort') !== null ? 'has-success' : '' ) }}">
        <label class="col-md-2 text-right">排序</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="model[sort]" value="{{ old('model.sort') ? old('model.sort') : (isset($model) ? $model->sort : 100)}}">
        </div>
        <div class="col-md-2">
            <?= $errors->has('model.sort') ? $errors->first('model.sort', '<p style="color:red;line-height:34px;">:message</p>') : ''?>
        </div>
    </div>

    <div class="col-md-offset-2">
        <button type="submit" class="btn btn-primary">保存</button>
    </div>
</form>

@section('script')
@parent

@stop


