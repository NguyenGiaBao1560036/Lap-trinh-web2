<?php

namespace App\Http\Controllers;
use App\Slide;
use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
class PageController extends Controller
{
    public function getIndex(){
        //slide
        $slide = Slide::all();
        //san pham mới
        $new_product = Product::where('new',1)->paginate(8);
        //san pham khuyen mai
        $sale = Product::where('promotion_price','<>',0)->paginate(8);
        return view('page.trangchu',compact('slide','new_product','sale'));
    }
     public function getLoaiSp($type){
         //san pham theo loai san pham
         $sp_theoloai = Product::where('id_type',$type)->paginate(8);
         //san pham khac loai
         $sp_khacloai = Product::where('id_type','<>',$type)->paginate(3);

         $loaisanpham = ProductType::all();
        
         
    	return view('page.loai_sanpham',compact('sp_theoloai','sp_khacloai','loaisanpham'));
    }
    public function getChitiet(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        $sanpham_tt = Product::where('id_type',$sanpham->id_type)->paginate(3);
        $new_product = Product::where('new',1)->paginate(5);
        $sale = Product::where('promotion_price','<>',0)->paginate(5);
    	return view('page.chitiet_sanpham',compact('sanpham','sanpham_tt','new_product','sale'));
    }
     public function getLienHe(){
    	return view('page.lienhe');
    }
    public function getsearch(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%')
        ->orwhere('unit_price',$req->key)
        ->paginate(4);
        return view('page.search',compact('product'));
    }
}
