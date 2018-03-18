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
    public function getthem(){
        $slide = Slide::all();
        return view('admin.slide.them',['slide'=>$slide]);
   }

    public function postthem(Request $request){
        $slide = new Slide;
        if($request ->hasFile('image'))
        {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_". $name;
            while(file_exists("Source/image/slide" .$image))
            {
                $image = str_random(4)."_". $name;
            }
            $file->move("Source/image/slide",$image);
            $slide->image = $image;
        }
        else
        {
            $slide->image="";
        }
        $slide->save();
        return redirect('admin/slide/them')->with('thongbao','Thêm slide thành công');
   }
}
