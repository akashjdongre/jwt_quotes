@foreach($quotes as $quote)
    <div class="col-sm-4 text-center">
        <div class="img-shadow2">
            <div class="videos">
           <div class="video-wrap">
      <a href="{{route('single-video',['url'=>$quote->url])}}">
      <div class="play-btn fa fa-play"></div>
      <img class="placeholder" src="{{asset('storage/image/'.$quote->video_thumb)}}" alt="{{$quote->video_title}}" />
       </a>
  <!--<a href="{{route('single-video',['url'=>$quote->url])}}"><img src="{{asset('storage/image/'.$quote->video_thumb)}}" class="img-fluid" alt="{{$quote->video_title}}"/></a>-->
            <div class="img-social img-social-n" id="quotes">
                <a class="total"><span class="fa fa-heart total"></span><i>&nbsp;{{$quote->socials->total_share}}</i></a>
                <a href="https://www.facebook.com/share.php?u={{$quote->video}}&quote={{$quote->video_desc}}" data-share="fb" data-id="{{$quote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;{{$quote->socials->facebook}}</i></a>
                <a href="https://twitter.com/intent/tweet?url={{$quote->video}}&text={{$quote->video_desc}}" data-share="tw" data-id="{{$quote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;{{$quote->socials->twitter}}</i></a>
                {{--                                <a href="javascript:void(0)" data-share="insta" data-id="{{$imageQuote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;{{$imageQuote->socials->instagram}}</i></a>--}}
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{$quote->video}}&title={{$quote->video_desc}}" data-share="ln" data-id="{{$quote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;{{$quote->socials->linkedin}}</i></a>
                <a href="javascript:void(0)" data-share="wa" data-id="{{$quote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;{{$quote->socials->whatsapp}}</i></a>

            </div>
            <div class="container" style="margin-top:-10px;">
                <div class="row no-gutters" id="n-img">
                    <div class="col-sm-12 card4">
                        <div class="flex1">
                            <p><b class="f-30">Tags:</b> &nbsp;</p>
                            <div class="greyText1 smallText pt-1">
                                @foreach($quote->tags as $key => $tag)
                                    @if(($key+1) < 5)
                                        @if(($key+1)== 4 || ($key+1)==$quote->tags->count() )
                                            <a href="{{route('tag',['url'=>$tag->url])}}">{{ucwords(strtolower($tag->title))}}</a>
                                        @else
                                            <a href="{{route('tag',['url'=>$tag->url])}}">{{ucwords(strtolower($tag->title))}},</a>
                                        @endif
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
@endforeach
