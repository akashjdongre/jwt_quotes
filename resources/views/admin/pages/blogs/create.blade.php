@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
    {{ trans('global.create') }} {{ trans('cruds.blog.title_singular') }}
     </div>
        <div class="col-lg-6 ">
        <a class="btn btn-primary card-button btn-xs" href="{{ route('admin.blogs.index') }}">
            Back
        </a>
        </div>
        </div>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.blogs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input type="hidden" name="createdBy" value="{{Auth::guard('admin')->user()->id}}" >
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.tag.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tag.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="text">{{ trans('cruds.blog.fields.text') }}</label>
                <textarea name="text" id="text" class="{{ $errors->has('text') ? 'is-invalid' : '' }}" required>{{ old('text', '') }}</textarea>
                @if($errors->has('text'))
                    <span class="text-danger">{{ $errors->first('text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.blog.fields.text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alt">{{ trans('cruds.quote.fields.alt') }}</label>
                <textarea class="form-control {{ $errors->has('alt') ? 'is-invalid' : '' }}" type="text" name="alt" id="alt" >{{ old('alt', '') }}</textarea>
                @if($errors->has('alt'))
                    <span class="text-danger">{{ $errors->first('alt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.quote.fields.alt_helper') }}</span>
            </div>
                <div class="form-group">
                <label class="required" for="url">{{ trans('cruds.category.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', '') }}" required>
                @if($errors->has('url'))
                    <span class="text-danger">{{ $errors->first('url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.url_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category">{{ trans('cruds.blog.fields.category') }}</label>
                <select class="form-control  {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category" id="category" required>
                    <option value=" " >Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.blog.fields.category_helper') }}</span>
            </div>

                <div class="form-group">
                <label for="meta_title">{{ trans('cruds.category.fields.meta_title') }}</label>
                <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', '') }}" >
                @if($errors->has('meta_title'))
                    <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.meta_title_helper') }}</span>
            </div>

                <div class="form-group">
                <label for="meta_author">{{ trans('cruds.category.fields.meta_author') }}</label>
                <input class="form-control {{ $errors->has('meta_author') ? 'is-invalid' : '' }}" type="text" name="meta_author" id="meta_author" value="{{ old('meta_author', '') }}">
                @if($errors->has('meta_author'))
                    <span class="text-danger">{{ $errors->first('meta_author') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.meta_author_helper') }}</span>
            </div>
                <div class="form-group">
                <label for="meta_desc">{{ trans('cruds.category.fields.meta_desc') }}</label>
                    <textarea class="form-control autoresizing {{ $errors->has('meta_desc') ? 'is-invalid' : '' }}" type="text"  name="meta_desc" id="meta_desc"  value="{{ old('meta_desc', '') }}" ></textarea>
                @if($errors->has('meta_desc'))
                    <span class="text-danger">{{ $errors->first('meta_desc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.meta_desc_helper') }}</span>
            </div>
                <div class="form-group">
                <label for="meta_keywords">{{ trans('cruds.category.fields.meta_keywords') }}</label>
                <input class="form-control {{ $errors->has('meta_keywords') ? 'is-invalid' : '' }}" type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', '') }}" >
                @if($errors->has('meta_keywords'))
                    <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.meta_keywords_helper') }}</span>
            </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 border-left">
                    <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.blog.fields.image') }}</label>
                <div class="col-md-12 mb-2">
                    <img width="500" height="300" id="image_preview_container" src="{{ asset('image/nopreview.jpg') }}"
                         alt="preview image" style="max-height: 300px;">
                </div>
                    <input type="file" name="image" placeholder="Choose image" id="image">
                    @if($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.blog.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="meta_image">{{ trans('cruds.category.fields.meta_image') }}</label>
                <div class="col-md-12 mb-2" >
                    <img width="500" height="300" id="image_preview_default" src="{{asset('image/nopreview.jpg')}}"
                         alt="preview image" style="max-height: 300px;">
                </div>
                <input type="file" name="meta_image" placeholder="Choose Image" id="default_image">
                <div>
                    @if($errors->has('meta_image'))
                        <span class="text-danger">{{ $errors->first('meta_image') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.category.fields.meta_image_helper') }}</span>
                </div>
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

        $('#default_image').change(function(){ //meta image

            let reader = new FileReader();

            reader.onload = (e) => {

                $('#image_preview_default').attr('src', e.target.result);

                //$('#has_upload').attr('value', e.target.result);

            }

            reader.readAsDataURL(this.files[0]);

        });

        $('#text').summernote({
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
