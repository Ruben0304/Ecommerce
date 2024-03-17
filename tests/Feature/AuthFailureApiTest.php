<?php


use Tests\TestCase;

class AuthFailureApiTest extends TestCase
{
// Prueba para asegurar que la ruta 'show' de usuarios requiere autenticación
    public function test_users_show_route_requires_authentication()
    {
        $response = $this->get('/api/v1/users/1');
        $response->assertStatus(302);
    }

    // Prueba para asegurar que la ruta 'update' de usuarios requiere autenticación
    public function test_users_update_route_requires_authentication()
    {
        $response = $this->patch('/api/v1/users/1', [
            'name' => 'Nuevo Nombre',
            'email' => 'correo@example.com',
        ]);
        $response->assertStatus(302);
    }

    // Prueba para asegurar que la ruta 'show' del carrito requiere autenticación
    public function test_cart_show_route_requires_authentication()
    {
        $response = $this->get('/api/v1/cart/1');
        $response->assertStatus(302);
    }

    // Prueba para asegurar que la ruta 'update' del carrito requiere autenticación
    public function test_cart_update_route_requires_authentication()
    {
        $response = $this->patch('/api/v1/cart/1', [
            'product_id' => 1,
            'quantity' => 2,
        ]);
        $response->assertStatus(302);
    }

    // Prueba para asegurar que la ruta 'destroy' del carrito requiere autenticación
    public function test_cart_destroy_route_requires_authentication()
    {
        $response = $this->delete('/api/v1/cart/1');
        $response->assertStatus(302);
    }

    // Prueba para asegurar que la ruta 'show' de información de envío requiere autenticación
    public function test_shipping_info_show_route_requires_authentication()
    {
        $response = $this->get('/api/v1/shippingInfo/1');
        $response->assertStatus(302);
    }

    // Prueba para asegurar que la ruta 'update' de información de envío requiere autenticación
    public function test_shipping_info_update_route_requires_authentication()
    {
        $response = $this->patch('/api/v1/shippingInfo/1', [
            'address' => '123 Main St',
            'phone' => '555-1234',
        ]);
        $response->assertStatus(302);
    }

    // Prueba para asegurar que la ruta 'destroy' de información de envío requiere autenticación
    public function test_shipping_info_destroy_route_requires_authentication()
    {
        $response = $this->delete('/api/v1/shippingInfo/1');
        $response->assertStatus(302);
    }
}
