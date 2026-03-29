<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\Condition;


class CommentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_コメントが入力されていない場合はバリデーションエラーになる()
    {
        $user = User::factory()->create([
            'profile_completed' => true,
        ]);
        $this->actingAs($user);

        Condition::create(['id' => 1, 'condition' => '新品']);

        $product = Product::factory()->create([
            'sell_user_id' => $user->id,
        ]);

        $response = $this->post("/products/{$product->id}/comment", [
            'detail' => '',
        ]);

        $response->assertSessionHasErrors(['detail']);
    }

    public function test_コメントが255文字以上の場合はバリデーションエラーになる()
    {
        $user = User::factory()->create([
            'profile_completed' => true,
        ]);
        $this->actingAs($user);

        $condition = Condition::create(['id' => 1, 'condition' => '新品']);

        $product = Product::factory()->create([
            'sell_user_id' => $user->id,
            'condition_id' => $condition->id,
        ]);

        // 256文字の文字列を作成
        $longText = str_repeat('あ', 256);

        $response = $this
            ->from("/products/{$product->id}")
            ->post("/products/{$product->id}/comment", [
                'detail' => $longText,
            ]);

        $response->assertSessionHasErrors(['detail']);
    }

    
}
