@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sub_admin.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.sub_admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sub_admin.fields.id') }}
                        </th>
                        <td>
                           {{ $sub_admin->custom_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sub_admin.fields.name') }}
                        </th>
                        <td>
                            {{ $sub_admin->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sub_admin.fields.email') }}
                        </th>
                        <td>
                            {{ $sub_admin->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sub_admin.fields.roles') }}
                        </th>
                        <td>
                            @foreach($roles as $id => $role)
                                @if($sub_admin->roles[0]->id==$id) {{ $role }} @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sub_admin.fields.status') }}
                        </th>
                        <td>
                            <span class="badge {{$sub_admin->status==1 ? 'badge-success' : 'badge-warning'}}">{{ $sub_admin->CurrentStatus ?? '' }}</span>
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.sub_admins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
