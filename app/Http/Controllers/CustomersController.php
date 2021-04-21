<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Company;

class CustomersController extends Controller
{

    public function __construct(){
        //$this->middleware('auth')->except('index');
        $this->middleware('auth');
    }

    public function index() {
        $customers = Customer::all();

        //dd($customers);
    
        return view('customers.index', compact('customers'));
    }

    public function create() {
        $companies = Company::all();
        $customer = new Customer();
    
        return view('customers.create', compact('companies', 'customer'));
    }

    public function store() {
        $data = $this->getValidateRequest();

        Customer::create($data);

        return redirect('customers');
    }

    public function show(Customer $customer) {
        
        //$customer = Customer::where('id', $customer)->firstOrFail();

        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer) {
        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function update(Customer $customer) {
        $data = $this->getValidateRequest();

        $customer->update($data);

        //$request->session()->flash('status', 'Task was successful!');

        session()->flash('message', 'Customer was updated!!!');

        return redirect('customers/' . $customer->id);
    }

    public function destroy(Customer $customer) {
        $customer->delete();

        return redirect('customers');
    }

    private function getValidateRequest() {
        return request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'active' => 'required',
            'company_id' => 'required',
        ]);
    }
}
