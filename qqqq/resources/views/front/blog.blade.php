@extends('front.layouts.app')


@section('meta_title')
    <title>Stories, Blog |Quotes Lluvia</title>
@endsection

@section('meta_desc')
    <meta name="description" content=""/> 
@endsection

@section('meta_keywords')
    <meta name="keywords" content=""/> 
@endsection

@section('og_title')
    <meta property="og:title" content="Stories, Blog |Quotes Lluvia" /> 
@endsection

@section('og_desc')
    <meta property="og:description" content="" /> 
@endsection

@section('og_url')
    <meta property="og:url" content="{{Request::url()}}" />
@endsection

@section('tw_title')
    <meta name="twitter:title" content="Stories, Blog |Quotes Lluvia"> 
@endsection

@section('tw_desc')
    <meta name="twitter:description" content=""> 
@endsection

@section('content')
    <div class="mt-90"></div>
    <!--------------modal ------------->

    <div class="container">
        <div class="sitemap">
            <a href="{{route('home')}}" class="text-theme"><b>Home</b></a>
            <a class="text-theme2"><b>&nbsp;&nbsp;⤏&nbsp;&nbsp;</b></a>
            <a class="text-gray">Stories</a>
        </div>
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
            @if(isset($blogs) && !empty($blogs))
            <div class="col-sm-12">
                <div class="row blog append-by-ajax">
                    {!! $blogs !!}
                </div>
                <div class="row forHide">
                @if($blogsCount>8)
                    <div class="container pt-2 pb-4 forHide">
                        <input type="hidden" name="skip" value="{{$blogsCount}}" id="skipRows">
                        <input type="hidden" name="ajaxUrl" value="{{$url}}" id="ajaxUrl">
                        <input type="hidden" name="take" value="{{$take}}" id="takeRows">
                        <button class="btn btn-primary btn-block viewMoreAjax">View More</button>
                    </div>
                @endif
                </div>
            </div>
            @endif


        <div class="col-sm-12">
            @if(isset($popularTags) && !empty($popularTags))
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
            @endif
                <br /><br />
            @if(isset($popularAuthors) && !empty($popularAuthors))
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
            @endif
        </div>
    </div>
</div>
</div>

@endsection
