<?php

namespace App\Services\Post;

use App\Contracts\Dao\Post\PostDaoInterface;
use App\Contracts\Services\Post\PostServiceInterface;
use Hash;
use App\Models\Post;
use Auth;

class PostService implements PostServiceInterface
{
    private $postDao;

    /**
     * Constructor
     *
     * @param postDaoInterface $postDao
     */
    public function __construct(PostDaoInterface $postDao)
    {
        $this->postDao = $postDao;
    }

    /**
     * post store 
     *
     * @param Request $request
     * @return void
     */
    public function store($request) 
    {
        $post = new Post;
        $post ->title = $request->title ;
        $post->description = $request->description;
        $post->create_user_id = Auth::user()->id;
        $post->updated_user_id =Auth::user()->id;
        $post->created_at = now();
        $post->updated_at = now();
        return $this->postDao->store($post);
    }

    /**
     * post confirm 
     *
     * @param Request $request
     * @return void
     */
    public function confirm($request)
    {
        $post = new Post;
        $post ->title = $request->title ;
        $post->description = $request->description;
        return $post;
    }

    /**
     * show update post
     *
     * @param integer $id
     * @return void
     */
    public function postupdate ($id) 
    {
        return $this->postDao->postupdate($id);
    }

    /**
     * post update confirm Function
     *
     * @param Request $request
     * @return void
     */
    public function updateconfirm ($request) 
    {
        $post = new Post;
        $post ->id = Post::find($request->id);
        $post ->title = $request->title ;
        $post->description = $request->description;
        $post ->status = $request->status;
        return $this->postDao->updateconfirm($post);
    }

    
}