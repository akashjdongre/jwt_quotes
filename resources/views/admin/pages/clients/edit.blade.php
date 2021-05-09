@extends('admin.layouts.app')
@section('content')

<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-primary" href="{{ route('admin.clients.index') }}">
            Back
        </a>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.client.title_singular') }}
    </div>

    <div class="card-body cardboadyincenter">
        <form method="POST" action="{{ route("admin.clients.update", [$client->custom_id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group avatar-upload">
                <div class="avatar-edit">
                    <input type='file' name="profile_image" id="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url({{ (!empty($client_profile->profile_image)) ? asset('storage/profile/'.$client_profile->profile_image) : asset('image/author-avatar.png')}});"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.client.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $client->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.client.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $client->email) }}" required readonly>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.client.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="text" name="password" id="password" value="{{ old('password', $client->simple_pass) }}" required>
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label  for="about">{{ trans('cruds.client.fields.about') }}</label>
                <textarea class="form-control {{ $errors->has('about') ? 'is-invalid' : '' }}"  name="about" id="about" >{{ old('about', $client_profile->about) }}</textarea>
                @if($errors->has('about'))
                    <span class="text-danger">{{ $errors->first('about') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.about_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website_link">{{ trans('cruds.client.fields.website_link') }}</label>
                <input class="form-control {{ $errors->has('website_link') ? 'is-invalid' : '' }}" type="text" name="website_link" id="website_link" value="{{ old('website_link', $client_profile->website_link) }}" required>
                @if($errors->has('website_link'))
                    <span class="text-danger">{{ $errors->first('website_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.website_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook_link">{{ trans('cruds.client.fields.facebook_link') }}</label>
                <input class="form-control {{ $errors->has('facebook_link') ? 'is-invalid' : '' }}" type="text" name="facebook_link" id="facebook_link" value="{{ old('facebook_link', $client_profile->facebook_link) }}" required>
                @if($errors->has('facebook_link'))
                    <span class="text-danger">{{ $errors->first('facebook_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.facebook_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter_link">{{ trans('cruds.client.fields.twitter_link') }}</label>
                <input class="form-control {{ $errors->has('twitter_link') ? 'is-invalid' : '' }}" type="text" name="twitter_link" id="twitter_link" value="{{ old('twitter_link', $client_profile->twitter_link) }}" required>
                @if($errors->has('twitter_link'))
                    <span class="text-danger">{{ $errors->first('twitter_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.twitter_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram_link">{{ trans('cruds.client.fields.instagram_link') }}</label>
                <input class="form-control {{ $errors->has('instagram_link') ? 'is-invalid' : '' }}" type="text" name="instagram_link" id="instagram_link" value="{{ old('instagram_link', $client_profile->instagram_link) }}" required>
                @if($errors->has('instagram_link'))
                    <span class="text-danger">{{ $errors->first('instagram_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.instagram_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin_link">{{ trans('cruds.client.fields.linkedin_link') }}</label>
                <input class="form-control {{ $errors->has('linkedin_link') ? 'is-invalid' : '' }}" type="text" name="linkedin_link" id="linkedin_link" value="{{ old('linkedin_link', $client_profile->linkedin_link) }}" required>
                @if($errors->has('linkedin_link'))
                    <span class="text-danger">{{ $errors->first('linkedin_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.client.fields.linkedin_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.client.fields.status') }}</label>
                <select name="status" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}">
                    <option value="1" @if($client) @if($client->status == 1) selected @endif @endif>Active</option>
                    <option value="2" @if($client) @if($client->status == 2) selected @endif @endif>Deactive</option>
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
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
