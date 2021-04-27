<?php

namespace App\Http\Controllers;

use App\Models\NumberPreference;
use App\Models\Number;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class NumberPreferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->query();
        $query = NumberPreference::select('number_preferences.*')
            ->join('numbers', 'numbers.id', '=', 'number_preferences.number_id')
            ->join('customers', 'customers.id', '=', 'numbers.customer_id');

        if (!empty($filter['number'])) {
            $query->where('numbers.number', 'LIKE', '%' . $filter['number'] . '%');
        }

        if (!empty($filter['customer_name'])) {
            $query->where('customers.name', 'ILIKE', '%' . $filter['customer_name'] . '%');
        }
    
        $numberPreferences = $query->orderBy('number_preferences.created_at', 'desc')->paginate(10);
        return view('number_preferences.index', compact('numberPreferences', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $numberPreference = new NumberPreference();
        $numbers = Number::all();

        if (isset(request()->query()['numberId'])) {
            $numberPreference->number_id = request()->query()['numberId'];
        }

        return view('number_preferences.create', compact('numberPreference', 'numbers'));

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

        NumberPreference::create($data);

        return redirect('number_preferences')->with('success', 'Preference created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NumberPreference  $numberPreference
     * @return \Illuminate\Http\Response
     */
    public function show(NumberPreference $numberPreference)
    {
        return view('number_preferences.show', compact('numberPreference'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NumberPreference  $numberPreference
     * @return \Illuminate\Http\Response
     */
    public function edit(NumberPreference $numberPreference)
    {
        $numbers = Number::all();

        return view('number_preferences.edit', compact('numberPreference', 'numbers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NumberPreference  $numberPreference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NumberPreference $numberPreference)
    {
        $data = $this->getValidateRequest($request);

        $numberPreference->update($data);

        return redirect('number_preferences')->with('success', 'Preference updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NumberPreference  $numberPreference
     * @return \Illuminate\Http\Response
     */
    public function destroy(NumberPreference $numberPreference)
    {
        $numberPreference->delete();

        return redirect('number_preferences')->with('success', 'Preference deleted successfully!');
    }

    private function getValidateRequest(Request $request) 
    {
        return $request->validate([
            'number_id' => 'required',
            'name'      => 'required',
            'value'     => 'required',
        ]);
    }
}
