@extends('front.layouts.app')
@section('meta')
    @if(isset($singleBlog) && !empty($singleBlog))
        <title>{{$singleBlog->meta_title}}</title>
        <meta name="description" content="{{$singleBlog->meta_desc}}"/>
        <meta name="keywords" content="{{$singleBlog->meta_keywords}}"/>
        <meta name="author" content="{{$singleBlog->meta_author}}" />
        <!-- Open Graph data -->
        <meta property="og:title" content="{{$singleBlog->meta_title}}" />
        <meta property="og:description" content="{{$singleBlog->meta_desc}}" />
        <meta property="og:image" content="{{ !empty($singleBlog->meta_image) ? asset('storage/image/'.$singleBlog->meta_image) : ''  }}" />
        <meta property="og:url" content="{{Request::url()}}" />
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary">
        <meta name="twitter:title" content="{{$singleBlog->meta_title}}">
        <meta name="twitter:description" content="{{$singleBlog->meta_desc}}">
        <meta name="twitter:image" content="{{ !empty($singleBlog->meta_image) ? asset('storage/image/'.$singleBlog->meta_image) : ''  }}">
    @endif
@endsection
@section('content')
<div class="mt-90"></div>
<!--------------modal ------------->

<div class="container">
    <div class="sitemap">
        <a href="{{route('home')}}" class="text-theme"><b>Home</b></a>
        <a class="text-theme2"><b>&nbsp;&nbsp;⤏&nbsp;&nbsp;</b></a>
        <a href="{{route('blog')}}" class="text-theme">Stories</a>
        <a class="text-theme2"><b>&nbsp;&nbsp;⤏&nbsp;&nbsp;</b></a>
        <a class="text-gray">Read Stories</a>
    </div>
    @if(isset($singleBlog) && !empty($singleBlog))
    <div class="row">
        <div class="col-sm-8">
            <h1 class="pt-1 pb-3 theme-h1"><span class="h2-style"></span>Stories</h1>
        </div>
        <div class="col-sm-4">
            <div class="pt-1 pb-3 theme-h1">
                <form class="form3-inline rambo9" action="/action_page.php">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search Messages">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button">
                                            <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
                <h4 class="card-title pt-3">{{$singleBlog->title}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-1">
            <div class="tag-box-name1 tag-box">Tags:</div>
        </div>
        <div class="col-sm-11">
            <div class="flex3">
                <div class="greyTextnew smallText2 pt-1">
                    @php $relatedTags=App\Helpers\Helper::RelatedTagsByCategory('','id',$singleBlog->category); @endphp
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
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-sm-12">
            <div class="card blog-bg">
                <div class="card-body">
                    <img class="blog-image" src="{{asset('storage/image/'.$singleBlog->image)}}" class="img-fix-wid" alt="{{$singleBlog->alt}}">
                    <div class="blog-text2">
                        {!! $singleBlog->text !!}
                    </div>
                    <div class="row justify-content-center" id="quotes">
                        <div>
                            <a class="total"><span class="fa fa-heart"></span>&nbsp;<i>{{$singleBlog->total_share}}</i></a>
                            <a href="https://www.facebook.com/share.php?u={{Request::url()}}" data-share="fb" data-id="{{$singleBlog->id}}" class="shareRedirect1" target="_blank"><span class="fa fa-facebook-square"></span>&nbsp;<i>{{$singleBlog->facebook}}</i></a>
                            <a href="https://twitter.com/intent/tweet?url={{Request::url()}}" data-share="tw" data-id="{{$singleBlog->id}}" class="shareRedirect1" target="_blank"><span class="fa fa-twitter-square"></span>&nbsp;<i>{{$singleBlog->twitter}}</i></a>
                            {{--                                                    <a href="javascript:void(0)" data-share="insta" data-id="{{$latestTextQuote->id}}" class="shareRedirect1" target="_blank"><span class="fa fa-instagram"></span><i>&nbsp;{{$latestTextQuote->socials->instagram}}</i></a>--}}
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{Request::url()}}" data-share="ln" data-id="{{$singleBlog->id}}" class="shareRedirect1" target="_blank"><span class="fa fa-linkedin-square"></span>&nbsp;<i>{{$singleBlog->linkedin}}</i></a>
                            <a href="whatsapp://send?text={{$singleBlog->text}}" data-action="share/whatsapp/share" data-share="wa" data-id="{{$singleBlog->id}}" class="shareRedirect1" target="_blank"><span class="fa fa-whatsapp"></span>&nbsp;<i>{{$singleBlog->whatsapp}}</i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---------blog end----------->
    @endif
    <br/>
    <div class="row mt-4">
        <div class="col-sm-12">
            <h4 class="card-title pt-3"><span class="h2-style"></span>Similar Stories</h4>
        </div>
        @if(isset($similarBlogs) && !empty($similarBlogs))
            <div class="col-sm-12">
                <div class="row blog append-by-ajax">
                    {!! $similarBlogs !!}
                </div>
                <div class="row forHide">
                    @if($similarBlogsCount>5)
                        <div class="container pt-2 pb-4 forHide">
                            <input type="hidden" name="skip" value="{{$similarBlogsCount}}" id="skipRows">
                            <input type="hidden" name="ajaxUrl" value="{{$url}}" id="ajaxUrl">
                            <input type="hidden" name="take" value="{{$take}}" id="takeRows">
                            <button class="btn btn-primary btn-block viewMoreAjax">View More</button>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
    <br/>
    <div class="row ">
        @if(isset($popularTags) && !empty($popularTags))
        <div class="col-sm-12 mt-4">
                <div class="py-4" id="sidebar-shadow">
                    <h4 class="h2-style pb-2">Popular Tags</h4>
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
                        <div class="container">
                            <hr>
                            <div class="row">
                                <div clas="col-sm-12">
                                    <!--button class="btn btn-primary">View More</button-->
                                    <p style="font-weight:bold; font-size:12px; text-align: right;"><a id="view-more-btn" href="{{route('popular-tag')}}">View More... &nbsp;&nbsp;&nbsp;</a></p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
        </div>
        @endif
    </div>
    <br/>
    <div class="row ">
        @if(isset($popularAuthors) && !empty($popularAuthors))
        <div class="col-sm-12 mt-4">

                <div class="py-4" id="sidebar-shadow">
                    <h4 class="h2-style pb-2">Popular Author</h4>
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
                        <div class="container">
                            <hr>
                            <div class="row">
                                <div clas="col-sm-12">
                                    <!--button class="btn btn-primary">View More</button-->
                                    <p style="font-weight:bold; font-size:12px; text-align: right;"><a id="view-more-btn" href="{{route('popular-author')}}">View More... &nbsp;&nbsp;&nbsp;</a></p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

        </div>
        @endif
    </div>
</div>

@endsection
