<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SubdistrictController extends Controller
{
    public function Index(){
        $subdistricts = DB::table('subdistricts')
        -> join('districts', 'subdistricts.district_id', 'districts.id')
        ->select('subdistricts.*', 'districts.district_en')
        ->orderBy('id', 'desc')->paginate(10);
        $district = DB::table('districts')->get();
        return view('backend.Subdistrict.index', compact('subdistricts', 'district'));
    }

    public function AddSubdistrict(){
        $districts = DB::table('districts')->get();
        return view('backend.Subdistrict.create', compact('districts'));
    }

    public function CreateSubdistrict(Request $request){
        $validationData = $request->validate([
            'subdistrict_en' => 'required|unique:subdistricts|max:50',
            'subdistrict_hun' => 'required|unique:subdistricts|max:50',
            'district_id' => 'required'
        ]);

        $data = array();
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_hun'] = $request->subdistrict_hun;
        $data['district_id'] = $request->district_id;
        $data['created_at'] = Carbon::now();

        DB::table('subdistricts')->insert($data);

        $notification = array(
            'message' => 'The subdistrict added succesfuly!',
            'alert-type' => 'success'
        );
        // Session::put('notification', $notification);

        return Redirect()->route('subdistrict')->with($notification);
    }

    public function EditSubdistrict($id){
        $subdistricts = DB::table('subdistricts')->where('id', $id)->first();
        $districts = DB::table('districts')->get();
        return view('backend.Subdistrict.edit', compact('subdistricts', 'districts'));
    }

    public function UpdateSubdistrict(Request $request,  $id){
        $data = array();
        $data['subdistrict_en'] = $request->subdistrict_en;
        $data['subdistrict_hun'] = $request->subdistrict_hun;
        $data['district_id'] = $request->district_id;
        $data['updated_at'] = Carbon::now();

        DB::table('subdistricts')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'The subdistrict updatet succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('subdistrict')->with($notification);
    }

    public function DeleteSubdistrict($id){
        DB::table('subdistricts')->where('id', $id)->delete();

        $notification = array(
            'message' => 'The subdistrict deleted succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('subdistrict')->with($notification);
    }
}
