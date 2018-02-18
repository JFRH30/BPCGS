@extends('layouts.app')

@push('styles')
  <style>
    .header{
        background-image: url('{{ asset('img/img1.jpg') }}');
        background-size: cover;
        background-attachment: fixed; 
        min-height: 80vh;
    }
    .about{
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
@endpush

@section('title', '| Home')

@section('status','active')

@section('content')
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
                              {!! Form::open(['route'=>'login']) !!}
                                <div class="form-group">
                                  {!! Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Email']) !!}
                                </div>
                                <div class="form-group">
                                  {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
                                </div>
                                <hr>
                                {!! Form::submit('Login', ['class'=>'btn btn-block btn-outline-primary']) !!}
                              {!! Form::close() !!}
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </header>

  {{-- Features --}}
  <section class="p-5 bg-light" id="features">
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
  
  <section class="about" id="about">
      <div class="p-5 overlay">
          <div class="container my-auto">
              <div class="my-md-5 row">
                  <div class="col-lg-12 text-center">
                      <p class="display-4 pb-1 text-white">About</p>
                      <hr class="bg-light">
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
                      <hr class="bg-light">
                  </div>
              </div>
          </div>
      </div>
  </section>
@endsection