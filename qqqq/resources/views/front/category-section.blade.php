@if(isset($headCategories) && !$headCategories->isEmpty())

    <div class="container bg-first">
        <div class="sec1" id="trending-tag">
            <h2 class="h2-style">Top Categories</h2><br />
            <div class="row front-cat">
            @foreach($headCategories as $head)
            <div class="col-sm-6 col-lg-3 category-size">
                <a href="{{route('category',['url'=>$head->url])}}">★ {{ ucwords(strtolower($head->name))}}</a><br/>
            </div>
            @endforeach
            </div>
            <hr>
            @if($headCategories->count() >25)
                <div class="row">
                    <div clas="col-sm-12">
                        <!--button class="btn btn-primary">View More</button-->
                        <p style="font-weight:bold; font-size:12px; text-align: right;"><a id="view-more-btn" href="{{route('all-category')}}">View More... &nbsp;&nbsp;&nbsp;</a></p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif
