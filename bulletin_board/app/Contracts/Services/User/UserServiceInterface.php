<?php

namespace App\Contracts\Services\User;

interface UserServiceInterface
{
    public function confirm($request);
    public function store($request);
}