@extends('front.layouts.app')

@section('content')
<div class="mt-90"></div>
<!--------------modal ------------->
 <section>
     <div class="container">
        <div class="row">
            <div class="col-sm-12 sitemap">
                <a href="{{route('home')}}" class="text-theme"><b>Home</b></a>
                <a class="text-theme2"><b>&nbsp;&nbsp;⤏&nbsp;&nbsp;</b></a>
                <a class="text-gray">{{$title}}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <h1 class="pt-1 theme-h1"><span class="h2-style">{{$title}}</h1>
            </div>
            <div class="col-sm-5">
{{--                include search form--}}
                @include('front.searchbox-image')
            </div>
        </div>
     </div>
 </section>
@if(isset($imageQuotes) && !empty($imageQuotes))
<section class="bg-img-sec mt-3 pt-5 pb-3">
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
{{--fetch trending tags--}}
@include('front.trends-tag-section')
{{--  fetch popular authors  --}}
@include('front.pop-author-section')
@endsection

