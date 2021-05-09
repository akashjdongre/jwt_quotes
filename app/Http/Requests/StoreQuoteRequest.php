<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class StoreQuoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::forUser(Auth::guard('admin')->user())->denies('quote_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
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
            'text' => 'required_without_all:image,gif,video',
            'image' => 'required_without_all:text,gif,video|image|mimes:jpeg,png,jpg|max:4096',
            'gif' => 'required_without_all:text,image,video|image|mimes:gif|max:4096',
            'video' => 'required_without_all:text,gif,image',
            'video_title' => 'required_with:video,video_desc,video_thumb',
            'video_desc' => 'required_with:video_title,video_desc,video_thumb',
            'video_thumb' => 'required_with:video_title,video_desc,video|image|mimes:jpeg,png,jpg|max:4096',
            'url' => 'required|unique:quotes',
            'tags.*' => 'integer',
            'tags'   => 'required|array',
        ];
    }
}
