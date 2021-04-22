<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
//use App\Models\Company;

use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth')->except('index');
        $this->middleware('auth');
    }

    public function index() 
    {
        $customers = Customer::all();

        //dd($customers);
    
        return view('customers.index', compact('customers'));
    }

    public function create() 
    {
        //$companies = Company::all();
        $customer = new Customer();
    
        return view('customers.create', compact('customer'));
    }

    public function store() 
    {
        $data = $this->getValidateRequest();

        $data['user_id'] = Auth::id();

        Customer::create($data);

        return redirect('customers')->with('message', 'Customer created successfully!');
    }

    public function show(Customer $customer) 
    {
        
        //$customer = Customer::where('id', $customer)->firstOrFail();

        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer) 
    {
        //$companies = Company::all();
        return view('customers.edit', compact('customer'));
    }

    public function update(Customer $customer) 
    {
        $data = $this->getValidateRequest();

        $customer->update($data);

        //session()->flash('message', 'Customer was updated!!!');

        return redirect('customers/' . $customer->id)->with('message', 'Customer updated successfully!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('customers')->with('message', 'Customer deleted successfully!');
    }

    private function getValidateRequest() 
    {
        return request()->validate([
            'name'     => 'required|min:3',
            'document' => 'required|min:3|max:12',
            'status'   => 'required',
        ]);
    }
}
