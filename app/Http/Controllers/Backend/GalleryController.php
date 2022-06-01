<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;


class GalleryController extends Controller
{
    public function PhotoGallery(){
         $photos = DB::table('photos')->orderBy('id', 'desc')->paginate(10);

         return view('Backend.Gallery.photos', compact('photos'));
    }

    public function AddPhoto(){

        return view('backend.Gallery.add_photo');

    }

    public function InsertPhoto(Request $request){
        $data = array();
        $data['title'] = $request->title ;
        $data['type'] = $request->type;
        $data['created_at'] = Carbon::now();

        $image = $request->photo;
        if ($image){
            $image_one = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save('gallery/images/'.$image_one);
            $data['photo'] = 'gallery/images/'.$image_one;

            DB::table('photos')->insert($data);

            $notification = array(
                'message' => 'The photo saved succesfuly!',
                'alert-type' => 'success'
            );
            return Redirect()->route('photo.gallery')->with($notification);
        }else{
            return Redirect()->back();
        }
    }

    public function EditPhoto($id){
        $photos = DB::table('photos')->where('id', $id)->first();

        return view('Backend.Gallery.edit_photo', compact('photos'));
    }

    public function UpdatePhoto(Request $request, $id){
        $data = array();
        $data['title'] = $request->title ;
        $data['type'] = $request->type;
        $data['created_at'] = Carbon::now();

        $old_photo = $request->old_photo;
        $image = $request->photo;
        if ($image){
            $image_one = uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(500, 300)->save('gallery/images/'.$image_one);
            $data['photo'] = 'gallery/images/'.$image_one;

            DB::table('photos')->where('id', $id)->update($data);
            $path = parse_url($old_photo);

            unlink(public_path($path['path']));
            $notification = array(
                'message' => 'The photo saved succesfuly!',
                'alert-type' => 'success'
            );
            return Redirect()->route('photo.gallery')->with($notification);
        }else{
            $data['photo'] = $old_photo;
            DB::table('photos')->where('id', $id)->update($data);

            $notification = array(
                'message' => 'The photo updated succesfuly!',
                'alert-type' => 'success'
            );

            return Redirect()->route('photo.gallery')->with($notification);
            }
    }

    public function DeletePhoto($id){
        $photo = DB::table('photos')->where('id', $id)->delete();

        $notification = array(
            'message' => 'The photo deleted succesfuly!',
            'alert-type' => 'success'
        );
        return Redirect()->route('photo.gallery')->with($notification);
    }

    //************************************** */
    // Video section
    //************************************* */

    public function VideoGallery(){
        $videos = DB::table('videos')->orderBy('id', 'desc')->paginate(10);

        return view('Backend.Gallery.videos', compact('videos'));
   }

    public function AddVideo(){

        return view('backend.Gallery.add_video');
    }

    public function InsertVideo(Request $request){
        $data = array();
        $data['title'] = $request->title ;
        $data['embed_code'] = $request->embed_code;
        $data['type'] = $request->type;
        $data['created_at'] = Carbon::now();

        DB::table('videos')->insert($data);

        $notification = array(
            'message' => 'The video saved succesfuly!',
            'alert-type' => 'success'
        );
        return Redirect()->route('video.gallery')->with($notification);
    }

    public function EditVideo($id){
        $video = DB::table('videos')->where('id', $id)->first();

        return view('Backend.Gallery.edit_video', compact('video'));
    }

    public function UpdateVideo(Request $request, $id){
        $data = array();
        $data['title'] = $request->title ;
        $data['embed_code'] = $request->embed_code;
        $data['type'] = $request->type;
        $data['updated_at'] = Carbon::now();

        DB::table('videos')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'The video updated succesfuly!',
            'alert-type' => 'success'
        );
        return Redirect()->route('video.gallery')->with($notification);
    }

    public function DeleteVideo($id){
        $photo = DB::table('videos')->where('id', $id)->delete();

        $notification = array(
            'message' => 'The video deleted succesfuly!',
            'alert-type' => 'success'
        );
        return Redirect()->route('video.gallery')->with($notification);
    }

}
