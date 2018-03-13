<?php

namespace App\Http\Controllers;
use App\Slide;
use Illuminate\Http\Request;
use App\Product;

class PageController extends Controller
{
    public function getIndex(){
        
     //    $data = Product::all()->toArray();
    	// return view('page.trangchu',compact('data'));
        return view('page.trangchu');
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
