@php //dd('hello'); @endphp
@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
    {{ trans('global.edit') }} {{ trans('cruds.settings.home') }}
     </div>
        </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route("admin.settings.updateSetting") }}" enctype="multipart/form-data">
                @method('POST')
                @csrf
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="row" style="margin-bottom: 30px;">
                    <div class="form-check form-check-space">
                    <input class="form-check-input" type="checkbox" name="cat_show" value="true" id="cat_show" {{ ($setting->cat_show==true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="cat_show">
                        Top Categories
                    </label>
                </div>
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="gif_show" value="true" id="gif_show" {{ ($setting->gif_show==true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="gif_show">
                         GIF
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="video_show" value="true" id="video_show" {{ ($setting->video_show==true) ? 'checked' : '' }}>
                    <label class="form-check-label" for="video_show">
                        Video
                    </label>
                </div>
                    </div>
                <div class="form-group">
                    <label  for="about">{{ trans('cruds.settings.fields.about') }}</label>
                    <textarea class="form-control {{ $errors->has('about') ? 'is-invalid' : '' }}" name="about" id="about">{{ old('about', $setting->about) }}</textarea>
                    @if($errors->has('about'))
                        <span class="text-danger">{{ $errors->first('about') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.settings.fields.about_helper') }}</span>
                </div>
                <div class="form-group">
                    <label  for="meta_title">{{ trans('cruds.settings.fields.meta_title') }}</label>
                    <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $setting->meta_title) }}">
                    @if($errors->has('meta_title'))
                        <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.settings.fields.meta_title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="meta_author">{{ trans('cruds.settings.fields.meta_author') }}</label>
                    <input class="form-control {{ $errors->has('meta_author') ? 'is-invalid' : '' }}" type="text" name="meta_author" id="meta_author" value="{{ old('meta_author', $setting->meta_author) }}">
                    @if($errors->has('meta_author'))
                        <span class="text-danger">{{ $errors->first('meta_author') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.settings.fields.meta_author_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="meta_desc">{{ trans('cruds.settings.fields.meta_desc') }}</label>
                    <textarea class="form-control {{ $errors->has('meta_desc') ? 'is-invalid' : '' }}"  name="meta_desc" id="meta_desc" >{{ $setting->meta_desc }}</textarea>
                    @if($errors->has('meta_desc'))
                        <span class="text-danger">{{ $errors->first('meta_desc') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.settings.fields.meta_desc_helper') }}</span>
                </div>
                <div class="form-group">
                    <label  for="meta_keywords">{{ trans('cruds.settings.fields.meta_keywords') }}</label>
                    <input class="form-control {{ $errors->has('meta_keywords') ? 'is-invalid' : '' }}" type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $setting->meta_keywords) }}" >
                    @if($errors->has('meta_keywords'))
                        <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.settings.fields.meta_keywords_helper') }}</span>
                </div>
                    </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="banner">{{ trans('cruds.settings.fields.banner') }}</label>
                    <div class="col-md-12 mb-2" >
                        <img width="500" height="300" id="image_preview_banner" src="{{ !empty($setting->banner) ? asset('storage/setting/'.$setting->banner) : asset('image/nopreview.jpg')  }}"
                             alt="preview image" style="max-height: 300px;">
                    </div>
                    <input type="file" name="banner" placeholder="Choose Banner" id="banner">
                    <div>
                        @if($errors->has('banner'))
                            <span class="text-danger">{{ $errors->first('banner') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.settings.fields.banner_helper') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="search_default_image">{{ trans('cruds.settings.fields.search_default_image') }}</label>
                    <div class="col-md-12 mb-2" >
                        <img width="500" height="300" id="image_preview_container" src="{{ !empty($setting->search_default_image) ? asset('storage/setting/'.$setting->search_default_image) : asset('image/nopreview.jpg')  }}"
                             alt="preview image" style="max-height: 300px;">
                    </div>
                    <input type="file" name="search_default_image" placeholder="Choose Image" id="search_default_image">
                    <div>
                        @if($errors->has('search_default_image'))
                            <span class="text-danger">{{ $errors->first('search_default_image') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.settings.fields.search_default_image_helper') }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="default_image">{{ trans('cruds.settings.fields.default_image') }}</label>
                    <div class="col-md-12 mb-2" >
                        <img width="500" height="300" id="image_preview_default" src="{{ !empty($setting->default_image) ? asset('storage/setting/'.$setting->default_image) : asset('image/nopreview.jpg')  }}"
                             alt="preview image" style="max-height: 300px;">
                    </div>
                    <input type="file" name="default_image" placeholder="Choose Image" id="default_image">
                    <div>
                        @if($errors->has('default_image'))
                            <span class="text-danger">{{ $errors->first('default_image') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.settings.fields.default_image_helper') }}</span>
                    </div>
                </div>
                @if(Auth::guard('admin')->user()->can('setting_access'))
                    </div>
                </div>
                <div class="form-group text-center">
                <button class="btn btn-danger btn-style" type="submit">
                    {{ trans('global.save') }}
                </button>
                <button class="btn btn-danger btn-style" type="reset">
                    {{ trans('Reset') }}
                </button>
               </div>
                @endif
            </form>
        </div>
    </div>
@endsection
@section('scripts')
@parent
    <script>
        $(document).ready(function (e) {
            $('#default_image').change(function(){

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#image_preview_default').attr('src', e.target.result);

                    //$('#has_upload').attr('value', e.target.result);

                }

                reader.readAsDataURL(this.files[0]);

            });


            $('#banner').change(function(){

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#image_preview_banner').attr('src', e.target.result);

                    //$('#has_upload').attr('value', e.target.result);

                }

                reader.readAsDataURL(this.files[0]);

            });


            $('#search_default_image').change(function(){

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#image_preview_container').attr('src', e.target.result);

                    //$('#has_upload').attr('value', e.target.result);

                }

                reader.readAsDataURL(this.files[0]);

            });

        });

        // initialize editor in textarea about
        CKEDITOR.replace( 'about',{
            width: '100%',
            height: 400
        });
    </script>
@endsection
