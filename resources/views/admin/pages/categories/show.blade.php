@extends('admin.layouts.app')
@section('content')

<div class="card">
<div class="card-header">
        <div class="row">
        <div class="col-lg-6">
   {{ trans('global.show') }} {{ trans('cruds.category.title') }}
     </div>
        <div class="col-lg-6 ">
        <a class="btn btn-primary card-button btn-xs" href="{{ route('admin.categories.index') }}">
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
                            {{ trans('cruds.category.fields.id') }}
                        </th>
                        <td>
                            {{ $category->custom_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.name') }}
                        </th>
                        <td>
                            {{ $category->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.meta_title') }}
                        </th>
                        <td>
                            {{ $category->meta_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.meta_author') }}
                        </th>
                        <td>
                            {{ $category->meta_author }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.meta_desc') }}
                        </th>
                        <td>
                            {{ $category->meta_desc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.meta_keywords') }}
                        </th>
                        <td>
                            {{ $category->meta_keywords }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.url') }}
                        </th>
                        <td>
                            {{ $category->url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.description') }}
                        </th>
                        <td>
                            {{ strip_tags($category->description)}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.tags') }}
                        </th>
                        <td>
                            @foreach($category->tags as $key => $tags)
                                <span class="label label-info">{{ $tags->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.location') }}
                        </th>
                        <td>
                            @php switch ($category->location) {
                                    case 1:
                                        echo '<span class="badge badge-success">On Head</span>';
                                        break;
                                    case 2:
                                        echo '<span class="badge badge-success">On Foot</span>';
                                        break;
                                    default:
                                        break;
                                } @endphp
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.created_by') }}
                        </th>
                        <td>
                            {{ $category->CreatedByAdmin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $category->UpdatedByAdmin ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.status') }}
                        </th>
                        <td>
                            {{ $category->CurrentStatus ?? '' }}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
