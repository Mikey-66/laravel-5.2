@extends('layouts.admin');
@section('title', '编辑文章')
@section('content')
    <h2>编辑文章</h2>
    @include('layouts.message')
    @include('admin.article.form')
@endsection