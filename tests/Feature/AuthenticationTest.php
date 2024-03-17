<?php


use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class AuthenticationTest extends TestCase
{


    /** @test */
    public function user_can_login_with_correct_credentials()
    {
        // Crear un usuario de prueba
        $user = \App\Models\User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password')
        ]);

        // Intentar login con credenciales correctas
        $response = $this->postJson('/api/v1/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $user->delete();

        // Verificar que se recibió un token
        $response->assertStatus(201)
            ->assertJsonStructure(['token', 'message']);
    }

    /** @test */
    public function user_cannot_login_with_incorrect_credentials()
    {
        // Intentar login con credenciales incorrectas
        $response = $this->postJson('/api/v1/login', [
            'email' => 'wrong@example.com',
            'password' => 'wrongpassword',
        ]);

        // Verificar que se recibió un mensaje de error
        $response->assertStatus(422)
            ->assertJsonValidationErrors(['email']);
    }
}
