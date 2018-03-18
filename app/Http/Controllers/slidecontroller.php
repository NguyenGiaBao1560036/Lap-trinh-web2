<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
class slidecontroller extends Controller
{
    public function getdanhsach(){
        $slide = Slide::all();
        return view('admin.slide.danhsach',['slide'=>$slide]);
    }
}
