<!--<search box>-->
<div class="">
    <form class="form-inline rambo9" method="get" action="{{route('search')}}">
        <div class="input-group">
            <input type="search"  name="q" class="form-control homeSearchInput" list="suggestion1" placeholder="Search Messages" autocomplete="off">
            <input type="hidden" name="search" class="place" value="textSearch"/>
            <datalist id="suggestion1" class="search-dropdown-result"></datalist>
            <div class="input-group-append">
                <button class="btn btn-secondary" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div><br />
<!--<search box>-->
