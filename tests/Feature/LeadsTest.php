<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LeadsTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    
    public function a_user_can_create_a_lead()
    {
        $attributes = [
            'first_name' => $this->faker->title,

        ];

        $this->post('/leads', $attributes);

        $this->assertDatabaseHas('leads', $attributes);
    }
}
