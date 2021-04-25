<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Customer;
use App\Models\Number;
use App\Models\NumberPreference;

class NumberTest extends TestCase
{

    use RefreshDatabase;

    public function test_only_logged_in_users_can_see_numbers_list()
    {
        $response = $this->get('/numbers')
            ->assertRedirect('/login');
    }

    public function test_authenticate_user_can_see_numbers_list()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get('/numbers')
            ->assertOk();
    }

    public function test_new_number_through_the_form()
    {        
        $user = $this->getUserAuth();


        $number = Number::factory()->make()->getAttributes();

        $response = $this->post('/numbers', $number);   
        
        $this->assertCount(1, Number::all());

        $this->assertCount(2, NumberPreference::all());
    }
    
    public function test_number_is_required()
    {
        $user = $this->getUserAuth();

        $number           = Number::factory()->make()->getAttributes();
        $number['number'] = '';

        $response = $this->post('/numbers', $number);  

        $response->assertSessionHasErrors('number');

        $this->assertCount(0, Number::all());
    }

    public function test_customer_id_required()
    {
        $user = $this->getUserAuth();
        $number           = Number::factory()->make()->getAttributes();
        $number['customer_id'] = '';

        $response = $this->post('/numbers', $number);  

        $response->assertSessionHasErrors('customer_id');

        $this->assertCount(0, Number::all());
    }

    public function test_number_min_8_caracteres()
    {
        $user = $this->getUserAuth();
        $number           = Number::factory()->make()->getAttributes();
        $number['number'] = '123456';

        $response = $this->post('/numbers', $number);  

        $response->assertSessionHasErrors('number');

        $this->assertCount(0, Number::all());
    }

    public function test_number_max_14_caracteres()
    {
        $user = $this->getUserAuth();
        $number           = Number::factory()->make()->getAttributes();
        $number['number'] = '123456789123456';

        $response = $this->post('/numbers', $number);  

        $response->assertSessionHasErrors('number');

        $this->assertCount(0, Number::all());
    }

    private function getUserAuth()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        return $user;
    }
}
