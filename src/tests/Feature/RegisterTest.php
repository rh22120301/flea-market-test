<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;
    
    public function test_名前が入力されていない場合はバリデーションエラーになる()
    {
        $response = $this->post('/register', [
            'name' => '',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors(['name']);
    }
    public function test_メールアドレスが入力されていない場合はバリデーションエラーになる()
    {
        $response = $this->post('/register', [
            'name' => '太郎',
            'email' => '',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors(['email']);
    }
    public function test_パスワードが入力されていない場合はバリデーションエラーになる()
    {
        $response = $this->post('/register', [
            'name' => '太郎',
            'email' => 'test@example.com',
            'password' => '',
            'password_confirmation' => 'password123',
        ]);

        $response->assertSessionHasErrors(['password']);
    }
    public function test_パスワードが7文字以下場合はバリデーションエラーになる()
    {
        $response = $this->post('/register', [
            'name' => '太郎',
            'email' => 'test@example.com',
            'password' => '1234567',
            'password_confirmation' => '1234567',
        ]);

        $response->assertSessionHasErrors(['password']);
    }
    public function test_パスワードが一致しない場合はバリデーションエラーになる()
    {
        $response = $this->post('/register', [
            'name' => '太郎',
            'email' => 'test@example.com',
            'password' => '12345678',
            'password_confirmation' => '123456789',
        ]);

        $response->assertSessionHasErrors(['password']);
    }
    public function test_全ての必要項目が正しい場合は登録できる()
    {
        $response = $this->post('/register', [
            'name' => 'テストユーザー',
            'email' => 'register-test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertStatus(302);

        $this->assertDatabaseHas('users', 
        [
            'email' => 'register-test@example.com',
        ]);

        $response->assertRedirect('/');
    }


}
