<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <h3 align="center">Edit post</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method = "POST" action = "{{route('edit_post')}}">
            @csrf
            <input type="hidden" id="id" name="id" value="{{$id}}">
            <div class="form-group row form-space">
                <label for="user_id" class="col-sm-2 col-space">User Id</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-space" id="user_id" name="user_id" value="{{$posts->userId}}" placeholder="User Id">
                </div>
            </div>
            <div class="form-group row form-space">
                <label for="title" class="col-sm-2 col-space">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control col-space" id="title" name="title" value="{{$posts->title}}" placeholder="Title">
                </div>
            </div>
            <div class="form-group row form-space">
                <label for="body" class="col-sm-2 col-space">Body</label>
                <div class="col-sm-10">
                    <textarea id="body" name="body" class="form-control" rows="4" cols="50">{{$posts->body}}</textarea>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary button-space">Submit</button>
            </div>
        </form>
    </body>
</html>
