{{-- 这里提交的路径一定不要写错了 --}}
<form class="form-horizontal" method="POST" action="{{ isset($model) ? url('admin/goods/'.$model->id) : url('admin/goods')}}" >
    
    @if(isset($model))
    <input type="hidden" name="_method" value="PATCH">
    @endif
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" data-target="#tab1" href="javascript:;">基本信息</a></li>
                <li><a data-toggle="tab" data-target="#tab2" href="javascript:;">商品相册</a></li>
                <li><a data-toggle="tab" data-target="#tab3" href="javascript:;">规格属性</a></li>
                <li><a data-toggle="tab" data-target="#tab4" href="javascript:;">详细信息</a></li>
            </ul>
        </div>
        <div class="col-md-2"></div>
    </div>
    
    <br/>
    
    <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
            
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
        </div>
        
        <div class="tab-pane fade" id="tab2">
            
            <div class="form-group">
                <label class="col-md-2 text-right">标题</label>
                <div class="col-md-6">
                    <input type="text" class="form-control"  value="{{ old('model.title') ? old('model.title') : (isset($model) ? $model->title : '')}}">
                </div>
                <div class="col-md-2">
                    <span>格式有误,只能填数字</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 text-right">内容</label>
                <div class="col-md-6">
                  <textarea rows="10" class="form-control" >{{ old('model.body') ? old('model.body') : (isset($model) ? $model->body : '')}}</textarea>
                </div>
                <div class="col-md-2">
                    <span>格式有误,只能填数字</span>
                </div>
            </div>
            
            <div class="col-md-offset-2">
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </div>
        
        <div class="tab-pane fade" id="tab3">
            
            <div class="form-group">
                <label class="col-md-2 text-right">标题</label>
                <div class="col-md-6">
                    <input type="text" class="form-control"  value="{{ old('model.title') ? old('model.title') : (isset($model) ? $model->title : '')}}">
                </div>
                <div class="col-md-2">
                    <span>格式有误,只能填数字</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 text-right">内容</label>
                <div class="col-md-6">
                  <textarea rows="10" class="form-control">{{ old('model.body') ? old('model.body') : (isset($model) ? $model->body : '')}}</textarea>
                </div>
                <div class="col-md-2">
                    <span>格式有误,只能填数字</span>
                </div>
            </div>
            
            <div class="col-md-offset-2">
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </div>
        
        <div class="tab-pane fade" id="tab4">
            
            <div class="form-group">
                <label class="col-md-2 text-right">标题</label>
                <div class="col-md-6">
                    <input type="text" class="form-control"  value="{{ old('model.title') ? old('model.title') : (isset($model) ? $model->title : '')}}">
                </div>
                <div class="col-md-2">
                    <span>格式有误,只能填数字</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 text-right">内容</label>
                <div class="col-md-6">
                  <textarea rows="10" class="form-control" >{{ old('model.body') ? old('model.body') : (isset($model) ? $model->body : '')}}</textarea>
                </div>
                <div class="col-md-2">
                    <span>格式有误,只能填数字</span>
                </div>
            </div>
            
            <div class="col-md-offset-2">
                <button type="submit" class="btn btn-primary">保存</button>
            </div>
        </div>
    </div>
</form>

@section('script')
@parent

@stop


