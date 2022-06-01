<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SubcategoryController extends Controller
{
    public function Index(){
        $subcategories = DB::table('subcategories')
        -> join('categories', 'subcategories.category_id', 'categories.id')
        ->select('subcategories.*', 'categories.category_en')
        ->orderBy('id', 'desc')->paginate(10);
        $categories = DB::table('categories')->get();
        return view('backend.Subcategory.index', compact('subcategories', 'categories'));
    }

    public function AddSubcategories(){
        $categories = DB::table('categories')->get();
        return view('backend.Subcategory.create', compact('categories'));
    }

    public function CreateSubcategory(Request $request){
        $validationData = $request->validate([
            'subcategory_en' => 'required|unique:subcategories|max:50',
            'subcategory_hun' => 'required|unique:subcategories|max:50',
            'category_id' => 'required'
        ]);

        $data = array();
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_hun'] = $request->subcategory_hun;
        $data['category_id'] = $request->category_id;
        $data['created_at'] = Carbon::now();

        DB::table('subcategories')->insert($data);

        $notification = array(
            'message' => 'The subcategory added succesfuly!',
            'alert-type' => 'success'
        );
        // Session::put('notification', $notification);

        return Redirect()->route('subcategories')->with($notification);
    }

    public function EditSubcategory($id){
        $subcategories = DB::table('subcategories')->where('id', $id)->first();
        $categories = DB::table('categories')->get();
        return view('backend.Subcategory.edit', compact('subcategories', 'categories'));
    }

    public function UpdateSubcategory(Request $request,  $id){
        $data = array();
        $data['subcategory_en'] = $request->subcategory_en;
        $data['subcategory_hun'] = $request->subcategory_hun;
        $data['category_id'] = $request->category_id;
        $data['updated_at'] = Carbon::now();

        DB::table('subcategories')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'The category updatet succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('subcategories')->with($notification);
    }

    public function DeleteSubcategory($id){
        DB::table('subcategories')->where('id', $id)->delete();

        $notification = array(
            'message' => 'The subcategory deleted succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('subcategories')->with($notification);
    }
}
