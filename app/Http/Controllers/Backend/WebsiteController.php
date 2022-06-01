<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{

    public function Index(){
        $websites = DB::table('websites')->orderBy('id', 'desc')->paginate(10);

        return view('backend.Websites.index', compact('websites'));
    }

    public function CreateWebsite(){
        return view('backend.Websites.create');
    }

    public function StoreWebsite(Request $request){
        $data = array();
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;
        $data['created_at'] = Carbon::now();

        DB::table('websites')->insert($data);

        $notification = array(
            'message' => 'The website added succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('websites')->with($notification);
     }

     public function EditWebsite($id){
         $website = DB::table('websites')->where('id', $id)->first();
         return view('backend.Websites.edit', compact('website'));
     }

     public function UpdateWebsite(Request $request, $id){
        $data = array();
        $data['website_name'] = $request->website_name;
        $data['website_link'] = $request->website_link;
        $data['created_at'] = Carbon::now();

        DB::table('websites')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'The website updated succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('websites')->with($notification);
     }

     public function DeleteWebsite($id){
         $website = DB::table('websites')->where('id', $id)->delete();

         $notification = array(
            'message' => 'The website deleted succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('websites')->with($notification);
     }
}
