<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Product;
class sanphamcontroller extends Controller
{
    public function getdanhsach(){
        $sanpham = Product::orderBy('id','DESC')->get();
        return view('admin.sanpham.danhsach',['sanpham'=>$sanpham]);
    }
}
