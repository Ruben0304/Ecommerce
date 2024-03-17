<?php


namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;


class AuthApiTest extends TestCase
{


    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        Sanctum::actingAs($this->user);
    }

    /** @test */
    public function users_show_route_returns_a_successful_response()
    {
        $response = $this->get('/api/v1/users/' . $this->user->id);
        $response->assertStatus(200);
    }

    /** @test */
//    public function users_update_route_returns_a_successful_response()
//    {
//        $response = $this->patch('/api/v1/users/' . $this->user->id, [
//            'name' => 'Updated Name',
//            'email' => 'updated@example.com',
//        ]);
//        $response->assertStatus(200);
//    }

    /** @test */
    public function cart_show_route_returns_a_successful_response()
    {
        $response = $this->get('/api/v1/cart/2');
        $response->assertStatus(200);
    }

    /** @test */
    public function cart_update_route_returns_a_successful_response()
    {
        $response = $this->patch('/api/v1/cart/2', [
            // Suponiendo que 'product_id' y 'quantity' son campos requeridos
            'product_id' => 1,
            'quantity' => 2,
        ]);
        $response->assertStatus(200);
    }

    /** @test */
    public function cart_destroy_route_returns_a_successful_response()
    {
        $response = $this->delete('/api/v1/cart/2');
        $response->assertStatus(200);
    }

    /** @test */
    public function shipping_info_show_route_returns_a_successful_response()
    {
        $response = $this->get('/api/v1/shippingInfo/3');
        $response->assertStatus(200);
    }

    /** @test */
//    public function shipping_info_update_route_returns_a_successful_response()
//    {
//        $response = $this->patch('/api/v1/shippingInfo/1', [
//            'address' => '123 Main St',
//            'phone' => '555-1234',
//        ]);
//        $response->assertStatus(200);
//    }

    /** @test */
    public function shipping_info_destroy_route_returns_a_successful_response()
    {
        $response = $this->delete('/api/v1/shippingInfo/1');
        $response->assertStatus(200);
    }
}
