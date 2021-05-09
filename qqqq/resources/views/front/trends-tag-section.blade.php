@if(isset($trendTags) && !$trendTags->isEmpty())
    <section class="cont pt-5 pb-3">
        <div class="container">
            <h2 class="h2-style">Trending Tags</h2><br />
            <div id="trending-tag1">
                <div class="row">
                    @foreach($trendTags as $key => $trendTag)
                            <div class="col-sm-3 category-mid-size">
                                <a href="{{route('tag',['url'=>$trendTag->url])}}">★ {{ ucwords(strtolower($trendTag->title )) }} ({{App\Helpers\Helper::number_format_short(count($trendTag->quotes))}})</a>
                            </div>
                    @endforeach
                </div>
            </div>
            @if($trendTags->count() > 34)
                <div class="row text-center pt-4">
                    <div class="n-img-button"> <a href="{{route('trend-tag')}}" class="btn btn-primary">View More</a></div>
                </div>
            @endif
        </div>
    </section>
@endif
