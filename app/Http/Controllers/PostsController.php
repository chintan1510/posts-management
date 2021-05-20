<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostsRepository;
use App\Services\PostsService;

class PostsController extends Controller
{
    public function getPosts(PostsRepository $postsRepo)
    {
        $posts = $postsRepo->getPosts();

        return view('posts', ['posts' => $posts]);
    }

    public function getEditPostView(Request $request, PostsRepository $postsRepo)
    {
        $data = $postsRepo->getById($request->id);

        return view('edit_post', ['id' => $request->id, 'posts' => $data]);
    }

    public function editPost(PostsService $postsService, Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'title' => 'required|string',
            'body' => 'required|string',
        ]);
        $postsService->editPost($request->all());

        return redirect('posts')->with('success', 'Post edited successfully');
    }

    public function deletePost(PostsService $postsService, Request $request)
    {
        $postsService->deletePost($request->id);

        return redirect('posts')->with('success', 'Post deleted successfully');
    }

    public function export(PostsService $postService, Request $request)
    {
        return $postService->export(explode(',', $request->id));
    }
}
