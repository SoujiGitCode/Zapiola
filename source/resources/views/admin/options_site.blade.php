@extends('layouts.template')
@section('content')
<!-- Breadcrumb Area -->
<div class="page-header">
   <div class="row">
      <div class="col-lg-6">
         <h3>Configuración</h3>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url('dashboard');?>" title="Escritorio" alt="Escritorio"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Nombre/Logos</li>
         </ol>
      </div>
   </div>
</div>
<div class="row" ng-app="myApp" ng-controller="opciones">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="card mb-30">
         <?php $settings = DB::table('settings')->where('id', '1')->first();  ?> 
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Actualiza aquí el nombre del sitio</h3>
         </div>
         <div class="card-body">
            <div class="card alert alert-primary" role="alert">
               <h4 class="alert-heading">Tip!</h4>
               <p>Título de la página web, es un texto que describe lo que encontraremos dentro de la página.</p>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="id" value="" id="id">
            <div class="form-group">
               <label class="active">Nombre del sitio en español<small style="color: #fd2923">*</small></label>
               <input  type="text" id="name" value="{{$settings->name}}" class="form-control" placeholder="Ingresa el nombre" >
            </div>


            <div class="form-group">
               <label class="active">Nombre del sitio en inglés<small style="color: #fd2923">*</small></label>
               <input  type="text" id="name_en" value="{{$settings->name_en}}" class="form-control" placeholder="Ingresa el nombre" >
            </div>

            <div class="form-group">
               <p style="color: #fd2923!important">Campos requeridos (*)</p>
            </div>
            <div class="form-group">
               <button class="btn btn-success" type="button" ng-click="update_settings()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Actualiza aquí el logo  del sitio (Cabecera)</h3>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-8 col-sm-8 col-xs-12 text-center">
                  <input name="image" id="image" value="" type="hidden">
                  <div id="dropzone" class="dropzone" style="min-height: 150px"></div>
                   <p>Suelta tu imagen aquí. 1 MB de tamaño máximo permitido</p>
               </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                  <img src="{{url('/')}}/uploads/{{$settings->image}}" alt="Photo" style='max-width: 100%;auto;display: block;padding: 3px'>
               </div>
            </div>
            <div class="form-group">
               <br>
               <button class="btn btn-success" ng-click="updatelogo()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
            </div>
         </div>
      </div>
   </div>

   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Actualiza aquí el logo del sitio (Footer)</h3>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-8 col-sm-8 col-xs-12 text-center">
                  <input name="image" id="image-1" value="" type="hidden">
                  <div id="dropzone-1" class="dropzone" style="min-height: 150px"></div>
                   <p>Suelta tu imagen aquí. 1 MB de tamaño máximo permitido</p>
               </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                  <img src="{{url('/')}}/uploads/{{$settings->image_1}}" alt="Photo" style='max-width: 100%;auto;display: block;padding: 3px'>
               </div>
            </div>
            <div class="form-group">
               <br>
               <button class="btn btn-success" ng-click="updatelogo1()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
 var app = angular.module('myApp', []);
app.controller('opciones', function($scope, $http, $window) {

    //Update Nombre del sitio
    $scope.update_settings = function() {
        //validar que el nombre este lleno
        if ($('#name').val() == "") {
            $.growl.error({
                title: "<i class='fa fa-exclamation-circle'></i> Atención",
                message: "Ingresa el nombre del sitio en español"
            });
            $('#name').focus();
            return (false);
        }
        else if ($('#name_en').val() == "") {
            $.growl.error({
                title: "<i class='fa fa-exclamation-circle'></i> Atención",
                message: "Ingresa el nombre del sitio en inglés"
            });
            $('#name_en').focus();
            return (false);
        } 
        else {
            //Obtener Datos
            var name = $('#name').val();
            var name_en = $('#name_en').val();
            var route = "{{url('update_options')}}";
            var token = $("#token").val();
            $.ajax({
                url: route,
                headers: {
                    'X-CSRF-TOKEN': token
                },
                type: 'POST',
                dataType: 'json',
                data: {
                    name: name,
                    name_en: name_en,
                    type: 'name'
                },
                success: function(data) {
                    $.growl.warning({
                        title: "<i class='fa fa-exclamation-circle'></i> Atención",
                        message: "Datos Actualizados"
                    });
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


    //Update Logo
    $scope.updatelogo1 = function() {
        //Validar que ingrese un image
        if ($("#image-1").val() == "") {
            $.growl.error({
                title: "<i class='fa fa-exclamation-circle'></i> Error",
                message: "Ingresa una imagen"
            });
            $("#image-1").focus();
            return (false);
        } else {
            //obtener Datos
            var route = "{{url('update_options')}}";
            var image = $("#image-1").val();
            image = image.replace(',', "");
            var token = $("#token").val();
            //enviar Datos
            $.ajax({
                url: route,
                headers: {
                    'X-CSRF-TOKEN': token
                },
                type: 'POST',
                dataType: 'json',
                data: {
                    image: image,
                    type: 'image-1'
                },
                success: function(data) {
                    $.growl.warning({
                        title: "<i class='fa fa-exclamation-circle'></i> Atención",
                        message: "Datos Actualizados"
                    });
                    location.reload();
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




    //Update Logo
    $scope.updatelogo = function() {
        //Validar que ingrese un image
        if ($("#image").val() == "") {
            $.growl.error({
                title: "<i class='fa fa-exclamation-circle'></i> Error",
                message: "Ingresa una imagen"
            });
            $("#image").focus();
            return (false);
        } else {
            //obtener Datos
            var route = "{{url('update_options')}}";
            var image = $("#image").val();
            image = image.replace(',', "");
            var token = $("#token").val();
            //enviar Datos
            $.ajax({
                url: route,
                headers: {
                    'X-CSRF-TOKEN': token
                },
                type: 'POST',
                dataType: 'json',
                data: {
                    image: image,
                    type: 'image'
                },
                success: function(data) {
                    $.growl.warning({
                        title: "<i class='fa fa-exclamation-circle'></i> Atención",
                        message: "Datos Actualizados"
                    });
                    location.reload();
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