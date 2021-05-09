@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="row">
        <div class="col-lg-6">
     {{ trans('cruds.keyword.title_singular') }} {{ trans('global.list') }}
     </div>
        <div class="col-lg-6 ">
        <a class="btn btn-primary card-button btn-xs" href="{{ route('admin.authors.index') }}">
            Back
        </a>
        </div>
        </div>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Keyword">
                <thead>
                    <tr class="tabletophead">
                        <th width="10">

                        </th>
                        <th class="withoupadd">{{ trans('cruds.keyword.fields.id') }}</th>
                        <th class="withoupadd">{{ trans('cruds.keyword.fields.keyword') }}</th>
                        <th class="withoupadd">Time</th>
                        <th class="withoupadd">Created At</th>
                        <th class="withoupadd">Updated At</th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($keywords as $key => $keyword)
                        <tr data-entry-id="{{ $keyword->id }}">
                            <td>

                            </td>
                            <td>{{ $keyword->id ?? '' }}</td>
                            <td>{{ $keyword->title ?? '' }}</td>
                            <td>{{ $keyword->count ?? '' }}</td>
                            <td>{{ $keyword->created_at ?? '' }}</td>
                            <td>{{ $keyword->updated_at ?? '' }}</td>
                            <td align="right">
                                @if(Auth::guard('admin')->user()->can('keyword_show'))
                                    {{--<a class="btn btn-xs btn-primary views" href="{{ route('admin.keywords.show', $keyword->id) }}">--}}
                                        {{--{{ trans('global.view') }}--}}
                                    {{--</a>--}}
                                @endif
                                @if(Auth::guard('admin')->user()->can('keyword_edit'))
                                    {{--<a class="btn btn-xs btn-info edits" href="{{ route('admin.keywords.edit', $keyword->id) }}">--}}
                                        {{--{{ trans('global.edit') }}--}}
                                    {{--</a>--}}
                                @endif
                                @if(Auth::guard('admin')->user()->can('keyword_delete'))
                                    <form action="{{ route('admin.keywords.destroy', $keyword->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger deleted" value="{{ trans('global.delete') }}">
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
@if(Auth::guard('admin')->user()->can('keyword_delete'))
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.keywords.massDestroy') }}",
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
    let csvButtonTrans = 'CSV'
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 3, 'desc' ]],
    pageLength: 100,
    dom: 'lBfrtip<"actions">',
    buttons:[
        {
          extend: 'csv',
          className: 'btn-default',
          text: csvButtonTrans,
          exportOptions: {
            columns: ':visible'
          }
        },
    ]
  });



        let table = $('.datatable-Keyword:not(.ajaxTable)').DataTable({ buttons: dtButtons,orderCellsTop: true,fixedHeader: true })


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
      $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
  });

})

</script>
@endsection
