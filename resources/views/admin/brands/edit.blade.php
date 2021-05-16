@extends('admin.admin_master')

@section('admin_content')
<div class="container">
    <div class="row py-8">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congrats!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="col-md-6 m-auto">
            
            <div class="card">
                <div class="card-header">
                    Edit brand
                </div>
                <div class="card-body">
                    <form action="{{ route('brand.update', $brand) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
                        <div class="form-group">
                            <label for="brandNameInput">brand Name</label>
                            <input type="text" name="brand_name" id="brandNameInput" class="form-control" aria-describedby="brandHelp" value="{{ $brand->brand_name }}">
                            @error('brand_name')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="brandNameInput">brand Image</label>
                            <input type="file" name="brand_image" id="brandImageInput" class="form-control">
                            @error('brand_image')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img src="{{ asset($brand->brand_image) }}" alt="" width="200px" height="200px">
                        </div>
                        <div class="form-group py-2">
                            <button type="submit" class="btn btn-primary">Edit brand</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection