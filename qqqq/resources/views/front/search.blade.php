@php //dd($tags); die; @endphp
@extends('front.layouts.app')

@section('content')
<div class="mt-90"></div>
<!--------------modal ------------->
@if(isset($search) && $search==true)
<div class="container">
    <div class="sitemap">
        <a href="{{route('home')}}" class="text-theme"><b>Home</b></a>
        <a class="text-theme2"><b>&nbsp;&nbsp;⤏&nbsp;&nbsp;</b></a>
        <a class="text-gray">Search Result</a>
    </div>
    <h1 class="pt-1 pb-3 theme-h1"><span class="h2-style"></span>Keyword : {{$keyword}}</h1>
    @if(isset($textQuotes) && !empty($textQuotes))
    <div class="row">
        <div class="col-sm-8">
            <section class="container-fluid">
                <div class="row">
                    <div class="">
                        <!--h2 class="pb-5 text-left">Tabs</h2-->
                        <ul id="tabs" class="nav nav-tabs">
                            <li class="nav-item"><a href="" data-target="#latest1" data-toggle="tab" class="nav-link small text-uppercase active">Quotes</a></li>
                        </ul>
                        <br>
                        <div id="tabsContent" class="tab-content">
                            <div id="latest1" class="append-by-ajax tab-pane fade active show">
                                {!! $textQuotes !!}
                            </div>
                        </div>
                        <!------------------------->
                        @if($textCount > 6)
                            <div class="container pt-2 pb-4 forHide">
                                <input type="hidden" name="keyword" value="{{$keyword}}" id="keyword-search">
                                <input type="hidden" name="skip" value="{{$textCount}}" id="skipRows">
                                <input type="hidden" name="ajaxUrl" value="{{route('search-text-more')}}" id="ajaxUrl">
                                <input type="hidden" name="take" value="15" id="takeRows">
                                <button class="btn btn-primary btn-block viewMoreAjax">View More</button>
                            </div>
                         @endif

                    <!------------------------->
                    </div>
                </div>
            </section>
        </div>
    </div>
    @endif
</div>
@if(isset($relatedPictures) && !empty($relatedPictures))
    <section class="cont bg-img-sec pt-5 pb-3">
        <div class="container">
            <h2 class="h2-style">Related Picture</h2><br />
            <div class="row append-by-ajax1" id="n-img">
               {!! $relatedPictures !!}
            </div>
            @if($relatedPicturesCount > 5)
                <div class="row text-center pt-2 forHide">
                    <div class="n-img-button forHide">
                    <input type="hidden" name="keyword" value="{{$keyword}}" id="keyword-search">
                    <input type="hidden" name="skip" value="{{$relatedPicturesCount}}" id="skipRows">
                    <input type="hidden" name="ajaxUrl" value="{{route('search-image-more')}}" id="ajaxUrl">
                    <input type="hidden" name="take" value="9" id="takeRows">
                    <button class="btn btn-primary viewMoreAjax">View More</button>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endif

@if(isset($relatedCats) && !$relatedCats->isEmpty())
    <section class="cont pt-5 pb-3">
        <div class="container">
            <h2 class="h2-style">Related Categories</h2><br />
            <div id="trending-tag1">
                <div class="row">
                    @foreach($relatedCats as $key => $relatedCat)
                        @if(($key+1)==1 || ($key+1)==8 || ($key+1)==15 || ($key+1)==22 || ($key+1)==29 )
                            <div class="col-sm">
                                @endif
                                <a href="{{route('category',['url'=>$relatedCat->url])}}">★ {{ ucwords(strtolower($relatedCat->name ))}}</a>
                                @if(($key+1)==7 || ($key+1)==14 || ($key+1)==21 || ($key+1)==28 || $relatedCats->count()==($key+1))
                            </div>
                        @else
                            <br/>
                        @endif
                    @endforeach
                </div>
            </div>
            @if($relatedCats->count() > 34)
                <div class="row text-center pt-4">
                    <div class="n-img-button"> <a href="{{route('all-category')}}" class="btn btn-primary">View More</a></div>
                </div>
            @endif
        </div>
    </section>
@endif


@if(isset($relatedAuthors) && !$relatedAuthors->isEmpty())
    <section class="cont pt-5 pb-3">
        <div class="container">
            <h2 class="h2-style">Related Authors</h2><br />
            <div id="trending-tag1">
                <div class="row">
                    @foreach($relatedAuthors as $key => $relatedAuthor)
                        @if(($key+1)==1 || ($key+1)==8 || ($key+1)==15 || ($key+1)==22 || ($key+1)==29 )
                            <div class="col-sm">
                                @endif
                                <a href="{{route('author',['url'=>$relatedAuthor->url])}}">★ {{ ucwords(strtolower($relatedAuthor->name ))}} ({{App\Helpers\Helper::number_format_short(count($relatedAuthor->quotes))}})</a>
                                @if(($key+1)==7 || ($key+1)==14 || ($key+1)==21 || ($key+1)==28 || $relatedAuthors->count()==($key+1))
                            </div>
                        @else
                            <br/>
                        @endif
                    @endforeach
                </div>
            </div>
            @if($relatedAuthors->count() > 34)
                <div class="row text-center pt-4">
                    <div class="n-img-button"> <a href="{{route('all-author')}}" class="btn btn-primary">View More</a></div>
                </div>
            @endif
        </div>
    </section>
@endif

@else{{--end of search result--- ------------------------------------------------------------------------}}


@if(isset($searchNotFound) && $searchNotFound==true)
<div class="container">
    <div class="row">
        <div class="col-sm-6 sitemap">
            <a href="{{route('home')}}" class="text-theme"><b>Home</b></a>
            <a class="text-theme2"><b>&nbsp;&nbsp;⤏&nbsp;&nbsp;</b></a>
            <a href="javascript:void(0)" class="text-theme2">Search Not Found</a>
            <a class="text-theme2"><b>&nbsp;&nbsp;⤏&nbsp;&nbsp;</b></a>
            <a class="text-gray">{{$keyword}}</a>
        </div>
    </div>
</div>
@endif

@if(isset($setting->search_default_image) && !empty($setting->search_default_image))
    <section class="bg-img-sec pb-3">
        <div class="container-fluid">
                <div class="row no-gutters" id="n-img">
                    <div class="col-sm-12">
                        <div class="img-shadow2">
                            <img src="{{ asset('storage/setting/'.$setting->search_default_image)}}" class="img-fluid" alt="Search Not Found Image"/>
                        </div>
                    </div>
                </div>

        </div>
    </section>
@endif

@if(isset($trendImageQuotes) && !empty($trendImageQuotes))
    <section class="cont bg-img-sec pt-5 pb-3">
        <div class="container">
            <h2 class="h2-style">Trending Picture</h2><br />
            <div class="row" id="n-img">
                {!! $trendImageQuotes !!}
            </div>
            @if($trendImageCount > 5)
                <div class="row text-center pt-2">
                    <div class="n-img-button"> <a href="{{route('trend-images')}}" class="btn btn-primary">View More</a></div>
                </div>
            @endif
        </div>
    </section>
@endif

@if(isset($trendTags) && !$trendTags->isEmpty())
    <section class="cont pt-5 pb-3">
        <div class="container">
            <h2 class="h2-style">Trending Tags</h2><br />
            <div id="trending-tag1">
                <div class="row">
                    @foreach($trendTags as $key => $trendTag)
                        @if(($key+1)==1 || ($key+1)==8 || ($key+1)==15 || ($key+1)==22 || ($key+1)==29 )
                            <div class="col-sm">
                                @endif
                                <a href="{{route('tag',['url'=>$trendTag->url])}}">★ {{ ucwords(strtolower($trendTag->title )) }} ({{App\Helpers\Helper::number_format_short(count($trendTag->quotes))}})</a>
                                @if(($key+1)==7 || ($key+1)==14 || ($key+1)==21 || ($key+1)==28 || $trendTags->count()==($key+1))
                            </div>
                        @else
                            <br/>
                        @endif
                    @endforeach
                </div>
            </div>
            @if($trendTags->count() > 34)
                <div class="row text-center pt-4">
                    <div class="n-img-button"> <a href="{{route('trend-tag')}}" class="btn btn-primary">View More</a></div>
                </div>
            @endif
        </div>
    </section>
@endif

@if(isset($popularTags) && !empty($popularTags))
    <section>
        <div class="container bg-first pt-5 pb-5">
            <div class="n-sec-tag" id="trending-tag">
                <h4 class="h2-style">Popular Tags</h4><br />
                <div class="row">
                    @foreach($popularTags as $key => $popularTag)
                        @if(($key+1)==1 || ($key+1)%15==1)
                            <div class="col-sm">
                                @endif
                                <a href="{{route('tag',['url'=>$popularTag->url])}}">{{ ucwords(strtolower($popularTag->title ))}} ({{App\Helpers\Helper::number_format_short(count($popularTag->quotes))}})</a>
                                @if(($key+1)==$popularTags->count() || ($key+1)%15==0)
                            </div>
                        @else
                            <br />
                        @endif
                    @endforeach
                </div>

                @if($popularTags->count()>89)
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <!--button class="btn btn-primary">View More</button-->
                            <p style="font-weight:bold; font-size:12px; text-align: right;"><a id="view-more-btn" href="{{route('popular-tag')}}">View More... &nbsp;&nbsp;&nbsp;</a></p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif
@if(isset($popularAuthors) && !empty($popularAuthors))
    <section class="bg-img-sec">
        <div class="container bg-first pt-5 pb-5">
            <div class="n-sec-tag" id="trending-tag">
                <h4 class="h2-style">Popular Authors</h4><br />
                <div class="row">
                    @foreach($popularAuthors as $key => $popularAuthor)
                        @if(($key+1)==1 || ($key+1)%15==1)
                            <div class="col-sm">
                                @endif
                                <a href="{{route('author',['url'=>$popularAuthor->url])}}">{{ ucwords(strtolower($popularAuthor->name )) }} ({{App\Helpers\Helper::number_format_short(count($popularAuthor->quotes))}})</a>
                                @if(($key+1)==$popularAuthors->count() || ($key+1)%15==0)
                            </div>
                        @else
                            <br />
                        @endif
                    @endforeach
                </div>

                @if($popularAuthors->count()>89)
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <!--button class="btn btn-primary">View More</button-->
                            <p style="font-weight:bold; font-size:12px; text-align: right;"><a id="view-more-btn" href="{{route('popular-author')}}">View More... &nbsp;&nbsp;&nbsp;</a></p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endif

@endif
{{--    end of search not found--}}
@endsection
