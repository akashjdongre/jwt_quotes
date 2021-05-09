@if(isset($trendTags) && !$trendTags->isEmpty())

    <div class="container bg-first">
        <div class="sec1" id="trending-tag">
            <h2 class="h2-style">Trending Tags</h2><br />
            <div class="row">
        @foreach($trendTags as $trendTag)
            <div class="col-sm-3">
                <a href="{{route('tag',['url'=>$trendTag->url])}}">★ {{ ucwords(strtolower($trendTag->title))}} ({{App\Helpers\Helper::number_format_short(count($trendTag->quotes))}})</a><br/>
            </div>
        @endforeach
        </div>
            <hr>
            @if($trendTags->count() >25)
                <div class="row">
                    <div clas="col-sm-12">
                        <!--button class="btn btn-primary">View More</button-->
                        <p style="font-weight:bold; font-size:12px; text-align: right;"><a id="view-more-btn" href="{{route('trend-tag')}}">View More... &nbsp;&nbsp;&nbsp;</a></p>
                    </div></div>
            @endif

        </div>
    </div>
@endif
