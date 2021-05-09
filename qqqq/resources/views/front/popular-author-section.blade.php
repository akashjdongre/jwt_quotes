@if(isset($popularAuthors) && !$popularAuthors->isEmpty())
    <div class="py-4" id="sidebar-shadow">
        <div class="row">
        <h4 class="h2-style pb-2" style="margin-left:15px;">Popular Author</h4>
        <div class="button"> <a href="{{route('all-author')}}" class="side-explore-button">Explore More</a></div>
         </div>
        <div class="row">
            @foreach($popularAuthors as $key => $popularAuthor)
                <div class="col-lg-6 col-sm-12" > <!--id="n-pl-15"-->
                    <a href="{{route('author',['url'=>$popularAuthor->url])}}">{{ ucwords(strtolower($popularAuthor->name )) }} ({{App\Helpers\Helper::number_format_short(count($popularAuthor->quotes))}})</a>
                </div>
            @endforeach
        </div>
        <div class="container">
            @if($popularAuthors->count()>29)
                <div class="row">
                    <div class="col-sm-12">
                        <!--button class="btn btn-primary">View More</button-->
                        <p style="font-weight:bold; font-size:12px; text-align: right;"><a id="view-more-btn" href="{{route('popular-author')}}">View More... &nbsp;&nbsp;&nbsp;</a></p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif
