<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\User;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    private $validationrules=[
        "name"=>'required|min:2|max:30',
        "surname"=>'required|min:3|max:30',
        "phone"=>'required|regex:/(\+*[0-9]\s*)+/|min:5|max:20',
        "email"=>'required|email:rfc,dns|min:3|max:30',
        "address"=>'required|min:5|max:90'
    ];
    private $validationmsg;

    public function __construct()
    {
        $this->validationmsg=[
            'name.required'=>'Vardas yra privalomas',
            'name.min'=>'Lauke "Vardas" per mažai simbolių',
            'name.max'=>'Lauke "Vardas" per daug simbolių',
            'surname.required'=>'Pavardė yra privaloma',
            'surname.min'=>'Lauke "Pavardė" per mažai simbolių',
            'surname.max'=>'Lauke "Pavardė" per daug simbolių',
            'phone.required'=>'Telefonas yra privalomas',
            'phone.min'=>'Lauke "Telefonas" per mažai simbolių',
            'phone.max'=>'Lauke "Telefonas" per daug simbolių',
            'phone.regex'=>'Netinkamai įvestas telefonas',
            'email.required'=>'El. paštas yra privalomas',
            'email.min'=>'Lauke "El. paštas" per mažai simbolių',
            'email.max'=>'Lauke "El. paštas" per daug simbolių',
            'email.email'=>'Netinkamas el. pašto formatas',
            'address.required'=>'Adresas yra privalomas',
            'address.min'=>'Lauke "Adresas" per mažai simbolių',
            'address.max'=>'Lauke "Adresas" per daug simbolių',
        ];
    }
    public function create(){
        return view("owners.create",
        [
        'users'=>User::all()
        ]);
    }

    public function store(Request $request){
        $request->validate($this->validationrules, $this->validationmsg);
        $klientas=new Owner();
        $klientas->name=$request->name;
        $klientas->surname=$request->surname;
        $klientas->phone=$request->phone;
        $klientas->email=$request->email;
        $klientas->address=$request->address;
        $klientas->user_id=$request->user_id;
        $klientas->save();
        return redirect()->route('owners.index');
    }

    public function index(){

        return view('owners.index',
            [
                'klientai'=>Owner::with('cars')-> get()
            ]);
    }

    public function edit($id, Request $request){
        $klientas=Owner::find($id);
        if(!($request->user()->can('delete',$klientas)))
        {
            return redirect()->route('owners.index');
        }
        return view('owners.edit',
            [
                'klientas'=>$klientas,
                'users'=>User::all()
            ]);
    }

    public function save($id, Request $request){
        $request->validate($this->validationrules, $this->validationmsg);
        $klientas=Owner::find($id);
        $klientas->name=$request->name;
        $klientas->surname=$request->surname;
        $klientas->phone=$request->phone;
        $klientas->email=$request->email;
        $klientas->address=$request->address;
        $klientas->user_id=$request->user_id;
        $klientas->save();
        return redirect()->route('owners.index');
    }

    public function delete($id, Request $request){
        $klientas=Owner::find($id);
        if(!($request->user()->can('delete',$klientas)))
        {
            return redirect()->route('owners.index');
        }
        Owner::destroy($id);
        return redirect()->route('owners.index');
    }

}
