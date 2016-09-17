@extends('layouts/default')

@section('header_styles')
    <link rel="stylesheet" type="text/css"
          href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
@stop


@section('title', 'Gerenciar pools')
@section('button-create', route('pool.create'))

@section('content')
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading clearfix">
                <h4 class="pull-left">@yield('title')</h4>
                <div class="pull-right">
                    <a href="@yield('button-create')" class="btn btn-sm btn-success"><span
                                class="fa fa-plus-circle"></span> @lang('button.create')</a>
                </div>
            </div>
            <div class="panel-heading clearfix">
                <form>
                    <fieldset>
                        <legend>Filtro:</legend>
                        <div class="row">
                            <div class="col-xs-6">
                                <select name="tipo_pool" aria-controls="table" class="form-control input-sm">
                                    @foreach (['' => 'Todos']+\App\TipoDePool::lists('descricao', 'id')->toArray() as $key => $val)
                                    <option {{ request('tipo_pool') == $key ? 'selected' : '' }}
                                            value="{{ $key }}">
                                        {{ $val }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-6">
                                <label>Filtrar por</label>
                                <div>
                                    @foreach(['' => 'Todos', 'reservados' => 'Apenas reservados', 'em_uso' => 'Apenas em uso'] as $key => $filtro)
                                        <label>
                                            <input type="radio" name="filter-only" value="{{ $key }}" {{ request('filter-only')==$key?'checked':'' }}>
                                            {{ $filtro }}
                                        </label>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <button class="btn btn-effect-ripple btn-primary">Filtrar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="panel-body">
                <table class="table" id="table">
                    <thead>
                    <tr class="filters">
                        {{--<th></th>--}}
                        <th>Nome</th>
                        <th>Tipo de Pool</th>
                        <th>Em uso</th>
                        <th>Reservado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($pools as $pool)
                        <tr>
                            {{--<td><input type="checkbox" name="pool_id" value="{{ $pool->id }}"></td>--}}
                            <td>{{ $pool->descricao }}</td>
                            <td>{{ $pool->tipoPool->descricao }}</td>
                            <td>{!! Form::checkbox('utilizado', 1, $pool->utilizado, ['disabled' => true]) !!}</td>
                            <td>
                                {!! Form::checkbox('reservado', 1, $pool->reservado, ['class' => 'reservado-input', $is_admin?'enabled':'disabled' => 1, 'data-route' => route('pool.update', [$pool->id])]) !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>

    <script>
        $(function () {

            $(document).ready(function () {
                $('#table').DataTable();
            });


            $(".reservado-input").change(function () {
                var reservado = $(this).is(':checked') ? 1 : 0;
                var url = $(this).attr('data-route');
                $.post(url, {
                    '_method': 'put',
                    '_token': '{{ csrf_token() }}',
                    'reservado': reservado
                }, function () {

                });
            });
        });
    </script>
@endsection