@extends('admin.admin_master')

@section('admin_content')
<div class="container">
    <div class="row py-8">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    List of All Sliders
                </div>
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Congrats!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Slider Image</th>
                            <th scope="col">Slider Title</th>
                            <th scope="col">Slider Description</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                            <tr>
                                <th scope="row">{{ $sliders->firstItem()+$loop->index }}</th>
                                <td><img src="{{ asset($slider->image) }}" alt="" height="60px" width="60px" class="img-fluid img-thumbnail"></td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->description }}</td>
                                <td>
                                    <div class="btn-group">
                                    <a href="{{ route('slider.edit', $slider) }}" class="btn  btn-info mr-1">Edit</a>
                                    <form method="POST" action="{{ route('slider.destroy', $slider) }}">
                                        @method('delete')
                                        @csrf
                                        <a class="btn btn-danger"
                                        href="{{ route('slider.destroy', $slider) }}"
                                                onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Delete') }}
                                        </a>
                                    </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $sliders->links() }}
            </div>
        </div>
        <div class="col-md-4">
            
            <div class="card">
                <div class="card-header">
                    Add slider
                </div>
                <div class="card-body">
                    <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="sliderNameInput">Slider Title</label>
                            <input type="text" name="title" id="sliderNameInput" class="form-control" aria-describedby="sliderHelp">
                            @error('title')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sliderDescriptionInput">Slider Description</label>
                            <textarea name="description" id="slider-description" cols="30" rows="10" class="form-control"></textarea>
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
                        <div class="form-group py-2">
                            <button type="submit" class="btn btn-primary">Add slider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

