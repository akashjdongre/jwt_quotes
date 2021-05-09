@if(isset($otherAuthors) && !$otherAuthors->isEmpty())
<section class="cont bg-img-sec pt-5 pb-3">
    <div class="container">
        <h2 class="h2-style">Other Author</h2><br />
        <div class="row" id="n-img">
            @foreach($otherAuthors as $key => $author)
                @if(($key+1)==1 || ($key+1)==6 || ($key+1)==11 || ($key+1)==16 || ($key+1)==21 )
                    <div class="col-sm">
                @endif
                    <a href="{{route('author',['url'=>$author->url])}}">★ {{ ucwords(strtolower($author->name )) }} ({{App\Helpers\Helper::number_format_short(count($author->quotes))}})</a>
                @if(($key+1)==5 || ($key+1)==10 || ($key+1)==15 || ($key+1)==20 || $otherAuthors->count()==($key+1))
                    </div>
                @else
                    <br/>
                @endif
            @endforeach
        </div>
        @if($otherAuthors->count() > 24)
            <div class="row text-center pt-4">
                <div class="n-img-button"> <a href="{{route('all-author')}}" class="btn btn-primary">View More</a></div>
            </div>
        @endif
    </div>
</section>
@endif
