@if(!empty($tags))
    @foreach($tags as $tag)
        <option value="{{ucwords(strtolower($tag->title))}}">
    @endforeach
@endif
