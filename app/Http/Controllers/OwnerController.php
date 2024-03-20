<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function create(){
        return view("owners.create");
    }

    public function store(Request $request){
        $klientas=new Owner();
        $klientas->name=$request->name;
        $klientas->surname=$request->surname;
        $klientas->phone=$request->phone;
        $klientas->email=$request->email;
        $klientas->address=$request->address;
        $klientas->save();
        return redirect()->route('owners.index');
    }

    public function index(){

        return view('owners.index',
            [
                'klientai'=>Owner::with('cars')-> get()
            ]);
    }

    public function edit($id){
        $klientas=Owner::find($id);
        return view('owners.edit',
            [
                'klientas'=>$klientas
            ]);
    }

    public function save($id, Request $request){
        $klientas=Owner::find($id);
        $klientas->name=$request->name;
        $klientas->surname=$request->surname;
        $klientas->phone=$request->phone;
        $klientas->email=$request->email;
        $klientas->address=$request->address;
        $klientas->save();
        return redirect()->route('owners.index');
    }

    public function delete($id){
        Owner::destroy($id);
        return redirect()->route('owners.index');
    }

}
