@extends('layouts.dashboard')
@section('title')
    添加文章
@endsection
@section('content')

    <form class="form-group" action="{{route('storeArticle')}}" method="POST" enctype="multipart/form-data">
        <div class="col-xs-2" style="margin-right:15%;margin-left: 1%">
            <label for="title"><h4 class="text-warning">文章标题</h4></label>
            <input class="form-control" type="text" name="title" placeholder="title...">
        </div>

        <div class="col-xs-1">
            <h4 class="text-center text-warning">文章分类</h4>
            <select class="form-control" name="status_id">
                <option>--选择分类--</option>
                @foreach($statuses as $status)
                    <option value="{{$status->id}}">{{$status->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-xs-2 col-xs-offset-0">
            <h6 class="btn btn-sm btn-info" onclick="changestatus()">
                <span class="icon-plus"></span>
            </h6>
            <p> </p>
            <input type="text" class="form-control" id="status" onmouseout="checkstatus(this.value)" name="status" style="visibility: hidden" placeholder="输入分类....">
            <h5 class="text-danger" id="error"></h5>
        </div>

        <div class="col-xs-1">
            <h4 class="text-center text-warning">标签选择</h4>
            <select class="form-control" name="tag_id">
                <option>--选择标签--</option>
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-xs-2 col-xs-offset-0">
            <h6 class="btn btn-sm btn-success" onclick="changetag()">
                <span class="icon-plus"></span>
            </h6>
            <p> </p>
            <input type="text" class="form-control" id="tag" onmouseout="checkTag(this.value)" name="tag" style="visibility: hidden" placeholder="输入标签....">
            <h5 class="text-danger" id="errors"></h5>
        </div>

        <div class="col-xs-2">
            <h4 class="text-center text-warning">文章配图</h4>
            <button class="btn btn-warning col-xs-12" style="height:3.5%" type="button" data-toggle="modal" data-target="#identifier">
                <span class="icon-picture"> article pic</span>
            </button>
        </div>

        <div class="col-xs-12">
            <label for="title"></label>
            <script type="text/javascript"  src="{{ URL::to('/ckeditor/ckeditor.js')}}"></script>
            <textarea class="ckeditor" name="content"></textarea>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>

        <div class="modal fade" id="identifier">
            <div class="modal-dialog">
                <div class="modal-content">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            ×
                        </button>
                        <h4 class="modal-title" id="myModalLabel">文章配图</h4>
                    </div>

                    <div class="modal-body">
                        <input type="file" name="file" id="file">
                        <p> </p>
                        <input type="text" class="form-control" name="pic" placeholder="pic name...">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">提交</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
<script language="JavaScript">
    function changestatus() {
        var node=document.getElementById('status');
        node.style.visibility='visible';
    }

    function changetag() {
        var node=document.getElementById('tag');
        node.style.visibility='visible';
    }

    function checkstatus(str) {
        var xmlhttp;
        if (str==""){
            document.getElementById('status').innerHTML="";
            return;
        }
        if (window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        }
        else{
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function () {
            if (xmlhttp.readyState==4&&xmlhttp.status==200){
                document.getElementById("error").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","/checkStatus/"+str,true);
        xmlhttp.send();
    }

    function checkTag(str) {
        var xmlhttp;
        if (str==""){
            document.getElementById('tag').innerHTML="";
            return;
        }
        if (window.XMLHttpRequest){
            xmlhttp=new XMLHttpRequest();
        }
        else{
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function () {
            if (xmlhttp.readyState==4&&xmlhttp.status==200){
                document.getElementById("errors").innerHTML=this.responseText;
            }
        }
        xmlhttp.open("GET","/checkTag/"+str,true);
        xmlhttp.send();
    }
</script>