@extends('layouts.template')
@section('content')
<!-- Breadcrumb Area -->
<div class="page-header">
   <div class="row">
      <div class="col-lg-6">
         <h3>Propiedades</h3>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url('dashboard');?>" title="Escritorio" alt="Escritorio"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Nueva propiedad</li>
         </ol>
      </div>
   </div>
</div>
{!! Form::open(['route' => 'properties.store','method' => 'POST']) !!}
<div class="row">
   <div class="col-md-12">
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Ingresa el detalle de tu propiedad aquí:</h3>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group" style="clear: both;">
                     <label class="active">Tipo de Propiedad <small style="color: #fd2923">*</small></label>                     
                     {!!Form::select('type',$types, null, ['placeholder' => 'Seleccionar tipo','class'=>'form-control','id'=>'type'])!!}
                  </div>
               </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group" style="clear: both;">
                     <label class="active">Título en español<small style="color: #fd2923">*</small></label>                     
                     {!!Form::text('title',null,['class' => 'form-control','placeholder'=>'Ingresa el título'])!!}
                  </div>
               </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="form-group" style="clear: both;">
                     <label class="active">Título en inglés<small style="color: #fd2923">*</small></label>                     
                     {!!Form::text('title_en',null,['class' => 'form-control','placeholder'=>'Ingresa el título'])!!}
                  </div>
               </div>
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group" style="clear: both;">
                     <label class="active">Dirección <small style="color: #fd2923">*</small></label>                     
                     {!!Form::text('address',null,['class' => 'form-control','placeholder'=>'Ingresa la dirección'])!!}
                  </div>
               </div>
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group" style="clear: both;">
                     <label class="active">Iframe de Google Maps <small style="color: #fd2923">*</small></label>                     
                     {!! Form::textarea('google_maps',null,['class'=>"form-control",'cols'=>'5','rows'=>'5']) !!}
                  </div>
               </div>
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                     <label>Descripción en español<small style="color: #fd2923">*</small><br></label> 
                     <br>
                  </div>
                  <div class="form-group"> 
                     {!! Form::textarea('content',null,['class'=>"materialize-textarea",'cols'=>'5','rows'=>'5','id'=>'editor1']) !!}
                  </div>
               </div>
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                     <label>Descripción en inglés<small style="color: #fd2923">*</small><br></label> 
                     <br>
                  </div>
                  <div class="form-group"> 
                     {!! Form::textarea('content_en',null,['class'=>"materialize-textarea",'cols'=>'5','rows'=>'5','id'=>'editor2']) !!}
                  </div>
               </div>
               <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group" style="clear: both;">
                     <label class="active">Area <small style="color: #fd2923">*</small></label>                     
                     {!!Form::text('area',null,['class' => 'form-control','placeholder'=>'Ingresa el número de metros cuadrados'])!!}
                  </div>
               </div>
               <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group" style="clear: both;">
                     <label class="active">Habitaciones <small style="color: #fd2923">*</small></label>                     
                     {!!Form::text('bedroom',null,['class' => 'form-control','placeholder'=>'Ingresa el número de habitaciones'])!!}
                  </div>
               </div>
               <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group" style="clear: both;">
                     <label class="active">Baños <small style="color: #fd2923">*</small></label>                     
                     {!!Form::text('bathroom',null,['class' => 'form-control','placeholder'=>'Ingresa el número de baños'])!!}
                  </div>
               </div>
               <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group" style="clear: both;">
                     <label class="active">Cocina <small style="color: #fd2923">*</small></label>                     
                     {!!Form::text('kitchen',null,['class' => 'form-control','placeholder'=>'Ingresa el número de cocinas'])!!}
                  </div>
               </div>
               <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group" style="clear: both;">
                     <label class="active">Garaje <small style="color: #fd2923">*</small></label>                     
                     {!!Form::text('garage',null,['class' => 'form-control','placeholder'=>'Ingresa el número de garajes'])!!}
                  </div>
               </div>
               <div class="col-md-3 col-sm-3 col-xs-12">
                  <div class="form-group" style="clear: both;">
                     <label class="active">Precio <small style="color: #fd2923">*</small></label>                     
                     {!!Form::text('price',null,['class' => 'form-control','placeholder'=>'Ingresa el precio'])!!}
                  </div>
               </div>
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                     <label class="active">Seleccione los servicios de su propiedad: </label>
                  </div>
                  <div class="form-group">
                     @foreach($amenities as $rs)
                     <div class="demo">
                        <input type="checkbox" id="c-<?php echo $rs->id;?>" name="amenities[]" value="<?php echo $rs->id;?>">
                        <label for="c-<?php echo $rs->id;?>"><span></span><?php echo $rs->name;?></label>
                     </div>
                     @endforeach
                  </div>
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
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Galería (Ingrese las imagenes de su propiedad aquí)</h3>
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