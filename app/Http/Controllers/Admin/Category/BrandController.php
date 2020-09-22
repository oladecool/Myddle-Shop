<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Brand;
use DB;


class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function brand() {
        $brand = Brand::all();
        return view('admin.category.brand', compact('brand'));
    }

    public function storebrand(Request $request){
        $validateData = $request->validate([
            'brand_name' => 'required|unique:brands|max:255',
        ]);

        $data = array();
        $data['brand_name'] = $request->brand_name;
        $image = $request->file('brand_logo');
        if($image){
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/brand/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $data['brand_logo'] = $image_url;
            $brand = DB::table('brands')->insert($data);
            $notification=array(
                'messege'=>'Brand Added Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
        } else {
            $brand = DB::table('brands')->insert($data);
            $notification=array(
                'messege'=>'Successfully Added',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);
        }
    }

    public function Deletebrand($id){
        $data = DB::table('brands')->where('id',$id)->first();
        $image = $data->brand_logo;
        unlink($image);
        $brand = DB::table('brands')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Brands Deleted Successfully',
            'alert-type'=>'success'
             );
        
             return Redirect()->back()->with($notification);
    }

    public function Editbrand($id) {
        $brand = DB::table('brands')->where('id',$id)->first();
        return view('admin.category.edit_brand', compact('brand'));
    }

    public function Updatebrand(Request $request, $id) {
        $old_logo = $request->old_logo;
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $image = $request->file('brand_logo');
        if($image){
            unlink($old_logo);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/brand/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $data['brand_logo'] = $image_url;
            $brand = DB::table('brands')->where('id', $id)->update($data);
            $notification=array(
                'messege'=>'Brand Updated Successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->route('brands')->with($notification);
        } else {
            $brand = DB::table('brands')->where('id', $id)->update($data);
            $notification=array(
                'messege'=>'Updated Without Image',
                'alert-type'=>'success'
                 );
               return Redirect()->route('brands')->with($notification);
        }
    }


}
