<?php

namespace App\Services\Impl;


use App\Services\UserService;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserServiceImpl implements UserService
{

    public function login(string $username, string $password): bool
    {
        $user = DB::table('users')->where('username', $username)->first();

        if (empty($user)) return false;

        return Hash::check($password, $user->password);
    }

    public function register(array $data): bool
    {
        $user = DB::table('users')
            ->where('username', $data['username'])
            ->orWhere('email', $data['email'])->first();

        if (!empty($user) && $user->username == $data['username']) {
            throw new \Exception('Username sudah terdaftar');
        }

        if (!empty($user) && $user->email == $data['email']) {
            throw new \Exception('Email sudah terdaftar');
        }

        $data['password'] = Hash::make($data['password']);
        $data['created_at'] = date('Y-m-d H:i:s');

        return DB::table('users')->insert($data);
    }
}
