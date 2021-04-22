<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Number;
use App\Models\Customer;

class NumbersController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth')->except('index');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->query('number');

        if (!empty($filter)) {
            $numbers = Number::where('number','LIKE','%' . $filter . '%')
                ->paginate(10);
        } else {
            $numbers = Number::paginate(10);
        }
    
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

        Number::create($data);

        return redirect('numbers')->with('message', 'Number created successfully!');
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

        return redirect('numbers/' . $number->id)->with('message', 'Number updated successfully!');
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

        return redirect('numbers')->with('message', 'Number deleted successfully!');
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
