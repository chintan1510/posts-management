<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostsRepository;
use Illuminate\Support\Facades\Response;

class PostsService
{
    public function export($ids)
    {
        if(count($ids) == 1 && $ids[0] == "") {
            $posts = Post::all();
        } else {
            $posts = Post::whereIn('id', $ids)->get();
        }

        $filename = "posts.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('Id', 'User Id', 'Title', 'Body'));

        foreach($posts as $post) {
            fputcsv($handle, array($post['id'], $post['userId'], $post['title'], $post['body']));
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "inline; filename=$filename",
        );

        return Response::download(public_path() . "/" . $filename, "posts_" . date('d-m-y') . ".csv" , $headers);
    }

    public function editPost($data)
    {
        $post = Post::find($data['id']);
        $post->userId = $data['user_id'];
        $post->title = $data['title'];
        $post->body = $data['body'];
        $post->save();
    }

    public function deletePost($id)
    {
        $post = Post::find($id);
        $post->delete();
    }
}
