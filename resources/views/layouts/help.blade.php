@extends('layouts.app1')

@section('title', 'help')

@section('sidebar')
    <ul>
        <li><a href="/help">/help</a></li>
        <li><a href="/help/show">/help/show</a></li>
        <li><a href="/help/controller/22">基础控制器 /help/controller/22</a></li>
        <li><a href="/help/htmlToJpg">html截图 /help/htmlToJpg</a></li>
        <li><a href="/help/htmlToJpgByPantomjs">html截图 /help/htmlToJpgByPantomjs</a></li>
        <li><a href="/help/toEgg">egg请求 /help/toEgg</a></li>
        <li><a href="/photos/list">资源控制器 /photos/list</a></li>
    </ul>
@endsection

@section('content')
    <p>这是主体内容。</p>
@endsection
