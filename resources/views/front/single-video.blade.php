@extends('front.layouts.app')

@if(isset($singleQuote) && !empty($singleQuote))
@if($singleQuote->meta_title)
@section('meta_title')
    <title>{{$singleQuote->meta_title}}</title>
@endsection
@endif
@if($singleQuote->meta_desc)
@section('meta_desc')
    <meta name="description" content="{{$singleQuote->meta_desc}}"/> 
@endsection
@endif
@if($singleQuote->meta_keywords)
@section('meta_keywords')
    <meta name="keywords" content="{{$singleQuote->meta_keywords}}"/> 
@endsection
@endif
@if($singleQuote->meta_author)
@section('meta_author')
    <meta name="author" content="{{$singleQuote->meta_author}}" /> 
@endsection
@endif
@if($singleQuote->meta_title)
@section('og_title')
    <meta property="og:title" content="{{$singleQuote->meta_title}}" /> 
@endsection
@endif
@if($singleQuote->meta_desc)
@section('og_desc')
    <meta property="og:description" content="{{$singleQuote->meta_desc}}" /> 
@endsection
@endif
@if($singleQuote->meta_image)
@section('og_image')
    <meta property="og:image" content="{{ !empty($singleQuote->meta_image) ? asset('storage/image/'.$singleQuote->meta_image) : ''  }}" /> 
@endsection
@endif
@section('og_url')
    <meta property="og:url" content="{{Request::url()}}" />
@endsection
@section('tw_card')
    <meta name="twitter:card" content="summary"> 
@endsection
@if($singleQuote->meta_title)
@section('tw_title')
    <meta name="twitter:title" content="{{$singleQuote->meta_title}}"> 
@endsection
@endif
@if($singleQuote->meta_desc)
@section('tw_desc')
    <meta name="twitter:description" content="{{$singleQuote->meta_desc}}"> 
@endsection
@endif
@if($singleQuote->meta_image)
@section('tw_img')
    <meta name="twitter:image" content="{{ !empty($singleQuote->meta_image) ? asset('storage/image/'.$singleQuote->meta_image) : ''  }}">
@endsection
@endif
@endif

@section('content')
<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<div class="mt-90"></div>
<!--------------modal ------------->
<section>

<div class="container">
        <div class="row">
            <div class="col-sm-6 sitemap">
                <a href="{{route('home')}}" class="text-theme"><b>Home</b></a>
                <a class="text-theme2"><b>&nbsp;&nbsp;⤏&nbsp;&nbsp;</b></a>
                <a href="#" class="text-theme2">Latest Videos</a>
                <a class="text-theme2"><b>&nbsp;&nbsp;⤏&nbsp;&nbsp;</b></a>
                <a class="text-gray">Range Of Vision</a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-7">
                <h1 class="pt-1 h2-style header">Range Of Vision</h1>
            </div>
            <div class="col-sm-5">
                {{-- include search form--}}
                @include('front.searchbox-image')
            </div>
        </div>
</div>
</section>
@if(isset($singleQuote) && !empty($singleQuote))
<section class="bg-img-sec mt-3 pt-5 pb-3">
    <div class="container-fluid">
        <div class="row justify-content-center" id="n-img">
            <div class="col-sm-10">
                <div class="card bg-card">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-sm-12 mt-4">
                                <p class="title-bold-24">{{$singleQuote->video_title}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <p class="des-2">{{$singleQuote->video_desc}}</p>
                        </div>
                        <div class="line2"></div>
                        <div class="col-sm-12 card4">
                         <div class="videodisplaycard">
                            <p><b class="tag-box-name-video">Tags:</b> &nbsp;</p>
                            <div class="video-tags videoLink-tags pt-1">
                               @foreach($singleQuote->tags as $key => $tag)
                                   @if(($key+1)==$singleQuote->tags->count() )
                                       <a href="{{route('tag',['url'=>$tag->url])}}">{{ucwords(strtolower($tag->title))}}</a>
                                   @else
                                       <a href="{{route('tag',['url'=>$tag->url])}}">{{ucwords(strtolower($tag->title))}},</a>
                                   @endif
                               @endforeach
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-body videocard">
                         <iframe width="100%" height="500" src="{{$singleQuote->video}}">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

<div class="container">
    <div class="row justify-content-center">
<p style="display:none;" id="p2">{{$singleQuote->video}}</p> <button onclick="copyToClipboard('#p2')">Copy Url</button>
</div>
</div>

@endif
@if(isset($relatedVideos) && !empty($relatedVideos))
<section class="cont bg-img-sec pt-5 pb-3">
        <div class="container">
            <h2 class="h2-style">Related Videos</h2><br />
            <div class="row append-by-ajax" id="n-img">
                {!! $relatedVideos !!}
            </div>
            @if($relatedVideosCount > 5)
                <div class="row text-center pt-2 mt-4 forHide">
                    <div class="n-img-button forHide">
                        <input type="hidden" name="skip" value="{{$relatedVideosCount}}" id="skipRows">
                        <input type="hidden" name="ajaxUrl" value="{{$url}}" id="ajaxUrl">
                        <input type="hidden" name="take" value="{{$take}}" id="takeRows">
                        <a href="javascript:void(0)" class="btn btn-primary viewMoreAjax">View More</a>
                    </div>
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
@endsection
@section('scripts')
@parent
<script>
function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
     var successful = document.execCommand('copy');
    var msg = successful ? 'successfully' : 'unsuccessful';
    alert( msg+' copied');
    $temp.remove();
}
    </script>
@endsection

