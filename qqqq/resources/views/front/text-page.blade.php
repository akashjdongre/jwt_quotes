@extends('front.layouts.app')


@if(isset($page) && $page=="AllText")

@section('meta_title')
    <title>Popular Text Quotes, Messages List | Quotes Lluvia</title>
@endsection

@section('meta_desc')
    <meta name="description" content="Browse the list of popular Text Quotes List at Quotes Lluvia and share them with your friends and family."/> 
@endsection

@section('meta_keywords')
    <meta name="keywords" content="Text Quotes, Text Quotes list"/> 
@endsection

@section('og_title')
    <meta property="og:title" content="Popular Text Quotes, Messages List | Quotes Lluvia" /> 
@endsection

@section('og_desc')
    <meta property="og:description" content="Browse the list of popular Text Quotes List at Quotes Lluvia and share them with your friends and family." /> 
@endsection

@section('og_url')
    <meta property="og:url" content="{{Request::url()}}" />
@endsection

@section('tw_title')
    <meta name="twitter:title" content="Popular Text Quotes, Messages List | Quotes Lluvia"> 
@endsection

@section('tw_desc')
    <meta name="twitter:description" content="Browse the list of popular Text Quotes List at Quotes Lluvia and share them with your friends and family."> 
@endsection


@endif



@if(isset($data) && !empty($data))
@if($data->meta_title)
@section('meta_title')
    <title>{{$data->meta_title}}</title>
@endsection
@endif
@if($data->meta_desc)
@section('meta_desc')
    <meta name="description" content="{{$data->meta_desc}}"/> 
@endsection
@endif
@if($data->meta_keywords)
@section('meta_keywords')
    <meta name="keywords" content="{{$data->meta_keywords}}"/> 
@endsection
@endif
@if($data->meta_author)
@section('meta_author')
    <meta name="author" content="{{$data->meta_author}}" /> 
@endsection
@endif
@if($data->meta_title)
@section('og_title')
    <meta property="og:title" content="{{$data->meta_title}}" /> 
@endsection
@endif
@if($data->meta_desc)
@section('og_desc')
    <meta property="og:description" content="{{$data->meta_desc}}" /> 
@endsection
@endif
@if($data->meta_image)
@section('og_image')
    <meta property="og:image" content="{{ !empty($data->meta_image) ? asset('storage/image/'.$data->meta_image) : ''  }}" /> 
@endsection
@endif
@section('og_url')
    <meta property="og:url" content="{{Request::url()}}" />
@endsection
@section('tw_card')
    <meta name="twitter:card" content="summary"> 
@endsection
@if($data->meta_title)
@section('tw_title')
    <meta name="twitter:title" content="{{$data->meta_title}}"> 
@endsection
@endif
@if($data->meta_desc)
@section('tw_desc')
    <meta name="twitter:description" content="{{$data->meta_desc}}"> 
@endsection
@endif
@if($data->meta_image)
@section('tw_img')
    <meta name="twitter:image" content="{{ !empty($data->meta_image) ? asset('storage/image/'.$data->meta_image) : ''  }}">
@endsection
@endif
@endif


@section('content')
    <div class="mt-90"></div>
    <!--------------modal ------------->

    <div class="container">
       <div class="sitemap">
           <a href="{{route('home')}}" class="text-theme"><b>Home</b></a>
           <a class="text-theme2"><b>&nbsp;&nbsp;⤏&nbsp;&nbsp;</b></a>
           <a class="text-gray">{{$title}}</a>
       </div>
       <h1 class="pt-1 pb-3 theme-h1"><span class="h2-style"></span>{{$title}}</h1>
        <div class="row">
            <div class="col-sm-8">
                {{-- search box text--}}
                 @include('front.searchbox-text')

                @if(isset($textQuotes) && !empty($textQuotes))
            
                <section class="container-fluid">
                    <div class="row">
                        <div class="">
                            <div id="tabsContent" class="tab-content">
                                <div id="trending-new1" class="append-by-ajax tab-pane fade active show">
                                    {!! $textQuotes !!}
                                </div>

                            </div>
                            <!------------------------->
                            @if($textCount > 19)
                                <div class="container pt-2 pb-4 forHide" >
                                    <input type="hidden" name="skip" value="{{$textCount}}" id="skipRows">
                                    <input type="hidden" name="ajaxUrl" value="{{$url}}" id="ajaxUrl">
                                    <input type="hidden" name="take" value="{{$take}}" id="takeRows">
                                    <button class="btn btn-primary btn-block viewMoreAjax"  >View More</button>
                                </div>
                            @endif

                            <!------------------------->
                        </div>
                    </div>
                </section>
                @endif

            </div>
            {{--include right sidebar--}}
            @include('front.right-sidebar')
        </div>
    </div>

    @include('front.trends-tag-section')
@endsection
