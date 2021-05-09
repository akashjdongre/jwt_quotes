@extends('admin.layouts.app')
@section('content')
@if(Auth::guard('admin')->user()->can('tag_create'))
@endif
<div class="card">
    <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
   {{ trans('cruds.tag.title_singular') }} {{ trans('global.list') }}
     </div>
        <div class="col-lg-6 ">
               <a class="btn btn-danger card-main-button" href="{{ asset('import/Tags.csv') }}" download>
                Download CSV Sample
               </a>
                   <button class="btn btn-warning card-main-button" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('admin.csvImport.UserImport', ['route' => 'admin.tags.uploadTags'])
            <a class="btn btn-success card-main-button" href="{{ route('admin.tags.create') }}">
              {{ trans('global.add') }} {{ trans('cruds.tag.title_singular') }}
                </a>
        </div>
        </div>
       </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Tag">
                <thead>
                    <tr class="tabletophead">
                        <th width="10"> &nbsp;</th>
                        <th class="withoupadd withoupadds">{{ trans('cruds.tag.fields.id') }}</th>
                        <th class="withoupadd withoupadds">{{ trans('cruds.tag.fields.title') }}</th>
                        <th class="withoupadd withoupadds">{{ trans('cruds.tag.fields.created_by') }}</th>
                        <th class="withoupadd withoupadds">{{ trans('cruds.tag.fields.updated_by') }}</th>
                        <th class="withoupadd withoupadds">{{ trans('cruds.tag.fields.status') }}</th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $key => $tag)
                        <tr data-entry-id="{{ $tag->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $tag->custom_id ?? '' }}
                            </td>
                            <td>
                                {{ $tag->title ?? '' }} ({{App\Helpers\Helper::number_format_short($tag->quotes->count())}})
                            </td>
                            <td>
                                {{ $tag->CreatedByAdmin ?? '' }}
                            </td>
                            <td>
                                {{ $tag->UpdatedByAdmin ?? '' }}
                            </td>
                            <td>
                                <span class="badge {{$tag->status==1 ? 'badge-success' : 'badge-warning'}}">{{ $tag->CurrentStatus ?? '' }}</span>
                            </td>
                            <td align="right">
                                @if(Auth::guard('admin')->user()->can('tag_show'))
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tags.show', $tag->custom_id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endif

                                @if(Auth::guard('admin')->user()->can('tag_edit'))
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tags.edit', $tag->custom_id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endif

                                @if(Auth::guard('admin')->user()->can('tag_delete'))
                                    <form action="{{ route('admin.tags.destroy', $tag->custom_id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endif

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@if(Auth::guard('admin')->user()->can('tag_delete'))
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tags.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function (res) { console.log(res); location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endif

@if(Auth::guard('admin')->user()->can('tag_edit'))
    let activeButtonTrans = '{{ trans('global.datatables.active') }}'
    let activeButton = {
    text: activeButtonTrans,
    url: "{{ route('admin.tags.massActive') }}",
    className: 'btn-success',
    action: function (e, dt, node, config) {
    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
        return $(entry).data('entry-id')
    });

    if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
    }

    if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
            headers: {'x-csrf-token': _token},
            method: 'POST',
            url: config.url,
            data: { ids: ids, _method: 'POST' }})
            .done(function () { location.reload() })
    }
    }
    }
    dtButtons.push(activeButton)
@endif

@if(Auth::guard('admin')->user()->can('tag_edit'))
    let deactiveButtonTrans = '{{ trans('global.datatables.deactive') }}'
    let deactiveButton = {
    text: deactiveButtonTrans,
    url: "{{ route('admin.tags.massDeactive') }}",
    className: 'btn-warning',
    action: function (e, dt, node, config) {
    var ids = $.map(dt.rows({selected: true}).nodes(), function (entry) {
        return $(entry).data('entry-id')
    });

    if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
    }

    if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
            headers: {'x-csrf-token': _token},
            method: 'POST',
            url: config.url,
            data: {ids: ids, _method: 'POST'}
        })
            .done(function () {
                location.reload()
            })
    }
    }
    }
    dtButtons.push(deactiveButton)
@endif

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
        let table = $('.datatable-Tag:not(.ajaxTable)').DataTable({ buttons: dtButtons,orderCellsTop: true,fixedHeader: true })

        // Setup table with search
        var counter = 0;
        $('.datatable thead tr').clone(true).appendTo( '.datatable thead' );
        $('.datatable thead tr:eq(1) th').each( function (i) {
            counter++;
            if(counter != $('.datatable thead tr:eq(1) th').length && counter!=1 ){ // skip first and last col for search input
                var title = $(this).text();
                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
            }



            $( 'input', this ).on( 'keyup change', function () {

                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
