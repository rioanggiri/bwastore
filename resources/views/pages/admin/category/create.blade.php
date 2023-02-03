@extends('layouts.admin')

@section('title')
    Admin Category
@endsection

{{-- @push('addon-style')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
        integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

    <style>
        .fa-eye,
        .fa-eye-slash {
            cursor: pointer;
        }
    </style>
@endpush --}}

@section('content')
    <!-- Page Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Category</h2>
                <p class="dashboard-subtitle">Create New Category</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        {{-- Jika Terjadi Error --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Kategori</label>
                                                <input type="text" name="name" class="form-control" required>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="password">Password:</label>
                                                <div class="input-group mb-3">
                                                    <input type="password" class="form-control" id="password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text btn-secondary">
                                                            <i class="fa fa-eye"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Foto</label>
                                                <input type="file" name="photo" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-5">
                                                Save Now
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @push('addon-script')
    <script>
        $(".fa-eye").click(function() {
            let input = $("#password");
            if (input.attr("type") === "password") {
                input.attr("type", "text");
                $(this).removeClass("fa-eye").addClass("fa-eye-slash");
            } else {
                input.attr("type", "password");
                $(this).removeClass("fa-eye-slash").addClass("fa-eye");
            }
        });
    </script>
@endpush --}}
