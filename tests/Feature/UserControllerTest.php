<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testLoginPage()
    {
        $this->get('/login')
            ->assertSeeText('Login');
    }

    public function testLoginPageUserAlreadyLogin()
    {
        $this->withSession(['username' => 'Gibran'])
            ->get('/login')
            ->assertRedirect('/');
    }


    public function testLoginSuccess()
    {
        $this->seed(UserSeeder::class);

        $this->post('/login', [
            'username' => 'Gibran',
            'password' => 'kilerrr'
        ])->assertRedirect('/');
    }

    public function testLoginUserAlreadyLogin()
    {
        $this->withSession(['username' => 'Gibran'])
            ->post('/login', [
                'username' => 'Gibran',
                'password' => 'kilerrr'
            ])
            ->assertRedirect('/');
    }

    public function testValidationFailed()
    {
        $this->post('/login', [])
            ->assertSessionHasErrors(['username', 'password']);
    }
    
    public function testValidationUsernameNull()
    {
        $this->post('/login', [
            'username' => '',
            'password' => '12345'
        ])
            ->assertSessionHasErrors(['username']);
    }

    public function testValidationPasswordNull()
    {
        $this->post('/login', [
            'username' => 'Gibran',
            'password' => ''
        ])
            ->assertSessionHasErrors(['password']);
    }

    public function testLoginFailed()
    {
        $this->post('/login', [
            'username' => 'salah',
            'password' => 'salah'
        ])->assertSeeText('User or password wrong');
    }

    public function testRegisterPage()
    {
        $this->get('/register')
            ->assertSeeText('Register');
    }

    public function testRegisterSuccess()
    {
        $this->post('/register', [
            'name' => 'M Gibran Fajar',
            'username' => 'branyourboy',
            'email' => 'sushibran@gmail.com',
            'password' => 'fckyustina',
            'password_confirmation' => 'fckyustina'
        ])->assertSeeText('Registrasi berhasil. Silahkan login');
    }

    public function testRegisterUsernameExist()
    {
        $this->seed(UserSeeder::class);
        
        $this->post('/register', [
            'name' => 'M Gibran Fajar',
            'username' => 'Gibran',
            'email' => 'sushibran@gmail.com',
            'password' => 'fckyustina',
            'password_confirmation' => 'fckyustina'
        ])->assertSessionHasErrors(['username']);
    }

    public function testRegisterEmailExist()
    {
        $this->seed(UserSeeder::class);
        
        $this->post('/register', [
            'name' => 'M Gibran Fajar',
            'username' => 'branyourboy',
            'email' => 'gibranfajar6@gmail.com',
            'password' => 'fckyustina',
            'password_confirmation' => 'fckyustina'
        ])->assertSessionHasErrors(['email']);
    }

    public function testRegisterPasswordNotSame()
    {
        $this->post('/register', [
            'name' => 'M Gibran Fajar',
            'username' => 'branyourboy',
            'email' => 'sushibran@gmail.com',
            'password' => 'fckyustina',
            'password_confirmation' => 'fckyustina1'
        ])->assertSessionHasErrors(['password']);
    }
    
    public function testMemberLogout()
    {
        $this->withSession(['username' => 'fatah'])
        ->post('/logout', [])
        ->assertRedirect('/login');

    }

    public function testGuestLogout()
    {
        $this
            ->post('/logout', [])
            ->assertRedirect('/login');
    }


}
