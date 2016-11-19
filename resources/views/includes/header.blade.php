<div class="container" style="width:100%">
    <div class="col-xs-4 col-xs-offset-2">
        <h1 class="text-warning" style="text-decoration: none">
            <a class="text-warning" style="text-decoration: none" href="{{route('welcome')}}">
                小胡子陸bebe
            </a>
        </h1>
    </div>
    <ul class="nav navbar-nav col-xs-6 navbar-right">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active dropdown">
                    <a href="#" class="text-warning h4 dropdown-toggle" data-toggle="dropdown">Server<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{route('getStatusArticle',['status'=>'PHP'])}}">PHP</a></li>
                        <li><a href="{{route('getStatusArticle',['status'=>'Laravel'])}}">Laravel</a></li>
                        <li><a href="{{route('getStatusArticle',['status'=>'HTTP'])}}">HTTP</a></li>
                    </ul>
                </li>
                <li class="active dropdown">
                    <a href="#" class="text-warning h4 dropdown-toggle" data-toggle="dropdown">Js<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{route('getStatusArticle',['status'=>'Nodejs'])}}">Nodejs</a></li>
                        <li><a href="{{route('getStatusArticle',['status'=>'JavaScript'])}}">JavaScript</a></li>
                        <li><a href="{{route('getStatusArticle',['status'=>'Bootstrap'])}}">Bootstrap</a></li>
                        <li><a href="{{route('getStatusArticle',['status'=>'Ajax'])}}">Ajax</a></li>
                    </ul>
                </li>
                <li class="active"><a class="text-warning h4" href="{{route('getStatusArticle',['status'=>'Linux'])}}">Linux</a></li>
                <li class="active"><a class="text-warning h4" href="{{route('getStatusArticle',['status'=>'Python'])}}">C++</a></li>
		 <li class="active"><a class="text-warning h4" href="{{route('getStatusArticle',['status'=>'闲聊'])}}">闲聊</a></li>
            </ul>
            <br>
            <form class="navbar-form navbar-left col-xs-1" style="margin-top:-3px;" action="{{route('searchFor')}}" role="search" method="post">
                <div id="input1" class="form-group">
                    <input type="text" class="form-control"  placeholder="Search">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-default form-control">
                        <span id="span" class="glyphicon glyphicon-search" style="visibility: visible"></span>
                    </button>
                </div>
            </form>
        </div>
    </ul>
</div>
<script language="JavaScript">
    $(document).ready(function () {
        $('span').onmouseover(function () {
            $('#input1').fadeIn();
            $('#input2').fadeIn("slow");
        })
    })
</script>
