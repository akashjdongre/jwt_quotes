<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UpdateBlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('quote_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'title'=>'required',
            'text' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:4096',
            'has_upload'=>'required',
            'category'=>'required',
            'url' => 'required|unique:blogs,url,'.$this->blog->id,
        ];
    }

    public function messages()
    {
        return [
            'has_upload.required' => 'Image field are required.',
        ];
    }
}
