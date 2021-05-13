<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Brand') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row py-8">
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congrats!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        List of All Brand
                    </div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Brand Image</th>
                                <th scope="col">Brand Name</th>
                                <th scope="col">Brand Slug</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                <tr>
                                    <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                                    <td><img src="{{ asset($brand->brand_image) }}" alt="" height="60px" width="60px" class="img-fluid img-thumbnail"></td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>{{ $brand->brand_slug }}</td>
                                    <td>
                                        <div class="btn-group">
                                        <a href="{{ route('brand.edit', $brand) }}" class="btn  btn-info mr-1">Edit</a>
                                        <form method="POST" action="{{ route('brand.destroy', $brand) }}">
                                            @method('delete')
                                            @csrf
                                            <a class="btn btn-danger"
                                            href="{{ route('brand.destroy', $brand) }}"
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
                        {{ $brands->links() }}
                </div>
            </div>
            <div class="col-md-4">
                
                <div class="card">
                    <div class="card-header">
                        Add brand
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="brandNameInput">brand Name</label>
                                <input type="text" name="brand_name" id="brandNameInput" class="form-control" aria-describedby="brandHelp">
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
                            <div class="form-group py-2">
                                <button type="submit" class="btn btn-primary">Add brand</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 