@extends('layouts.master')
@section('title')
    小胡子陸bebe
@endsection
@section('content')
    <div id="myCarousel" class="carousel slide">
        <!-- 轮播（Carousel）指标 -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- 轮播（Carousel）项目 -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="/pics/6.jpg" class="img-responsive" style="height:50%;width: 100%" alt="First slide">
            </div>
            <div class="item">
                <img src="/pics/7.jpg" class="img-responsive" style="height:50%;width: 100%" alt="Second slide">
            </div>
            <div class="item">
                <img src="/pics/2.jpg" class="img-responsive" style="height:50%;width: 100%" alt="Third slide">
            </div>
        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="carousel-control left" href="#myCarousel"
           data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="carousel-control right" href="#myCarousel"
           data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    <div class="container" style="width:100%">
        <div class="row">
            <div class="col-xs-4 col-xs-offset-1" style="width:60%">
                @foreach($articles as $article)
                    <div class="panel-body">
                        <a href="{{route('getArticle',['id'=>$article->id])}}" style="text-decoration: none;">
                            <h3 class="text-warning">{!! $article->title!!}</h3>
                        </a>
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
                        <div class="panel-default">
                            <h5 class="text-default">{!! substr($article->content,0,554).'  [...]' !!}</h5>
                        </div>
                    </div>
                @endforeach
                <div class="col-xs-4 col-xs-offset-4">
                    {!! $articles->links() !!}
                </div>
            </div>
            <div class="col-xs-8" style="width: 23%">
                <div class="panel-default">
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
    </div>
@endsection
<script>
    $(function(){
//        // 初始化轮播
//        $(".start-slide").click(function(){
//            $("#myCarousel").carousel('cycle');
//        });
//        // 停止轮播
//        $(".pause-slide").click(function(){
//            $("#myCarousel").carousel('pause');
//        });
//        // 循环轮播到上一个项目
//        $(".prev-slide").click(function(){
//            $("#myCarousel").carousel('prev');
//        });
//        // 循环轮播到下一个项目
//        $(".next-slide").click(function(){
//            $("#myCarousel").carousel('next');
//        });
        // 循环轮播到某个特定的帧
        $(".slide-one").click(function(){
            $("#myCarousel").carousel(0);
        });
        $(".slide-two").click(function(){
            $("#myCarousel").carousel(1);
        });
        $(".slide-three").click(function(){
            $("#myCarousel").carousel(2);
        });
    });
</script>
