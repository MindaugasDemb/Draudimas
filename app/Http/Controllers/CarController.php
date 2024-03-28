<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;

class CarController extends Controller
{
    private $validationrules=[
        "brand"=>'required|min:3|max:16',
        "model"=>'required|min:2|max:16',
        "reg_number"=>'required|regex:/([A-Z]{3}\s[0-9]{3})+/|min:3|max:9'
    ];
    private $validationmsg;

    public function __construct()
    {
        $this->validationmsg=[
            'brand.required'=>'Markė yra privaloma',
            'brand.min'=>'Markė turi per mažai simbolių',
            'brand.max'=>'Markė turi per daug simbolių',
            'model.required'=>'Modelis yra privalomas',
            'model.min'=>'Modelis turi per mažai simbolių',
            'model.max'=>'Modelis turi per daug simbolių',
            'reg_number.required'=>'Registracijos numeris yra privalomas',
            'reg_number.regex'=>'Registracijos numeris turi būti įrašytas formatu: ABC 123',
            'reg_number.min'=>'Registracijos numeris turi per mažai simbolių',
            'reg_number.max'=>'Registracijos numeris turi per daug simbolių'
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cars.index',[
            'cars'=>Car::with('owner')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create', [
            'owners'=>Owner::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->validationrules,$this->validationmsg);
        $car=Car::create($request->all());
        $car->save();
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('cars.edit',[
            'car'=>$car,
            'owners'=>Owner::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        $request->validate($this->validationrules,$this->validationmsg);
        $car->update($request->all());
        $car->save();
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
}
