<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Gate;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UpdateQuoteRequest extends FormRequest
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
            'text' => 'required_without_all:has_upload,has_gif,video',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg|max:4096',
            'has_upload'=>'required_without_all:text,has_gif,video',
            'gif' => 'image|mimes:gif|max:4096',
            'has_gif'=>'required_without_all:text,has_upload,video',
            'video' => 'required_without_all:text,has_gif,has_upload',
            'video_title' => 'required_with:video,video_desc,has_thumb',
            'video_desc' => 'required_with:video_title,video_desc,has_thumb',
            'video_thumb' => 'image|mimes:jpeg,png,jpg|max:4096',
            'has_thumb' => 'required_with:video_title,video_desc,video',
            'url' => 'required|unique:quotes,url,'.$this->quote->id,

            'tags.*' => 'integer',
            'tags'   => 'required|array',
        ];
    }

    public function messages()
    {
        return [
            'text.required_without_all' => 'TEXT : At least one are required among TEXT , IMAGE , GIF and VIDEO .',
            'has_upload.required_without_all' => 'IMAGE : At least one are required among TEXT , IMAGE , GIF and VIDEO .',
            'has_gif.required_without_all' => 'GIF : At least one are required among TEXT , IMAGE , GIF and VIDEO .',
            'video.required_without_all' => 'IMAGE : At least one are required among TEXT , IMAGE , GIF and VIDEO .',
            'has_thumb.required_with' => 'VIDEO THUMB : Required All the Videos Content.',
        ];
    }
}
