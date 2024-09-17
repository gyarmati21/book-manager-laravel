<x-app-layout>

    <x-slot name="title">
        Books
    </x-slot>
<title>Add Books</title>
<div class="container mt-5">
    <div>
        <div class="card">
            <div class="card-header">
                <h4>Add Books
                    <a href="{{ url('books')}}" class="btn btn-primary float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="{{ url('books/' . $book->id . '/edit') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Title:</label>
                        <input type="text" name="title" value="{{ $book->title }}"/>
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Author:</label>
                        <input type="text" name="author" value="{{ $book->author }}"/>
                        @error('author') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Genre:</label>
                        <input type="text" name="genre" value="{{ $book->genre }}"/>
                        @error('genre') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Release Date:</label>
                        <input type="date" name="release_date" value="{{ $book->release_date }}"/>
                        @error('release_date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="3"> {{ $book->description }}</textarea>
                        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Cover Image:</label>
                        <input type="text" name="cover_image" value="{{ $book->cover_image }}"/>
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