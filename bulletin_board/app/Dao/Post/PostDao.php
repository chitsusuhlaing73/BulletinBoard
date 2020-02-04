<?php

namespace App\Dao\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Models\Post;

class PostDao implements PostDaoInterface 
{
    /**
     * post store
     *
     * @param Array $store_post
     * @return Post
     */
    public function store($post)
    {
        $store_post = new Post ([
            'title' => $post->title,
            'description' => $post->description,
            'create_user_id' => $post->create_user_id,
            'updated_user_id' => $post->updated_user_id,
        ]);
        $store_post -> save();
        return back();
    }

    /**
     * show update post
     *
     * @param integer $id
     * @return void
     */
    public function postupdate($id) 
    {
        $post = Post::find($id);
        return $post;
    }

    /**
     * post update confirm Function
     *
     * @param Request $request
     * @return void
     */
    public function updateconfirm ($post) 
    {
        $store_post = new Post([
            'title' => $post->title,
            'description' => $post->description,
            'status' => $post->status,
        ]);
        return $store_post;
        
    }
    
}