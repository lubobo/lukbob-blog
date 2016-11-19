<!Doctype Html>
<html style="height: 100%;padding: 0;margin: 0;">
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/src/main.css">
    <link rel="stylesheet" href="/Font-Awesome-3.2.1/css/font-awesome.min.css">
    <script type="text/javascript" src="{{URL::to('/ckeditor/ckeditor.js')}}"></script>
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <meta name="_token" content="{!! csrf_token() !!}">
    <meta charset="UTF-8">
</head>
<body style="height: 100%;padding: 0;margin: 0;">
<div style="min-height: 100%;height: auto !important;position: relative; background-color:#d5d5d5">
    <div class="container" style="width: 100%;padding: 0;">
        <div>
            @include('dashboards.admin_header')
        </div>
        <div style="width:100%;margin:0 auto;padding-bottom:5%;">
            @yield('content')
        </div>
        <div style="position: absolute;width: 100%;bottom:0;clear: both;">
            @include('dashboards.admin_footer')
        </div>
    </div>
</div>
</body>
</html>