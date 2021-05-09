<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class StoreSubAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('sub_admin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email'=> 'required|email|unique:admins',
            'password'=>'required|min:6|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@*!$#%]).*$/|confirmed',
            'password_confirmation' => 'required|same:password',
            'roles'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'Password should have uppercase (A – Z) lowercase (a – z) numeric (0-9) Non-alphanumeric (For example: @,*,!, $, #, or %)',
        ];
    }
}
