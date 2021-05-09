
@extends('front.layouts.app')

@section('search')
<!--<div class="container-fluid" id="search-banner">
    <div class="main">
        <div class="form-group has-search">
            <input type="text" class="form-control" placeholder="Search">
            <span class="fa fa-search form-control-feedback" id="span"></span>
        </div>
    </div>
</div>-->
@endsection

@section('content')
@include('front.category-section')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <section class="container-fluid">
                <div class="row">
                    <div class="">
                        <!--h2 class="pb-5 text-left">Tabs</h2-->
                        <ul id="tabs" class="nav nav-tabs">
                            <li class="nav-item"><a href="" data-target="#home1" data-toggle="tab" class="nav-link small text-uppercase active">Latest</a></li>
                            <li class="nav-item"><a href="" data-target="#profile1" data-toggle="tab" class="nav-link small text-uppercase">Trending</a></li>

                        </ul>
                        <br>
                     
                        <div id="tabsContent" class="tab-content">
                            
                @if(isset($latestTextQuotes) && !empty($latestTextQuotes) )
                            
            <div id="home1" class="tab-pane fade active show ">
                  
                                {!! $latestTextQuotes  !!}
                        <!------------------------->
                            @if($latestTextCount > 6)
                                <div class="container pt-2 pb-4">
                                    <a href="{{route('latest-text')}}"><button class="btn btn-primary btn-block">View More</button></a>
                                </div>
                            @endif

                            <!------------------------->
                
                    </div>
                            
                            
                @endif

                            @if(isset($trendingTextQuotes) && !empty($trendingTextQuotes) )
                            <div id="profile1" class="tab-pane fade">
                                {!! $trendingTextQuotes  !!}
                                <!------------------------->
                                    @if($trendingTextCount > 6)
                                
                                        <div class="container pt-2 pb-4">
                                            <a href="{{route('trend-text')}}"><button class="btn btn-primary btn-block">View More</button></a>
                                        </div>
                                    @endif

                                    <!------------------------->
                            </div>
                            @endif

                        </div>
                         
                    </div>
                </div>
            </section>

        </div>

{{--        include right sidebar--}}
        @include('front.right-sidebar')

    </div>
</div>
</div>
@if(isset($setting->cat_show) && $setting->cat_show==true )
@if(isset($topCats) && !$topCats->isEmpty())
    <section class="cont pt-5 pb-3">
        <div class="container">
            <div class="row home-page-margin">
            <h2 class="h2-style">More Categories</h2>
            <div class="n-img-button" style="margin-right: 30px;"> 
                <a href="{{route('all-category')}}" class="explore-button">Explore More</a></div>
            </div><br />
            <div id="trending-tag1">
            <div class="row">
                @foreach($topCats as $key => $topCat)
                        <div class="col-sm-3 col-md-3 col-lg-3 category-size">
                            <a href="{{route('category',['url'=>$topCat->url])}}">★ {{ ucwords(strtolower($topCat->name )) }}{{-- ({{App\Helpers\Helper::number_format_short(count($topCat->quotes))}})--}}</a>
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
@if(isset($trendImageQuotes) && !empty($trendImageQuotes))
    <section class="cont bg-img-sec pt-5 pb-3">
        <div class="container">
                <div class="row home-page-margin">
            <h2 class="h2-style">Trending Picture</h2>
        <div class="n-img-button" style="margin-right: 30px;
"> <a href="{{route('all-images')}}" class="explore-button">Explore More</a></div>
                </div><br />
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

@if(isset($latestImageQuotes) && !empty($latestImageQuotes))
    <section class="cont bg-img-sec pt-5 pb-3">
        <div class="container">
            <div class="row home-page-margin">
            <h2 class="h2-style">Latest Picture</h2>
        <div class="n-img-button" style="margin-right: 30px;
"> <a href="{{route('all-images')}}" class="explore-button">Explore More</a></div>
                </div><br />
            <div class="row" id="n-img">
                {!! $latestImageQuotes !!}
            </div>
            @if($latestImageCount > 5)
                <div class="row text-center pt-2">
                    <div class="n-img-button"> <a href="{{route('latest-images')}}" class="btn btn-primary">View More</a></div>
                </div>
            @endif
        </div>
    </section>
@endif

@if(isset($setting->gif_show) && $setting->gif_show==true )
@if(isset($gifQuotes) && !empty($gifQuotes))
    <section class="cont bg-img-sec pt-5 pb-3">
        <div class="container">
            <div class="row home-page-margin">
            <h2 class="h2-style">GIF</h2>
            <div class="n-img-button" style="margin-right: 30px;
"> <a href="{{route('all-gif')}}" class="explore-button">Explore More</a></div>
            </div><br/>
            <div class="row" id="n-img">
                {!! $gifQuotes !!}
            </div>
            @if($gifQuotesCount > 5)
                <div class="row text-center pt-2">
                    <div class="n-img-button"> <a href="{{route('all-gif')}}" class="btn btn-primary">View More</a></div>
                </div>
            @endif
        </div>
    </section>
@endif
@endif

@if(isset($setting->video_show) && $setting->video_show==true )
@if(isset($videoQuotes) && !empty($videoQuotes))
    <section class="cont bg-img-sec pt-5 pb-3" >
        <div class="container">
            <div class="row home-page-margin">
            <h2 class="h2-style">Videos</h2>
            <div class="n-img-button" style="margin-right: 30px;
"> <a href="{{route('all-video')}}" class="explore-button">Explore More</a>
                </div>
                </div><br />
            <div class="row" id="n-img">
                {!! $videoQuotes !!}
            </div>

            @if($videoQuotesCount > 5)

                <div class="row text-center pt-2 mt-4">
                    <div class="n-img-button"> <a href="{{route('latest-images')}}" class="btn btn-primary">View More</a></div>
                </div>

            @endif
        </div>

    </section>
@endif
@endif
@endsection

{{--https://twitter.com/intent/tweet?hashtags=SocialMedia&original_referer=https%3A%2F%2Fwww.thesocialmediahat.com%2Fblog%2Fhow-to-attach-images-to-tweet-buttons%2F&ref_src=twsrc%5Etfw&related=socialmediahats&text=%22How%20To%20Attach%20Images%20To%20Tweet%20Buttons.%22%20-%20pic.twitter.com%2FpYFGV6LWpT&tw_p=tweetbutton&url=https%3A%2F%2Fwww.thesocialmediahat.com%2Farticle%2Fhow-attach-images-tweet-buttons&via=mike_allton--}}
{{--https://www.facebook.com/share.php?u=https%3A%2F%2Fwww.thesocialmediahat.com%2Fblog%2Fhow-to-attach-images-to-tweet-buttons%2F--}}
{{--https://www.facebook.com/dialog/feed?app_id=812192852855258&display=popup&link=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2F&redirect_uri=https://developers.facebook.com/tools/explorer--}}
{{--https://www.linkedin.com/sharing/share-offsite/?url=https%3A%2F%2Fwww.thesocialmediahat.com%2Fblog%2Fhow-to-attach-images-to-tweet-buttons%2F--}}
{{--<a href="whatsapp://send?text=hey i am use these type of condition" data-action="share/whatsapp/share" target="_blank">וואטסאפ</a>--}}


{{--https://www.linkedin.com/cws/share?url=https%3A%2F%2Fwww.thesocialmediahat.com%2Fblog%2Fhow-to-attach-images-to-tweet-buttons%2F--}}
