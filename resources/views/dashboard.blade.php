@extends('layouts.admin')
<title>Dashboard</title>
@section('content')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <h2 class="card-header">{{ __('Welcome') }}</h2>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <p>{{ __('You are logged in as') }} {{ Auth::user()->name }}</p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
     

@endsection
