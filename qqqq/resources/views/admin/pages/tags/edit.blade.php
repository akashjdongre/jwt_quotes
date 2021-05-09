@extends('admin.layouts.app')
@section('content')


<div class="card">
    <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
     {{ trans('global.edit') }} {{ trans('cruds.tag.title_singular') }}
     </div>
        <div class="col-lg-6 ">
        <a class="btn btn-primary card-button btn-xs" href="{{ route('admin.tags.index') }}">
            Back
        </a>
        </div>
        </div>
    </div>
    <div class="card-body ">
        <form method="POST" action="{{ route("admin.tags.update", [$tag->custom_id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
           <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input type="hidden" name="updatedBy" value="{{Auth::guard('admin')->user()->id}}" >
                
              <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.tag.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $tag->title) }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tag.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="meta_title">{{ trans('cruds.category.fields.meta_title') }}</label>
                <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $tag->meta_title) }}" >
                @if($errors->has('meta_title'))
                    <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.meta_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label  for="picture_meta_title">Picture Meta Title</label>
                <input class="form-control {{ $errors->has('picture_meta_title') ? 'is-invalid' : '' }}" type="text" name="picture_meta_title" id="picture_meta_title" value="{{ old('picture_meta_title', $tag->picture_meta_title) }}">
                @if($errors->has('picture_meta_title'))
                    <span class="text-danger">{{ $errors->first('picture_meta_title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="meta_author">{{ trans('cruds.category.fields.meta_author') }}</label>
                <input class="form-control {{ $errors->has('meta_author') ? 'is-invalid' : '' }}" type="text" name="meta_author" id="meta_author" value="{{ old('meta_author', $tag->meta_author) }}">
                @if($errors->has('meta_author'))
                    <span class="text-danger">{{ $errors->first('meta_author') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.meta_author_helper') }}</span>
            </div>
                <div class="form-group">
                <label class="required" for="url">{{ trans('cruds.category.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', $tag->url) }}" required>
                @if($errors->has('url'))
                    <span class="text-danger">{{ $errors->first('url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.url_helper') }}</span>
            </div> 
            <div class="form-group">
                <label for="meta_desc">{{ trans('cruds.category.fields.meta_desc') }}</label>
                <input class="form-control {{ $errors->has('meta_desc') ? 'is-invalid' : '' }}" type="text" name="meta_desc" id="meta_desc" value="{{ old('meta_desc', $tag->meta_desc) }}" >
                @if($errors->has('meta_desc'))
                    <span class="text-danger">{{ $errors->first('meta_desc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.meta_desc_helper') }}</span>
            </div>
            <div class="form-group">
                    <label for="picture_meta_desc">Picture Meta Desc</label>
                    <textarea class="form-control {{ $errors->has('picture_meta_desc') ? 'is-invalid' : '' }}" type="text" name="picture_meta_desc" id="picture_meta_desc" >{{ old('picture_meta_desc', $tag->picture_meta_desc) }}</textarea>
                    @if($errors->has('picture_meta_desc'))
                        <span class="text-danger">{{ $errors->first('picture_meta_desc') }}</span>
                    @endif
            </div>
                   
            <div class="form-group">
                <label for="meta_keywords">{{ trans('cruds.category.fields.meta_keywords') }}</label>
                <input class="form-control {{ $errors->has('meta_keywords') ? 'is-invalid' : '' }}" type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $tag->meta_keywords) }}" >
                @if($errors->has('meta_keywords'))
                    <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.meta_keywords_helper') }}</span>
            </div>
                   
               </div>  
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 border-left">
            <div class="form-group">
                <label for="meta_image">{{ trans('cruds.category.fields.meta_image') }}</label>
                <div class="col-md-12 mb-2" >
                    <img width="500" height="300" id="image_preview_default" src="{{ !empty($tag->meta_image) ? asset('storage/image/'.$tag->meta_image) : asset('image/nopreview.jpg')  }}"
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

            <div class="form-group">
                <label class="required" for="visibility">Visibility</label>
                <select name="visibility" class="form-control {{ $errors->has('visibility') ? 'is-invalid' : '' }}">
                    <option value="1" @if($tag) @if($tag->visibility == 1) selected @endif @endif>Show</option>
                    <option value="2" @if($tag) @if($tag->visibility == 2) selected @endif @endif>Hide</option>
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('visibility') }}</span>
                @endif
            </div>
            
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.tag.fields.status') }}</label>
                <select name="status" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}">
                    <option value="1" @if($tag) @if($tag->status == 1) selected @endif @endif>Active</option>
                    <option value="2" @if($tag) @if($tag->status == 2) selected @endif @endif>Deactive</option>
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
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
        $(document).ready(function (e) {
            $('#default_image').change(function(){ //meta image

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#image_preview_default').attr('src', e.target.result);

                    //$('#has_upload').attr('value', e.target.result);

                }

                reader.readAsDataURL(this.files[0]);

            });

        });

    </script>
@endsection
