<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAdminPasswordRequest;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('profile_password_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.auth.passwords.edit');
    }

    public function update(UpdateAdminPasswordRequest $request)
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('profile_password_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $admin_user=Auth::guard('admin')->user();
        $admin_user->update($request->validated());
        if($request->password != '')
            $admin_user->simple_pass = $request->password;
            $admin_user->save();
        return redirect()->route('admin.password.edit')->with('message', __('global.change_password_success'));
    }
}
