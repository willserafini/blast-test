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

    /** @test */
    public function name_is_required_for_costumer()
    {
        $customer = Customer::factory()->make()->getAttributes();

        $customer['name'] = '';

        Customer::create($customer);

        dd(Customer::first());

        $this->assertCount(0, Customer::all());
    }
}
