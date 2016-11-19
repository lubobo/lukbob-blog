@extends('layouts.dashboard')
@section('title')
    Admin Login
@endsection
@section('content')
    <br>
    <br>
    <br>
        <div class="btn col-xs-4 col-xs-offset-4" style="background-color:#4c4c4c">
            <p> </p>
            <h3 class="text-success text-center">Admin_Login</h3>
            <p> </p>
            <img src="pics/1.jpg" class="img-circle col-xs-offset-0" style="width: 45%">
            <h1> </h1>
            <div>
                <form class="form-group col-xs-6 col-xs-offset-3" action="{{route('adminHome')}}" method="POST">
                    <label for="name"><h4 class="text-warning">Name</h4>
                        <input type="text" class="form-control col-xs-10" name="admin_name">
                    </label>
                    <br>
                    <label for="password"><h4 class="text-warning">Passoword</h4>
                        <input type="password" class="form-control col-xs-10" name="password">
                    </label>
                    <p> </p>
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <button class="btn btn-sm col-xs-10 col-xs-offset-1 btn-success">Login</button>
                    <p class="col-xs-12"></p>
                    <a class="btn btn-sm col-xs-10 col-xs-offset-1 btn-warning">Cancel</a>
                    <br>
                </form>
            </div>
        </div>
@endsection