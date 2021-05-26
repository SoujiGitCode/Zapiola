@extends('layouts.template')
@section('content')
<!-- Breadcrumb Area -->
<div class="page-header">
   <div class="row">
      <div class="col-lg-6">
         <h3>Secciones</h3>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url('dashboard');?>" title="Escritorio" alt="Escritorio"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Bloques del sitio</li>
         </ol>
      </div>
   </div>
</div>
{!!Form::model($section,['route'=>['sections.update',$section],'method'=>'PUT'])!!}
<div class="row" ng-app="myApp" ng-controller="paginas">
   <div class="col-md-12">
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Actualiza el contenido de tu bloque aquí</h3>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="col-md-12">
                     <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#img-2" class="active show"><img src="{{url('/')}}/uploads/backend/es.png" style="width:25px;float:none" /> Español </a></li>
                        <li ><a data-toggle="tab" href="#img-1"><img src="{{url('/')}}/uploads/backend/en.png" style="width:25px;float:none" /> Inglés </a></li>
                     </ul>
                     <div class="tab-content">
                        <div id="img-2" class="tab-pane in active ">
                           <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                 <br>
                                 <div class="form-group">
                                    <label class="active">Título en español<small style="color: #fd2923">*</small></label>                     
                                    {!!Form::text('title',null,['class' => 'form-control','placeholder'=>'Ingresa el título'])!!}
                                 </div>
                                 <div class="form-group">
                                    <label class="active">Subtítulo en español<small style="color: #fd2923">*</small></label>                     
                                    {!!Form::text('subtitle',null,['class' => 'form-control','placeholder'=>'Ingresa el subtítulo'])!!}
                                 </div>
                                 <div class="form-group">
                                    <label>Contenido en español<small style="color: #fd2923">*</small><br></label> 
                                    <br>
                                 </div>
                                 <div class="form-group"> 
                                    {!! Form::textarea('content',null,['class'=>"materialize-textarea",'cols'=>'5','rows'=>'5','id'=>'editor1']) !!}
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-6">
                                 <div class="form-group">
                                    <label class="active">Nombre del Botón en español</label>                     
                                    {!!Form::text('button_name',null,['class' => 'form-control','placeholder'=>'Ingresa el nombre del botón'])!!}
                                 </div>
                              </div>
                              <div class="col-md-6 col-sm-6 col-xs-6">
                                 <div class="form-group">
                                    <label class="active">Url del Botón en español</label>
                                    {!!Form::text('button_url',null,['class' => 'form-control','placeholder'=>'Ingresa la url del botón'])!!}
                                 </div>
                              </div>
                           </div>
                        </div>
                     <div id="img-1" class="tab-pane fade">
                        <div class="row">
                           <div class="col-md-12 col-sm-12 col-xs-12">
                              <br>
                              <div class="form-group">
                                 <label class="active">Título en inglés<small style="color: #fd2923">*</small></label>                     
                                 {!!Form::text('title_en',null,['class' => 'form-control','placeholder'=>'Ingresa el título'])!!}
                              </div>
                              <div class="form-group">
                                 <label class="active">Subtítulo en inglés<small style="color: #fd2923">*</small></label>                     
                                 {!!Form::text('subtitle_en',null,['class' => 'form-control','placeholder'=>'Ingresa el subtítulo'])!!}
                              </div>
                              <div class="form-group">
                                 <label>Contenido en inglés<small style="color: #fd2923">*</small><br></label> 
                                 <br>
                              </div>
                              <div class="form-group"> 
                                 {!! Form::textarea('content_en',null,['class'=>"materialize-textarea",'cols'=>'5','rows'=>'5','id'=>'editor2']) !!}
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6 col-xs-6">
                              <div class="form-group">
                                 <label class="active">Nombre del Botón en inglés</label>                     
                                 {!!Form::text('button_name_en',null,['class' => 'form-control','placeholder'=>'Ingresa el nombre del botón'])!!}
                              </div>
                           </div>
                           <div class="col-md-6 col-sm-6 col-xs-6">
                              <div class="form-group">
                                 <label class="active">Url del Botón en inglés</label>
                                 {!!Form::text('button_url_en',null,['class' => 'form-control','placeholder'=>'Ingresa la url del botón'])!!}
                              </div>
                           </div>
                        </div>
                     </div>
                   </div>
                  </div>
               </div>
               <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="demo">
                     <input type="checkbox" id="demo" name="status_content" @if($section->status_content=='0') checked="checked" @endif value="1">
                     <label for="demo"><span></span>Ocultar titulos del Bloque</label>
                  </div>
               </div>
               <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="demo">
                     <input type="checkbox" id="demo-1" name="status" @if($section->status=='0') checked="checked" @endif value="1">
                     <label for="demo-1"><span></span>Ocultar todo el bloque</label>
                  </div>
               </div>
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                     <br>
                     <label style="color: #e1000a!important">Campos requeridos (*)</label><br>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Imagen (Actualiza aquí las imagenes de tu sección)</h3>
         </div>
         <div class="card-body">
            <div class="form-group text-center">
               <input name="image" id="image" value="{{$section->image}}" type="hidden">
               <div id="dropzone-thumb" class="dropzone"></div>
               <p>Suelta tu imagen aquí. 1 MB de tamaño máximo permitido</p>
            </div>
            <div class="row">
               <div class="col-md-3 col-sm-3 col-xs-12" ng-repeat="photo in data">
                  <br>
                  <img src="<?php echo url('/');?>/uploads/@{{photo.nombre}}" alt="Photo"  alt="Photo" style='display: block;border: 0.5px solid #ddd; width: 50%'>
                  <a style="cursor:pointer;font-size: 13px; color: #fd2923" ng-click="borrar(photo.nombre)" class="red-text"><i class="fa fa-times red-text"></i> Eliminar</a>
               </div>
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
   var app = angular.module('myApp', []);
   app.controller('paginas', function($scope, $http) {
     $scope.rows = function() {
       $scope.data = [];
       $http.post("{{url('/')}}/lists-photo-section", {
         'id': <?=$section->id;?>
       })
       .then(function successCallback(response)  {
         $scope.data = response.data;
       });
     }
     $scope.rows();
     $scope.borrar = function(name) {
       swal({
         title: "¿Deseas eliminar este registro?",
          text: "",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: '#fd2923',
          confirmButtonText: 'Si eliminar',
          cancelButtonText: 'Cancelar',
          closeOnConfirm: true
       },
       function() {
         var route = "{{url('delete-photo-section')}}";
         var token = $("#token").val();
         var image = $("#image").val();
         var patron = "," + name;
         image = image.replace(patron, '');
         $("#image").val(image);
         $.ajax({
           url: route,
           headers: {
             'X-CSRF-TOKEN': token
           },
           type: 'POST',
           dataType: 'json',
           data: {
             image: image,
             id: '<?=$section->id;?>'
           },
           success: function() {
                $.growl.error({ title: "<i class='fa fa-exclamation-circle'></i> Atención", message: "Registro eliminado"});
             $scope.rows();
           }
         });
       });
     }
   
   });
   $( "#enviar" ).click(function() {
   $("#enviar").prop('disabled', true);
   $("form").submit();
   });
</script>
@stop