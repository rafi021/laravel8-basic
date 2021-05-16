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
                    Edit Service
                </div>
                <div class="card-body">
                    <form action="{{ route('service.update', $service) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="serviceNameInput">Service Title</label>
                            <input type="text" name="title" id="serviceNameInput" class="form-control" aria-describedby="serviceHelp" value="{{ $service->title }}">
                            @error('title')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="serviceDescriptionInput">service Description</label>
                            <textarea name="description" id="service-description" cols="30" rows="10" class="form-control">{{ $service->description }}</textarea>
                            @error('description')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="serviceIconInput">Service Icon</label>
                            <input type="text" name="icon" id="serviceIconInput" class="form-control" aria-describedby="serviceHelp" value="{{ $service->icon }}">
                            @error('icon')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <i class="{{ $service->icon }}"></i>
                        </div>
                        <div class="form-group py-2">
                            <button type="submit" class="btn btn-primary">Edit service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection