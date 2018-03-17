<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Product;

class Loaisanphamcontroller extends Controller
{
    public function getdanhsach(){
        $loaisanpham = ProductType::all();
        return view('admin.loaisanpham.danhsach',['loaisanpham'=>$loaisanpham]);
    }
}
