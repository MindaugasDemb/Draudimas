<?php

namespace App\Http\Controllers;

use App\Models\ShortCode;
use Illuminate\Http\Request;

class ShortCodeController extends Controller
{
    public function create(){
        return view("shortcodes.create");
    }

    public function store(Request $request){
        $short_codes=new ShortCode();
        $short_codes->shortcode=$request->shortcode;
        $short_codes->replace=$request->replace;

        $short_codes->save();
        return redirect()->route('shortcodes.index');
    }

    public function index(){

        return view('shortcodes.index',
            [
                'shortcodes'=>ShortCode::all()
            ]);
    }

    public function edit($id){
        $shortcode=ShortCode::find($id);
        return view('shortcodes.edit',
            [
                'shortcode'=>$shortcode
            ]);
    }

    public function save($id, Request $request){
        $shortcode=ShortCode::find($id);
        $shortcode->shortcode=$request->shortcode;
        $shortcode->replace=$request->replace;

        $shortcode->save();
        return redirect()->route('shortcodes.index');
    }

    public function delete($id){
        ShortCode::destroy($id);
        return redirect()->route('shortcodes.index');
    }
}
