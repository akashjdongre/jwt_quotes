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
                <a href="{{route('latest-images')}}" class="text-theme2">Latest Text</a>
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
<section class="mt-3 pt-5 pb-3">
    <div class="container ">
        <div class="no-gutters" id="n-img">
            <div class="row">
                <div class="col-sm-10">
                    <div class="card text-page-card-clr">
                        <div class="card-body">
<div class="row justify-content-center mt-4" >
     <div class= "col-sm-12" >
    <div class= "text-page-quoteText">
        <p>"{{ $singleQuote->text}}"</p>
        </div>
        @if($singleQuote->AuthorName!='')
         <div class="row author-row">
            <div class="col-sm-12">
                <p class="author-name">-<a href="{{ route('author',['url'=>$singleQuote->AuthorUrl]) }}" ><span>{{ucwords(strtolower($singleQuote->AuthorName))}}</span></a></p>
            </div>
        </div>
        @endif
      <div class="row text-page-social-box">
                                <div class="col-sm-6 flex2 text-page-social " id="quotes">
                                    <p>
                                       <a class="total"><span class="fa fa-heart total"></span>&nbsp;{{$singleQuote->socials->total_share}}</a>
                                       <a href="https://www.facebook.com/share.php?u={{ request()->getSchemeAndHttpHost() }}/text/{{ $singleQuote->url }}&quote={{$singleQuote->text}}" data-share="fb" data-id="{{$singleQuote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-facebook-square"></span>&nbsp;{{$singleQuote->socials->facebook}}</a>
                                       <a href="https://twitter.com/intent/tweet?text={{$singleQuote->text}}&url={{ request()->getSchemeAndHttpHost() }}/text/{{ $singleQuote->url }}" data-share="tw" data-id="{{$singleQuote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-twitter-square"></span>&nbsp;{{$singleQuote->socials->twitter}}</a>
                                       <!-- <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ request()->getSchemeAndHttpHost() }}/text/{{ $singleQuote->url }}" data-share="ln" data-id="{{$singleQuote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-linkedin-square"></span>&nbsp;{{$singleQuote->socials->linkedin}}</a> -->
                                       <a href="https://web.whatsapp.com:/send?text={{$singleQuote->text}} {{ request()->getSchemeAndHttpHost() }}/text/{{ $singleQuote->url }} - via Quotes Lluvia" rel="tooltip" data-original-title="whatsapp" data-placement="left" data-action="share/whatsapp/share" data-share="wa"  data-id="{{$singleQuote->id}}" class="shareRedirect wpp-icon-web" target="_blank">
                                            <span class="fa fa-whatsapp wpp-icon-web"></span>&nbsp;{{$singleQuote->socials->whatsapp}}
                                        </a>

                                        <a href="whatsapp://send?text={{$singleQuote->text}} {{ request()->getSchemeAndHttpHost() }}/text/{{ $singleQuote->url }} - via Quotes Lluvia" rel="tooltip" data-original-title="whatsapp" data-placement="left" data-action="share/whatsapp/share" data-share="wa"   data-id="{{$singleQuote->id}}" class="shareRedirect wpp-icon" target="_blank">
                                            <span class="fa fa-whatsapp wpp-icon"></span>&nbsp;{{$singleQuote->socials->whatsapp}}
                                            <!-- <i class="wpp-icon">&nbsp;{{$singleQuote->socials->whatsapp}}</i> -->
                                        </a>
                                    </p>
                                </div>
                                <div class="col-sm-6 text-page-tag-box" >
                                    <div class="text-page-box-name">Tags:</div>
                                    <div class="flex1">
                                        <div class="greyTextnew text-page-tags pt-1">
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
        
                         </div>
                   </div>
                 </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif       
<div class="container mt-4">
    <div class="row">
        <div class="col-sm-8">
            @if(isset($relatedText) && !empty($relatedText))
            <section class="container-fluid">
                <div class="row">
                    <div class="">
                        <!--h2 class="pb-5 text-left">Tabs</h2-->
                        <ul id="tabs" class="nav nav-tabs">
                            <li class="nav-item"><a href="" data-target="#latest1" data-toggle="tab" class="nav-link small text-uppercase active">Quotes</a></li>
                        </ul>
                        <br>

                        <div id="tabsContent" class="tab-content">
                            <div id="latest1" class="tab-pane fade active show">
                                    {!! $relatedText !!}
                            </div>
                        </div>
                        <!------------------------->
                        @if($relatedTextCount > 6)
                            <!-- <div class="container pt-2 pb-4">
                                <a href="{{route('tag-text-more',['url'=>$tag->url])}}"><button class="btn btn-primary btn-block">View More</button></a>
                            </div> -->
                        @endif

                        <!------------------------->

                    </div>
                </div>
            </section>
            @endif
        </div>
        @include('front.right-sidebar')
    </div>
</div>

@endsection


