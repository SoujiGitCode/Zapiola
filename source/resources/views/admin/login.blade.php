@extends('layouts.template_login')
@section('content')
{!! Form::open(['id'=>'form','onsubmit'=>'return false','class'=>'theme-form']) !!}
<div class="form-group text-center">
   <h4 class="text-uppercase">Área Administrativa</h4>
   <p>Por favor ingresa tu correo y contraseña</p>
</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
<div class="form-group">
   <label class="col-form-label">Correo electrónico</label>
   {!!Form::text('email',null,['id'=>'email','class' => 'form-control','placeholder'=>'Ingresa tu correo electrónico'])!!} 
</div>
<div class="form-group">
   <label class="col-form-label">Contraseña</label>
   {!!Form::password('password', ['id'=>'password','class' => 'form-control','placeholder'=>'Ingresa tu contraseña'])!!} 
</div>
<div class="form-group text-right">
   <div class="remember-forgot">
      <a href="<?php echo url('recover-password')?>" class="forgot-password">¿Olvidaste tu contraseña?</a>
   </div>
</div>
<div class="form-group text-right">
   {!!Form::button('Ingresar', ['id'=>'entrar','class' => 'btn btn-primary btn_login'])!!}
</div>
{!! Form::close() !!}
<script type="text/javascript">
   history.pushState(null, null, null);
   window.addEventListener('popstate', function() {
       history.pushState(null, null, null);
   });
   (function(global) {
       if (typeof(global) === "undefined") {
           throw new Error("window is undefined");
       }
       var _hash = "!";
       var noBackPlease = function() {
           global.location.href += "#";
           global.setTimeout(function() {
               global.location.href += "!";
           }, 50);
       };
       global.onhashchange = function() {
           if (global.location.hash !== _hash) {
               global.location.hash = _hash;
           }
       };
       global.onload = function() {
           noBackPlease();
           document.body.onkeydown = function(e) {
               var elm = e.target.nodeName.toLowerCase();
               if (e.which === 8 && (elm !== 'input' && elm !== 'textarea')) {
                   e.preventDefault();
               }
               e.stopPropagation();
           };
       };
   })(window);
   
</script>
@stop