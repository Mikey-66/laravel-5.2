@extends('layouts.admin')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2>添加文章</h2>
    <form method="POST" action="{{ url('admin/upload') }}" enctype="multipart/form-data">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <!--<input type="file" name="img"/><br /><br />-->
        <!--<input type="file" name="img[]"/><br /><br />-->
        <input type="file" name="myFile2[]" multiple="multiple"/><br /><br />
        <!--<input type="file" name="myFile3"/><br /><br />-->

      <button type="submit" class="btn btn-primary">提交</button>
    </form>
</div>
@endsection

@section('js')
<script type="text/javascript" src="/assets/pekeUpload/js/pekeUpload.js"></script>
@endsection

@section('script')
{!! require_once 'js/upload/upload.js'!!}
@endsection
