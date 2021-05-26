@extends('layouts.template')
@section('content')
<!-- Breadcrumb Area -->
<div class="page-header">
   <div class="row">
      <div class="col-lg-6">
         <h3>Configuración</h3>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url('dashboard');?>" title="Escritorio" alt="Escritorio"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Información de contacto</li>
         </ol>
      </div>
   </div>
</div>
<div class="row" ng-app="myApp" ng-controller="opciones">
  <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
   <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Actualiza aquí tu correo electrónico de contacto</h3>
         </div>
         <div class="card-body">
            <?php $settings = DB::table('settings')->where('id', '1')->first();  ?> 
            
            <div class="form-group">
               <label><i class="fa fa-envelope-o"></i> Correo electrónico <small style="color: #fd2923">*</small></label>
               <input  type="text" class="form-control" id="email" value="{{$settings->email}}" placeholder="Ingresa el correo electrónico" >
            </div>

             <div class="form-group">
               <label><i class="fa fa-phone"></i> Teléfono <small style="color: #fd2923">*</small></label>
               <input  type="text" class="form-control" id="phone" value="{{$settings->phone}}" placeholder="Ingresa el número de teléfono" >
            </div>

            <div class="form-group">
               <label><i class="fa fa-map-marker" aria-hidden="true"></i> Dirección <small style="color: #fd2923">*</small></label>
               <input  type="text" class="form-control" id="address" value="{{$settings->address}}" placeholder="Ingresa la dirección" >
            </div>


            <div class="form-group">
               <label><i class="fa fa-clock-o"></i> Horarios de atención en español <small style="color: #fd2923">*</small></label>
               <input  type="text" class="form-control" id="shedule" value="{{$settings->shedule}}" placeholder="Ingresa el horario" >
            </div>


            <div class="form-group">
               <label><i class="fa fa-clock-o"></i> Horarios de atención en inglés <small style="color: #fd2923">*</small></label>
               <input  type="text" class="form-control" id="shedule_en" value="{{$settings->shedule_en}}" placeholder="Ingresa el horario" >
            </div>
           
            
            <div class="form-group">
               <p style="color: #fd2923!important">Campos requeridos (*)</p>
            </div>
            <div class="form-group">
               <button class="btn btn-success" ng-click="updatecontact()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Actualiza aquí tus redes sociales</h3>
         </div>
         <div class="card-body">
            <div class="form-group">
               <label><i class="fa fa-facebook "></i> Facebook </label>
               <input name="facebook" type="text" class="form-control" id="facebook" value="{{$settings->facebook}}" placeholder="Ingresa la url de facebook" >
            </div>
            <div class="form-group">
               <label><i class="fa fa-twitter "></i> Twitter </label>
               <input name="twitter" type="text" class="form-control" id="twitter" value="{{$settings->twitter}}" placeholder="Ingresa la url de twitter"  >
            </div>
            <div class="form-group">
               <label><i class="fa fa-instagram "></i> Instagram </label>
               <input name="instagram" type="text" class="form-control" id="instagram" value="{{$settings->instagram}}" placeholder="Ingresa la url de instagram"  >
            </div>
            <div class="form-group">
               <p style="color: #fd2923!important">Campos requeridos (*)</p>
            </div>
            <div class="form-group">
               <button class="btn btn-success" ng-click="updatesocial()"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
            </div>
         </div>
      </div>
   </div>
 </div>
</div>
</div>
<script type="text/javascript">
   var app = angular.module('myApp', []);
app.controller('opciones', function($scope, $http, $window) {

    $scope.updatesocial = function() {
        //Validar facebook

        //Obtener Datos 
        var facebook = $("#facebook").val();
        var instagram = $("#instagram").val();
        var twitter = $("#twitter").val();
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
                facebook: facebook,
                instagram: instagram,
                twitter: twitter,
                type: 'network'
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

    $scope.updatecontact = function() {
        if ($('#email').val() == "") {
            $.growl.error({
                title: "<i class='fa fa-exclamation-circle'></i> Error",
                message: "Ingresa el correo electrónico"
            });
            $('#email').focus();
            return (false);
        }
        else if ($('#phone').val() == "") {
            $.growl.error({
                title: "<i class='fa fa-exclamation-circle'></i> Error",
                message: "Ingresa el teléfono"
            });
            $('#phone').focus();
            return (false);
        }
        else if ($('#address').val() == "") {
            $.growl.error({
                title: "<i class='fa fa-exclamation-circle'></i> Error",
                message: "Ingresa la dirección"
            });
            $('#address').focus();
            return (false);
        }
        else if ($('#shedule').val() == "") {
            $.growl.error({
                title: "<i class='fa fa-exclamation-circle'></i> Error",
                message: "Ingresa el horario de atención en español"
            });
            $('#shedule').focus();
            return (false);
        }
        else if ($('#address').val() == "") {
            $.growl.error({
                title: "<i class='fa fa-exclamation-circle'></i> Error",
                message: "Ingresa el horario de atención en inglés"
            });
            $('#address').focus();
            return (false);
        }

        else {
            //Obtener Datos
            var email = $('#email').val();
            var phone = $('#phone').val();
            var address = $('#address').val();
            var shedule = $('#shedule').val();
            var shedule_en = $('#shedule_en').val();
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
                    email: email,
                    phone: phone,
                    address: address,
                    shedule: shedule,
                    shedule_en: shedule_en,
                    type: 'contact'
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