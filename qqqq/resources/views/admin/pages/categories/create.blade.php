@extends('admin.layouts.app')
@section('content')


<div class="card">
    <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
       {{ trans('global.create') }} {{ trans('cruds.category.title_singular') }}
     </div>
        <div class="col-lg-6 ">
        <a class="btn btn-primary card-button btn-xs" href="{{ route('admin.categories.index') }}">
            Back
        </a>
        </div>
        </div>
    </div>

    <div class="card-body pageediter">
        <form method="POST" action="{{ route("admin.categories.store") }}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6">
            @csrf
            <input type="hidden" name="createdBy" value="{{Auth::guard('admin')->user()->id}}" >
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.category.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.name_helper') }}</span>
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
                <label for="picture_meta_title">Picture Meta Title</label>
                <input class="form-control {{ $errors->has('picture_meta_title') ? 'is-invalid' : '' }}" type="text" name="picture_meta_title" id="picture_meta_title" value="{{ old('picture_meta_title', '') }}" >
                @if($errors->has('picture_meta_title'))
                    <span class="text-danger">{{ $errors->first('picture_meta_title') }}</span>
                @endif
                
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
                <input class="form-control {{ $errors->has('meta_desc') ? 'is-invalid' : '' }}" type="text" name="meta_desc" id="meta_desc" value="{{ old('meta_desc', '') }}" >
                @if($errors->has('meta_desc'))
                    <span class="text-danger">{{ $errors->first('meta_desc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.meta_desc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="picture_meta_desc">Picture Meta Description</label>
                <textarea class="form-control {{ $errors->has('picture_meta_desc') ? 'is-invalid' : '' }}" type="text" name="picture_meta_desc" id="picture_meta_desc" >{{ old('picture_meta_desc', '') }}</textarea>
                @if($errors->has('picture_meta_desc'))
                    <span class="text-danger">{{ $errors->first('picture_meta_desc') }}</span>
                @endif
                
            </div>
                    
            <div class="form-group">
                <label for="meta_keywords">{{ trans('cruds.category.fields.meta_keywords') }}</label>
                <input class="form-control {{ $errors->has('meta_keywords') ? 'is-invalid' : '' }}" type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', '') }}" >
                @if($errors->has('meta_keywords'))
                    <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.meta_keywords_helper') }}</span>
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
                <label class="required" for="location">{{ trans('cruds.category.fields.location') }}</label>
                <select name="location" class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}">
                    <option value="1">On Head</option>
                    <option value="2">On Foot</option>
                    <option value="3">No Where</option>
                </select>
                @if($errors->has('location'))
                    <span class="text-danger">{{ $errors->first('location') }}</span>
              
                @endif
            </div>
                    <div class="form-group">
                <label class="required" for="tags">{{ trans('cruds.category.fields.tags') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control chosen-select {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple required>
                    @foreach($tags as $id => $tag)
                        <option value="{{ $id }}" {{ in_array($id, old('tags', [])) ? 'selected' : '' }}>{{ $tag }}</option>
                    @endforeach
                </select>
                <input type="hidden"  name="tags_hidden[]" class="hidden-class"  />
                @if($errors->has('tags'))
                    <span class="text-danger">{{ $errors->first('tags') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.tags_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_cats">Assign Categories</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control chosen-select {{ $errors->has('sub_cats') ? 'is-invalid' : '' }}" name="sub_cats[]" id="sub_cats" multiple>
                    @foreach($categories as $id => $cat)
                        <option value="{{ $cat->id }}" {{ in_array($id, old('sub_cats', [])) ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
                <input type="hidden"  name="sub_cats_hidden[]" class="hidden-class"  />
                @if($errors->has('sub_cats'))
                    <span class="text-danger">{{ $errors->first('sub_cats') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.tags_helper') }}</span>
            </div>
            </div>
                 <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 border-left">
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
            <div class="form-group">
                <label for="description">{{ trans('cruds.category.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"  name="description" id="description" >{{ old('description','') }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.description_helper') }}</span>
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
            $('#default_image').change(function(){

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#image_preview_default').attr('src', e.target.result);

                    //$('#has_upload').attr('value', e.target.result);

                }

                reader.readAsDataURL(this.files[0]);

            });

        });

        $('#description').summernote({
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



      $('#description').each(function(){
      var summernote = $(this);
      $('form').on('submit',function(){
          if (summernote.summernote('isEmpty')) {
               summernote.val('');
          }else if(summernote.val()=='<p><br></p>'){
               summernote.val('');
          }
     });
    });
    </script>
@endsection
