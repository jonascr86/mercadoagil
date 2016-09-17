@extends('layouts/default')

@section('title', "Perfil {$user->name}")

@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom_css/profile.css') }}" />
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-body">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="text-center mbl">
                                @if($user->pic)
                                    <img src="{!! url('/').'/uploads/users/'.$user->pic !!}" alt="img" class="img-circle img-bor"  width="150px" />
                                @else
                                    <img src="http://api.adorable.io/avatars/128/{!! $user->email !!}" alt="img" class="img-circle img-bor" />
                                @endif
                            </div>
                        </div>
                        <div align="center">
                            <h2>{!! $user->first_name !!} {!! $user->last_name !!}</h2>
                            <p>{!! $user->email !!}</p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="text-primary">User Name</td>
                                <td>{!! $user->first_name !!} {!! $user->last_name !!}</td>
                            </tr>
                            <tr>
                                <td class="text-primary">Email</td>
                                <td>{!! $user->email !!}</td>
                            </tr>
                            <tr>
                                <td class="text-primary">Status</td>
                                <td>
                                @if($user->deleted_at)
                                        <span class="label label-danger">Deleted</span>
                                @elseif($activation = Activation::completed($user))
                                        <span class="label label-success">Active</span>
                                @else
                                        <span class="label label-warning">Not Active</span>
                                @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
