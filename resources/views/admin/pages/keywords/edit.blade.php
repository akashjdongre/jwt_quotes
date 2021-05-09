@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.keyword.title_singular') }}
    </div>

    <div class="card-body cardboadyincenter">
        <form method="POST" action="{{ route("admin.keywords.update", [$keyword->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.keyword.fields.keyword') }}</label>
                <input class="form-control {{ $errors->has('keyword') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('keyword', $keyword->keyword) }}" required>
                @if($errors->has('keyword'))
                    <span class="text-danger">{{ $errors->first('keyword') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.keyword.fields.keyword_helper') }}</span>
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
