@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.change_password') }}
    </div>
    <div class="card-body cardboadyincenter">
        <form method="POST" action="{{ route("admin.password.update") }}">
            @csrf
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.sub_admin.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', Auth::guard('admin')->user()->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="password">New {{ trans('cruds.sub_admin.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label class="required" for="password_confirmation">Confirm New {{ trans('cruds.sub_admin.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password" name="password_confirmation" id="password_confirmation" required>
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
