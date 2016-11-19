@extends('layouts.dashboard')
@section('title')
    友链管理
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
                    <a class="btn btn-sm btn-success" href="{{route('addLinks')}}">
                        <span class="icon-plus">
                            新增友链
                        </span>
                    </a>
                </div>
            </div>
            <div class="panel panel-body">
                <table class="table">
                    <tr class="text-warning">
                        <th class="col-xs-2 text-center">
                    <span class="icon-flag">
                        友链名称
                    </span>
                        </th>
                        <th class="col-xs-2 text-center">
                    <span class="icon-star">
                        友链IP
                    </span>
                        </th>
                        <th class="col-xs-2 text-center">
                    <span class="icon-tag">
                        友链所属
                    </span>
                        </th>
                        <th class="col-xs-4 text-center">
                    <span class="icon-sort text-center ">
                        友链简介
                    </span>
                        </th>
                        <th class="col-xs-2 text-center">
                    <span class="icon-tasks">
                        友链备注
                    </span>
                        </th>
                    </tr>
                    @foreach($links as $link)
                        <tr class="text-success">
                            <td class="col-xs-2 text-center ">
                                {{$link->name}}
                            </td>
                            <td class="col-xs-2 text-center ">
                                {{$link->ip}}
                            </td>
                            <td class="col-xs-2 text-center ">
                                {{$link->owner}}
                            </td>
                            <td class="col-xs-4 text-center ">
                                {{$link->status}}
                            </td>
                            <td class="col-xs-2 text-center ">
                                <a class="btn btn-xs btn-success" href="{{route('uploadLink',['id'=>$link->id])}}">
                                    <span class="icon-edit"> 编辑</span>
                                </a>

                                <a class="btn btn-xs btn-danger" href="{{route('deleteLink',['id'=>$link->id])}}">
                                    <span class="icon-trash"> 删除</span>
                                </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-xs-4 col-xs-offset-4">
            {!! $links->links() !!}
        </div>
    </div>
@endsection
