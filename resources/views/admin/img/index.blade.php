@extends('layouts.admin')

@section('content')
<form method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <!--<label for="exampleInputEmail1">Email address</label>-->
        <input type="file"  name="file[]" multiple="multiple">
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
    
</form>

@stop