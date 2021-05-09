@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
   {{ trans('global.show') }} {{ trans('cruds.author.title') }}
     </div>
        <div class="col-lg-6 ">
        <a class="btn btn-primary card-button btn-xs" href="{{ route('admin.authors.index') }}">
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
                            {{ trans('cruds.author.fields.id') }}
                        </th>
                        <td>
                            {{ $author->custom_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.author.fields.image') }}
                        </th>
                        <td>
                                <img id="image_preview_container" class="showauthors" src="{{ (!empty($author->image)) ? asset('storage/authors/'.$author->image) : asset('image/author-avatar.png')}}"
                                     alt="preview image">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.author.fields.name') }}
                        </th>
                        <td>
                            {{ $author->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.author.fields.meta_title') }}
                        </th>
                        <td>
                            {{ $author->meta_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.author.fields.meta_author') }}
                        </th>
                        <td>
                            {{ $author->meta_author }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.author.fields.meta_desc') }}
                        </th>
                        <td>
                            {{ $author->meta_desc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.author.fields.meta_keywords') }}
                        </th>
                        <td>
                            {{ $author->meta_keywords }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.author.fields.url') }}
                        </th>
                        <td>
                            {{ $author->url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.author.fields.about') }}
                        </th>
                        <td>
                            {{ strip_tags($author->about)}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.author.fields.created_by') }}
                        </th>
                        <td>
                            {{ $author->CreatedByAdmin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.author.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $author->UpdatedByAdmin ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.author.fields.status') }}
                        </th>
                        <td>
                            {{ $author->CurrentStatus ?? '' }}
                        </td>
                    </tr>

                </tbody>
            </table>
            <!--<div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.authors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>--->
        </div>
    </div>
</div>



@endsection
