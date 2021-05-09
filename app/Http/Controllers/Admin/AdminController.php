<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * admin login
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login(){

        return view('admin.auth.login');
    }

    /**
     * admin dashboard
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard(){

        return view('admin.dashboard')
            ->with('status','Welcome to Dashboard !');
    }


    // admin profile
//    public function adminProfile(){
//
//        $adminUser = Auth::guard('admin')->user();
//
//        return view('admin.page.profile.view')
//            ->with('adminUser',$adminUser)
//            ->with('status','Profile');
//    }
//
//    // edit admin profile
//    public function editAdminProfile(){
//
//        $adminUser = Auth::guard('admin')->user();
//
//        return view('admin.page.profile.edit')
//            ->with('adminUser',$adminUser)
//            ->with('status','Profile');
//    }
//
//
//
//    public function changePassword(Request $request){
//
//        $rules = [
//            'new_password'         => 'required|min:6|regex:/^(?=.*[a-zA-Z])(?=.*\d).+$/',
//            'new_confirm_password' => 'required|required_with:new_password|same:new_password',
//            'current_password' => ['required', function ($attribute, $value, $fail) {
//                if (!\Hash::check($value, Auth::guard('admin')->user()->password)) {
//                    return $fail(__('The current password is incorrect.'));
//                }
//            }]
//        ];
//
//        //custom validation error messages.
//        $messages = [
//            //'confirm_new_password.unique'  => 'Email already exist in our records.',
//            // 'name.unique'   => 'Username already exist in our records.',
//        ];
//
//
//        if($request->validate($rules,$messages)){
//
//
//            $admin = Admin::find($request->id);
//
//
//            if (Hash::check($request->current_password, $admin->password)) {
//
//                $admin->password = Hash::make($request->new_password);
//                $admin->save();
//
//                return redirect()->intended(route('admin.profile'))->with('status','Profile');
//            }
//            else{
//
//                return redirect()->back()->with('status','Profile');
//
//            }
//
//
//
//        }
//        else{
//
//            return redirect()->route('admin.profile.edit')->with('status','Profile');
//
//        }
//
//    }
//
//    // update admin profile
//    public function updateAdminProfile(Request $request){
//
//        $rules = [
//            'email'    => 'required|min:5|max:191|unique:admins,email,'.$request->id,
//            'name'     => 'required|string|min:4|max:255|unique:admins,name,'.$request->id,
//        ];
//
//        //custom validation error messages.
//        $messages = [
//            'email.unique'  => 'Email already exist in our records.',
//            'name.unique'   => 'Username already exist in our records.',
//        ];
//
//
//        if($request->validate($rules,$messages)){
//
//
//            $admin = Admin::find($request->id);
//            $admin->name = $request->name;
//            $admin->email =$request->email;
//            $admin->role_id=1;
//            $admin->save();
//
//            return redirect()->intended(route('admin.profile'))->with('status','Profile');
//
//
//        }
//        else{
//
//            return redirect()->route('admin.profile.edit')->with('status','Profile');
//
//        }
//
//    }
}
