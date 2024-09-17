<x-app-layout>

    <x-slot name="title">
       Add Books
    </x-slot>
<div class="container mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Books
                    <a href="{{ url('books')}}" class="btn btn-primary float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('books/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label>Title:</label>
                        <input type="text" name="title" value="{{ old('title') }}"/>
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Author:</label>
                        <input type="text" name="author" value="{{ old('author') }}"/>
                        @error('author') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Genre:</label>
                        <select name="genre" class="form-control">
                            <option value="">-- Select Genre --</option>
                            @foreach (App\Models\Book::GENRES as $genre)
                                <option value="{{ $genre }}" {{ old('genre') == $genre ? 'selected' : '' }}>{{ $genre }}</option>
                            @endforeach
                        </select>
                        @error('genre') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Release Date:</label>
                        <input type="date" name="release_date" value="{{ old('release_date') }}"/>
                        @error('release_date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3"> {{ old('description') }}</textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Upload Image:</label>
                        <input type="file" name="cover_image" value="{{ old('cover_image') }}"/>
                        @error('cover_image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
