@extends('layouts.app')

@section('title','| Dashboard')

@section('content')
    <div class="container my-5">
        {{-- Showcase --}}
        <section class="showcase">
            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <p><i class="fa fa-users fa-4x"></i></p>
                                </div>
                                <div class="col-8 text-right">
                                    <h3 class="card-title">Student</h3>
                                    <p class="card-text h4">1000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-secondary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <p><i class="fa fa-university fa-4x"></i></p>
                                </div>
                                <div class="col-8 text-right">
                                    <h3 class="card-title">Teacher</h3>
                                    <p class="card-text h4">1000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <p><i class="fa fa-font-awesome fa-4x"></i></p>
                                </div>
                                <div class="col-8 text-right">
                                    <h3 class="card-title">Post</h3>
                                    <p class="card-text h4">1000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <p><i class="fa fa-user-secret fa-4x"></i></p>
                                </div>
                                <div class="col-8 text-right">
                                    <h3 class="card-title">Unknown</h3>
                                    <p class="card-text h4">1000</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Showcase --}}
        <section class="post-group">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">User List</h5>
                            <div class="table-responsive-sm">
                                <table class="table" id="userTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title">Subject List</h5>
                            <div class="table-responsive-sm">
                                <table class="table" id="subjectTable">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('script')
    
@endpush