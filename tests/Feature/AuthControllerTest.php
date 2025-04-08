<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_login()
    {
        // register a new user
        $user = \App\Models\User::create([
            'name' => 'Mister Dienstag',
            'email' => 'dienstaguser@example.com',
            'password' => bcrypt('password'),
        ]);

        // Test login-route
        $response = $this->postJson('/api/login', [
            'email' => 'dienstaguser@example.com',
            'password' => 'password',
        ]);

        // check if login succeeded
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'user' => ['id', 'name', 'email'],
            'token',
        ]);

        $this->assertArrayHasKey('token', $response->json());
    }

    public function test_admin_access()
    {
        // create admin user
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        // admin login
        $response = $this->postJson('/api/login', [
            'email' => $admin->email,
            'password' => 'password',
        ]);

        $token = $response->json('token');

        // test admin-route
        $response = $this->getJson('/api/users', [
            'Authorization' => 'Bearer ' . $token
        ]);

        // check, if reponse is successful
        $response->assertStatus(200);
    }
}
