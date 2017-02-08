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
                <label class="col-md-2 text-right">商品详情</label>
                <div class="col-md-6">
                    <textarea id="summernote" name="model[content]"></textarea>
                </div>
                <div class="col-md-2">
                    <span>格式有误,只能填数字</span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 text-right">商品参数</label>
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

@section('css')
<link href="{{ asset('assets/summernote-0.8.2-dist/dist/summernote.css') }}" rel="stylesheet">
@stop

@section('js')
<script type="text/javascript" src="{{ asset('assets/summernote-0.8.2-dist/dist/summernote.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/summernote-0.8.2-dist/dist/lang/summernote-zh-CN.js') }}"></script>
@stop

@section('script')
@parent
<script>
    $(document).ready(function(){
        $('#summernote').summernote({
            height: 300,              // set editor height
            minHeight: null,          // set minimum height of editor
            maxHeight: null,          // set maximum height of editor
            focus: false,          // set focus to editable area after initializing summernote
            lang: 'zh-CN',
//            toolbar: [
//                        // [groupName, [list of button]]
//                        ['style', ['bold', 'italic', 'underline', 'clear']],
//                        ['font', ['strikethrough', 'superscript', 'subscript']],
//                        ['fontsize', ['fontsize']],
//                        ['color', ['color']],
//                        ['para', ['ul', 'ol', 'paragraph']],
//                        ['height', ['height']]
//                      ],
            callbacks: {
                onImageUpload: function(files) {
                    for (var i=0; i<files.length; i++){
                        send(files[i]);
                    }
                }
            },
            placeholder: 'write something here...'
            
        });
        
//        $('#summernote').summernote('disable');

        function send(file){
            if (file.type.includes('image')) {
                var name = file.name.split(".");
                name = name[0];
                var data = new FormData();
                data.append('file', file);
                $.ajax({
                    url: "{{route('upload')}}",
                    type: 'POST',
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: 'JSON',
                    data: data,
                    success: function (json) {
                        $('#summernote').summernote('insertImage', json.data.url, name);
                    }
                });
            }
        }
        
    });
    
</script>
@stop


