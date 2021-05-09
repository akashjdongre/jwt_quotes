@extends('admin.layouts.app')
@section('content')
@php //dd($topCatsArr); @endphp
    
   <div class="card">
        <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
      {{ trans('global.edit') }} {{ trans('cruds.category.top_cats') }}
     </div>
        <div class="col-lg-6 ">
        <a class="btn btn-primary card-button btn-xs" href="{{ route('admin.categories.index') }}">
            Back
        </a>
        </div>
        </div>
    </div>
        <div class="card-body trend-body">
            <form method="POST" action="{{ route("admin.categories.top-update") }}" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <div class="form-group">
                    <label for="cats">{{ trans('cruds.category.fields.name') }}</label>
                    <!--<div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>-->
                    <select class="form-control chosen-select {{ $errors->has('cats') ? 'is-invalid' : '' }}" name="cats[]" id="cats" multiple>
                        @foreach($topCats as $t)
                                <option value="{{ $t->id }}" selected>{{ $t->name }}</option>
                        @endforeach
                        @foreach($cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    <input type="hidden"  name="cats_hidden[]" class="hidden-class"  />
                    <div class="text-center" style="padding-top: 50px ">
                        <button class="btn btn-danger  chosen-toggle select btn-style ">{{ trans('global.select_all') }}</button>
                        <button class="btn btn-danger chosen-toggle deselect btn-style ">{{ trans('global.deselect_all') }}</button>
                         @if(Auth::guard('admin')->user()->can('trending_tag_update'))
                        <button class="btn btn-danger btn-style " type="submit">
                        {{ trans('global.save') }}
                    </button>
                        @endif
                    </div>
                    @if($errors->has('cats'))
                        <span class="text-danger">{{ $errors->first('cats') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.category.fields.cats_helper') }}</span>
                </div>
                <!--@if(Auth::guard('admin')->user()->can('top_category_update'))
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
                @endif-->
            </form>
        </div>
    </div>



@endsection
