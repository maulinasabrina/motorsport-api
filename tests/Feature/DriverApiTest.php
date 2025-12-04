<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DriverApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
     use RefreshDatabase;

    public function test_can_create_driver()
    {
        $payload = [
            'name' => 'John Doe',
            'team' => 'Ferrari',
            'number' => 16,
            'country' => 'Italy',
            'age' => 24,
        ];

        $response = $this->postJson('/api/drivers', $payload);

        $response->assertStatus(201)
                 ->assertJsonStructure([
                   'success',
                    'data' => [
                        'id',
                        'name',
                        'team',
                        'number',
                        'country',
                        'age',
                    ]
                 ]);

        $this->assertDatabaseHas('drivers', [
            'name' => 'John Doe',
        ]);
    }
}
