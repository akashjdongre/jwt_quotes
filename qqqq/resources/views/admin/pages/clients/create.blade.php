@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
     {{ trans('global.create') }} {{ trans('cruds.client.title_singular') }}
     </div>
        <div class="col-lg-6 ">
        <a class="btn btn-primary card-button btn-xs" href="{{ route('admin.clients.index') }}">
            Back
        </a>
        </div>
        </div>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.clients.store") }}" enctype="multipart/form-data">
            @csrf
             <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="row">
                <div class="col-md-5">
            <div class="form-group avatar-upload">
                <div class="avatar-edit">
                    <input type='file' name="profile_image" id="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url({{asset('image/author-avatar.png')}});"></div>
                </div>
            </div>
                </div>
                  <div class="col-md-7">
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.client.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.client.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', '') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.email_helper') }}</span>
            </div>
                </div>
                    </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.client.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password"  required>
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="co_password">{{ trans('cruds.client.fields.co_password') }}</label>
                <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password" name="password_confirmation" id="password-confirm"  required>
                @if($errors->has('password_confirmation'))
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.co_password_helper') }}</span>
            </div>
                <div class="form-group">
                <label  for="name">{{ trans('cruds.client.fields.twitter_link') }}</label>
                <input class="form-control {{ $errors->has('twitter_link') ? 'is-invalid' : '' }}" type="text" name="twitter_link" id="twitter_link" value="{{ old('twitter_link', '') }}">
                @if($errors->has('twitter_link'))
                    <span class="text-danger">{{ $errors->first('twitter_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.twitter_link_helper') }}</span>
            </div>
                <div class="form-group">
                <label  for="name">{{ trans('cruds.client.fields.instagram_link') }}</label>
                <input class="form-control {{ $errors->has('instagram_link') ? 'is-invalid' : '' }}" type="text" name="instagram_link" id="instagram_link" value="{{ old('instagram_link', '') }}" >
                @if($errors->has('instagram_link'))
                    <span class="text-danger">{{ $errors->first('instagram_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.instagram_link_helper') }}</span>
            </div>
                 </div>
                 <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 border-left">
            <div class="form-group">
                <label  for="about">{{ trans('cruds.client.fields.about') }}</label>
                <textarea class="form-control {{ $errors->has('about') ? 'is-invalid' : '' }}"  name="about" id="about" >{{ old('about', '') }}</textarea>
                @if($errors->has('about'))
                    <span class="text-danger">{{ $errors->first('about') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.about_helper') }}</span>
            </div>
            <div class="form-group">
                <label  for="website_link">{{ trans('cruds.client.fields.website_link') }}</label>
                <input class="form-control {{ $errors->has('website_link') ? 'is-invalid' : '' }}" type="text" name="website_link" id="website_link" value="{{ old('website_link', '') }}" >
                @if($errors->has('website_link'))
                    <span class="text-danger">{{ $errors->first('website_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.website_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label  for="name">{{ trans('cruds.client.fields.facebook_link') }}</label>
                <input class="form-control {{ $errors->has('facebook_link') ? 'is-invalid' : '' }}" type="text" name="facebook_link" id="facebook_link" value="{{ old('facebook_link', '') }}">
                @if($errors->has('facebook_link'))
                    <span class="text-danger">{{ $errors->first('facebook_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.facebook_link_helper') }}</span>
            </div>
            
            
            <div class="form-group">
                <label  for="name">{{ trans('cruds.client.fields.linkedin_link') }}</label>
                <input class="form-control {{ $errors->has('linkedin_link') ? 'is-invalid' : '' }}" type="text" name="linkedin_link" id="linkedin_link" value="{{ old('linkedin_link', '') }}" >
                @if($errors->has('linkedin_link'))
                    <span class="text-danger">{{ $errors->first('linkedin_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.linkedin_link_helper') }}</span>
            </div>
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
        </form>
    </div>
</div>



@endsection
@section('scripts')
    @parent
    <script>
        // for author profile
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });

    </script>
@endsection
