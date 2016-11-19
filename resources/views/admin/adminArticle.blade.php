@extends('layouts.dashboard')
@section('title')
    文章管理
@endsection
@section('content')
    <br>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="col-xs-1 col-xs-offset-0">
                    <div class="dropdown">
                        <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            调整次序
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="#">全部</a></li>
                            <li><a href="#">最近一周</a></li>
                            <li><a href="#">最近一月</a></li>
                            <li><a href="#">最近三月</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-offset-11">
                    <a class="btn btn-sm btn-success" href="{{route('addArticles')}}">
                        <span class="icon-plus">
                            新增文章
                        </span>
                    </a>
                </div>
            </div>
            <div class="panel panel-body">
                <table class="table">
                    <tr class="text-warning">
                        <th class="col-xs-2 text-center">
                    <span class="icon-sort text-center ">
                        发表时间
                    </span>
                        </th>
                        <th class="col-xs-4 text-center">
                    <span class="icon-flag">
                        文章标题
                    </span>
                        </th>
                        <th class="col-xs-2 text-center">
                    <span class="icon-star">
                        文章分类
                    </span>
                        </th>
                        <th class="col-xs-2 text-center">
                    <span class="icon-tag">
                        文章标签
                    </span>
                        </th>
                        <th class="col-xs-2 text-center">
                    <span class="icon-tasks">
                        文章备注
                    </span>
                        </th>
                    </tr>
                    @foreach($articles as $article)
                        <tr class="text-success">
                            <td class="col-xs-2 text-center ">
                                {{$article->created_at}}
                            </td>
                            <td class="col-xs-4 text-center ">
                                {{$article->title}}
                            </td>
                            <td class="col-xs-2 text-center ">
                                {{$article->status->name}}
                            </td>
                            <td class="col-xs-2 text-center ">
                                {{$article->tag->name}}
                            </td>
                            <td class="col-xs-2 text-center ">
                                <a class="btn btn-xs btn-success" href="{{route('uploadArticle',['id'=>$article->id])}}">
                                    <span class="icon-edit"> 编辑</span>
                                </a>

                                <a class="btn btn-xs btn-danger" href="{{route('deleteArticle',['id'=>$article->id])}}">
                                    <span class="icon-trash"> 删除</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-xs-4 col-xs-offset-4">
            {!! $articles->links() !!}
        </div>
    </div>
@endsection

{{--<script>--}}
    {{--$(function () { $('#myModal').modal('hide');});--}}

    {{--function deleteView(str) {--}}
        {{--var xmlhttp;--}}
        {{--if (window.XMLHttpRequest){--}}
            {{--xmlhttp=new XMLHttpRequest();--}}
        {{--}--}}
        {{--else--}}
            {{--xmlhttp=ActiveXObject('Microsoft.XMLHTTP');--}}
        {{--xmlhttp.onreadystatechange=function () {--}}
            {{--if (xmlhttp.readyState==4&&xmlhttp.status==200){--}}
                {{--document.getElementById('')--}}
            {{--}--}}
        {{--}--}}
    {{--}--}}
{{--</script>--}}