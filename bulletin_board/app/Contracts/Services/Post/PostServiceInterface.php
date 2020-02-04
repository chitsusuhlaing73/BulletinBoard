<?php

namespace App\Contracts\Services\Post;

interface PostServiceInterface
{
    public function confirm($request);
    public function store($request);
    public function postupdate($id);
    public function updateconfirm ($request);
}