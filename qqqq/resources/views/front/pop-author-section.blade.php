@if(isset($popularAuthors) && !$popularAuthors->isEmpty())
    <section class="cont pb-5">
        <div class="container">
            <h4 class="h2-style">Popular Authors</h4><br />
            <div id="trending-tag1">
                <div class="row">
                    @foreach($popularAuthors as $key => $popularAuthor)
                    <div class="col-sm-6 col-lg-3 category-mid-size">
                        <a href="{{route('author-image-more',['url'=>$popularAuthor->url])}}">★ {{ ucwords(strtolower($popularAuthor->name))}}({{App\Helpers\Helper::number_format_short(count($popularAuthor->quotes))}})</a><br/>
                    </div>
                    @endforeach
                    
                </div>
            </div>
            @if($popularAuthors->count() > 34)
                <div class="row text-center pt-4">
                    <div class="n-img-button"> <a href="{{route('popular-author')}}" class="btn btn-primary">View More</a></div>
                </div>
            @endif
        </div>
    </section>
@endif
