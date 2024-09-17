<x-app-layout>
    <x-slot name="title">
        Books
    </x-slot>

    <div class="container mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Books
                        <a href="{{ url('books/create') }}" class="btn btn-primary float-end">Add Book</a>
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Search and Filtering Form -->
                    <form action="{{ url('books') }}" method="GET" class="mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Search by Title:</label>
                                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by Title">
                            </div>
                            <div class="col-md-2">
                                <label for="">Genre:</label>
                                <select name="genre" class="form-control">
                                    <option value="">All Genres</option>
                                    @foreach (App\Models\Book::GENRES as $genreOption)
                                        <option value="{{ $genreOption }}" {{ request('genre') == $genreOption ? 'selected' : '' }}>
                                            {{ $genreOption }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="">Released From:</label>
                                <input type="date" name="release_date_from" value="{{ request('release_date_from') }}" class="form-control" placeholder="From Date">
                            </div>
                            <div class="col-md-2">
                                <label for="">Released To:</label>
                                <input type="date" name="release_date_to" value="{{ request('release_date_to') }}" class="form-control" placeholder="To Date">
                            </div>
                            <div class="col-md-1">
                                <label for="">Sort by:</label>
                                <select name="sort_by" class="form-control">
                                    <option value="title" {{ request('sort_by') == 'title' ? 'selected' : '' }}>Sort by Title</option>
                                    <option value="release_date" {{ request('sort_by') == 'release_date' ? 'selected' : '' }}>Sort by Release Date</option>
                                    <option value="author" {{ request('sort_by') == 'author' ? 'selected' : '' }}>Sort by Author</option>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <label for="">Order:</label>
                                <select name="order" class="form-control">
                                    <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Asc</option>
                                    <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Desc</option>
                                </select>
                            </div>
                            
                            <div class="col-md-4 d-flex mt-3">
                                <button type="submit" class="btn btn-primary w-100 mx-1">Filter</button>
                                <a href="{{ url('books') }}" class="btn btn-secondary w-50 mx-1">Reset</a>
                            </div>
                            
                        </div>
                    </form>

                    <!-- Books Table -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Genre</th>
                                <th>Release Date</th>
                                <th>Description</th>
                                <th>Cover Image</th>
                                <th>Created</th>
                                <th>Edited</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->author }}</td>
                                    <td>{{ $item->genre }}</td>
                                    <td>{{ $item->release_date }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>
                                        <img src="{{ asset($item->cover_image) }}" style="width: 70px" alt="image">
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a href="{{ url('books/'.$item->id.'/edit') }}" class="btn btn-success mx-2">Edit</a>
                                        <a href="{{ url('books/'.$item->id.'/delete') }}" class="btn btn-danger mx-1"
                                           onclick="return confirm('Are you sure you want to delete this book?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
