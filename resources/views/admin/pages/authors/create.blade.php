@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
        {{ trans('global.create') }} {{ trans('cruds.author.title_singular') }}
    </div>
        <div class="col-lg-6 ">
        <a class="btn btn-primary card-button btn-xs" href="{{ route('admin.authors.index') }}">
            Back
        </a>
        </div>
        </div>
    </div>

    <div class="card-body pageediter">
        <form method="POST" action="{{ route("admin.authors.store") }}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
                    @csrf
                    <input type="hidden" name="createdBy" value="{{Auth::guard('admin')->user()->id}}" >
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group avatar-upload">
                                    <div class="avatar-edit">
                                        <input type='file' name="image" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url({{asset('image/author-avatar.png')}});"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label class="required" for="name">{{ trans('cruds.author.fields.name') }}</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required placeholder="Enter Your Full Name">
                                    @if($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.author.fields.name_helper') }}</span>
                                </div>
                                <div class="form-group">
                                    <label class="required" for="url">{{ trans('cruds.author.fields.url') }}</label>
                                    <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', '') }}" required>
                                    @if($errors->has('url'))
                                        <span class="text-danger">{{ $errors->first('url') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.author.fields.url_helper') }}</span>
                                </div>
                            </div>

                        </div>
                    <div class="form-group">
                            <label for="meta_title">{{ trans('cruds.author.fields.meta_title') }}</label>
                            <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', '') }}" >
                            @if($errors->has('meta_title'))
                                <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.author.fields.meta_title_helper') }}</span>
                        </div>
                    <div class="form-group">
                            <label for="picture_meta_title">Picture Meta Title</label>
                            <input class="form-control {{ $errors->has('picture_meta_title') ? 'is-invalid' : '' }}" type="text" name="picture_meta_title" id="picture_meta_title" value="{{ old('picture_meta_title', '') }}" >
                            @if($errors->has('picture_meta_title'))
                                <span class="text-danger">{{ $errors->first('picture_meta_title') }}</span>
                            @endif
                            
                        </div>
                    <div class="form-group">
                            <label for="meta_author">{{ trans('cruds.author.fields.meta_author') }}</label>
                            <input class="form-control {{ $errors->has('meta_author') ? 'is-invalid' : '' }}" type="text" name="meta_author" id="meta_author" value="{{ old('meta_author', '') }}">
                            @if($errors->has('meta_author'))
                                <span class="text-danger">{{ $errors->first('meta_author') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.author.fields.meta_author_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="meta_keywords">{{ trans('cruds.author.fields.meta_keywords') }}</label>
                      <textarea class="form-control {{ $errors->has('meta_keywords') ? 'is-invalid' : '' }}" type="text" name="meta_keywords" id="meta_keywords" >{{ old('meta_keywords', '') }}</textarea>
                            @if($errors->has('meta_keywords'))
                                <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.author.fields.meta_keywords_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="meta_desc">{{ trans('cruds.author.fields.meta_desc') }}</label>
                            <textarea class="form-control {{ $errors->has('meta_desc') ? 'is-invalid' : '' }}" type="text" name="meta_desc" id="meta_desc" >{{ old('meta_desc', '') }}</textarea>
                            @if($errors->has('meta_desc'))
                                <span class="text-danger">{{ $errors->first('meta_desc') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.author.fields.meta_desc_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="picture_meta_desc">Picture Meta Description</label>
                            <textarea class="form-control {{ $errors->has('picture_meta_desc') ? 'is-invalid' : '' }}" type="text" name="picture_meta_desc" id="picture_meta_desc" >{{ old('picture_meta_desc', '') }}</textarea>
                            @if($errors->has('picture_meta_desc'))
                                <span class="text-danger">{{ $errors->first('picture_meta_desc') }}</span>
                            @endif
                            
                        </div>
                    
                        </div>
                
                    <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 border-left">
                        <div class="form-group">
                            <label for="meta_image">{{ trans('cruds.author.fields.meta_image') }}</label>
                            <div class="col-md-12 mb-2" >
                                <img width="500" height="300" id="image_preview_default" src="{{asset('image/nopreview.jpg')}}"
                                     alt="preview image" style="max-height: 300px;">
                            </div>
                            <input type="file" name="meta_image" placeholder="Choose Image" id="default_image">
                            <div>
                                @if($errors->has('meta_image'))
                                    <span class="text-danger">{{ $errors->first('meta_image') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.author.fields.meta_image_helper') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about">{{ trans('cruds.author.fields.about') }}</label>
                            <textarea name="about" id="about" class="{{ $errors->has('about') ? 'is-invalid' : '' }}" >{{ old('about', '') }}</textarea>
                            @if($errors->has('about'))
                                <span class="text-danger">{{ $errors->first('about') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.author.fields.about_helper') }}</span>
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

// meta image
    $(document).ready(function (e) {
        $('#default_image').change(function(){

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#image_preview_default').attr('src', e.target.result);

                //$('#has_upload').attr('value', e.target.result);

            }

            reader.readAsDataURL(this.files[0]);

        });

    });


  
        $('#about').summernote({
        tabsize: 2,
        height: 210,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    
</script>
@endsection
