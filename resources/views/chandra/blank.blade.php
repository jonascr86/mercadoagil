@extends('chandra/default')

{{-- Page title --}}
@section('title')
    Blank Page
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Blank</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-fw fa-home"></i>
                    Dashboard
                </a>
            </li>
            <li>Pages</li>
            <li>
                <a href="blank">Blank</a>
            </li>
        </ol>
    </section>
    <section class="content">
        {!! Form::textBox('test', 'test', 'test') !!}
        {{-- Uncomment below code if you want to display right sidebar --}}
        {{-- @include('admin.layouts.right_sidebar') --}}
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop
