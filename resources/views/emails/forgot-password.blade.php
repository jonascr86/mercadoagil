@extends('emails/layouts/default')

@section('content')
<p>Olá {!! $user->first_name !!} {!! $user->last_name !!},</p>

<p>Por favor, clique no seguinte link para atualizar sua senha:</p>

<p><a href="{!! $forgotPasswordUrl !!}">{!! $forgotPasswordUrl !!}</a></p>

<p>Atenciosamente,</p>

<p>SOFIA</p>
@stop
