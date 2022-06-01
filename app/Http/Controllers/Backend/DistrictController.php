<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DistrictController extends Controller
{
    public function Index(){
        $districts = DB::table('districts')->orderBy('id', 'desc')->paginate(10);
        return view('backend.District.index', compact('districts'));
    }

    public function AddDistric(){
        return view('backend.District.create');
    }

    public function CreateDistric(Request $request){
        $validationData = $request->validate([
            'district_en' => 'required|unique:districts|max:50',
            'district_hun' => 'required|unique:districts|max:50',
        ]);

        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_hun'] = $request->district_hun;
        $data['created_at'] = Carbon::now();

        DB::table('districts')->insert($data);

        $notification = array(
            'message' => 'The districts added succesfuly!',
            'alert-type' => 'success'
        );
        // Session::put('notification', $notification);

        return Redirect()->route('district')->with($notification);
    }

    public function EditDistrict($id){
        $districts = DB::table('districts')->where('id', $id)->first();
        return view('backend.District.edit', compact('districts'));
    }

    public function UpdateDistrict(Request $request,  $id){
        $data = array();
        $data['district_en'] = $request->district_en;
        $data['district_hun'] = $request->district_hun;
        $data['updated_at'] = Carbon::now();

        DB::table('districts')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'The district updatet succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('district')->with($notification);
    }

    public function SoftdeleteDistrict($id){
        $original = DB::table('districts')->where('id', $id)->first();
        $data = array();
        $data['district_en'] = $original->category_en;
        $data['district_hun'] = $original->category_hun;
        $data['created_at'] = Carbon::now();

        DB::table('deletedcats')->insert($data);

        DB::table('categories')->where('id', $id)->delete();

        $notification = array(
            'message' => 'The category deleted succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('categories')->with($notification);
    }

    public function DeleteDistrict($id){
        DB::table('districts')->where('id', $id)->delete();

        $notification = array(
            'message' => 'The district deleted succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('district')->with($notification);
    }
}
