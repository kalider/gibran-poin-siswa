<?php

namespace App\Services;



interface UserService
{
   function login(string $user,string $password):bool; 
   public function register(array $data): bool;
}