<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassActiveSubAdminRequest;
use App\Http\Requests\MassDestroySubAdminRequest;
use App\Http\Requests\StoreSubAdminRequest;
use App\Http\Requests\UpdateSubAdminRequest;
use App\Role;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('sub_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_admins = Admin::all();

        $roles = Role::all()->pluck('title', 'id');

        return view('admin.pages.sub_admins.index', compact('roles','sub_admins'));
        // exit;
        //  return response()->json([
        //     'status' => 'success',
        //     'message' => 'sub-admin data',
        //     'roles' => $roles,
        //     'data' => $sub_admins
        //     ], 201);
    }


    public function sub_admin_detail(Admin $sub_admin)
    {   
        $roles = Role::all()->pluck('title', 'id');
        return response()->json([
        'status' => 'success',
        'message' => 'sub-admin data',
         'roles' => $roles,
        'data' => $sub_admin
        ], 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('sub_admin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        return view('admin.pages.sub_admins.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubAdminRequest $request)
    {   
        $sub_admin=Admin::create($request->all());
        $sub_admin->simple_pass=$request->password;
        $sub_admin->custom_id='SAID'.$sub_admin->id;
        $sub_admin->roles()->sync($request->input('roles', []));
        $sub_admin->save();

        return redirect()->route('admin.sub_admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $sub_admin)
    {
        //abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('sub_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        if($sub_admin->roles[0]->id!=1)
        { 
            // if role is not admin
            return view('admin.pages.sub_admins.show', compact('roles','sub_admin'));
        }
        else
        {
            abort_if(Gate::denies('sub_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $sub_admin)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('sub_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::all()->pluck('title', 'id');

        if($sub_admin->roles[0]->id!=1){ // if role is not admin
            return view('admin.pages.sub_admins.edit', compact('roles','sub_admin'));
        }else{
            abort_if(Gate::denies('sub_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubAdminRequest $request, Admin $sub_admin)
    {
        $sub_admin->update($request->all());
        $sub_admin->simple_pass=$request->password;
        $sub_admin->roles()->sync($request->input('roles', []));
        $sub_admin->save();


        return redirect()->route('admin.sub_admins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $sub_admin)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('sub_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sub_admin->delete();

        return back();
    }

    public function massDestroy(MassDestroySubAdminRequest $request)
    {
        Admin::whereIn('custom_id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function massActive(MassActiveSubAdminRequest $request)
    {
        Admin::whereIn('custom_id', request('ids'))->update(array('status' => 1));

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function massDeactive(MassActiveSubAdminRequest $request)
    {
        Admin::whereIn('custom_id', request('ids'))->update(array('status' => 2));

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
