@extends('layouts.template')
@section('content')
<!-- Breadcrumb Area -->
<div class="page-header">
   <div class="row">
      <div class="col-lg-6">
         <h3>Administradores</h3>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url('dashboard');?>" title="Escritorio" alt="Escritorio"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Nuevo usuario</li>
         </ol>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-6">
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Registra la información de tu usuario aquí</h3>
         </div>
         <div class="card-body">
            {!! Form::open(['route' => 'users.store','method' => 'POST']) !!}
            <div class="form-group">
               <label>Nombre <small style="color: #fd2923">*</small></label>
               {!!Form::text('name',null, ['class'=>'form-control','placeholder'=>'Ingresa el nombre'])!!}
            </div>
            <div class="form-group">
               <label>Correo electrónico <small style="color: #fd2923">*</small></label>
               {!!Form::text('email',null, ['class'=>'form-control','placeholder'=>'Ingresa el correo electrónico'])!!}
            </div>
            <div class="form-group">
               <label>Rol <small style="color: #fd2923">*</small></label>
               {!!Form::select('rol',$rol, null, ['placeholder' => 'Selecciona el rol','class'=>'form-control','style'=>'width: 100%'])!!}
            </div>
            <div class="form-group">
               <label>Contraseña <small style="color: #fd2923">*</small></label>
               {!!Form::text('password',$password,['class'=>'form-control'])!!}
            </div>
            <div class="form-group">
               <p style="color: #fd2923!important">Campos requeridos (*)</p>
            </div>
            <div class="form-group">
               {!!Form::label(' ')!!}
                <button  class="btn btn-success" id="enviar"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
            </div>
            {!! Form::close() !!}
         </div>
      </div>
   </div>
</div>
@stop