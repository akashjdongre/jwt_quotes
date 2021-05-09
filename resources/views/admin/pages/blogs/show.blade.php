@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
   {{ trans('global.show') }} {{ trans('cruds.blog.title') }}
     </div>
        <div class="col-lg-6 ">
        <a class="btn btn-primary card-button btn-xs" href="{{ route('admin.blogs.index') }}">
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
                            {{ trans('cruds.blog.fields.id') }}
                        </th>
                        <td>
                            {{ $blog->custom_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blog.fields.text') }}
                        </th>
                        <td>
                            <span style="display:inline-block; width:450px;">{{ $blog->text }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blog.fields.image') }}
                        </th>
                        <td>
                            @if(!empty($blog->image))
                                <img width="150" heigth="80" id="image_preview_container" src="{{ asset('storage/blogs/'.$blog->image) }}"
                                     alt="preview image" style="max-height: 80px;">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blog.fields.created_by') }}
                        </th>
                        <td>
                            {{ $blog->CreatedByAdmin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blog.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $blog->UpdatedByAdmin ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blog.fields.status') }}
                        </th>
                        <td>
                            {{ $blog->CurrentStatus ?? '' }}
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
