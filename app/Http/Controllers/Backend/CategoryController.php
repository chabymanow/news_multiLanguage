<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;


class CategoryController extends Controller
{
    public function Index(){
        $categories = DB::table('categories')->orderBy('id', 'desc')->paginate(10);
        return view('backend.Category.index', compact('categories'));
    }

    public function deletedCategories(){
        $deletedCats = DB::table('deletedcats')->orderBy('id', 'desc')->paginate(10);
        return view('backend.Category.deleted', compact('deletedCats'));
    }

    public function AddCategory(){
        return view('backend.Category.create');
    }

    public function CreateCategory(Request $request){
        $validationData = $request->validate([
            'category_en' => 'required|unique:categories|max:50',
            'category_hun' => 'required|unique:categories|max:50',
        ]);

        $data = array();
        $data['category_en'] = $request->category_en;
        $data['category_hun'] = $request->category_hun;
        $data['created_at'] = Carbon::now();

        DB::table('categories')->insert($data);

        $notification = array(
            'message' => 'The category added succesfuly!',
            'alert-type' => 'success'
        );
        // Session::put('notification', $notification);

        return Redirect()->route('categories')->with($notification);
    }

    public function EditCategory($id){
        $category = DB::table('categories')->where('id', $id)->first();
        return view('backend.Category.edit', compact('category'));
    }

    public function UpdateCategory(Request $request,  $id){
        $data = array();
        $data['category_en'] = $request->category_en;
        $data['category_hun'] = $request->category_hun;
        $data['updated_at'] = Carbon::now();

        DB::table('categories')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'The category updatet succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('categories')->with($notification);
    }

    public function SoftdeleteCategory($id){
        $original = DB::table('categories')->where('id', $id)->first();
        $data = array();
        $data['category_en'] = $original->category_en;
        $data['category_hun'] = $original->category_hun;
        $data['created_at'] = Carbon::now();

        DB::table('deletedcats')->insert($data);

        DB::table('categories')->where('id', $id)->delete();

        $notification = array(
            'message' => 'The category deleted succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('categories')->with($notification);
    }

    public function DeleteCategory($id){
        DB::table('deletedCats')->where('id', $id)->delete();

        $notification = array(
            'message' => 'The category deleted succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('categories')->with($notification);
    }

    public function RestoreCategory($id){
        $original = DB::table('deletedcats')->where('id', $id)->first();
        $data = array();
        $data['category_en'] = $original->category_en;
        $data['category_hun'] = $original->category_hun;
        $data['created_at'] = Carbon::now();

        DB::table('categories')->insert($data);

        DB::table('deletedCats')->where('id', $id)->delete();

        $notification = array(
            'message' => 'The category restored succesfully!',
            'alert-type' => 'success'
        );

        return Redirect()->route('categories')->with($notification);
    }
}
