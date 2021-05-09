@if(isset($popularTags) && !$popularTags->isEmpty())
    <div class="py-4" id="sidebar-shadow">
        <div class="row">
        <h4 class="h2-style pb-2" style="margin-left:15px;">Popular Tags</h4>
                   <div class="button"> <a href="{{route('all-tag')}}" class="side-explore-button">Explore More</a></div>
            </div>
        <div class="row pl-3">
            @foreach($popularTags as $key => $popularTag)
                <div class="col-sm-6" id="n-pl-15">
               
                    <a href="{{route('tag',['url'=>$popularTag->url])}}">{{ ucwords(strtolower($popularTag->title ))}} ({{App\Helpers\Helper::number_format_short(count($popularTag->quotes))}})</a>
                </div>
            @endforeach
        </div>
            <div class="container">
                <hr>
                @if($popularTags->count()>29)
                    <div class="row">
                        <div class="col-sm-12">
                            <!--button class="btn btn-primary">View More</button-->
                            <p style="font-weight:bold; font-size:12px; text-align: right;"><a id="view-more-btn" href="{{route('popular-tag')}}">View More... &nbsp;&nbsp;&nbsp;</a></p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
@endif



