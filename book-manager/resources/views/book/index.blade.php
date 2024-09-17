
    <div class="container">
        <div>
            <div class="card">
                <div class="card-header">
                    <h4>Books
                        <a href="{{ url('books/create')}}">Add Book</a>
                    </h4>
                </div>
                <div class="card-body">
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
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->author}}</td>
                                    <td>{{$item->genre}}</td>
                                    <td>{{$item->release_date}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->cover_image}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td>
                                        <a href="">Edit</a>
                                        <a href="" >Delete</a>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
