<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


use App\Models\Customer;

class CustomerTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function add_a_new_costumer_success()
    {
        Customer::factory()->create();

        $this->assertCount(1, Customer::all());
    }
}
