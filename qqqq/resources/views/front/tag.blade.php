@php //dd($quotes->count()); die; @endphp
@extends('front.layouts.app')


@if(isset($tag) && !empty($tag))
@if($tag->meta_title)
@section('meta_title')
    <title>{{$tag->meta_title}}</title>
@endsection
@endif
@if($tag->meta_desc)
@section('meta_desc')
    <meta name="description" content="{{$tag->meta_desc}}"/> 
@endsection
@endif
@if($tag->meta_keywords)
@section('meta_keywords')
    <meta name="keywords" content="{{$tag->meta_keywords}}"/> 
@endsection
@endif
@if($tag->meta_author)
@section('meta_author')
    <meta name="author" content="{{$tag->meta_author}}" /> 
@endsection
@endif
@if($tag->meta_title)
@section('og_title')
    <meta property="og:title" content="{{$tag->meta_title}}" /> 
@endsection
@endif
@if($tag->meta_desc)
@section('og_desc')
    <meta property="og:description" content="{{$tag->meta_desc}}" /> 
@endsection
@endif
@if($tag->meta_image)
@section('og_image')
    <meta property="og:image" content="{{ !empty($tag->meta_image) ? asset('storage/image/'.$tag->meta_image) : ''  }}" /> 
@endsection
@endif
@section('og_url')
    <meta property="og:url" content="{{Request::url()}}" />
@endsection
@section('tw_card')
    <meta name="twitter:card" content="summary"> 
@endsection
@if($tag->meta_title)
@section('tw_title')
    <meta name="twitter:title" content="{{$tag->meta_title}}"> 
@endsection
@endif
@if($tag->meta_desc)
@section('tw_desc')
    <meta name="twitter:description" content="{{$tag->meta_desc}}"> 
@endsection
@endif
@if($tag->meta_image)
@section('tw_img')
    <meta name="twitter:image" content="{{ !empty($tag->meta_image) ? asset('storage/image/'.$tag->meta_image) : ''  }}">
@endsection
@endif
@endif


@section('content')
<div class="mt-90"></div>
<!--------------modal ------------->
@if(isset($tag) && !empty($tag))
<div class="container">
    <div class="sitemap">
        <a href="{{route('home')}}" class="text-theme"><b>Home</b></a>
        <a class="text-theme2"><b>&nbsp;&nbsp;⤏&nbsp;&nbsp;</b></a>
        <a class="text-gray">{{ ucwords(strtolower($tag->title))}}</a>
    </div>
    <h1 class="pt-1 pb-3 theme-h1"><span class="h2-style"></span>{{$tag->title}}</h1>
    <div class="row">
        <div class="col-sm-8">
            @if(isset($textQuotes) && !empty($textQuotes))
            <section class="container-fluid">
                <div class="row">
                    <div class="">
                        <!--h2 class="pb-5 text-left">Tabs</h2-->
                        <ul id="tabs" class="nav nav-tabs">
                            <li class="nav-item"><a href="" data-target="#latest1" data-toggle="tab" class="nav-link small text-uppercase active">Quotes</a></li>
                        </ul>
                        <br>

                        <div id="tabsContent" class="tab-content">
                            <div id="latest1" class="tab-pane fade active show">
                                    {!! $textQuotes !!}
                            </div>
                        </div>
                        <!------------------------->
                        @if($textCount > 6)
                            <div class="container pt-2 pb-4">
                                <a href="{{route('tag-text-more',['url'=>$tag->url])}}"><button class="btn btn-primary btn-block">View More</button></a>
                            </div>
                        @endif

                        <!------------------------->

                    </div>
                </div>
            </section>
            @endif
        </div>

{{--        include right side bar--}}
        @include('front.right-sidebar')
    </div>
</div>
@endif
@if(isset($relatedPictures) && !empty($relatedPictures))
    <section class="cont bg-img-sec pt-5 pb-3">
        <div class="container">
            <h2 class="h2-style">Related Picture</h2><br />
            <div class="row" id="n-img">
                {!! $relatedPictures !!}
            </div>
            @if($relatedPicturesCount > 5)
                <div class="row text-center pt-2">
                    <div class="n-img-button"> <a href="{{route('tag-image-more',['url'=>$tag->url])}}" class="btn btn-primary">View More</a></div>
                </div>
            @endif
        </div>
    </section>
@endif
@if(isset($relatedTags) && !$relatedTags->isEmpty())
<section class="cont bg-img-sec pt-5 pb-3">
    <div class="container">
        <h2 class="h2-style">Related Tag</h2><br />
        <div class="row">
            @php $i=1;$j=0; @endphp
            @foreach($relatedTags as $relatedTag)
                @if($i==1 || $i==$j*7+1)
                    <div class="col-sm">
                        @endif
                        <a href="{{route('tag',['url'=>$relatedTag->url])}}">★ {{ ucwords(strtolower($relatedTag->title))}} ({{App\Helpers\Helper::number_format_short(count($relatedTag->quotes))}})</a><br/>
                        @if($i==$relatedTags->count() || $i%7==0)
                            @php $j++; @endphp
                    </div>
                @endif
                @php $i++; @endphp
            @endforeach
        </div>
        @if($relatedTags->count() > 34)
            <div class="row text-center pt-2">
                <div class="n-img-button pt-2 pb-2"> <button class="btn btn-primary">View More</button></div>
            </div>
        @endif
    </div>
</section>
@endif
@endsection
