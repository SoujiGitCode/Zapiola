@extends('layouts.template')
@section('content')
<!-- Breadcrumb Area -->
<div class="page-header">
   <div class="row">
      <div class="col-lg-6">
         <h3>Configuración</h3>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url('dashboard');?>" title="Escritorio" alt="Escritorio"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">SEO</li>
         </ol>
      </div>
   </div>
</div>
<div class="row" ng-app="myApp" ng-controller="opciones">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="card mb-30">
         <?php $settings = DB::table('settings')->where('id', '1')->first();  ?> 
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Actualiza aquí las etiquetas SEO de la aplicación</h3>
         </div>
         <div class="card-body">
         	<div class="card alert alert-primary" role="alert">
                  <h4 class="alert-heading">Tip!</h4>
                              <p>Las etiquetas meta en SEO, permiten comunicarnos con los motores de búsqueda.</p>
                </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="id" value="" id="id">


            <div class="form-group">
               <label>Meta Description en español<small style="color: #fd2923">*</small></label> 
               <textarea class="form-control" style="height: 100px"name="description" id="description" placeholder="Ingresa el contenido de la etiqueta" >{{$settings->description}}</textarea>   
            </div>
            <div class="form-group">
               <label class="active">Meta Keywords en español<small style="color: #fd2923">*</small></label> 
               <textarea class="form-control" style="height: 100px"name="keywords" id="keywords" placeholder="Ingresa el contenido de la etiqueta" >{{$settings->keywords}}</textarea>  
            </div>


            <div class="form-group">
               <label>Meta Description en inglés<small style="color: #fd2923">*</small></label> 
               <textarea class="form-control" style="height: 100px"name="description_en" id="description_en" placeholder="Ingresa el contenido de la etiqueta" >{{$settings->description_en}}</textarea>   
            </div>
            <div class="form-group">
               <label class="active">Meta Keywords en inglés<small style="color: #fd2923">*</small></label> 
               <textarea class="form-control" style="height: 100px"name="keywords_en" id="keywords_en" placeholder="Ingresa el contenido de la etiqueta" >{{$settings->keywords_en}}</textarea>  
            </div>





            <div class="form-group">
               <p style="color: #fd2923!important">Campos requeridos (*)</p>
            </div>
            <div class="form-group">
               <button class="btn btn-success" type="button" ng-click="updateseo()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   var app = angular.module('myApp', []);
   app.controller('opciones', function($scope, $http, $window) {
      //Update Email 
      $scope.updateseo = function() {
         //Validar Descrpcion
         if ($('#description').val() == "") {
            $.growl.error({ title: "<i class='fa fa-exclamation-circle'></i> Atención", message: "Ingresa la etiqueta description en español"});
            $('#description').focus();
            return (false);
         }
         // validar keywords
         else if ($('#keywords').val() == "") {
            $.growl.error({ title: "<i class='fa fa-exclamation-circle'></i> Atención", message: "Ingresa la etiqueta keywords en español"});
            $('#keywords').focus();
            return (false);
         }
         else if ($('#description_en').val() == "") {
            $.growl.error({ title: "<i class='fa fa-exclamation-circle'></i> Atención", message: "Ingresa la etiqueta description en inglés"});
            $('#description_en').focus();
            return (false);
         }
         // validar keywords
         else if ($('#keywords_en').val() == "") {
            $.growl.error({ title: "<i class='fa fa-exclamation-circle'></i> Atención", message: "Ingresa la etiqueta keywords en inglés"});
            $('#keywords_en').focus();
            return (false);
         }
         
         else {
            //Obtener Datos de los Campos
            var description = $('#description').val();
            var keywords = $('#keywords').val();
            var description_en = $('#description_en').val();
            var keywords_en = $('#keywords_en').val();
            var route = "{{url('update_options')}}";
            var token = $("#token").val();
            //Enviar Datos
            $.ajax({
               url: route,
               headers: {
                  'X-CSRF-TOKEN': token
               },
               type: 'POST',
               dataType: 'json',
               data: {
                  description: description,
                  keywords: keywords,
                  description_en: description_en,
                  keywords_en: keywords_en,
                  type: 'seo'
               },
               success: function(data) {
                 $.growl.warning({ title: "<i class='fa fa-exclamation-circle'></i> Atención", message:"Datos Actualizados"});
               },
                error: function(msj) {
                    $.growl.error({
                        title: "<i class='fa fa-exclamation-circle'></i> Error",
                        message: 'Ha ocurrido un error por favor intenta más tarde'
                    });
                }
            });
         }
      }
   });
</script>
@stop