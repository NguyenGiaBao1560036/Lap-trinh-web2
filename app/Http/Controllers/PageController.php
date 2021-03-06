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
use App\User;
use Hash;
use Auth;

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
        ->orwhere('description','like','%'.$req->key.'%')
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

    public function getdangky(){
        return view('dangky');
    }

    public function postdangky(Request $req){
        $check = [
            
            'email'=>'required|max:50|email',
            'name'=>'required|max:50',
            'address'=>'required|max:50',
            'phone'=>'required|numeric',
            'password'=>'required|min:6|max:20',
            'confirm_password'=>'required|same:password',
           
            
        ];

        $mess = [
            'email.required'=>'Vui lòng nhập email',
            'email.max'=>'Email không quá :max kí tự',
            'email.email'=>'Vui lòng nhập đúng email',
            'name.required'=>'Vui lòng nhập họ tên',
            'name.max'=>'Họ tên không quá :max kí tự',
            'address.required'=>'Vui lòng nhập địa chỉ',
            'phone.required'=>'Vui lòng nhập điện thoại',
            'address.max'=>'Chủ đề không quá :max kí tự',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu phải có ít nhất .min kí tự',
            'password.max'=>'Mật khẩu không quá .max kí tự',
            'confirm_password.same'=>'Mật khẩu không trùng nhau'
        ];
        $validator = $req->validate($check,$mess);
        $user = new User();
        $user->full_name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone= $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');

    }
    public function getdangnhap(){
        return view('dangnhap');
    }

    public function postdangnhap(Request $req){
        $check = [
            
            'email'=>'required|max:50|email',
            'password'=>'required|min:6|max:20',
        ];

        $mess = [
            'email.required'=>'Vui lòng nhập email',
            'email.max'=>'Email không quá :max kí tự',
            'email.email'=>'Vui lòng nhập đúng email',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu phải có ít nhất :min kí tự',
            'password.max'=>'Mật khẩu không quá :max kí tự',
        ];
        $validator = $req->validate($check,$mess);

       $cre = array('email'=>$req->email,'password'=>$req->password);
       if(Auth::attempt($cre)){
            return  redirect()->route('trang-chu');
       }
       else{
           return redirect()->back()->with(['flag'=>'danger', 'message'=>'đăng nhập không thành công']);
       }
    }

    public function getdangxuat(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }

   
    public function getchinhsua($id){
        $nguoidung =  User::find($id);
        return view('taikhoan',['nguoidung'=>$nguoidung]);
    }
    public function postchinhsua(Request $request,$id)
    {
       
        $user = User::find($id);
        $this->validate($request,[
            'email'=>'required|max:50|email',
            'name'=>'required|max:50',
            'address'=>'required|max:50',
            'phone'=>'required|numeric',
            'password'=>'required|min:6|max:20',
            'confirm_password'=>'required|same:password',
        ],[
            'email.required'=>'Vui lòng nhập email',
            'email.max'=>'Email không quá :max kí tự',
            'email.email'=>'Vui lòng nhập đúng email',
            'name.required'=>'Vui lòng nhập họ tên',
            'name.max'=>'Họ tên không quá :max kí tự',
            'address.required'=>'Vui lòng nhập địa chỉ',
            'phone.required'=>'Vui lòng nhập điện thoại',
            'phone.numeric'=>'Số điện thoại phải là số',
            'address.max'=>'Chủ đề không quá :max kí tự',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu phải có ít nhất :min kí tự',
            'password.max'=>'Mật khẩu không quá :max kí tự',
            'confirm_password.same'=>'Mật khẩu không trùng nhau',
            'confirm_password.required'=>'Vui lòng nhập lại mật khẩu'

        ]);
     
        $user->full_name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone= $request->phone;
        $user->address =$request->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Sửa tài khoản thành công');

    }
}
