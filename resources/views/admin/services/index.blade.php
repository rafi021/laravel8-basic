@extends('admin.admin_master')

@section('admin_content')
<div class="container">
    <div class="row py-8">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    List of All Services
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
                            <th scope="col">Service Icon</th>
                            <th scope="col">Service Title</th>
                            <th scope="col">Service Description</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                            <tr>
                                <th scope="row">{{ $services->firstItem()+$loop->index }}</th>
                                <td><i class="{{ $service->icon }}"></i></td>
                                <td>{{ $service->title }}</td>
                                <td>{{ $service->description }}</td>
                                <td>
                                    <div class="btn-group">
                                    <a href="{{ route('service.edit', $service) }}" class="btn  btn-info mr-1">Edit</a>
                                    <form method="POST" action="{{ route('service.destroy', $service) }}">
                                        @method('delete')
                                        @csrf
                                        <a class="btn btn-danger"
                                        href="{{ route('service.destroy', $service) }}"
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
                    {{ $services->links() }}
            </div>
        </div>
        <div class="col-md-4">
            
            <div class="card">
                <div class="card-header">
                    Add service
                </div>
                <div class="card-body">
                    <form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="serviceNameInput">service Title</label>
                            <input type="text" name="title" id="serviceNameInput" class="form-control" aria-describedby="serviceHelp">
                            @error('title')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="serviceDescriptionInput">service Description</label>
                            <textarea name="description" id="service-description" cols="30" rows="10" class="form-control"></textarea>
                            @error('description')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="serviceNameInput">service Icon</label>
                            <input type="text" name="icon" id="serviceICONInput" class="form-control" aria-describedby="serviceHelp">
                            @error('icon')
                                <span class="alert text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group py-2">
                            <button type="submit" class="btn btn-primary">Add service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

