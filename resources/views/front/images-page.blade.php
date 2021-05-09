@extends('front.layouts.app')


@if(isset($page) && $page=="AllImage")

@section('meta_title')
    <title>Picture Quotes, Message, Quotes with Images, Quotes Gallery | Quotes Lluvia</title>
@endsection

@section('meta_desc')
    <meta name="description" content="Browse a wide range of  Image Quotes on Motivation, Life, Success, about life, inspiration, and more quotes with Images and share with friends and family."/> 
@endsection

@section('meta_keywords')
    <meta name="keywords" content="Picture Quotes,  Picture messages, Quotes with Images, Image Quotes Gallery"/> 
@endsection

@section('og_title')
    <meta property="og:title" content="Picture Quotes, Message, Quotes with Images, Quotes Gallery | Quotes Lluvia" /> 
@endsection

@section('og_desc')
    <meta property="og:description" content="Browse a wide range of  Image Quotes on Motivation, Life, Success, about life, inspiration, and more quotes with Images and share with friends and family." /> 
@endsection

@section('og_url')
    <meta property="og:url" content="{{Request::url()}}" />
@endsection

@section('tw_title')
    <meta name="twitter:title" content="Picture Quotes, Message, Quotes with Images, Quotes Gallery | Quotes Lluvia"> 
@endsection

@section('tw_desc')
    <meta name="twitter:description" content="Browse a wide range of  Image Quotes on Motivation, Life, Success, about life, inspiration, and more quotes with Images and share with friends and family."> 
@endsection


@endif


@if(isset($data) && !empty($data))
@if($data->picture_meta_title)
@section('meta_title')
    <title>{{$data->picture_meta_title}}</title>
@endsection
@endif
@if($data->picture_meta_desc)
@section('meta_desc')
    <meta name="description" content="{{$data->picture_meta_desc}}"/> 
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
@if($data->picture_meta_title)
@section('og_title')
    <meta property="og:title" content="{{$data->picture_meta_title}}" /> 
@endsection
@endif
@if($data->picture_meta_desc)
@section('og_desc')
    <meta property="og:description" content="{{$data->picture_meta_desc}}" /> 
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
@if($data->picture_meta_title)
@section('tw_title')
    <meta name="twitter:title" content="{{$data->picture_meta_title}}"> 
@endsection
@endif
@if($data->picture_meta_desc)
@section('tw_desc')
    <meta name="twitter:description" content="{{$data->picture_meta_desc}}"> 
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

<section>
     <div class="container">
        <div class="row">
            <div class="col-sm-7 sitemap">
                <a href="{{route('home')}}" class="text-theme"><b>Home</b></a>
                <a class="text-theme2"><b>&nbsp;&nbsp;⤏&nbsp;&nbsp;</b></a>
                <a class="text-gray">{{$title}}</a>
            </div>
            <div class="col-sm-5 more-image-search">
{{--                include search form--}}
                @include('front.searchbox-image')
            </div>
        </div>
     </div>
 </section>

 


@if(isset($headCategories) && !$headCategories->isEmpty())
    <section class="head-cont">
        <div class="container">
            <div class="row cat-page-sub">
            <h4 class="h2-style">Picture Categories</h4>
    <!--<div class="n-img-button" style="margin-right: 30px;
"> <a href="{{route('all-category')}}" class="explore-button">Explore More</a></div>-->
            </div><br />
            <div id="trending-tag1">
            <div class="row ">
                @foreach($headCategories as $head)
                <div class="col-sm-6 col-lg-3 category-mid-size">
                    <a href="{{route('category-image-more',['url'=>$head->url])}}">★ {{ ucwords(strtolower($head->name))}}</a><br/>
                </div>
                @endforeach
            </div>
            @if($headCategories->count() >25)
                <div class="row text-center pt-4">
                    <div class="n-img-button"> <a href="#" class="btn btn-primary">View More</a></div>
                </div>
            @endif
            </div>
        </div>
    </section>
@endif

<section class="more-image-heading">
     <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pt-1 theme-h1"><span class="h2-style">{{$title}}</h1>
            </div>
        </div>
     </div>
 </section>
 
@if(isset($imageQuotes) && !empty($imageQuotes))
<section class="bg-img-sec pb-3">
    <div class="container">
        <div class="row append-by-ajax" id="n-img">
            {!! $imageQuotes !!}
        </div>

        @if($imageCount > 8)
            <div class="row text-center pt-2 forHide">
                <div class="n-img-button forHide">
                <input type="hidden" name="skip" value="{{$imageCount}}" id="skipRows">
                <input type="hidden" name="ajaxUrl" value="{{$url}}" id="ajaxUrl">
                <input type="hidden" name="take" value="{{$take}}" id="takeRows">
                 <button class="btn btn-primary viewMoreAjax">View More</button>
                </div>
            </div>
        @endif
    </div>
</section>
@endif
@if(isset($setting->cat_show) && $setting->cat_show==true )
@if(isset($topCats) && !$topCats->isEmpty())
    <section class="cont">
        <div class="container">
            <div class="row cat-page-sub">
            <h4 class="h2-style">More Categories</h4>
    <div class="n-img-button" style="margin-right: 30px;
"> <a href="{{route('all-category')}}" class="explore-button">Explore More</a></div>
            </div><br />
            <div id="trending-tag1">
            <div class="row ">
                @foreach($topCats as $key => $topCat)
                    <div class="col-sm-6 col-lg-3 category-mid-size">  
                        <a href="{{route('category-image-more',['url'=>$topCat->url])}}">★ {{ ucwords(strtolower($topCat->name )) }}{{-- ({{App\Helpers\Helper::number_format_short(count($topCat->quotes))}})--}}</a>
                    </div>
                @endforeach
            </div>
            @if($topCats->count() > 24)
                <div class="row text-center pt-4">
                    <div class="n-img-button"> <a href="#" class="btn btn-primary">View More</a></div>
                </div>
            @endif
            </div>
        </div>
    </section>
@endif
@endif
{{--  fetch popular authors  --}}
@include('front.pop-author-section')
@endsection

