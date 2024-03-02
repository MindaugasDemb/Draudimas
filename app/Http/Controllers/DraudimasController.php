<?php

namespace App\Http\Controllers;

use App\Models\Draudimas;
use Illuminate\Http\Request;

class DraudimasController extends Controller
{
    public function create(){
        return view("draudimas.create");
    }

    public function store(Request $request){
        $klientas=new Draudimas();
        $klientas->name=$request->name;
        $klientas->surname=$request->surname;
        $klientas->phone=$request->phone;
        $klientas->email=$request->email;
        $klientas->address=$request->address;
        $klientas->save();
        return redirect()->route('draudimas.index');
    }

    public function index(){

        return view('draudimas.index',
            [
                'klientai'=>Draudimas::all()
            ]);
    }

    public function edit($id){
        $klientas=Draudimas::find($id);
        return view('draudimas.edit',
            [
                'klientas'=>$klientas
            ]);
    }

    public function save($id, Request $request){
        $klientas=Draudimas::find($id);
        $klientas->name=$request->name;
        $klientas->surname=$request->surname;
        $klientas->phone=$request->phone;
        $klientas->email=$request->email;
        $klientas->address=$request->address;
        $klientas->save();
        return redirect()->route('draudimas.index');
    }

    public function delete($id){
        Draudimas::destroy($id);
        return redirect()->route('draudimas.index');
    }
}
