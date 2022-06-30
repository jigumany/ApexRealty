<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $attributes = [
            'first_name' => 'George'
        ];

        $this->post('/leads', $attributes);

        $this->assertDatabaseHas('lead', $attributes);
    }
}
