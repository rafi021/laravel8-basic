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
                    Edit slider
                </div>
                <div class="card-body">
                    <form action="{{ route('slider.update', $slider) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $slider->image }}">
                        <div class="form-group">
                            <label for="sliderNameInput">Slider Title</label>
                            <input type="text" name="title" id="sliderNameInput" class="form-control" aria-describedby="sliderHelp" value="{{ $slider->title }}">
                            @error('title')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sliderDescriptionInput">Slider Description</label>
                            <textarea name="description" id="slider-description" cols="30" rows="10" class="form-control">{{ $slider->description }}</textarea>
                            @error('description')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sliderNameInput">Slider Image</label>
                            <input type="file" name="image" id="sliderImageInput" class="form-control">
                            @error('image')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img src="{{ asset($slider->image) }}" alt="" width="200px" height="200px">
                        </div>
                        <div class="form-group py-2">
                            <button type="submit" class="btn btn-primary">Edit slider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection