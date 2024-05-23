<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\Owner;
use App\Models\Img;

class OwnerAPIController extends Controller
{

    /*private $validationrules=[
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
    }*/

    /**
     * Display a listing of the resource.
     */
    public function owners()
    {
        return Owner::all();
    }

    public function owner($id)
    {
        return Owner::find($id);
    }

    public function store(Request $request)
    {
        $owner=new Owner;
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->phone=$request->phone;
        $owner->email=$request->email;
        $owner->address=$request->address;
        $owner->user_id=$request->user_id;
        $owner->save();
        return $owner;
    }

    public function update(Request $request, $id)
    {
        $owner=Owner::find($id);
        if ($owner==null){
            return response()->json(['message'=>'owner not found'],404);
        }
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->phone=$request->phone;
        $owner->email=$request->email;
        $owner->address=$request->address;
        $owner->user_id=$request->user_id;
        $owner->save();
        return $owner;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $owner=Owner::find($id);
        if($owner==null)
        {
            return response()->json(['message'=>'owner not found'],404);
        }
        $owner->delete();
        return $owner;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create', [
            'owners'=>Owner::all(),
            'img'=>Img::all()
        ]);

    }

    /**
     * Store a newly created resource in storage.

    public function store(Request $request)
    {
        $request->validate($this->validationrules,$this->validationmsg);
        $car=Car::create($request->all());
        $car->save();
        return redirect()->route('cars.index');
    } */

    /**
     * Display the specified resource.
     */
    public function show(Car $car,Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car, Request $request)
    {
        if(!($request->user()->can('update',$car)))
        {
            return redirect()->back();
        }
        return view('cars.edit',[
            'car'=>$car,
            'owners'=>Owner::all(),
            'img'=>Img::all()
        ]);
    }

    /**
     * Update the specified resource in storage.

    public function update(Request $request, Car $car)
    {
        $request->validate($this->validationrules,$this->validationmsg);
        $car->update($request->all());

        $car->save();
        if ($request->file('img')!==null){
            $file=$request->file('img');
            $file->store('/img');

            $file_hash=$file->hashName();
            $file_name=$file->getClientOriginalName();
            if($file_hash!=null&&$file_name!=null)
                return redirect()->route('img.store',['id'=>$car->id,'file_hash'=>$file_hash,'file_name'=>$file_name]);
            else return redirect()->route('owners.index');
        }
        else
            return redirect()->route('cars.index');
    }
*/

}
