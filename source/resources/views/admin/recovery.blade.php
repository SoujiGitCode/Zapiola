@extends('layouts.template_recovery')
@section('content')
{!! Form::open(['id'=>'form','onsubmit'=>'return false','class'=>'theme-form']) !!}
<div class="form-group text-center">
   <h4 class="text-uppercase">Área Administrativa</h4>
   <p>Por favor ingresa tu correo electrónico para recuperar la contraseña</p>
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
<div class="form-group">
	  <label class="col-form-label">Correo electrónico</label>
   {!!Form::text('email',null,['id'=>'email-recovery','class' => 'form-control','placeholder'=>'Ingresa tu correo electrónico'])!!} 

</div>
<div class="form-group text-right">
   <div class="remember-forgot">
      <a href="<?php echo url('cms')?>" class="forgot-password">Iniciar Sesión</a>
   </div>
</div>
<div class="form-group text-right">
   {!!Form::button('Recuperar contraseña', ['id'=>'btn-recovery','class' => 'btn btn-primary btn_login'])!!}
</div>
{!! Form::close() !!}
@stop