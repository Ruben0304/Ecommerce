<?php

namespace Tests\Feature;

use Tests\TestCase;

class RegisterTest extends TestCase
{
    /** @test */
    public function user_can_register()
    {
        // Datos del usuario a registrar
        $userData = [
            'name' => 'Test User',
            'email' => 'testregister@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        // Intentar registro
        $response = $this->postJson('/api/v1/register', $userData);

        // Verificar que se creó el usuario y se recibió un token
        $response->assertStatus(201)
            ->assertJsonStructure(['user', 'token']);
    }
}
