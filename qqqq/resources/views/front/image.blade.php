@foreach($quotes as $quote)
    <div class="col-sm-6 col-lg-4 text-center">
        <div class="img-shadow2">
            <a href="{{route('single-image',['url'=>$quote->url])}}"><img src="{{asset('storage/image/'.$quote->image)}}" class="img-fluid" alt="{{$quote->alt}}" /></a>

            <div class="img-social img-social-n" id="quotes">
                <a class="total"><span class="fa fa-heart total"></span><i>&nbsp;{{$quote->socials->total_share}}</i></a>
                <a href="https://www.facebook.com/share.php?u={{ request()->getSchemeAndHttpHost() }}/picture/{{ $quote->url }}&quote={{$quote->text}}" data-share="fb" data-id="{{$quote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;{{$quote->socials->facebook}}</i></a>
                <a href="https://twitter.com/intent/tweet?text={{$quote->text}}&url={{ request()->getSchemeAndHttpHost() }}/picture/{{ $quote->url }}" data-share="tw" data-id="{{$quote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;{{$quote->socials->twitter}}</i></a>
                <!-- <a href="javascript:void(0)" data-share="insta" data-id="{{$quote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;{{$quote->socials->instagram}}</i></a> -->
                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ request()->getSchemeAndHttpHost() }}/picture/{{ $quote->url }}" data-share="ln" data-id="{{$quote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;{{$quote->socials->linkedin}}</i></a>
                <a href="https://web.whatsapp.com:/send?text={{$quote->text}} {{ request()->getSchemeAndHttpHost() }}/picture/{{ $quote->url }} - via Quotes Lluvia" rel="tooltip" data-original-title="whatsapp" data-placement="left" data-action="share/whatsapp/share" data-share="wa"  data-id="{{$quote->id}}" class="shareRedirect wpp-icon-web" target="_blank">
                    <span class="fa fa-whatsapp wpp-icon-web"></span>
                    <i class="wpp-icon-web">&nbsp;{{$quote->socials->whatsapp}}</i>
                </a>
                <a href="whatsapp://send?text={{$quote->text}} {{ request()->getSchemeAndHttpHost() }}/picture/{{ $quote->url }} - via Quotes Lluvia" rel="tooltip" data-original-title="whatsapp" data-placement="left" data-action="share/whatsapp/share" data-share="wa"   data-id="{{$quote->id}}" class="shareRedirect wpp-icon" target="_blank">
                    <span class="fa fa-whatsapp wpp-icon"></span>
                    <i class="wpp-icon">&nbsp;{{$quote->socials->whatsapp}}</i>
                </a>
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
@endforeach


{{--@foreach($trendImageQuotes as $trendImageQuote)--}}
{{--    <div class="col-sm-4 text-center">--}}
{{--        <div class="img-shadow2">--}}
{{--            <a href="javascript:void(0)"><img src="{{asset('storage/image/'.$trendImageQuote->image)}}" class="img-fluid" alt="img" /></a>--}}
{{--            <div class="img-social img-social-n" id="quotes">--}}
{{--                <a><span class="fa fa-heart total"></span><i>&nbsp;{{$trendImageQuote->socials->total_share}}</i></a>--}}
{{--                <a href="https://www.facebook.com/share.php?u={{asset('storage/image/'.$trendImageQuote->image)}}&quote={{$trendImageQuote->text}}" data-share="fb" data-id="{{$trendImageQuote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-facebook-square"></span><i>&nbsp;{{$trendImageQuote->socials->facebook}}</i></a>--}}
{{--                <a href="https://twitter.com/intent/tweet?url={{asset('storage/image/'.$trendImageQuote->image)}}&text={{$trendImageQuote->text}}" data-share="tw" data-id="{{$trendImageQuote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-twitter-square"></span><i>&nbsp;{{$trendImageQuote->socials->twitter}}</i></a>--}}
{{--                --}}{{--                                <a href="javascript:void(0)" data-share="insta" data-id="{{$imageQuote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;{{$imageQuote->socials->instagram}}</i></a>--}}
{{--                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{asset('storage/image/'.$trendImageQuote->image)}}&title={{$trendImageQuote->text}}" data-share="ln" data-id="{{$trendImageQuote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-linkedin-square"></span><i>&nbsp;{{$trendImageQuote->socials->linkedin}}</i></a>--}}
{{--                <a href="javascript:void(0)" data-share="wa" data-id="{{$trendImageQuote->id}}" class="shareRedirect" target="_blank"><span class="fa fa-whatsapp"></span><i>&nbsp;{{$trendImageQuote->socials->whatsapp}}</i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endforeach--}}
