@php //dd($tag->quotes->tags); die; @endphp
@extends('front.layouts.app')


@if(isset($author) && !empty($author))
@if($author->meta_title)
@section('meta_title')
    <title>{{$author->meta_title}}</title>
@endsection
@endif
@if($author->meta_desc)
@section('meta_desc')
    <meta name="description" content="{{$author->meta_desc}}"/> 
@endsection
@endif
@if($author->meta_keywords)
@section('meta_keywords')
    <meta name="keywords" content="{{$author->meta_keywords}}"/> 
@endsection
@endif
@if($author->meta_author)
@section('meta_author')
    <meta name="author" content="{{$author->meta_author}}" /> 
@endsection
@endif
@if($author->meta_title)
@section('og_title')
    <meta property="og:title" content="{{$author->meta_title}}" /> 
@endsection
@endif
@if($author->meta_desc)
@section('og_desc')
    <meta property="og:description" content="{{$author->meta_desc}}" /> 
@endsection
@endif
@if($author->meta_image)
@section('og_image')
    <meta property="og:image" content="{{ !empty($author->meta_image) ? asset('storage/authors/'.$author->meta_image) : ''  }}" /> 
@endsection
@endif
@section('og_url')
    <meta property="og:url" content="{{Request::url()}}" />
@endsection
@section('tw_card')
    <meta name="twitter:card" content="summary"> 
@endsection
@if($author->meta_title)
@section('tw_title')
    <meta name="twitter:title" content="{{$author->meta_title}}"> 
@endsection
@endif
@if($author->meta_desc)
@section('tw_desc')
    <meta name="twitter:description" content="{{$author->meta_desc}}"> 
@endsection
@endif
@if($author->meta_image)
@section('tw_img')
    <meta name="twitter:image" content="{{ !empty($author->meta_image) ? asset('storage/authors/'.$author->meta_image) : ''  }}">
@endsection
@endif
@endif



@section('content')
<div class="mt-90"></div>
<!--------------modal ------------->
@if(isset($author) && !empty($author))
<div class="container">
    <div class="sitemap">
        <a href="{{route('home')}}" class="text-theme"><b>Home</b></a>
        <a class="text-theme2"><b>&nbsp;&nbsp;⤏&nbsp;&nbsp;</b></a>
        <a class="text-gray">{{ ucwords(strtolower($author->name))}}</a>
    </div>
    <h1 class="pt-1 pb-3 theme-h1"><span class="h2-style"></span>{{$author->name}}</h1>
    <div class="row">
    @if(isset($author->image) && !empty($author->image) && isset($author->about) && !empty($author->about))
    <div class="container bg-first mb-4">
        <div class="p-sec1 author-image-sec">
            <div class="row pad-cls">
                <div class="col-sm-2 img-center-cls">
                    <img class="img-fluid" src="{{ isset($author->image) ? asset('storage/authors/'.$author->image) : asset('image/author-avatar.png') }}" alt="authors" />
                </div>
                <div class="col-sm-10 text-dark">
                    <div class="row">
                            <div class="col-sm-12 quoteText justify-cls short">
                                <h4 class="text-left">About</h4>
                                @if(isset($author->about) && !empty($author->about)) 
                                <div class="about-few-data">
                                <p>{!! $author->about !!}</p>  
                                </div>
                                <div class="more-link">
                                <a href="javascript:void(0)" class="read-more-link less link-more">Read More</a>
                                </div>
                                @endif
                            </div>
                            <!--<div class="col-sm-12 quoteText justify-cls full" style="display:none;">
                                <h4 class="text-left">About</h4>
                                @if(isset($author->about) && !empty($author->about)) 
                                <p>{!!$author->about!!}</p>
                                <a href="javascript:void(0)" class="less-more-link link-more">Less</a>  
                                @endif
                            </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


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
                                <a href="{{route('author-text-more',['url'=>$author->url])}}"><button class="btn btn-primary btn-block">View More</button></a>
                            </div>
                         @endif

                    <!------------------------->
                    </div>
                </div>
            </section>
            @endif

        </div>
        {{--        include right sidebar--}}
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
                    <div class="n-img-button"> <a href="{{route('author-image-more',['url'=>$author->url])}}" class="btn btn-primary">View More</a></div>
                </div>
            @endif
        </div>
    </section>
@endif
{{--    include other authors section--}}
@include('front.other-authors-section')

{{--<section class="cont bg-img-sec pt-5 pb-3">--}}
{{--    include trending tags--}}
{{--    @include('front.trending-tag-section')--}}
{{--</section>--}}

@endsection
