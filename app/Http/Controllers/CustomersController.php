<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
//use App\Models\Company;

use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{

    public function index(Request $request) 
    {
        $filter = $request->query();
        $query = Customer::select('customers.*');

        if (!empty($filter['customer_name'])) {
            $query->where('customers.name', 'ILIKE', '%' . $filter['customer_name'] . '%');
        }
    
        $customers = $query->orderBy('customers.created_at', 'desc')->paginate(10);
    
        return view('customers.index', compact('customers', 'filter'));
    }

    public function create() 
    {
        $customer = new Customer();
    
        return view('customers.create', compact('customer'));
    }

    public function store(Request $request) 
    {
        $data = $this->getValidateRequest($request);

        $data['user_id'] = Auth::id();

        Customer::create($data);

        return redirect('customers')->with('success', 'Customer created successfully!');
    }

    public function show(Customer $customer) 
    {
        
        //$customer = Customer::where('id', $customer)->firstOrFail();

        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer) 
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer) 
    {
        $data = $this->getValidateRequest($request);

        $customer->update($data);

        return redirect('customers/' . $customer->id)->with('success', 'Customer updated successfully!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect('customers')->with('success', 'Customer deleted successfully!');
    }

    private function getValidateRequest(Request $request) 
    {
        return $request->validate([
            'name'     => 'required|min:3',
            'document' => 'required|min:6|max:12',
            'status'   => 'required',
        ]);
    }
}
