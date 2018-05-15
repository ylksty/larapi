<!-- 文件保存于 resources/views/layouts/child.blade.php -->

@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
  @parent

  <li>22</li>
@endsection

@section('content')
  <p>这是主体内容。</p>
@endsection