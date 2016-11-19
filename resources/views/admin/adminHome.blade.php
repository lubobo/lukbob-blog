@extends('layouts.dashboard')
@section('title')
    后台管理
@endsection
@section('content')
    <br>
    <br>
    <br>
    <div class="btn col-xs-4 col-xs-offset-4" style="background-color:#4c4c4c">
        <p> </p>
        <h3 class="text-default text-center">后台管理</h3>
        <br>
        <img src="pics/1.jpg" class="img-circle col-xs-offset-0" style="width: 45%">
        <h1> </h1>
        <div>
            <ul class=" list-group">
            <li class="btn btn-default list-group-item">
            <a class="text-warning" href="{{route('adminArticle')}}">文章管理</a>
            </li>
            <h1> </h1>
            <li class="btn btn-default list-group-item">
            <a class="text-warning" href="{{route('getLinks')}}">友链管理</a>
            </li>
            <h1> </h1>
            {{--<li class="btn btn-default list-group-item">--}}
            {{--<a class="text-warning" href="#">评论管理</a>--}}
            {{--</li>--}}
            {{--<h1> </h1>--}}
            {{--<li class="btn btn-default list-group-item">--}}
            {{--<a class="text-warning" href="#">分类管理</a>--}}
            {{--</li>--}}
            {{--<h1> </h1>--}}
            {{--<li class="btn btn-default list-group-item">--}}
            {{--<a class="text-warning" href="#">会员管理</a>--}}
            {{--</li>--}}
            </ul>
        </div>
    </div>
@endsection