@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.client.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.clients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.id') }}
                        </th>
                        <td>
                          {{ $client->custom_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.profile_image') }}
                        </th>
                        <td>
                            <img id="image_preview_container" class="showauthors" src="{{ (!empty($client_profile->profile_image)) ? asset('storage/profile/'.$client_profile->profile_image) : asset('image/author-avatar.png')}}"
                                 alt="preview image">
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.name') }}
                        </th>
                        <td>
                            {{ $client->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.email') }}
                        </th>
                        <td>
                            {{ $client->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.about') }}
                        </th>
                        <td>
                            {{ strip_tags($client_profile->about)}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.website_link') }}
                        </th>
                        <td>
                            {{ $client_profile->website_link}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.facebook_link') }}
                        </th>
                        <td>
                            {{ $client_profile->facebook_link}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.twitter_link') }}
                        </th>
                        <td>
                            {{ $client_profile->twitter_link}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.instagram_link') }}
                        </th>
                        <td>
                            {{ $client_profile->instagram_link}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.linkedin_link') }}
                        </th>
                        <td>
                            {{ $client_profile->linkedin_link}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.client.fields.status') }}
                        </th>
                        <td>
                            <span class="badge {{$client->status==1 ? 'badge-success' : 'badge-warning'}}">{{ $client->CurrentStatus ?? '' }}</span>
                        </td>
                    </tr>


                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-primary" href="{{ route('admin.clients.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
