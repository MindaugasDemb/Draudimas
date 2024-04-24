<?php

namespace App\Http\Controllers;


use App\Models\Img;
use Illuminate\Http\Request;

class ImgController extends Controller
{

    public function store($car_id,$file_hash,$file_name){

        $img=new Img();
        $img->car_id=$car_id;
        $img->file=$file_hash;
        $img->file_name=$file_name;
        $img->save();
        return redirect()->route('cars.index');
    }

    public function save($file_name, Request $request){
        $img=Img::find($file_name);
        $img->car_id=$request->car_id;
        $img->file=$request->file;
        $img->file_name=$request->file_name;
        $img->save();
    }

    public function delete($id,$file_hash){
        unlink(storage_path().'/app/img/'.$file_hash);
        Img::destroy($id);
        return redirect()->back();
    }

}
