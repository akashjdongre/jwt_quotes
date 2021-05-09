@extends('admin.layouts.app')
@section('content')
@if(Auth::guard('admin')->user()->can('category_create'))
@endif
<div class="card">
    <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
  {{ trans('cruds.category.title_singular') }} {{ trans('global.list') }}
     </div>
        <div class="col-lg-6 ">
            <a class="btn btn-success card-top-button" href="{{ route('admin.categories.create') }}">
            {{ trans('global.add') }} {{ trans('cruds.category.title_singular') }}
        </a>
        </div>
        </div>
       </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Category">
                <thead>
                    <tr class="tabletophead">
                        <th width="10">
                            &nbsp;
                        </th>
                        <th class="withoupadd withoupadds">{{ trans('cruds.category.fields.id') }}</th>
                        <th class="withoupadd withoupadds">{{ trans('cruds.category.fields.name') }}</th>
                        <th class="withoupadd withoupadds">{{ trans('cruds.category.fields.location') }}</th>
                        <th class="withoupadd withoupadds">{{ trans('cruds.category.fields.status') }}</th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key => $category)
                        <tr data-entry-id="{{ $category->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $category->custom_id ?? '' }}
                            </td>
                            <td>
                                {{ $category->name ?? '' }}
                            </td>
                            <td>
                                @php switch ($category->location) {
                                    case 1:
                                        echo '<span class="badge badge-success">On Head</span>';
                                        break;
                                    case 2:
                                        echo '<span class="badge badge-success">On Foot</span>';
                                        break;
                                    case 3:
                                        echo '<span class="badge badge-success">No where</span>';
                                        break;
                                    default:
                                        break;
                                } @endphp
                            </td>
                            <td>
                                <span class="badge {{$category->status==1 ? 'badge-success' : 'badge-warning'}}">{{ $category->CurrentStatus ?? '' }}</span>
                            </td>
                            <td align="right">
                                @if(Auth::guard('admin')->user()->can('category_show'))
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.categories.show', $category->custom_id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endif

                                @if(Auth::guard('admin')->user()->can('category_edit'))
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.categories.edit', $category->custom_id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endif

                                @if(Auth::guard('admin')->user()->can('category_delete'))
                                    <form action="{{ route('admin.categories.destroy', $category->custom_id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@if(Auth::guard('admin')->user()->can('category_delete'))
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.categories.massDestroy') }}",
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
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endif


@if(Auth::guard('admin')->user()->can('category_edit'))
    let activeButtonTrans = '{{ trans('global.datatables.active') }}'
    let activeButton = {
    text: activeButtonTrans,
    url: "{{ route('admin.categories.massActive') }}",
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

@if(Auth::guard('admin')->user()->can('category_edit'))
    let deactiveButtonTrans = '{{ trans('global.datatables.deactive') }}'
    let deactiveButton = {
    text: deactiveButtonTrans,
    url: "{{ route('admin.categories.massDeactive') }}",
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
        let table = $('.datatable-Category:not(.ajaxTable)').DataTable({ buttons: dtButtons,orderCellsTop: true,fixedHeader: true });
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
