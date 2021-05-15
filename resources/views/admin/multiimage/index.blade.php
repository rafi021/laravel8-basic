<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Multi Image') }}
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
            <div class="col-md-4">
                
                <div class="card">
                    <div class="card-header">
                        Add Multiple Image
                    </div>
                    <div class="card-body">
                        <form action="{{ route('multiimage.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="multiNameInput">multi Image</label>
                                <input type="file" name="multi_image[]" id="multiImageInput" class="form-control" multiple>
                                @error('multi_image')
                                    <span class="alert text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group py-2">
                                <button type="submit" class="btn btn-primary">Add Multiple Image</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 