@extends('layouts.default')

@section('main-content')
    <body class="app flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card-group mb-0">
                        <div class="card p-4">
                            <div class="card-block">
                                <h1>Login</h1>
                                <p class="text-muted">Sign In to your account</p>
                                
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                
                                <div class="input-group mb-3">
                                    <span class="input-group-addon"><i class="icon-user"></i>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                                <div class="input-group mb-4">
                                    <span class="input-group-addon"><i class="icon-lock"></i>
                                    </span>
                                    <input type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-primary px-4">Login</button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="button" class="btn btn-link px-0">Forgot password?</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-inverse card-primary py-5 d-md-down-none" style="width:44%">
                            <div class="card-block text-center">
                                <div>
                                    <h2>Sign up</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <button type="button" class="btn btn-primary active mt-3">Register Now!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

@endsection