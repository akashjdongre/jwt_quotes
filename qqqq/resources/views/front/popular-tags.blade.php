@extends('front.layouts.app')


@section('meta_title')
    <title>Quotes Collections by Popular Topics (A to Z) | Quotes Lluvia</title>
@endsection

@section('meta_desc')
    <meta name="description" content="Browse Quotes by popular Topic at Quotes Lluvia. Our Popular quotes collections are organized alphabetically (A to Z) to help you find the perfect quote."/> 
@endsection

@section('meta_keywords')
    <meta name="keywords" content="Quotes by Popular Topics"/> 
@endsection

@section('og_title')
    <meta property="og:title" content="Quotes Collections by Popular Topics (A to Z) | Quotes Lluvia" /> 
@endsection

@section('og_desc')
    <meta property="og:description" content="Browse Quotes by popular Topic at Quotes Lluvia. Our Popular quotes collections are organized alphabetically (A to Z) to help you find the perfect quote." /> 
@endsection

@section('og_url')
    <meta property="og:url" content="{{Request::url()}}" />
@endsection

@section('tw_title')
    <meta name="twitter:title" content="Quotes Collections by Popular Topics (A to Z) | Quotes Lluvia"> 
@endsection

@section('tw_desc')
    <meta name="twitter:description" content="Browse Quotes by popular Topic at Quotes Lluvia. Our Popular quotes collections are organized alphabetically (A to Z) to help you find the perfect quote."> 
@endsection

@section('content')
<div class="mt-90"></div>
<!--------------modal ------------->
 <section>
     <div class="container">
        <div class="row">
            <div class="col-sm-12 sitemap">
            <a href="{{route('home')}}" class="text-theme"><b>Home</b></a>
            <a class="text-theme2"><b>&nbsp;&nbsp;⤏&nbsp;&nbsp;</b></a>
            <a class="text-gray">Popular Tags</a>
        </div>
        <div class="col-sm-12">
            <!--h1 class="pt-1 theme-h1">Popular Tag</h1-->
        </div>
        </div>
     </div>
 </section>

<section>
    @if(isset($tags) && !$tags->isEmpty())
    <div class="container bg-first pt-5 pb-5">
        @php $previous = null; $i=1; $count=count($tags); @endphp
        @foreach($tags as $tag)
                @php
                    $firstLetter = substr($tag->title, 0, 1);
                @endphp
                @if($previous != $firstLetter) {{--check leter change--}}
                 @if($i!=1) </div> </div> </div><br> @endif  {{--closing div for card id trending-tag--}}
                    <div class="n-sec-tag" id="trending-tag"> {{--card start--}}
                    <h4 class="h2-style">"{{$firstLetter}}" Popular</h4><br /> {{--card heading--}}
                        <div class="row"> {{--card row--}}
                            <div class="col-sm-12 n-style">
                @endif
                              <a href="{{route('tag',['url'=>$tag->url])}}">{{$tag->title}} ({{App\Helpers\Helper::number_format_short(count($tag->quotes))}})</a>

                @if($count==$i) </div> </div> </div> @endif {{--card close div while last tag appears--}}
                @php
                    $previous = $firstLetter; /*change previous with current*/
                    $i++;
                @endphp

        @endforeach
    </div>
    @endif
</section>
@endsection
