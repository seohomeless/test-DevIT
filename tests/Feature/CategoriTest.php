<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoriTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddCategori()
    {
        $response = $this->post('/login', [
            'name' => 'Тестовая запись',
             $response->assertStatus(302)
            ->assertHeader('Location', route('categori'));
        ]);
    }
}
