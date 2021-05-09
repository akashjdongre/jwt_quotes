@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
   {{ trans('global.show') }} {{ trans('cruds.quote.title') }}
     </div>
        <div class="col-lg-6 ">
        <a class="btn btn-primary card-button btn-xs" href="{{ route('admin.quotes.index') }}">
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
                            {{ trans('cruds.quote.fields.id') }}
                        </th>
                        <td>
                            {{ $quote->custom_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quote.fields.text') }}
                        </th>
                        <td>
                            <span style="display:inline-block; width:450px;">{{ $quote->text }}</span>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quote.fields.image') }}
                        </th>
                        <td>
                            @if(!empty($quote->image))
                                <img width="150" heigth="80" id="image_preview_container" src="{{ asset('storage/image/'.$quote->image) }}"
                                     alt="preview image" style="max-height: 80px;">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quote.fields.tags') }}
                        </th>
                        <td>
                            @foreach($quote->tags as $key => $tags)
                                <span class="label label-info">{{ $tags->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quote.fields.created_by') }}
                        </th>
                        <td>
                            {{ $quote->CreatedByAdmin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quote.fields.updated_by') }}
                        </th>
                        <td>
                            {{ $quote->UpdatedByAdmin ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quote.fields.is_approved') }}
                        </th>
                        <td>
                            {{ $quote->ApprovedStatus ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quote.fields.status') }}
                        </th>
                        <td>
                            {{ $quote->CurrentStatus ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quote.fields.author') }}
                        </th>
                        <td>
                            {{ $quote->AuthorName ?? '' }}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
