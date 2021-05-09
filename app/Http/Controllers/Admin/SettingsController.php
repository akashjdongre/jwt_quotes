<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editSetting()
    {
       $setting=Setting::where('id',1)->first();

       return view('admin.pages.settings.settings',compact('setting'));
    }


    public function updateSetting(UpdateSettingRequest $request)
    {
//dd($request);
        $setting=Setting::where('id',1)->first();

        if ($files = $request->file('banner')) {

            //code for remove old file
            if($setting->banner != ''  && $setting->banner != null){
                unlink(storage_path('app/public/setting/'.$setting->banner));
            }

            $fileName ="banner-".time().'.'.$request->banner->getClientOriginalExtension();
            $request->banner->storeAs('setting', $fileName);

            $setting->banner = $fileName;
        }

        if ($files = $request->file('default_image')) {

            //code for remove old file
            if($setting->defualt_image != ''  && $setting->defualt_image != null){
                unlink(storage_path('app/public/setting/'.$setting->defualt_image));
            }

            $fileName =  "default_image-".time().'.'.$request->default_image->getClientOriginalExtension();
            $request->default_image->storeAs('setting', $fileName);

            $setting->default_image = $fileName;
        }


        if ($files = $request->file('search_default_image')) {

            //code for remove old file
            if($setting->search_default_image != ''  && $setting->search_default_image != null){
                unlink(storage_path('app/public/setting/'.$setting->search_default_image));
            }

            $fileName =  "search_default_image-".time().'.'.$request->search_default_image->getClientOriginalExtension();
            $request->search_default_image->storeAs('setting', $fileName);

            $setting->search_default_image = $fileName;
        }

        if($request->about!=''){
            $setting->about=$request->about;
        }

        if($request->meta_title!=''){
            $setting->meta_title=$request->meta_title;
        }

        if($request->meta_author!=''){
            $setting->meta_author=$request->meta_author;
        }

        if($request->meta_desc!=''){
            $setting->meta_desc=$request->meta_desc;
        }

        if($request->meta_keywords!=''){
            $setting->meta_keywords=$request->meta_keywords;
        }

        if($request->gif_show==true){
            $setting->gif_show=true;
        }else{
            $setting->gif_show=false;
        }

        if($request->video_show==true){
            $setting->video_show=true;
        }else{
            $setting->video_show=false;
        }

        if($request->cat_show==true){
            $setting->cat_show=true;
        }else{
            $setting->cat_show=false;
        }

        $setting->save();

        return redirect()->route('admin.settings.editSetting')->with('message','Settings Saved Successfully');
    }


}
