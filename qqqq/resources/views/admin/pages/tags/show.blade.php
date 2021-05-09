@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
   {{ trans('global.show') }} {{ trans('cruds.tag.title') }}
     </div>
        <div class="col-lg-6 ">
        <a class="btn btn-primary card-button btn-xs" href="{{ route('admin.tags.index') }}">
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
                            {{ trans('cruds.tag.fields.id') }}
                        </th>
                        <td>
                            {{ $tag->custom_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tag.fields.title') }}
                        </th>
                        <td>
                            {{ $tag->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tag.fields.created_by') }}
                        </th>
                        <td>
                            {{ $tag->CreatedByAdmin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tag.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $tag->UpdatedByAdmin ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.tag.fields.status') }}
                        </th>
                        <td>
                            {{ $tag->CurrentStatus ?? '' }}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
