<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPermissionRequest;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Permission;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('permission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $permissions = Permission::orderBy('id', 'DESC')->get();

        return view('admin.pages.permissions.index', compact('permissions'));
    }

    public function getPermission(Request $request, $page = 1)
    {
        $permissions = Permission::orderBy('id', 'DESC')->paginate($request->PageSize);
        return response()->json([
            'status' => 'success',
            'message' => 'Permission fetched successfully',
            'data' => $permissions
            ], 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('permission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        $permission = Permission::create($request->all());

        return redirect()->route('admin.permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('permission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.pages.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->all());

        return redirect()->route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('permission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permission->delete();

        return back();
    }


    public function massDestroy(MassDestroyPermissionRequest $request)
    {
        Permission::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
