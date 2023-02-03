@extends('layouts.dashboard')

@section('title')
    Store Dashboard Product Create
@endsection

@section('content')
    <!-- Page Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Create New Product</h2>
                <p class="dashboard-subtitle">Create your own product</p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-12">
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
                        <form action="{{ route('dashboard-product-store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="product_name">Product Name</label>
                                                <input type="text" name="name" class="form-control" id="product_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="number" name="price" class="form-control" id="price">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="category">Kategori</label>
                                                <select name="categories_id" class="form-control" id="category">
                                                    @foreach ($categories as $categories)
                                                        <option value="{{ $categories->id }}">{{ $categories->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" id="editor"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="thumbnails">Thumbnails</label>
                                                <input type="file" name="photo" class="form-control" id="thumbnails">
                                                <p class="text-muted">
                                                    *Kamu dapat memilih lebih dari satu file
                                                </p>
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
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script>
        function thisFileUpload() {
            document.getElementById("file").click();
        }
    </script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endpush
