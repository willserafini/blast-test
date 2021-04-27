<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Number;
use App\Models\Customer;
use App\Models\NumberPreference;
use Illuminate\Support\Facades\DB;
use App\Events\NewNumberEvent;

class NumbersController extends Controller
{    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->query();
        $query = Number::select('numbers.*')
            ->join('customers', 'customers.id', '=', 'numbers.customer_id');

        if (!empty($filter['number'])) {
            $query->where('numbers.number', 'LIKE', '%' . $filter['number'] . '%');
        }

        if (!empty($filter['customer_name'])) {
            $query->where('customers.name', 'ILIKE', '%' . $filter['customer_name'] . '%');
        }
    
        $numbers = $query->orderBy('numbers.created_at', 'desc')->paginate(10);
    
        return view('numbers.index', compact('numbers', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $number = new Number();
        if (isset(request()->query()['customerId'])) {
            $number->customer_id = request()->query()['customerId'];
        }

        $costumers = Customer::all();
    
        return view('numbers.create', compact('number', 'costumers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       
        $data = $this->getValidateRequest($request);
        try {
            DB::beginTransaction();
            
            $number = Number::create($data);
            
            DB::commit();

            if ($request->input('add_number_and_pref')) {
                return redirect('number_preferences/create?numberId=' . $number->id)->with('success', 'Number created successfully!');
            }

            return redirect('numbers')->with('success', 'Number created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('numbers/create')->with('error', $e->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function show(Number $number)
    {
        return view('numbers.show', compact('number'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function edit(Number $number)
    {
        $costumers = Customer::all();
        return view('numbers.edit', compact('number', 'costumers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Number $number)
    {
        $data = $this->getValidateRequest($request);
        $number->update($data);

        return redirect('numbers/' . $number->id)->with('success', 'Number updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Number  $number
     * @return \Illuminate\Http\Response
     */
    public function destroy(Number $number)
    {
        $number->delete();

        return redirect('numbers')->with('success', 'Number deleted successfully!');
    }

    private function getValidateRequest(Request $request) 
    {
        return $request->validate([
            'customer_id' => 'required',
            'number'      => 'required|min:8|max:14',
            'status'      => 'required',
        ]);
    }
}
