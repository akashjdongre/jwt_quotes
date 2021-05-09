@extends('admin.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
        {{ trans('global.create') }} {{ trans('cruds.author.title_singular') }}
     </div>
        <div class="col-lg-6 ">
        <a class="btn btn-primary card-button btn-xs" href="{{ route('admin.tags.index') }}">
            Back
        </a>
        </div>
        </div>
    </div>
        <div class="card-body trend-body">
            <form method="POST" id="trend-update" action="{{ route("admin.tags.trend-update") }}" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="form-group">
                    <label class="required" for="tags">{{ trans('cruds.tag.title') }}</label>
                    <select id="tags"  class="form-control chosen-select multiple {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]"  multiple required>
                        @foreach($trendTags as $t)
                            <option value="{{ $t->id }}" selected>{{ $t->title }}</option>    
                        @endforeach
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                        @endforeach
                    </select>
                    <input type="hidden"  name="tags_hidden[]" class="hidden-class"  />
                    <div class="text-center" style="padding-top: 50px ">
                        <button class="btn btn-danger  chosen-toggle select btn-style ">{{ trans('global.select_all') }}</button>
                        <button class="btn btn-danger chosen-toggle deselect btn-style ">{{ trans('global.deselect_all') }}</button>
                         @if(Auth::guard('admin')->user()->can('trending_tag_update'))
                        <button class="btn btn-danger btn-style " type="submit">
                        {{ trans('global.save') }}
                    </button>
                        @endif
                    </div>
                    @if($errors->has('tags'))
                        <span class="text-danger">{{ $errors->first('tags') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.category.fields.tags_helper') }}</span>
                </div>
                 <!--@if(Auth::guard('admin')->user()->can('trending_tag_update'))
               <div class="form-group text-center">
                    <button class="btn btn-danger " type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
                @endif-->
            </form>
        </div>
    </div>

@endsection

