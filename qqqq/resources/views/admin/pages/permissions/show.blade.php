@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
   {{ trans('global.show') }} {{ trans('cruds.permission.title') }}
     </div>
        <div class="col-lg-6 ">
        <a class="btn btn-primary card-button btn-xs" href="{{ route('admin.permissions.index') }}">
            Back
        </a>
        </div>
        </div>
       </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.permission.fields.id') }}
                        </th>
                        <td>
                            {{ $permission->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.permission.fields.title') }}
                        </th>
                        <td>
                            {{ $permission->title }}
                        </td>
                    </tr>
                </tbody>
            </table>
        
        </div>
    </div>
</div>



@endsection
