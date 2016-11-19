@extends('layouts.dashboard')
@section('title')
    添加友链
@endsection
@section('content')
    <div class="panel panel-default col-xs-6 col-xs-offset-3">
        <div class="panel panel-heading">
            <h4 class="text-center text-warning">
                添加友链
            </h4>
        </div>
        <div class="panel panel-body">
            <form class="form-group col-xs-5 col-xs-offset-4" action="{{route('postLinks')}}" method="POST">
                <span class="glyphicon glyphicon-transfer"> 友链IP:</span>
                <br>
                <input class="form-control" name="ip" onmouseout="check_ip(this.value)" placeholder="请输入友链IP...">
                <h5><span class="text-danger" id="ip"></span></h5>
                <br>
                <span class="glyphicon glyphicon-globe"> 友链name:</span>
                <br>
                <input class="form-control" name="name" onmouseout="check_name(this.value)" placeholder="请输入友链name...">
                <h5><span class="text-danger" id="name"></span></h5>
                <br>
                <span class="glyphicon glyphicon-user"> 友链owner:</span>
                <br>
                <input class="form-control" name="owner" placeholder="请输入友链owner...">
                <br>
                <span class="glyphicon glyphicon-cloud"> 友链status:</span>
                <br>
                <textarea class="form-control" rows="10" name="status" placeholder="请输入友链status..."></textarea>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <br>
                <button class="btn btn-sm btn-block btn-success">提交</button>
            </form>
        </div>
    </div>
@endsection
<script language="JavaScript">
    function check_ip(str) {
        var xmlhttp;
        if (window.XMLHttpRequest) {
            xmlhttp=new XMLHttpRequest();
        }
        else {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState==4&&xmlhttp.status==200){
                document.getElementById('ip').innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open('GET','/check_ip/'+str,true);
        xmlhttp.send();
    }

    function check_name(str) {
        var xmlhttp;
        if (window.XMLHttpRequest) {
            xmlhttp=new XMLHttpRequest();
        }
        else {
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange=function(){
            if(xmlhttp.readyState==4&&xmlhttp.status==200){
                document.getElementById('name').innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open('GET','/check_name/'+str,true);
        xmlhttp.send();
    }
</script>