<?php

namespace App\Contracts\Dao\Post;

interface PostDaoInterface
{
    public function store($post);
    public function postupdate($id);
}