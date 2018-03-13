<?php

namespace App\Http\Controllers;
use App\Slide;
use Illuminate\Http\Request;
use App\Product;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        
        return view('page.trangchu',compact('slide'));
    }
     public function getLoaiSp(){
    	return view('page.loai_sanpham');
    }
    public function getChitiet(){
    	return view('page.chitiet_sanpham');
    }
     public function getLienHe(){
    	return view('page.lienhe');
    }
}
