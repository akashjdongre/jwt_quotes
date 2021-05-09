<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassActiveUserRequest;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('client_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = User::orderBy('id', 'DESC')->get();

        return view('admin.pages.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('client_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $client=User::create($request->all());
        $client->simple_pass=$request->password;
        $client->custom_id='CID'.$client->id;
        $client->save();

        // For user profile content
        if($client->id){

            $profile_image='';
            if ($files = $request->file('profile_image')) {

                $fileName =  "image-".time().'.'.$request->profile_image->getClientOriginalExtension();
                $request->profile_image->storeAs('profile', $fileName);

                $profile_image=$fileName;
            }
            $about=$request->about;
            $website=$request->website_link;
            $facebook=$request->facebook_link;
            $twitter=$request->twitter_link;
            $instagram=$request->instagram_link;
            $linkedin=$request->linkedin_link;

            $profileData=[
                'user_id'=>$client->id,
                'about'=>$about,
                'website_link'=>$website,
                'facebook_link'=>$facebook,
                'twitter_link'=>$twitter,
                'instagram_link'=>$instagram,
                'linkedin_link'=>$linkedin,
                'profile_image'=>$profile_image,
            ];

            DB::table('user_profile')->insert($profileData);
        }

        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $client)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('client_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if($client->id){
            //fetch user profile
            $client_profile=DB::table('user_profile')->where('user_id',$client->id)->first();
        }
        return view('admin.pages.clients.show', compact('client_profile','client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $client)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('client_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if($client->id){
            //fetch user profile
            $client_profile=DB::table('user_profile')->where('user_id',$client->id)->first();
        }
        return view('admin.pages.clients.edit', compact('client_profile','client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $client)
    {
        $client->update($request->all());
        $client->simple_pass=$request->password;

        // For user profile content
        if($client->save()){

            $profile_image='';
            if ($files = $request->file('profile_image')) {

                $path = storage_path().'/profile/';
                //code for remove old file
                if($client->file != ''  && $client->file != null){
                    $file_old = $path.$client->file;
                    unlink($file_old);
                }

                $fileName =  "image-".time().'.'.$request->profile_image->getClientOriginalExtension();
                $request->profile_image->storeAs('profile', $fileName);

                $profile_image = $fileName;
            }
            $about=$request->about;
            $website=$request->website_link;
            $facebook=$request->facebook_link;
            $twitter=$request->twitter_link;
            $instagram=$request->instagram_link;
            $linkedin=$request->linkedin_link;

            $profileData=[
                'about'=>$about,
                'website_link'=>$website,
                'facebook_link'=>$facebook,
                'twitter_link'=>$twitter,
                'instagram_link'=>$instagram,
                'linkedin_link'=>$linkedin,
                'profile_image'=>$profile_image,
            ];

            DB::table('user_profile')->where('user_id',$client->id)->update($profileData);
        }

        return redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $client)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('client_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserRequest $request)
    {
        User::whereIn('custom_id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function massActive(MassActiveUserRequest $request)
    {
        User::whereIn('custom_id', request('ids'))->update(array('status' => 1));

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function massDeactive(MassActiveUserRequest $request)
    {
        User::whereIn('custom_id', request('ids'))->update(array('status' => 2));

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
