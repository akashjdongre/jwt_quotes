@foreach($quotes as $quote)
<section class="bg-img-sec mt-3 pt-5 pb-3">
    <div class="container">
        <div class="row justify-content-center" id="n-img">
            <div class="col-sm-12">
                <div class="card bg-card">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-sm-12 mt-4">
                                <div class="video-button videoLink pt-1">
                                    <a href="{{route('single-video',['url'=>$quote->url])}}">&nbsp;<i class="fa fa-external-link" aria-hidden="true"></i></a>

                                </div>
                            </div>
                            <div class="col-sm-12 mt-4">
                                <p class="title-bold-24">{{$quote->video_title}}</p>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-4">
                            <p class="des-1">{{$quote->video_desc}}</p>
                        </div>
                        <div class="line"></div>
                        <div class="col-sm-12 card4">
                            <div class="flex1">
                                <p><b class="tag-box-name-video">Tags:</b> &nbsp;</p>
                                <div class="video-tags videoLink-tags pt-1">
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
                    <div class="card-body">
                        <iframe width="100%" height="500" src="{{$quote->video}}">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
