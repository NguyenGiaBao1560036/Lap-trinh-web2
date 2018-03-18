<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Product;

class Loaisanphamcontroller extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }
    public function getdanhsach(){
        $loaisanpham = ProductType::all();
        return view('admin.loaisanpham.danhsach',['loaisanpham'=>$loaisanpham]);
    }
    public function getthem(){
        return view('admin.loaisanpham.them');
    }

    public function postthem(Request $req){
        $this->validate($req,
        [
            'name'=>'required|unique:type_products,name|min:2|max:100',
            'description'=>'required',
        ],
        [
            'name.required'=>'Bạn Chưa Nhập Loại Sản Phẩm',
            'name.unique'=>'Tên loại sản phẩm đã tồn tại',
            'name.min'=>'Tên loại sản phẩm phải có ít nhất .min kí tự ',
            'name.max'=>'Tên loại sản phẩm phải có nhiều nhất .max kí tự',
            'description.required'=>'Bạn Chưa Nhập miêu tả',
        ]);

        $loaisanpham = new ProductType;
        $loaisanpham->name = $req->name;
        $loaisanpham->description = $req->description;
        $loaisanpham->save();

        return redirect('admin/loaisanpham/them')->with('thongbao','Thêm Thành Công');
    }

    public function getsua($id){
        $loaisanpham =  ProductType::find($id);
        return view('admin/loaisanpham/sua',['loaisanpham'=>$loaisanpham]);
     }
     public function postsua(Request $request,$id)
     {
         $loaisanpham = ProductType::find($id);
         $this->validate($request,
         [
             'name'=>'required|unique:type_products,name|min:2|max:100'
         ],
         [
             'name.required'=>'Bạn Chưa Nhập Loại Sản Phẩm',
             'name.unique'=>'Tên loại sản phẩm đã tồn tại',
             'name.min'=>'Tên loại sản phẩm phải có độ dài tự 3 cho đến 100 ký tự ',
             'name.max'=>'Tên loại sản phẩm phải có độ dài tự 3 cho đến 100 ký tự ',
         ]);
 
         $loaisanpham->name = $request->name;
         $loaisanpham->save();
         return redirect('admin/loaisanpham/sua/'.$id)->with('thongbao','Sửa Thành Công');
     }

     public function getxoa($id)
     {
         $loaisanpham = ProductType::find($id);
         $loaisanpham->delete();
         return redirect('admin/loaisanpham/danhsach')->with('thongbao','Bạn đã xóa thành công');
     }
 
}
