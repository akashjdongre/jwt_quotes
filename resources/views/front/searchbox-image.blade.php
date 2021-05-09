<form class="form2-inline rambo9" method="get" action="{{route('search')}}">
    <div class="input-group">
        <input type="search"  name="q" class="form-control homeSearchInput" list="suggestion2" placeholder="Search Pictures" autocomplete="off">
        <input type="hidden" name="search" class="place" value="pictureSearch"/>
        <datalist id="suggestion2" class="search-dropdown-result"></datalist>
        <div class="input-group-append">
            <button class="btn btn-secondary" type="submit">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>
</form>
