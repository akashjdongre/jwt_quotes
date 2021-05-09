@extends('front.layouts.app')

@if(isset($singleQuote) && !empty($singleQuote))
@if($singleQuote->picture_meta_title)
@section('meta_title')
    <title>{{$singleQuote->picture_meta_title}}</title>
@endsection
@endif
@if($singleQuote->picture_meta_desc)
@section('meta_desc')
    <meta name="description" content="{{$singleQuote->picture_meta_desc}}"/> 
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
@if($singleQuote->picture_meta_title)
@section('og_title')
    <meta property="og:title" content="{{$singleQuote->picture_meta_title}}" /> 
@endsection
@endif
@if($singleQuote->picture_meta_desc)
@section('og_desc')
    <meta property="og:description" content="{{$singleQuote->picture_meta_desc}}" /> 
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
@if($singleQuote->picture_meta_title)
@section('tw_title')
    <meta name="twitter:title" content="{{$singleQuote->picture_meta_title}}"> 
@endsection
@endif
@if($singleQuote->picture_meta_desc)
@section('tw_desc')
    <meta name="twitter:description" content="{{$singleQuote->picture_meta_desc}}"> 
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
                <a href="{{route('latest-images')}}" class="text-theme2">Latest Picture</a>
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
    <div class="container">
        <div class="no-gutters" id="n-img">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-clr">
                        <div class="card-body">
                            <div class="row justify-content-center mt-4" id="gallery">
                                <a  href="{{asset('storage/image/'.$singleQuote->image)}}">
                                    <img id="myImg" src="{{asset('storage/image/'.$singleQuote->image)}}" class="img-fix-wid" alt="{{$singleQuote->alt}}"/><!--img-fluid-->
                                </a>
                                <!---light gallery model--->
                                @if(isset($allRelatePictures) && !empty($allRelatePictures))
                                    @foreach($allRelatePictures as $key => $pictures)
                                        <a style="display:none" href="{{asset('storage/image/'.$pictures->image)}}">
                                            <img src="{{asset('storage/image/'.$pictures->image)}}" alt="{{$pictures->alt}}" />
                                        </a>
                                    @endforeach
                                 @endif
                            <!----light gallery model end--->
                            </div>
                            <div class="row social-box mt-4">
                                <div class="col-sm-7 justify-content-center flex2 social-big" id="quotes">
                                    <p>
                                       <a class="total"><span class="fa fa-heart total"></span>&nbsp;{{$singleQuote->socials->total_share}}</a>
                                       <a href="https://www.facebook.com/share.php?u={{ request()->getSchemeAndHttpHost() }}/picture/{{ $singleQuote->url }}&quote={{$singleQuote->text}}" data-share="fb" data-id="{{$singleQuote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-facebook-square"></span>&nbsp;{{$singleQuote->socials->facebook}}</a>
                                       <a href="https://twitter.com/intent/tweet?text={{$singleQuote->text}}&url={{ request()->getSchemeAndHttpHost() }}/picture/{{ $singleQuote->url }}" data-share="tw" data-id="{{$singleQuote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-twitter-square"></span>&nbsp;{{$singleQuote->socials->twitter}}</a>
                                       <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ request()->getSchemeAndHttpHost() }}/picture/{{ $singleQuote->url }}" data-share="ln" data-id="{{$singleQuote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-linkedin-square"></span>&nbsp;{{$singleQuote->socials->linkedin}}</a>
                                       <a href="https://web.whatsapp.com:/send?text={{$singleQuote->text}} {{ request()->getSchemeAndHttpHost() }}/picture/{{ $singleQuote->url }} - via Quotes Lluvia" rel="tooltip" data-original-title="whatsapp" data-placement="left" data-action="share/whatsapp/share" data-share="wa"  data-id="{{$singleQuote->id}}" class="shareRedirect wpp-icon-web" target="_blank">
                                            <span class="fa fa-whatsapp wpp-icon-web"></span>&nbsp;{{$singleQuote->socials->whatsapp}}
                                        </a>

                                        <a href="whatsapp://send?text={{$singleQuote->text}} {{ request()->getSchemeAndHttpHost() }}/picture/{{ $singleQuote->url }} - via Quotes Lluvia" rel="tooltip" data-original-title="whatsapp" data-placement="left" data-action="share/whatsapp/share" data-share="wa"   data-id="{{$singleQuote->id}}" class="shareRedirect wpp-icon" target="_blank">
                                            <span class="fa fa-whatsapp wpp-icon"></span>&nbsp;{{$singleQuote->socials->whatsapp}}
                                            <!-- <i class="wpp-icon">&nbsp;{{$singleQuote->socials->whatsapp}}</i> -->
                                        </a>
                                    </p>
                                </div>
                                <div class="col-sm-5 tag-box justify-content-center" >
                                    <div class="tag-box-name">Tags:</div>
                                    <div class="flex1">
                                        <div class="greyTextnew smallText1 pt-1">
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
            @if($singleQuote->AuthorName!='')
                <div class="row author-row">
                    <div class="col-sm-12">
                        <p class="author-name">Author&nbsp;:&nbsp; <span>{{ucwords(strtolower($singleQuote->AuthorName))}}</span></p>
                    </div>
                </div>
            @endif
            @if($singleQuote->text!='')
                <div class="row">
                    <div class="col-sm-12">
                        <p class="text-msg">"{{$singleQuote->text}}"</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
@endif

@if(isset($relatedPictures) && !empty($relatedPictures))
<section>
    <div class="container">
        <div class="row pt-5">
            <div class="col-sm-12">
                <h4 class="h2-style text-theme">Related Pictures</h4>
            </div>
        </div>
        <div class="row pt-5 append-by-ajax" id="n-img">
            {!! $relatedPictures !!}
        </div>

        @if($relatedPicturesCount > 5)
            <div class="row text-center pt-2 forHide">
                <div class="n-img-button forHide">
                    <input type="hidden" name="skip" value="{{$relatedPicturesCount}}" id="skipRows">
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
{{--<script>--}}
{{--// Get the modal--}}
{{--var modal = document.getElementById("myModal");--}}

{{--// Get the image and insert it inside the modal - use its "alt" text as a caption--}}
{{--var img = document.getElementById("myImg");--}}
{{--var modalImg = document.getElementById("img01");--}}
{{--var captionText = document.getElementById("caption");--}}
{{--img.onclick = function(){--}}
{{--  modal.style.display = "block";--}}
{{--  modalImg.src = this.src;--}}
{{--  captionText.innerHTML = this.alt;--}}
{{--}--}}

{{--// Get the <span> element that closes the modal--}}
{{--var span = document.getElementsByClassName("close")[0];--}}

{{--// When the user clicks on <span> (x), close the modal--}}
{{--span.onclick = function() {--}}
{{--  modal.style.display = "none";--}}
{{--}--}}
{{--</script>--}}
@endsection

