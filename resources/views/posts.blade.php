<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('js/export.js') }}"></script>
    </head>
    <body>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <span data-href="/posts/export" id="export" class="btn btn-success btn-sm">Export</span>
        <table id="posts" class="table table-sm">
            <thead>
                <th colspan="7" class="text-center">Posts</th>
                <tr>
                    <th><input class="form-check-input" id="check_all" type="checkbox"></th>
                    <th scope="col">Id</th>
                    <th scope="col">User Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th colspan="2" scope="col">Actions</th>
                </tr>
            </thead>
            @foreach($posts as $post)
            <tr>
                <td><input class="form-check-input" type="checkbox" name="row-check" value="{{$post['id']}}"></td>
                <td>{{$post['id']}}</td>
                <td>{{$post['userId']}}</td>
                <td>{{$post['title']}}</td>
                <td>{{$post['body']}}</td>
                <td><a href="{{route('edit_post_view', ['id' => $post['id']])}}" class="btn btn-primary">Edit</td>
                <td>
                    <form method="POST" action="{{route('delete_post', ['id' => $post['id']])}}">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-primary btn-danger delete-user">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $posts->links() }}
    </body>
</html>
