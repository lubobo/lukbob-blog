@extends('layouts.master')
@section('title')
    {{$article->title}}
@endsection
@section('content')
    <div class="background">
        <div class="container">
            <img src="{!! $article->pic !!}" class="img-circle" width="11%">
            <div class="col-xs-9">
                <h1 class="h1">{!! $article->title!!}</h1>
                <h4 class="text-warning" style="font-family: Menlo, Monaco, Consolas, 'AR PL UKai TW MBE', monospace;color:#9e9e9e">
                    来自于lukbob的未知神秘力量
                </h4>
            </div>
        </div>
    </div>
    <div class="container" style="width:100%">
        <div class="row">
            <div class="container" style="width: 80%">
                <div class="col-xs-4 h5 text-info">
                    <ul class="breadcrumb" style="background-color: white;padding:0; margin: 0;">
                        <span class="glyphicon glyphicon-calendar"> {{date('Y-m-d',strtotime("$article->created_at+8 hours"))}}</span>
                    </ul>
                </div>
                <div class="col-xs-8 h5 text-info">
                    <ul class="breadcrumb" style="background-color: white;padding:0; margin: 0;">
                        <span class="glyphicon glyphicon-list-alt"> 分类: </span>
                        <li class="active"><a href="{{route('welcome')}}"> Home</a></li>
                        <li class="active"><a href="{{route('getStatusArticle',['status'=>$article->status->name])}}"> {{$article->status->name}}</a></li>
                        <li class="active">{{$article->tag->name}}</li>
                    </ul>
                </div>
            </div>
            <div class="container col-xs-4 col-xs-offset-1" style="width: 63%">
                <div class="panel-body">
                    <div class="panel-default">
                        <h5 class="text-default">{!! $article->content !!}</h5>
                    </div>
                    <br>
                    <div class="panel-default">
                        <div id="disqus_thread"></div>
                        <script>
                            (function() {
                                var d = document, s = d.createElement('script');
                                s.src = '//lukbob-com.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the
                            <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
                        </noscript>
                    </div>
                </div>
            </div>
            <div class="col-xs-8" style="width: 23%">
                <div class="panel-body" style="height: auto">
                    <h4 class="text-warning">最新文章</h4>
                    <ul class="list-group">
                        @foreach($arts as $art)
                            <a class="list-group-item" style="text-decoration: none;" href="{{route('getArticle',['id'=>$art->id])}}">
                                <span class="glyphicon glyphicon-file text-info"> {{ $art->title}}</span>
                            </a>
                        @endforeach
                    </ul>
                </div>
                <div class="panel-body" style="height: auto;">
                    <h4 class="text-warning">标签云</h4>
                    @foreach($tags as $tag)
                        <a class="panel panel-primary"  style="text-decoration: none;" href="{{route('getTagArticle',['tag'=>$tag->name])}}">
                            {{$tag->name}}
                        </a>
                    @endforeach
                </div>
                <div class="panel-body" style="height: auto;">
                    <h4 class="text-warning">友情链接</h4>
                    <ul class="list-group">
                        @foreach($links as $link)
                            <a class="list-group-item" style="text-decoration: none;" href="{!! 'http://'.$link->ip !!}">
                                <span class="glyphicon glyphicon-paperclip text-danger"> {{$link->name}} ({{$link->status}})</span>
                            </a>
                        @endforeach
                    </ul>
                </div>
                <div class="panel-body" style="height: auto;">
                    <h5 class="text-warning">分享站点:</h5>
                    <div class="share-component" data-disabled="google,twitter,facebook" data-description=""></div>
                </div>
            </div>
        </div>
    </div>
@endsection
