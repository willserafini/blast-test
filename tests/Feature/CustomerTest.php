<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Customer;

class CustomerTest extends TestCase
{

    use RefreshDatabase;

    public function test_only_logged_in_users_can_see_costumers_list()
    {
        $response = $this->get('/customers')
            ->assertRedirect('/login');
    }

    public function test_authenticate_user_can_see_costumers_list()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get('/customers')
            ->assertOk();
    }

    public function test_new_customer_through_the_form()
    {
        $user = $this->getUserAuth();

        $response = $this->post('/customers', $this->getCustomerFake());
        
        $this->assertCount(1, Customer::all());
    }
    
    public function test_name_is_required()
    {        
        $user = $this->getUserAuth();

        $customer = $this->getCustomerFake();
        $customer['name'] = '';

        $response = $this->post('/customers', $customer);  

        $response->assertSessionHasErrors('name');

        $this->assertCount(0, Customer::all());
    }

    public function test_document_required()
    {
        $user = $this->getUserAuth();
        
        $customer = $this->getCustomerFake();
        $customer['document'] = '';

        $response = $this->post('/customers', $customer);  

        $response->assertSessionHasErrors('document');

        $this->assertCount(0, Customer::all());
    }

    public function test_document_min_6_caracteres()
    {
        $user = $this->getUserAuth();

        $customer = $this->getCustomerFake();
        $customer['document'] = '1234';

        $response = $this->post('/customers', $customer);  

        $response->assertSessionHasErrors('document');

        $this->assertCount(0, Customer::all());
    }

    public function test_document_max_12_caracteres()
    {
        $user = $this->getUserAuth();

        $customer = $this->getCustomerFake();
        $customer['document'] = '1234567891012';

        $response = $this->post('/customers', $customer);

        $response->assertSessionHasErrors('document');

        $this->assertCount(0, Customer::all());
    }

    private function getCustomerFake()
    {
        return Customer::factory()
            ->make([
                'user_id' => '' //controller will fill
            ])
            ->getAttributes();
    }

    private function getUserAuth()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        return $user;
    }
}
