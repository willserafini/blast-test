<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{

    public function index(Request $request) 
    {
        $this->authorize('viewAny', Customer::class);

        //DB::enableQueryLog();
        $filter = $request->query();
        $query = Customer::select('customers.*');

        if (!Auth::user()->isAdmin()) {
            $query->where('customers.user_id', Auth::id())
                ->orWhereJsonContains('customers.permissions->users', Auth::id());
        }
        
        if (!empty($filter['customer_name'])) {
            $query->where('customers.name', 'ILIKE', '%' . $filter['customer_name'] . '%');
        }
    
        $customers = $query->orderBy('customers.created_at', 'desc')->paginate(10);

        //dd(DB::getQueryLog());
    
        return view('customers.index', compact('customers', 'filter'));
    }

    public function create() 
    {
        $this->authorize('create', Customer::class);
        $customer = new Customer();
    
        return view('customers.create', compact('customer'));
    }

    public function store(Request $request) 
    {
        $this->authorize('create', Customer::class);

        $data = $this->getValidateRequest($request);

        $data['user_id'] = Auth::id();

        $customer = Customer::create($data);

        if ($request->input('add_customer_and_number')) {
            return redirect('numbers/create?customerId=' . $customer->id)->with('success', 'Customer created successfully!');
        }

        return redirect('customers')->with('success', 'Customer created successfully!');
    }

    public function show(Customer $customer) 
    {        
        $this->authorize('view', $customer);

        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer) 
    {
        $this->authorize('update', $customer);

        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer) 
    {
        $this->authorize('update', $customer);

        $data = $this->getValidateRequest($request);

        $customer->update($data);

        return redirect('customers/' . $customer->id)->with('success', 'Customer updated successfully!');
    }

    public function destroy(Customer $customer)
    {
        $this->authorize('delete', $customer);
        $customer->delete();

        return redirect('customers')->with('success', 'Customer deleted successfully!');
    }

    public function viewPermissions(Customer $customer)
    {
        $users = User::all();
        return view('customers.view_permissions', compact('customer', 'users'));
    }

    public function updatePermissions(Request $request, Customer $customer) 
    {
        $this->authorize('update', $customer);
        
        $data = $request->validate([
            'permissions' => 'nullable'
        ]);

        if (!isset($data['permissions'])) {
            $data['permissions'] = null;
        }

        $customer->update($data);

        return redirect('customers/' . $customer->id)->with('success', 'Customer updated successfully!');
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
