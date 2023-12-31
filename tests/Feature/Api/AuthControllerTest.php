<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');

        $this->user = User::first();
    }

    public function testDeveAutenticarUsuario(): void
    {
        $response = $this->postJson('/api/auth/login', [
            'email' => $this->user->email,
            'password' => '123456',
        ]);

        $response->assertOk();
        $response->assertJsonFragment([
            'name' => $this->user->name,
            'email' => $this->user->email,
        ]);
    }

    public function testNaoDeveAutenticarUsuarioComEmailInvalido(): void
    {
        $response = $this->postJson('/api/auth/login', [
            'email' => fake()->email(),
            'password' => '123456',
        ]);

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

    public function testNaoDeveAutenticarUsuarioComSenhaInvalida(): void
    {
        $response = $this->postJson('/api/auth/login', [
            'email' => $this->user->email,
            'password' => fake()->password(),
        ]);

        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
