@extends('layouts.template')
@section('content')
<!-- Breadcrumb Area -->
<div class="page-header">
   <div class="row">
      <div class="col-lg-6">
         <h3>Widgets</h3>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url('dashboard');?>" title="Escritorio" alt="Escritorio"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Nuevo widget</li>
         </ol>
      </div>
   </div>
</div>
{!! Form::open(['route' => 'widgets.store','method' => 'POST']) !!}
<div class="row">
   <div class="col-md-12">
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Ingresa el contenido de tu widget aquí</h3>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                 
                  <div class="form-group" style="clear: both;">
                     <label class="active">Título <small style="color: #fd2923">*</small></label>                     
                     {!!Form::text('title',null,['class' => 'form-control','placeholder'=>'Ingresa el título'])!!}
                  </div>
                  <div class="form-group">
                     <label>Contenido <small style="color: #fd2923">*</small><br></label> 
                     <br>
                  </div>
                  <div class="form-group"> 
                     {!! Form::textarea('content',null,['class'=>"materialize-textarea",'cols'=>'5','rows'=>'5','id'=>'editor1']) !!}
                  </div>
               </div>
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                     <br>
                     <p style="color: #fd2923!important">Campos requeridos (*)</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Galería (Actualiza aquí las imagenes de tu sección)</h3>
         </div>
         <div class="card-body">
            <div class="form-group text-center">
               <input name="image" id="image" value="" type="hidden">
               <div id="dropzone-thumb" class="dropzone"></div>
               <p>Suelta tu imagen aquí. 1 MB de tamaño máximo permitido</p>
            </div>
         </div>
      </div>
      <div class="col-md-12 text-center">
         <button  class="btn btn-success" id="enviar"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button> <br><br>
      </div>
   </div>
</div>
{!! Form::close() !!}
<script type="text/javascript">
   $( "#enviar" ).click(function() {
      $("#enviar").prop('disabled', true);
      $("form").submit();
      });
</script>
@stop