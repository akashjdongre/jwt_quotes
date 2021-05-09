@extends('front.layouts.app')



@section('meta_title')
    <title>Popular Authors List | Quotes Lluvia</title>
@endsection

@section('meta_desc')
    <meta name="description" content="Browse the list of popular authors and their quotes at Quotes Lluvia."/> 
@endsection

@section('meta_keywords')
    <meta name="keywords" content="Popular Authors List, Authors List"/> 
@endsection

@section('og_title')
    <meta property="og:title" content="Popular Authors List | Quotes Lluvia" /> 
@endsection

@section('og_desc')
    <meta property="og:description" content="Browse the list of popular authors and their quotes at Quotes Lluvia." /> 
@endsection

@section('og_url')
    <meta property="og:url" content="{{Request::url()}}" />
@endsection

@section('tw_title')
    <meta name="twitter:title" content="Popular Authors List | Quotes Lluvia"> 
@endsection

@section('tw_desc')
    <meta name="twitter:description" content="Browse the list of popular authors and their quotes at Quotes Lluvia."> 
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
            <a class="text-gray">All Authors</a>
        </div>
        <div class="col-sm-12">
            <!--h1 class="pt-1 theme-h1">Popular Authors</h1-->
        </div>
        </div>
     </div>
 </section>
<section class="bg-img-sec">
    @if(isset($authors) && !$authors->isEmpty())
    <div class="container bg-first pt-5 pb-5">
                    @php $previous = null; $i=1; $count=count($authors); @endphp
                    @foreach($authors as $author)
                        @php
                            $firstLetter = substr(ucwords($author->name), 0, 1);
                        @endphp
                        @if($previous !== $firstLetter)
                            @if($i!=1) </div> </div> </div><br> @endif
                                <div class="n-sec-tag" id="trending-tag">
                                <h4 class="h2-style">"{{$firstLetter}}" Author</h4><br />
                                <div class="row">
                                    <div class="col-sm-12 n-style">
                        @endif
                        <a href="{{route('author',['url'=>$author->url])}}">{{ucwords($author->name)}} ({{App\Helpers\Helper::number_format_short(count($author->quotes))}})</a>

                            @if($count==$i) </div> </div> </div> @endif
                        @php
                            $previous = $firstLetter;
                            $i++;
                        @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
@endsection
