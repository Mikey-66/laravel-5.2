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
                    <input type="text" class="form-control" name="model[name]" value="{{ old('model.name') ? old('model.name') : (isset($model) ? $model->name : '')}}">
                </div>
                <div class="col-md-2">
                    <span></span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-2 text-right">分类</label>
                <div class="col-md-6">
                    <select class="form-control" name="model[cate_id]">
                        @foreach($cates as $key => $item)
                        <option <?= isset($model) && $model->cate_id == $item['id'] ? 'selected="selected"' : '' ?> value="{{ $item['id'] }}">{{ $item['show_name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <span></span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-2 text-right">货号</label>
                <div class="col-md-6">
                    <input class="form-control" name="model[goods_sn]" value="{{ old('model.goods_sn') ? old('model.goods_sn') : (isset($model) ? $model->goods_sn : '')}}" />
                </div>
                <div class="col-md-2">
                    <span></span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-2 text-right">条码</label>
                <div class="col-md-6">
                    <input class="form-control" name="model[barcode]" value="{{ old('model.barcode') ? old('model.barcode') : (isset($model) ? $model->barcode : '')}}" />
                </div>
                <div class="col-md-2">
                    <span></span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-2 text-right">市场价</label>
                <div class="col-md-6">
                    <input class="form-control" name="model[market_price]" value="{{ old('model.market_price') ? old('model.market_price') : (isset($model) ? $model->market_price : '')}}" />
                </div>
                <div class="col-md-2">
                    <span></span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-2 text-right">售价</label>
                <div class="col-md-6">
                    <input class="form-control" name="model[price]" value="{{ old('model.price') ? old('model.price') : (isset($model) ? $model->price : '')}}" />
                </div>
                <div class="col-md-2">
                    <span></span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-2 text-right">库存</label>
                <div class="col-md-6">
                    <input class="form-control" name="model[stock]" value="{{ old('model.stock') ? old('model.stock') : (isset($model) ? $model->stock : '')}}" />
                </div>
                <div class="col-md-2">
                    <span></span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-2 text-right">是否上架</label>
                <div class="col-md-6">
                    <input class="form-control" name="model[is_add]" value="{{ old('model.is_add') ? old('model.is_add') : (isset($model) ? $model->is_add : '')}}" />
                </div>
                <div class="col-md-2">
                    <span></span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-2 text-right">排序</label>
                <div class="col-md-6">
                    <input class="form-control" name="model[sort]" value="{{ old('model.sort') ? old('model.sort') : (isset($model) ? $model->sort : '')}}" />
                </div>
                <div class="col-md-2">
                    <span></span>
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
            
<!--            <div class="form-group">
                <label class="col-md-2 text-right">商品详情</label>
                <div class="col-md-6">
                    <textarea id="summernote" name="model[content]">{{ old('model.content') ? old('model.content') : (isset($model) ? $model->content : '')}}</textarea>
                </div>
                <div class="col-md-2">
                    <span>格式有误,只能填数字</span>
                </div>
            </div>-->
            
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


