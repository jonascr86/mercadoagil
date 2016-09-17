@extends('layouts/default')

@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
@stop

@section('content')
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading clearfix">
                <h4 class="pull-left">@yield('title')</h4>
                <div class="pull-right">
                    <a href="@yield('button-create')" class="btn btn-sm btn-success"><span class="fa fa-plus-circle"></span> @lang('button.create')</a>
                    <div id="dt-my-buttons" style="display: inline"></div>
                </div>
            </div>
            @if (trim($__env->yieldContent('panel-heading')))
            <div class="panel-heading clearfix">
                @yield('panel-heading')
            </div>
            @endif
            <div class="panel-body">
                @yield('panel-body')
            </div>
        </div>
    </div>
@stop

@section('datatable')
<script>
    $('#table').DataTable( {
        dom: 'lBfrtip',
        buttons: ['csv', 'pdf']
    } );
</script>
@stop

@section('mover_botoes')
<script>
    // tive que fazer isso para mover os botoes do DataTables para o topo fora da tabela
    // se alguem tiver alguma sugestao melhor, pode corrigir
    var pdf = $('.buttons-pdf').detach();
    pdf.addClass('btn btn-sm btn-danger');
    pdf.children('span').addClass('fa');
    pdf.removeClass('dt-button');
    $('#dt-my-buttons').append(pdf);

    $('#dt-my-buttons').append('&nbsp;');

    var csv = $('.buttons-csv').detach();
    csv.addClass('btn btn-sm btn-warning');
    csv.children('span').addClass('fa');
    csv.removeClass('dt-button');
    $('#dt-my-buttons').append(csv);
</script>
@stop

@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>

    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js">
    </script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js">
    </script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js">
    </script>

    @yield('datatable')
    @yield('mover_botoes')

    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"></div>
        </div>
    </div>
    <script>
        $(function () {
            $('body').on('hidden.bs.modal', '.modal', function () {
                $(this).removeData('bs.modal');
            });
        });
    </script>
@stop
