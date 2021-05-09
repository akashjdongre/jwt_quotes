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
                <a class="text-gray">Trending Tags</a>
            </div>
        </div>
    </div>
</section>

<section>
    @if(isset($tags) && !$tags->isEmpty())
    <div class="container bg-first pt-5 pb-5">
        <div class="n-sec-tag" id="trending-tag">
            <h4 class="h2-style">Trending Tags</h4><br />
            <div class="row">
                <div class="col-sm-12 n-style">
                    @foreach($tags as $tag)
                        <a href="{{route('tag',['url'=>$tag->url])}}">{{$tag->title}} ({{App\Helpers\Helper::number_format_short(count($tag->quotes))}})</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection
