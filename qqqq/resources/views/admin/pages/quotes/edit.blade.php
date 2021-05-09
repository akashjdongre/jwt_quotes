@extends('admin.layouts.app')
@section('content')
@php
   // dd($quote);
@endphp
<div class="card">
    <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
     {{ trans('global.edit') }} {{ trans('cruds.quote.title_singular') }}
     </div>
        <div class="col-lg-6 ">
        <a class="btn btn-primary card-button btn-xs" href="{{ route('admin.quotes.index') }}">
            Back
        </a>
        </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" id="myForm" action="{{ route("admin.quotes.update", [$quote->custom_id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <input type="hidden" name="updatedBy" value="{{Auth::guard('admin')->user()->id}}" >
                <div class="form-group">
                <label class="required" for="author">{{ trans('cruds.quote.fields.author') }}</label>
                <select class="form-control select2  {{ $errors->has('author') ? 'is-invalid' : '' }}" name="author" id="author"  required>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}" {{ ($author->id==$quote->author) ? 'selected' : ''}}>{{ $author->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('author'))
                    <span class="text-danger">{{ $errors->first('author') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.quote.fields.author_helper') }}</span>
            </div>

            <div class="form-group">
                <label  for="text">{{ trans('cruds.quote.fields.text') }}</label>
                <textarea class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}" type="text" name="text" id="text">{{ old('text', $quote->text) }}</textarea>
                @if($errors->has('text'))
                    <span class="text-danger">{{ $errors->first('text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.quote.fields.text_helper') }}</span>
            </div>
                <div class="form-group">
                <label class="required" for="url">{{ trans('cruds.category.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', $quote->url) }}" required>
                @if($errors->has('url'))
                    <span class="text-danger">{{ $errors->first('url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.url_helper') }}</span>
            </div>
                <div class="form-group">
                <label for="alt">{{ trans('cruds.quote.fields.alt') }}</label>
                <textarea class="form-control {{ $errors->has('alt') ? 'is-invalid' : '' }}" type="text" name="alt" id="alt" >{{ old('alt',  $quote->alt) }}</textarea>
                @if($errors->has('alt'))
                    <span class="text-danger">{{ $errors->first('alt') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.quote.fields.alt_helper') }}</span>
            </div>
                <div class="form-group">
                <label for="meta_title">{{ trans('cruds.category.fields.meta_title') }}</label>
                <input class="form-control {{ $errors->has('meta_title') ? 'is-invalid' : '' }}" type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $quote->meta_title) }}" >
                @if($errors->has('meta_title'))
                    <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.meta_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label  for="picture_meta_title">Picture Meta Title</label>
                <input class="form-control {{ $errors->has('picture_meta_title') ? 'is-invalid' : '' }}" type="text" name="picture_meta_title" id="picture_meta_title" value="{{ old('picture_meta_title', $quote->picture_meta_title) }}">
                @if($errors->has('picture_meta_title'))
                    <span class="text-danger">{{ $errors->first('picture_meta_title') }}</span>
                @endif
            </div>
                <div class="form-group">
                <label for="meta_author">{{ trans('cruds.category.fields.meta_author') }}</label>
                <input class="form-control {{ $errors->has('meta_author') ? 'is-invalid' : '' }}" type="text" name="meta_author" id="meta_author" value="{{ old('meta_author', $quote->meta_author) }}">
                @if($errors->has('meta_author'))
                    <span class="text-danger">{{ $errors->first('meta_author') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.meta_author_helper') }}</span>
            </div>
                <div class="form-group">
                <label for="meta_desc">{{ trans('cruds.category.fields.meta_desc') }}</label>
                    <textarea class="form-control {{ $errors->has('meta_desc') ? 'is-invalid' : '' }}" type="text" name="meta_desc" id="meta_desc" >{{ old('meta_desc', $quote->meta_desc) }}</textarea>
                @if($errors->has('meta_desc'))
                    <span class="text-danger">{{ $errors->first('meta_desc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.meta_desc_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="picture_meta_desc">Picture Meta Desc</label>
                <textarea class="form-control {{ $errors->has('picture_meta_desc') ? 'is-invalid' : '' }}" type="text" name="picture_meta_desc" id="picture_meta_desc" >{{ old('picture_meta_desc', $quote->picture_meta_desc) }}</textarea>
                @if($errors->has('picture_meta_desc'))
                    <span class="text-danger">{{ $errors->first('picture_meta_desc') }}</span>
                @endif
            </div>
                <div class="form-group">
                <label for="meta_keywords">{{ trans('cruds.category.fields.meta_keywords') }}</label>
                <input class="form-control {{ $errors->has('meta_keywords') ? 'is-invalid' : '' }}" type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $quote->meta_keywords) }}" >
                @if($errors->has('meta_keywords'))
                    <span class="text-danger">{{ $errors->first('meta_keywords') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.category.fields.meta_keywords_helper') }}</span>
            </div>
                <div class="form-group">
                <label class="required" for="tags">{{ trans('cruds.quote.fields.tags') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs  chosen-toggle select" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs  chosen-toggle deselect" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control chosen-select {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple required>
                    @foreach($qTags as $t)
                            <option value="{{ $t->id }}" selected>{{ $t->title }}</option>    
                    @endforeach
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
                <input type="hidden"  name="tags_hidden[]" class="hidden-class"  />
                @if($errors->has('tags'))
                    <span class="text-danger">{{ $errors->first('tags') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.quote.fields.tags_helper') }}</span>
            </div>
                <div class="form-group">
                <label for="meta_image">{{ trans('cruds.category.fields.meta_image') }}</label>
                <div class="col-md-12 mb-2 img_wrp" >
                    <img width="500" height="300" id="image_preview_default" src="{{ !empty($quote->meta_image) ? asset('storage/image/'.$quote->meta_image) : asset('image/nopreview.jpg')  }}"
                         alt="preview image" style="max-height: 300px;">
                    <a href="javascript:void(0);" class="close-click" ><img class="close-img-icon" src="{{asset('image/close-img-icon.png')}}" /></a>
                </div>
                <input type="file" name="meta_image" placeholder="Choose Image" id="default_image">
                <input type="hidden" name="has_meta" id="has_meta" value="{{ $quote->meta_image }}" />
                <div>
                    @if($errors->has('meta_image'))
                        <span class="text-danger">{{ $errors->first('meta_image') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.category.fields.meta_image_helper') }}</span>
                </div>
            </div>
            </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 border-left">
                    <div class="form-group">
                <label for="image">{{ trans('cruds.quote.fields.image') }}</label>
                <div class="col-md-12 mb-2 img_wrp" >
                    <img width="500" height="300" id="image_preview_container" src="{{ !empty($quote->image) ? asset('storage/image/'.$quote->image) : asset('image/nopreview.jpg')  }}"
                         alt="preview image" style="max-height: 300px;">
                    <a href="javascript:void(0);" class="close-click" ><img class="close-img-icon" src="{{asset('image/close-img-icon.png')}}" /></a>
                </div>
                <input type="file" name="image" placeholder="Choose image" id="image">
                <input type="hidden" name="has_upload" id="has_upload" value="{{ $quote->image }}" />
                <div>
                    @if($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                    @if($errors->has('has_upload'))
                        <span class="text-danger">{{ $errors->first('has_upload') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.quote.fields.image_helper') }}</span>
                </div>
            </div>
                    <div class="form-group">
                <label class="required" for="gif">{{ trans('cruds.quote.fields.gif') }}</label>
                <div class="col-md-12 mb-2 img_wrp">
                    <img width="500" height="300" id="image_preview_banner" src="{{ !empty($quote->gif) ? asset('storage/image/'.$quote->gif) : asset('image/nopreview.jpg')  }}"
                         alt="preview image" style="max-height: 300px;">
                    <a href="javascript:void(0);" class="close-click" ><img class="close-img-icon" src="{{asset('image/close-img-icon.png')}}" /></a>
                </div>
                <input type="file" name="gif" placeholder="Choose image" id="banner">
                <input type="hidden" name="has_gif" id="has_gif" value="{{ $quote->gif }}" />
                @if($errors->has('gif'))
                    <span class="text-danger">{{ $errors->first('gif') }}</span>
                @endif
                @if($errors->has('has_gif'))
                    <span class="text-danger">{{ $errors->first('has_gif') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.quote.fields.gif_helper') }}</span>
            </div>
                    <div class="form-group">
                <label class="required" for="video">{{ trans('cruds.quote.fields.video') }}</label>
                <input class="form-control {{ $errors->has('video') ? 'is-invalid' : '' }}" type="text" name="video" id="video" value="{{ old('video',  $quote->video) }}" >
                @if($errors->has('video'))
                    <span class="text-danger">{{ $errors->first('video') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.quote.fields.video_helper') }}</span>
            </div>
                    <div class="form-group" id="video_title_box">
                <label class="required" for="video_title">{{ trans('cruds.quote.fields.video_title') }}</label>
                <input class="form-control {{ $errors->has('video_title') ? 'is-invalid' : '' }}" type="text" name="video_title" id="video_title" value="{{ old('video_title', $quote->video_title) }}" >
                @if($errors->has('video_title'))
                    <span class="text-danger">{{ $errors->first('video_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.quote.fields.video_title_helper') }}</span>
            </div>
            <div class="form-group" id="video_desc_box">
                <label  class="required" for="video_desc">{{ trans('cruds.quote.fields.video_desc') }}</label>
                <textarea class="form-control {{ $errors->has('video_desc') ? 'is-invalid' : '' }}" type="text" name="video_desc" id="video_desc" >{{ old('video_desc', $quote->video_desc) }}</textarea>
                @if($errors->has('video_desc'))
                    <span class="text-danger">{{ $errors->first('video_desc') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.quote.fields.video_desc_helper') }}</span>
            </div>
            <div class="form-group" id="video_thumb_box">
                <label class="required" for="video_thumb">{{ trans('cruds.quote.fields.video_thumb') }}</label>
                <div class="col-md-12 mb-2 img_wrp">
                    <img width="500" height="300" id="image_preview_thumb" src="{{ !empty($quote->video_thumb) ? asset('storage/image/'.$quote->video_thumb) : asset('image/nopreview.jpg')  }}"
                         alt="preview image" style="max-height: 300px;">
                    <a href="javascript:void(0);" class="close-click" ><img class="close-img-icon" src="{{asset('image/close-img-icon.png')}}" /></a>
                </div>
                <input type="file" name="video_thumb" placeholder="Choose image" id="thumb">
                <input type="hidden" name="has_thumb" id="has_thumb" value="{{ $quote->video_thumb }}" />
                @if($errors->has('video_thumb'))
                    <span class="text-danger">{{ $errors->first('video_thumb') }}</span>
                @endif
                @if($errors->has('has_thumb'))
                    <span class="text-danger">{{ $errors->first('has_thumb') }}</span>
                @endif

                <span class="help-block">{{ trans('cruds.quote.fields.video_thumb_helper') }}</span>
            </div>


            <div class="form-group">
                <label class="required" for="is_approved">{{ trans('cruds.quote.fields.is_approved') }}</label>
                <select name="is_approved" class="form-control {{ $errors->has('is_approved') ? 'is-invalid' : '' }}">
                    <option value="1" @if($quote) @if($quote->is_approved == 1) selected @endif @endif>Approved</option>
                    <option value="2" @if($quote) @if($quote->is_approved == 2) selected @endif @endif>Disapproved</option>
                </select>
                @if($errors->has('is_approved'))
                    <span class="text-danger">{{ $errors->first('is_approved') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="status">{{ trans('cruds.quote.fields.status') }}</label>
                <select name="status" class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}">
                    <option value="1" @if($quote) @if($quote->status == 1) selected @endif @endif>Active</option>
                    <option value="2" @if($quote) @if($quote->status == 2) selected @endif @endif>Deactive</option>
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
                <button class="btn btn-danger btn-style" type="button" onclick="resetForm('myForm');" >
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

            var hasMeta=$('#has_meta').val();
            var hasGIF=$('#has_gif').val();
            var hasThumb=$('#has_thumb').val();
            var hasUpload=$('#has_upload').val();

            if(hasMeta!==''){
                $('#has_meta').siblings('.img_wrp').find('.close-click').css( "display", "block" );
            }
            if(hasGIF!==''){
                $('#has_gif').siblings('.img_wrp').find('.close-click').css( "display", "block" );
            }
            if(hasThumb!==''){
                $('#has_thumb').siblings('.img_wrp').find('.close-click').css( "display", "block" );
            }
            if(hasUpload!==''){
                $('#has_upload').siblings('.img_wrp').find('.close-click').css( "display", "block" );
            }

            $('#default_image').change(function(){ //meta image

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#image_preview_default').attr('src', e.target.result);

                    $('#has_meta').attr('value', e.target.result);

                    $(this).siblings('.img_wrp').find('.close-click').css( "display", "block" );

                }

                reader.readAsDataURL(this.files[0]);

            });


            $('#banner').change(function(){   // gif image

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#image_preview_banner').attr('src', e.target.result);

                    $('#has_gif').attr('value', e.target.result);

                    $(this).siblings('.img_wrp').find('.close-click').css( "display", "block" );

                }

                reader.readAsDataURL(this.files[0]);

            });


            $('#thumb').change(function(){  // video thumb image

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#image_preview_thumb').attr('src', e.target.result);

                    $('#has_thumb').attr('value', e.target.result);

                    $(this).siblings('.img_wrp').find('.close-click').css( "display", "block" );

                }

                reader.readAsDataURL(this.files[0]);

            });



        });

    </script>
@endsection

