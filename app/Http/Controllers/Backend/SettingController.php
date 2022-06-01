<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function SocialSetting(){
        $socials = DB::table('socials')->first();
        return view('Backend.Settings.social', compact('socials'));
    }

    public function UpdateSocial(Request $request, $id){

        $data = array();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['linkedin'] = $request->linkedin;
        $data['github'] = $request->github;
        $data['codepen'] = $request->codepen;

        DB::table('socials')->where('id', $id)->update($data);

        $notification = array(
            'message' => 'The social links updated succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('social.settings')->with($notification);
    }

    public function SeoSetting(){
        $seos = DB::table('seos')->first();
        return view('Backend.Settings.seos', compact('seos'));
    }

    public function UpdateSeo(Request $request, $id){

        $data = array();
        $data['meta_author'] = $request->meta_author;
        $data['meta_title'] = $request->meta_title;
        $data['meta_keyword'] = $request->meta_keyword;
        $data['meta_description'] = $request->meta_description;
        $data['google_analytics'] = $request->google_analytics;
        $data['google_verification'] = $request->google_verification;
        $data['alexa_analytics'] = $request->alexa_analytics;

        DB::table('seos')->where('id', $id)->update($data);
        // $seos = DB::table('seos')->first();
        $notification = array(
            'message' => 'The SEO settings updated succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('seo.settings')->with($notification);
    }

    public function CoffeeSetting(){
        $coffee = DB::table('coffee')->first();
        return view('Backend.Settings.coffee', compact('coffee'));
    }

    public function UpdateCoffee(Request $request, $id){

        $data = array();
        $data['morning'] = $request->morning;
        $data['second'] = $request->second;
        $data['afternon'] = $request->afternon;
        $data['onemore'] = $request->onemore;

        DB::table('coffee')->where('id', $id)->update($data);
        // $seos = DB::table('seos')->first();
        $notification = array(
            'message' => 'The coffee settings updated succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('coffee.settings')->with($notification);
    }

    public function LivetvSetting(){
        $livetv = DB::table('livetv')->first();
        return view('Backend.Settings.livetv', compact('livetv'));
    }

    public function UpdateLivetv(Request $request, $id){

        $data = array();
        $data['embed_code'] = $request->embed_code;
        $data['status'] = $request->livetvactive;

        DB::table('livetv')->where('id', $id)->update($data);
        // $seos = DB::table('seos')->first();
        $notification = array(
            'message' => 'The coffee settings updated succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('livetv.settings')->with($notification);
    }

    public function HeadlineSetting(){
        $headline = DB::table('headline')->first();
        return view('Backend.Settings.headline', compact('headline'));
    }

    public function UpdateHeadline(Request $request, $id){

        $data = array();
        $data['headline_text'] = $request->headline_text;
        $data['status'] = $request->headactive;

        DB::table('headline')->where('id', $id)->update($data);
        // $seos = DB::table('seos')->first();
        $notification = array(
            'message' => 'The headline settings updated succesfuly!',
            'alert-type' => 'success'
        );

        return Redirect()->route('headline.settings')->with($notification);
    }
}
