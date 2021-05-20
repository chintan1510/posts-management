<?php

namespace App\Repositories;

use App\Models\Post;

class PostsRepository
{
    public function getPosts()
    {
        return Post::paginate(10);
    }

    public function getById($id)
    {
        return Post::where('id', $id)->select([
            'userId',
            'title',
            'body',
        ])->firstOrFail();
    }
}
