<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Condition;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_全商品が表示される()
    {
        DB::table('conditions')->insert([
            ['id' => 1, 'condition' => '良好'],
        ]);

        $user = \App\Models\User::factory()->create();

        $products = Product::factory()->count(3)->create([
            'sell_user_id' => $user->id,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);

        foreach ($products as $product) {
            $response->assertSee($product->name);
        }
    }
    public function test_購入済み商品には_Sold_と表示される()
    {
        DB::table('conditions')->insert([
            ['id' => 1, 'condition' => '良好'],
        ]);

        $user = User::factory()->create([
            'profile_completed' => true,
        ]);

        $soldProduct = Product::factory()->create([
            'sell_user_id' => $user->id,
            'buy_user_id'  => $user->id,
            'condition_id' => 1,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Sold');
    }

}
