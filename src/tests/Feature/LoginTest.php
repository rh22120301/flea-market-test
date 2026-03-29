<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_メールアドレスが入力されていない場合はバリデーションエラーになる()
    {
        $response = $this->post('/login', [
            'email' => '',
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ]);

        $response->assertSessionHasErrors(['email']);
    }
    public function test_パスワードが入力されていない場合はバリデーションエラーになる()
    {
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => '',
            'password_confirmation' => '12345678',
        ]);

        $response->assertSessionHasErrors(['password']);
    }
    public function test_登録されていない情報でログインするとエラーになる()
    {
        $response = $this->post('/login', [
            'email' => 'notfound@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors(['email']);
    }
    public function test_全ての必要項目が正しい場合はログインできる()
    {
        $user = \App\Models\User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'user@example.com',
            'password' => 'password123',
        ]);

        $response->assertStatus(302);

        $this->assertAuthenticatedAs($user);
    }



}
