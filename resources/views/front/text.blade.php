
                            @foreach($quotes as $quote)
                                <div class="container" id="trending-tag1">
                                    <div class="row">
                                        <a href="{{route('single-text',['url'=>$quote->url])}}" >
                                        <div class="col-sm-12 quoteText">
                                        “{{$quote->text}}”<br />
                                            <p class="pt-2 pl-2 quoteText2"><b>-{{$quote->AuthorName}}</b></p>
                                        </div>
                                        </a>
                                        <div class="col-sm-12" id="quotes">
                                            <div class="left-align1">
                                                <div class="greyText treding-tags">
                                                    <div class="tag-title">Tags :</div>
                <div class="store-tags">
                @foreach($quote->tags as $key => $tag)
                @if(($key+1) < 15)
                @if( ($key+1)== 14 || ($key+1)==$quote->tags->count())
<a href="{{route('tag',['url'=>$tag->url])}}">{{ucwords(strtolower($tag->title))}}</a>
                    @else
                    <a href="{{route('tag',['url'=>$tag->url])}}">{{ucwords(strtolower($tag->title))}},</a>
                    @endif
                @endif
                @endforeach
                </div>
                        
                                                </div>
                                            </div>
                                            <div class="new-rightalign social-big-2">
                                            
                                                <a class="total">
                                                    <span class="fa fa-heart"></span>
                                                    <i class="socialmedia-font">{{$quote->socials->total_share}}</i>
                                                </a>
                                                &nbsp;&nbsp;
                                                <a href="https://www.facebook.com/share.php?u={{ request()->getSchemeAndHttpHost() }}/text/{{ $quote->url }}&quote={{$quote->text}}" data-share="fb" data-id="{{$quote->id}}" class="shareRedirect" target="_blank">
                                                    <span class="fa fa-facebook-square"></span>
                                                    <i class="socialmedia-font">{{$quote->socials->facebook}}</i>
                                                </a>
                                               &nbsp;&nbsp;
                                                <a href="https://twitter.com/intent/tweet?text={{$quote->text}}&url={{ request()->getSchemeAndHttpHost() }}/text/{{ $quote->url }}" data-share="tw" data-id="{{$quote->id}}" class="shareRedirect" target="_blank">
                                                    <span class="fa fa-twitter-square"></span>
                                                    <i class="socialmedia-font">{{$quote->socials->twitter}}</i>
                                                </a>
                                                <!--<a href="https://www.linkedin.com/sharing/share-offsite/?url={{ request()->getSchemeAndHttpHost() }}/text/{{ $quote->url }}" data-share="ln" data-id="{{$quote->id}}" class="shareRedirect" target="_blank">
                                                    <span class="fa fa-linkedin-square"></span>
                                                    <i>&nbsp;{{$quote->socials->linkedin}}</i>
                                                </a>-->
                                                &nbsp;&nbsp;
                                                <a href="https://web.whatsapp.com:/send?text={{$quote->text}} {{ request()->getSchemeAndHttpHost() }}/text/{{ $quote->url }} - via Quotes Lluvia" rel="tooltip" data-original-title="whatsapp" data-placement="left" data-action="share/whatsapp/share" data-share="wa"  data-id="{{$quote->id}}" class="shareRedirect wpp-icon-web" target="_blank">
                                                    <span class="fa fa-whatsapp wpp-icon-web"></span>
                                                    <i class="wpp-icon-web">{{$quote->socials->whatsapp}}</i>
                                                </a>

                                                <a href="whatsapp://send?text={{$quote->text}} {{ request()->getSchemeAndHttpHost() }}/text/{{ $quote->url }} - via Quotes Lluvia" rel="tooltip" data-original-title="whatsapp" data-placement="left" data-action="share/whatsapp/share" data-share="wa"  data-id="{{$quote->id}}" class="shareRedirect wpp-icon" target="_blank">
                                                    <span class="fa fa-whatsapp wpp-icon"></span>
                                                    <i class="wpp-icon">{{$quote->socials->whatsapp}}</i>
                                                </a>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
