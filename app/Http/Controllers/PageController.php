<?php

namespace App\Http\Controllers;
use App\Slide;
use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use Validator;
use Session;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
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
    public function postLienHe(Request $req){
  
        $check = [
            'name'=>'required|max:50',
            'email'=>'required|max:50|email',
            'chude'=>'required|max:50',
            'noidunng'=>'required|max:200'
             //min:20,max:80
        ];

        $mess = [
            'name.required'=>'Vui lòng nhập họ tên',
            'name.max'=>'Họ tên không quá :max kí tự',
            'email.required'=>'Vui lòng nhập email',
            'email.max'=>'Email không quá :max kí tự',
            'email.email'=>'Vui lòng nhập đúng email',
            'chude.required'=>'Vui lòng nhập chủ đề',
            'chude.max'=>'Chủ đề không quá :max kí tự',
            'noidung.required'=>'Vui lòng nhập nội dung',
            'noidung.max'=>'Nội dung không quá :max kí tự'

        ];
        $validator = Validator::make($check,$mess);

        if($validator->fails()) {
            return redirect('lienhe')
                        ->withErrors($validator)
                        ->withInput();
        }

        // $data = $req->all();
        // echo "<pre>";
        // print_r($data);
        // echo '</pre>';

        // return redirect()->route('lienhe')
        // ->with('message','Successfully, Plz login');
    }
    public function themgiohang(Request $req,$id){
        $prdct = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($prdct,$id);
        $req->Session()->put('cart',$cart);
        return redirect()->back();
    }
    public function xoatungsanpham($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items) > 0)
            Session::put('cart',$cart);
        else
            Session::forget('cart');
        return redirect()->back();
    }
    public function xoagiohang(){
        if(Session::has('cart'))
            Session::forget('cart');
        return redirect()->back();
    }

    public function getdathang()
    {
        return view('page.dathang');
    }

    public function postdathang(Request $req)
    {
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name = $req ->name;
        $customer->gender=$req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number=$req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment;
        $bill->note = $req->notes;
        $bill->save();

        foreach($cart->items as $key => $value)
        {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill= $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price'] / $value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt Hàng thành công');
        

    }
}
