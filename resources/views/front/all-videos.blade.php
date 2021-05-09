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
                <a class="text-gray">All Videos</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7">
                <h1 class="pt-1 theme-h1"><span class="h2-style">All Videos</span></h1>
            </div>
            <div class="col-sm-5">
{{--                include search form--}}
                @include('front.searchbox-image')
            </div>
        </div>
     </div>
 </section>
@if(isset($videoQuotes) && !empty($videoQuotes))
    {!! $videoQuotes !!}

    <div class="n-img-button text-center pt-2"> <a href="javascript:void(0)" class="btn btn-primary">View More</a></div>
           
@endif
{{--fetch trending tags--}}
@include('front.trends-tag-section')
{{--  fetch popular authors  --}}
@include('front.pop-author-section')
@endsection

