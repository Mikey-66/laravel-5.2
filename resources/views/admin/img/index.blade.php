@extends('layouts.admin')

@section('content')
<form method="POST" enctype="multipart/form-data" action="{{ route('upload') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <!--<label for="exampleInputEmail1">Email address</label>-->
        <input type="file" id="file"  name="file">
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
    
</form>
<hr/>
<div id="summernote"></div>

<hr/>
<div>
    <form method='POST' action="{{route('upload')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input class="form-control" type="file"  name="file" /><br/>
        <button class="btn btn-default" type="submit">submit</button>
    </form>
</div>
@stop


@section('css')
<link href="{{ asset('assets/summernote-0.8.2-dist/dist/summernote.css') }}" rel="stylesheet">
@stop

@section('js')
<script type="text/javascript" src="{{ asset('assets/pekeUpload/js/pekeUpload.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/summernote-0.8.2-dist/dist/summernote.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/summernote-0.8.2-dist/dist/lang/summernote-zh-CN.js') }}"></script>
@stop

@section('script')
<script>
    $("#file").pekeUpload({
        url:"{{route('upload')}}",
        dragMode : true,
        bootstrap : true,
        showPreview : true,
        showErrorAlerts : false,
        onFileError : function(file,error){
            console.log(file);
        }
        
    });
    
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
                        console.log(json);
                        $('#summernote').summernote('insertImage', json.data.url, name);
                    }
                });
            }
        }
        
    });
    
</script>
@stop