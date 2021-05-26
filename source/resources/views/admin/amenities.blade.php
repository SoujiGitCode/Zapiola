@extends('layouts.template')
@section('content')
<!-- Breadcrumb Area -->
<div class="page-header">
   <div class="row">
      <div class="col-lg-6">
         <h3>Propiedades</h3>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url('dashboard');?>" title="Escritorio" alt="Escritorio"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Comodidades</li>
         </ol>
      </div>
   </div>
</div>
<div class="row" ng-app="myApp" ng-controller="role">
   <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>@{{titulo}}</h3>
         </div>
         <div class="card-body">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="id" value="" id="id">
            <div class="form-group">
               <label>Nombre en español<small style="color: #fd2923">*</small></label>
               {!!Form::text('name',null,['id'=>'name','class'=>'form-control','placeholder'=>'Ingresa el nombre'])!!}
               <span class="md-input-bar "></span>
            </div>

            <div class="form-group">
               <label>Nombre en inglés<small style="color: #fd2923">*</small></label>
               {!!Form::text('name_en',null,['id'=>'name_en','class'=>'form-control','placeholder'=>'Ingresa el nombre en inglés'])!!}
               <span class="md-input-bar "></span>
            </div>
            <div class="form-group">
               <p style="color: #fd2923!important">Campos requeridos (*)</p>
            </div>
            <div class="form-group">
               <button class="btn btn-success btn-block" ng-click="guardar()"><i class="fa fa-floppy-o" aria-hidden="true"></i>  @{{btn}}</button>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-8 col-sm-8 col-xs-12">
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Listado de Comodidades</h3>
         </div>
         <div class="card-body">
            <table width="100%" class="table">
               <thead>
                  <tr>
                     <th></th>
                     <th>
                        <div class="text-center">Nombre</div>
                     </th>
                     <th>
                        <div class="text-center">Registro</div>
                     </th>
                     <th></th>
                  </tr>
               </thead>
               <tbody id="navsm">
                  <tr ng-repeat="row in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit"  id="item_@{{row.id}}">
                     <td><i class="fa fa-arrows"></i></td>
                     <td  class="text-center" style="vertical-align: middle;"> @{{row.name}} </td>
                     <td  class="text-center" style="vertical-align: middle;">  @{{row.created_at | date : MM/dd/yyyy }} </td>
                     <td  class="text-center" style="vertical-align: middle; text-align: right;">
                        <a ng-click="asignarValor(row.id,row.name,row.name_en)"  title="Editar" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Editar </a>
                         <a  ng-click="borrar(row.id);" class="btn btn-danger  btn-sm" title="Eliminar"><i class="fa fa-times"></i> Eliminar</a>
                     </td>
                  </tr>
                  <tr ng-show="filteredItems == 0" >
                     <td colspan="5">
                        <p class="text-italic"><i data-feather="alert-circle"></i> No hay resultados para mostrar</p>
                     </td>
                  </tr>
               </tbody>
            </table>
            <nav>
               <ul class="pagination" ng-show="filteredItems > 0">
                  <li  pagination="" page="currentPage" on-select-page="setPage(page)" total-items="filteredItems" items-per-page="entryLimit" class="page-item" previous-text="&laquo;" next-text="&raquo;"></li>
               </ul>
            </nav>
            <p ng-show="filteredItems != 0" ><br>@{{totalItems}} Registro(s) encontrado(s)</p>
         </div>
      </div>
   </div>
</div>
<!-- Content Area -->
<script type="text/javascript">
    var app = angular.module('myApp', ['ui.bootstrap']);
    app.filter('startFrom', function() {
        return function(input, start) {
            if (input) {
                start = +start;
                return input.slice(start);
            }
            return [];
        }
    });
    app.controller('role', function($scope, $http, $window) {
        $scope.titulo = "Nueva Comodidades";
        $scope.btn = "Guardar";
        $scope.rows = function() {
            $http.get('{{url("amenities_lists")}}').then(function successCallback(response)   {
                $scope.list = response.data;
                $scope.currentPage = 1;
                $scope.entryLimit = 20;
                $scope.filteredItems = $scope.list.length;
                $scope.totalItems = $scope.list.length;
            });
        }
        $scope.rows();
        $scope.setPage = function(pageNo) {
            $scope.currentPage = pageNo;
        };
        $scope.filter = function() {
            $scope.filteredItems = $scope.filtered.length;
            $scope.totalItems = $scope.filtered.length
        };
        $scope.sort_by = function(predicate) {
            $scope.predicate = predicate;
            $scope.reverse = !$scope.reverse;
        };
        $scope.guardar = function() {
            var id = $("#id").val();
            var name = $('#name').val();
            var name_en = $('#name_en').val();
            var token = $("#token").val();
            if (name == "") {
                $.growl.error({ title: "<i class='fa fa-exclamation-circle'></i> Atención", message: "Ingresa el nombre en español"});
                $('#name').focus();
                return (false);
            }
            if (name_en == "") {
                $.growl.error({ title: "<i class='fa fa-exclamation-circle'></i> Atención", message: "Ingresa el nombre en inglés"});
                $('#name_en').focus();
                return (false);
            }


            else {
                if (id == "") {
                    $.ajax({
                        url: "{{url('properties-amenities')}}",
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            name: name,
                            name_en: name_en
                        },
                        success: function(data) {
                            $("#name").val('');
                            $("#name_en").val('');
            
                                $.growl.notice({ title: "<i class='fa fa-exclamation-circle'></i> Atención", message:"Registro exitoso"});
                            $scope.rows();
                        },
                        error: function(msj) {
                            $.growl.error({ title: "<i class='fa fa-exclamation-circle'></i> Atención", message: ""+msj.responseJSON.name+""});
                        }
                    });
                } else {
                    $.ajax({
                        url: "{{url('/')}}/properties-amenities/" + id + "",
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        type: 'PUT',
                        dataType: 'json',
                        data: {
                            name: name,
                            name_en: name_en
                        },
                        success: function(data) {
                            $("#name").val('');
                            $("#name_en").val('');

                            $("#id").val('');
                     $.growl.warning({ title: "<i class='fa fa-exclamation-circle'></i> Atención", message:"Datos Actualizados"});
                     $scope.rows();
                     $scope.titulo = "Nueva Comodidades";
                     $scope.btn = "Guardar";
                  },
                  error: function(msj) {
                    $.growl.error({ title: "<i class='fa fa-exclamation-circle'></i> Atención", message: ""+msj.responseJSON.name+""});
                 }
                    });
                }
            }
        }

        $scope.borrar = function(id) {
            swal({
                  title: "Confirma que quieres eliminar este registro",
              text: "",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: '#fd2923',
              confirmButtonText: 'Si eliminar',
              cancelButtonText: 'Cancelar',
              closeOnConfirm: true
            },
            function() {
            // Url 
            var route = "{{url('/')}}/properties-amenities/" + id + "";
            var token = $("#token").val();
            //Enviar Datos
            $.ajax({
                url: route,
                headers: {
                    'X-CSRF-TOKEN': token
                },
                type: 'DELETE',
                dataType: 'json',
                success: function() {
                      $.growl.error({ title: "<i class='fa fa-exclamation-circle'></i> Atención", message: "Registro eliminado"});
                    $scope.rows();
                },
                error: function(msj) {
                    $.growl.error({
                        title: "<i class='fa fa-exclamation-circle'></i> Error",
                        message: 'Ha ocurrido un error por favor intentá más tarde'
                    });
                }
            });
        });
        }
        $scope.asignarValor = function(id, name,name_en) {
            $("#id").val(id);
            $("#name").val(name);
            $("#name_en").val(name_en);
            $scope.titulo = "Actualizá tu Comodidades";
            $scope.btn = "Guardar";
        }
    });

$(document).ready(function() {
    $('#navsm').sortable({
        revert: true,
        opaitem: 0.6,
        cursor: 'move',
        update: function() {
            var order = $('#navsm').sortable("serialize") + '&action=orderState';
            $.post("{{url('move-amenities')}}", order, function(theResponse) {
                window.location.reload();
            });
        }
    });
    });
</script>
@stop