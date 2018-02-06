<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title & Logo --}}
    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .header{
            background-image: url('{{ asset('img/img1.jpg') }}');
            background-size: cover;
            background-attachment: fixed; 
            min-height: 80vh;
        }
        .features{
            background-image: url('{{ asset('img/img2.jpg') }}');
            background-size: cover;
            background-attachment: fixed; 
            min-height: 60vh;
            overflow: hidden;
        }
        .overlay{
            background-color: rgba(0,0,0,0.7);
            min-height: 80vh;

        }
    </style>

</head>
<body >
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="img-icon d-inline-block align-top">
                {{ config('app.name') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-target" aria-controls="nav-target" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="nav-target">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="#home" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#features" class="nav-link">Features</a></li>
                    <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    {{-- Header --}}
    <header class="header" id="home">
        <div class="overlay p-md-5 py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 d-none d-lg-block text-white">
                        <h3 class="display-3"><strong>Welcome</strong></h3>
                        <hr class="bg-light">
                        <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat, consequuntur.</small>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <img src="{{ asset('img/logo.png') }}" alt="" width="100px" height="100px" class="align-middle"> 
                                    <h3>Bulacan Polytechnic College</h3>
                                    <p>Grading System</p>
                                </div>
                                <form>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <hr>
                                    <input type="submit" value="Login" class="btn btn-outline-success btn-block">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- Features --}}
    <section class="p-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p class="display-4 pb-1">Features</p>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Secure</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, nam quidem aut expedita ab magnam maxime optio officiis dicta? Libero optio pariatur, modi quaerat impedit!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Automated</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, nam quidem aut expedita ab magnam maxime optio officiis dicta? Libero optio pariatur, modi quaerat impedit!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Fast</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, nam quidem aut expedita ab magnam maxime optio officiis dicta? Libero optio pariatur, modi quaerat impedit!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>        
    </section>
    
    <section class="features">
        {{-- <div class="p-5 overlay"> --}}
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Secure</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, nam quidem aut expedita ab magnam maxime optio officiis dicta? Libero optio pariatur, modi quaerat impedit!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Automated</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, nam quidem aut expedita ab magnam maxime optio officiis dicta? Libero optio pariatur, modi quaerat impedit!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Fast</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, nam quidem aut expedita ab magnam maxime optio officiis dicta? Libero optio pariatur, modi quaerat impedit!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </section>
    
    {{-- About --}}
    <section class="p-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    
                </div>
                <div class="col-md-6">
                    
                </div>
            </div>
        </div>
    </section>

    {{-- ScriptS --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>