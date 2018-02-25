<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLoginAsAdmin()
    {
        $response = $this->post('/login', [
            'email' => 'admin@admin.ua',
            'password' => '123456',
        ]);

        $response->assertStatus(302)
            ->assertHeader('Location', route('home'));
    }
}
