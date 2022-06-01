<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{

    public function Index(){
        $posts = DB::table('posts')
        ->join('categories', 'posts.category_id', 'categories.id')
        ->join('subcategories', 'posts.subcategory_id', 'subcategories.id')
        ->join('districts', 'posts.district_id', 'districts.id')
        ->join('subdistricts', 'posts.subdistrict_id', 'subdistricts.id')
        ->select('posts.*', 'categories.category_en', 'subcategories.subcategory_en', 'districts.district_en', 'subdistricts.subdistrict_en')
        ->orderBy('id', 'desc')->paginate(10);
        return view('Backend.Post.index', compact('posts'));
    }

    public function CreatePost(){
        $categories = DB::table('categories')->get();
        $subcategories = DB::table('subcategories')->get();
        $districts = DB::table('districts')->get();
        $subdistricts = DB::table('subdistricts')->get();
        return view('Backend.Post.create', compact('categories', 'districts', 'subcategories', 'subdistricts'));
    }

    public function StorePost(Request $request){
        $validatedData = $request->validate([
            'category_id' => 'required',
            'district_id' => 'required',
            'subcategory_id' => 'required',
            'subdistrict_id' => 'required',
            'title_en' => 'required',
            'title_hun' => 'required',
            'details_en' => 'required',
            'details_hun' => 'required',
           ]);

        $data = array();
        $image = $request->image;

        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['user_id'] = Auth::id();
        $data['title_en'] = $request->title_en;
        $data['title_hun'] = $request->title_hun;
        $data['details_en'] = $request->details_en;
        $data['details_hun'] = $request->details_hun;
        $data['tags_en'] = $request->tags_en;;
        $data['tags_hun'] = $request->tags_hun;
        $data['headline'] = $request->headline;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['post_date'] = date('d-m-Y');
        $data['post_month'] = date('F');
        $data['created_at'] = Carbon::now();

        if ($image){
            $image_one = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save('Image/postimage/'.$image_one);
            $data['image'] = 'Image/postimage/'.$image_one;

            DB::table('posts')->insert($data);

            $notification = array(
                'message' => 'The post saved succesfuly!',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }else{
            return Redirect()->back();
        }
    }

    public function EditPost($id){
        $post = DB::table('posts')->where('id', $id)->first();
        $categories = DB::table('categories')->get();
        $subcategories = DB::table('subcategories')->get();
        $districts = DB::table('districts')->get();
        $subdistricts = DB::table('subdistricts')->get();

        return view('Backend.Post.edit', compact('post', 'categories', 'districts', 'subcategories', 'subdistricts'));
    }

    // Get data form other databases for add new post

    public function GetSubcategory($category_id){
        $sub = DB::table('subcategories')->where('category_id', $category_id)->get();

        return response()->json($sub);
    }

    public function GetSubdistrict($district_id){
        $sub = DB::table('subdistricts')->where('district_id', $district_id)->get();

        return response()->json($sub);
    }

    public function UpdatePost(Request $request, $id){
        $validatedData = $request->validate([
            'category_id' => 'required',
            'district_id' => 'required',
            'subcategory_id' => 'required',
            'subdistrict_id' => 'required',
            'title_en' => 'required',
            'title_hun' => 'required',
            'details_en' => 'required',
            'details_hun' => 'required',
           ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['district_id'] = $request->district_id;
        $data['subdistrict_id'] = $request->subdistrict_id;
        $data['user_id'] = Auth::id();
        $data['title_en'] = $request->title_en;
        $data['title_hun'] = $request->title_hun;
        $data['details_en'] = $request->details_en;
        $data['details_hun'] = $request->details_hun;
        $data['tags_en'] = $request->tags_en;;
        $data['tags_hun'] = $request->tags_hun;
        $data['headline'] = $request->headline;
        $data['first_section'] = $request->first_section;
        $data['first_section_thumbnail'] = $request->first_section_thumbnail;
        $data['bigthumbnail'] = $request->bigthumbnail;
        $data['updated_at'] = Carbon::now();

        $image = $request->image;
        $oldimage = $request->oldimage;

        if ($image){
            $image_one = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save('Image/postimage/'.$image_one);
            $data['image'] = 'Image/postimage/'.$image_one;

            DB::table('posts')->where('id', $id)->update($data);
            $path = parse_url($oldimage);

            unlink(public_path($path['path']));
            // unlink(asset($oldimage));

            $notification = array(
                'message' => 'The post updated succesfuly!',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }else{
            $data['image'] = $oldimage;
            DB::table('posts')->where('id', $id)->update($data);

            $notification = array(
                'message' => 'The post updated succesfuly!',
                'alert-type' => 'success'
            );

            return Redirect()->route('all.post')->with($notification);
        }
    }

    public function DeletePost($id){
        $post = DB::table('posts')->where('id', $id)->delete();

        $notification = array(
            'message' => 'The post deleted succesfuly!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
