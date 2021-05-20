<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

class CreatePosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert posts data.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = file_get_contents("https://jsonplaceholder.typicode.com/posts");
        $posts = json_decode($data, true);
        Post::insert($posts);
    }
}
