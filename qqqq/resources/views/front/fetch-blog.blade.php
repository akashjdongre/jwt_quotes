<!---------blog end----------->
@foreach($blogs as $blog)
    <div class="col-12 col-sm-4 col-md-6 col-lg-4">
        <div class="card">
            <a href="{{route('single-blog',['url'=>$blog->url])}}"><img class="card-img" src="{{asset('storage/image/'.$blog->image)}}" alt="{{$blog->alt}}" ></a>
            <div class="card-body">
                <h4 class="card-title">{{$blog->title}}</h4>
                <div class="tag-box-name1 tag-box">Tags:</div>
                <div class="flex3">
                    <div class="greyTextnew smallText2 pt-1">
                        @php $relatedTags=App\Helpers\Helper::RelatedTagsByCategory(5,'id',$blog->category); @endphp
                        @foreach($relatedTags as $key => $tag)
                            @if(($key+1) < 5)
                                @if(($key+1)== 4 || ($key+1)==$relatedTags->count() )
                                    <a href="{{route('tag',['url'=>$tag->url])}}">{{ucwords(strtolower($tag->title))}}</a>
                                @else
                                    <a href="{{route('tag',['url'=>$tag->url])}}">{{ucwords(strtolower($tag->title))}},</a>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>
                <p class="card-text">{{ strip_tags(substr($blog->text,'0',30)) }}</p>

                <a href="{{route('single-blog',['url'=>$blog->url])}}" class="read-more">Read More...</a>
            </div>
            <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
                <div class="views">{{$blog->CreatedDate}}</div>
                <div class="stats">
                    {{--                                    <i class="fa fa-eye"></i> 1347--}}
                </div>
            </div>
        </div>
    </div>
@endforeach
<!---------blog end----------->
