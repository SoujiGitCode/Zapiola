@extends('layouts.template')
@section('content')
<!-- Breadcrumb Area -->
<div class="page-header">
   <div class="row">
      <div class="col-lg-6">
         <h3>Administradores</h3>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url('dashboard');?>" title="Escritorio" alt="Escritorio"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Permisos</li>
         </ol>
      </div>
   </div>
</div>
<div class="row" ng-app="myApp" ng-controller="permission">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
   <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Actualiza los permisos del {{$rol->name}} </h3>
         </div>
         <div class="card-body">

          <ul class="exclude list">
                        <li class="uk-nestable-item" ng-repeat-start="modulo in list">
                           <div class="row">
                              <div class="col-md-8 col-sm-8 col-xs-8">
                                 <p class="tct"><i class="@{{modulo.class}}" ></i>  @{{ modulo.nombre }}</p>
                              </div>
                              <div class="col-md-4 col-sm-4 col-xs-4 text-right">
                                
                                

                                 <button class="btn btn-pill btn-outline-success-2x" type="button" data-original-title="btn btn-pill btn-outline-success-2x" title="" aria-describedby="tooltip963901" title="Activar" ng-click="asignarmodulo(modulo.id_modulo)" ng-if="modulo.status == 2" >Activar</button>
                                

                                 <button title="Desactivar" class="btn btn-pill btn-outline-secondary disabled" type="button" data-original-title="btn btn-pill btn-outline-secondary disabled" ng-click="retirarmodulo(modulo.id_modulo)" ng-if="modulo.status == 1">Desactivar</button>
                               
                              </div>
                           </div>
                        </li>
                        <ul class="exclude list">
                           <li class="uk-nestable-item"  ng-repeat="submodulo in modulo.submodulo">
                              <div class="row">
                                 <div class="col-md-8 col-sm-8 col-xs-8">
                                     <p class="tct"> @{{ submodulo.nombre }} </p>
                                 </div>
                                 <div class="col-md-4 col-sm-4 col-xs-4 text-right">


                                   <button class="btn btn-pill btn-outline-success-2x" type="button" data-original-title="btn btn-pill btn-outline-success-2x" title="" aria-describedby="tooltip963901" title="Activar" ng-click="asignarsubmodulo(submodulo.id,modulo.status)" ng-if="submodulo.status == 2" >Activar</button>
                                

                                 <button  class="btn btn-pill btn-outline-secondary disabled" type="button" data-original-title="btn btn-pill btn-outline-secondary disabled" title="Desactivar" ng-click="retirarsubmodulo(submodulo.id,modulo.status)" ng-if="submodulo.status == 1">Desactivar</button>
                                   
                                
                                   
                                 </div>
                              </div>
                           </li>
                        </ul>
                        <br>
                        </li>
                        <li ng-repeat-end style="list-style: none;"></li>
           
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   var app = angular.module('myApp', []);
app.controller('permission', function($scope, $http, $window) {
    $scope.rows = function() {
        $scope.list = [];
        $http.get("{{url('permission_lists/'.$rol->id)}}").then(function successCallback(response)  {
          console.log(response.data);
           $scope.list = response.data;
        });
    }
    $scope.rows();
    $scope.asignarmodulo = function(module) {
        var route = "{{url('assign')}}";
        var token = $("#token").val();
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            dataType: 'json',
            data: {
                'role': '{{$rol->id}}',
                'module': module,
                'type': '1'
            },
            success: function(data) {
                $.growl.notice({
                    title: "<i class='fa fa-exclamation-circle'></i> Atención",
                    message: "Módulo activado"
                });
                $scope.rows();
            },
            error: function(msj) {
                $.growl.error({
                    title: "<i class='fa fa-exclamation-circle'></i> Error",
                    message: 'Ha ocurrido un error por favor intentá más tarde'
                });
            }
        });
    }
    $scope.retirarmodulo = function(module) {
        var route = "{{url('remove')}}";
        var token = $("#token").val();
        $.ajax({
            url: route,
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'POST',
            dataType: 'json',
            data: {
                'role': '{{$rol->id}}',
                'module': module,
                'type': '1'
            },
            success: function(data) {
                $.growl.error({
                    title: "<i class='fa fa-exclamation-circle'></i> Atención",
                    message: "Módulo desactivado"
                });
                $scope.rows();
            },
            error: function(msj) {
                $.growl.error({
                    title: "<i class='fa fa-exclamation-circle'></i> Error",
                    message: 'Ha ocurrido un error por favor intentá más tarde'
                });
            }
        });
    }
    $scope.asignarsubmodulo = function(id, modulo) {
        if (modulo != 2) {
            var route = "{{url('assign')}}";
            var token = $("#token").val();
            $.ajax({
                url: route,
                headers: {
                    'X-CSRF-TOKEN': token
                },
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    'type': '2'
                },
                success: function(data) {
                    $.growl.notice({
                        title: "<i class='fa fa-exclamation-circle'></i> Atención",
                        message: "Módulo activado"
                    });
                    $scope.rows();
                },
                error: function(msj) {
                    $.growl.error({
                        title: "<i class='fa fa-exclamation-circle'></i> Error",
                        message: 'Ha ocurrido un error por favor intentá más tarde'
                    });
                }
            });
        }
    }
    $scope.retirarsubmodulo = function(id, modulo) {
        if (modulo != 2) {
            var route = "{{url('remove')}}";
            var token = $("#token").val();
            $.ajax({
                url: route,
                headers: {
                    'X-CSRF-TOKEN': token
                },
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    'type': '2'
                },
                success: function(data) {
                    $.growl.error({
                        title: "<i class='fa fa-exclamation-circle'></i> Atención",
                        message: "Módulo desactivado"
                    });
                    $scope.rows();
                },
                error: function(msj) {
                    $.growl.error({
                        title: "<i class='fa fa-exclamation-circle'></i> Error",
                        message: 'Ha ocurrido un error por favor intentá más tarde'
                    });
                }
            });
        }
    }
});
</script>
@stop