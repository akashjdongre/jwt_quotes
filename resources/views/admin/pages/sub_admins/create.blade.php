@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
    {{ trans('global.create') }} {{ trans('cruds.sub_admin.title_singular') }}
     </div>
        <div class="col-lg-6 ">
        <a class="btn btn-primary card-button btn-xs" href="{{ route('admin.sub_admins.index') }}">
            Back
        </a>
        </div>
        </div>
       </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sub_admins.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.sub_admin.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sub_admin.fields.name_helper') }}</span>
            </div>
                <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.sub_admin.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', '') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sub_admin.fields.email_helper') }}</span>
                </div>
                <div class="form-group pswd-input">
                <label class="required" for="password">{{ trans('cruds.sub_admin.fields.password') }}</label>
                <input class="form-control password {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password"  required>
                <i class="fa fa-eye eye-cls toggle-password" aria-hidden="true"></i>
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sub_admin.fields.password_helper') }}</span>
            </div>
                </div>
               
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="form-group pswd-input">
                <label class="required" for="co_password">{{ trans('cruds.sub_admin.fields.co_password') }}</label>
                <input class="form-control password {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password" name="password_confirmation" id="password-confirm"  required>
                <i class="fa fa-eye eye-cls toggle-password" aria-hidden="true"></i>
                @if($errors->has('password_confirmation'))
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sub_admin.fields.co_password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.sub_admin.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $roles)
                        @if($id!=1)
                            <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
                        @endif
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.sub_admin.fields.roles_helper') }}</span>
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

