<?php

namespace App\Repositories\Interface;

interface AuthRepositoryInterface
{
    public function login(array $data);
    public function logout();
}
