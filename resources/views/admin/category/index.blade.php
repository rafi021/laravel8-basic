<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
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
                        List of All Category
                    </div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Slug</th>
                                <th scope="col">Created by</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->category_slug }}</td>
                                    <td>{{ $category->user->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                        <a href="{{ route('category.edit', $category) }}" class="btn  btn-info mr-1">Edit</a>
                                        <form method="POST" action="{{ route('category.destroy', $category) }}">
                                            @method('delete')
                                            @csrf
                                            <a class="btn btn-danger"
                                            href="{{ route('category.destroy', $category) }}"
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
                        {{ $categories->links() }}
                </div>
            </div>
            <div class="col-md-4">
                
                <div class="card">
                    <div class="card-header">
                        Add Category
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="categoryNameInput">Category Name</label>
                                <input type="text" name="category_name" id="categoryNameInput" class="form-control" aria-describedby="categoryHelp">
                                @error('category_name')
                                    <span class="alert text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group py-2">
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-8">
            {{-- @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congrats!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif --}}
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        List of trashed categories
                    </div>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Slug</th>
                                <th scope="col">Created by</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($trashedCategpries as $category)
                                <tr>
                                    <th scope="row">{{ $trashedCategpries->firstItem()+$loop->index }}</th>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->category_slug }}</td>
                                    <td>{{ $category->user->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                        <a href="{{ route('category.restore', $category) }}"class="btn btn-info mr-1">Restore</a>
                                        <form method="POST" action="{{ route('category.forceDelete', $category) }}">
                                            @csrf
                                            <a class="btn btn-danger"
                                            href="{{ route('category.forceDelete', $category) }}"
                                                    onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                {{ __('Force Delete') }}
                                            </a>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $trashedCategpries->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 