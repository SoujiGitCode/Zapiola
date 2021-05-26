@extends('layouts.template')
@section('content')
<!-- Breadcrumb Area -->
<div class="page-header">
   <div class="row">
      <div class="col-lg-6">
         <h3>Configuración</h3>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url('dashboard');?>" title="Escritorio" alt="Escritorio"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Menú principal</li>
         </ol>
      </div>
   </div>
</div>
<div class="row" ng-app="myApp" ng-controller="menu">
   <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Configura los elementos en tu menú aquí</h3>
         </div>
         <div class="card-body">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="id" value="" id="id">
            <div class="form-group">
               <label class="active">Url en español<small style="color: #F44336 ">*</small></label>
               {!!Form::text('url',null,['id'=>'url','class'=>'form-control','placeholder'=>'Ingresa la url'])!!}
            </div>
            <div class="form-group">
               <label class="active">Nombre en español<small style="color: #F44336 ">*</small></label>
               {!!Form::text('title',null,['id'=>'title','class'=>'form-control','placeholder'=>'Ingresa el nombre'])!!}
            </div>

            <div class="form-group">
               <label class="active">Url en inglés<small style="color: #F44336 ">*</small></label>
               {!!Form::text('url_en',null,['id'=>'url_en','class'=>'form-control','placeholder'=>'Ingresa la url'])!!}
            </div>
            <div class="form-group">
               <label class="active">Nombre en inglés<small style="color: #F44336 ">*</small></label>
               {!!Form::text('title_en',null,['id'=>'title_en','class'=>'form-control','placeholder'=>'Ingresa el nombre'])!!}
            </div>


            <div class="form-group">
               <p style="color: #F44336 !important">Campos requeridos (*)</p>
            </div>
            <div class="form-group">
               <button class="btn btn-success btn-block" ng-click="guardarurl()"><i class="fa fa-floppy-o" aria-hidden="true"></i>  Guardar</button>
            </div>
         </div>
      </div>
   </div>
   <div class="col-md-8 col-sm-8 col-xs-12">
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3> Items del menú</h3>
         </div>
         <div class="card-body">
            <ul class="exclude list" id="navsm">
               <li id="item_@{{row.id}}" class="uk-nestable-item" ng-repeat="row in data" >
                  <div class="row">
                     <div class="col-md-4 col-sm-4 col-xs-12">
                        <p>@{{ row.title }}</p>
                     </div>
                     <div class="col-md-8 col-sm-8 col-xs-12">
                        <a class="btn btn-info btn-sm" title="Mover" style="cursor: move;"><i class="fa fa-arrows"></i> Mover</a>
                        <a  href="{{url('/')}}/menu/@{{row.id}}/edit" title="Editar" class="btn btn-primary btn-sm" ><i class="fa fa-pencil"></i> Editar</a>
                        <a  ng-click="desactivar(row.id)" title="Desactivar"  ng-show="row.status=='1'" class="btn btn-secondary btn-sm"> Desactivar</a>
                        <a  ng-click="activar(row.id)" title="Activar" ng-show="row.status=='2'" class="btn btn-success btn-sm"> Activar</a>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
  $("#mask").show();
var app = angular.module('myApp', []);
app.controller('menu', function($scope, $http, $window) {
    //Listar Menu
    $scope.rows = function() {
        $scope.data = [];
        $http.get("{{url('menu_lists')}}").then(function successCallback(response) {
            $scope.data = response.data;
            $("#mask").hide();
        });
    }
    $scope.rows();
    // Guardar urls
    $scope.guardarurl = function() {
        var title = $("#title").val();
        var url = $("#url").val();

        var title_en = $("#title_en").val();
        var url_en = $("#url_en").val();


        var token = $("#token").val();
        var route = "{{url('/')}}/menu";
        //validar que titulo Not este vacio
        if (url == "") {
            $.growl.error({
                title: "<i class='fa fa-exclamation-circle'></i> Atención",
                message: "Ingresa el url en español"
            });
            $('#url').focus();
            return (false);
        } else if (title == "") {
            $.growl.error({
                title: "<i class='fa fa-exclamation-circle'></i> Atención",
                message: "Ingresa el nombre en español"
            });
            $('#title').focus();
            return (false);
        }

        if (url_en == "") {
            $.growl.error({
                title: "<i class='fa fa-exclamation-circle'></i> Atención",
                message: "Ingresa el url en inglés"
            });
            $('#url_en').focus();
            return (false);
        } else if (title_en == "") {
            $.growl.error({
                title: "<i class='fa fa-exclamation-circle'></i> Atención",
                message: "Ingresa el nombre en inglés"
            });
            $('#title_en').focus();
            return (false);
        }


         else {
            //Enviar Datos
            $.ajax({
                url: route,
                headers: {
                    'X-CSRF-TOKEN': token
                },
                type: 'POST',
                dataType: 'json',
                data: {
                    title: title,
                    url: url,
                    title_en: title_en,
                    url_en: url_en,
                    type: '2'
                },
                success: function(data) {
                    $("#title").val('');
                    $("#url").val('');
                    $.growl.notice({
                        title: "<i class='fa fa-exclamation-circle'></i> Atención",
                        message: "Registro exitoso"
                    });
                    $scope.rows();
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
    //Boorar Item Menu
    $scope.desactivar = function(id) {
        swal({
                title: "¿Deseas desactivar este item del menú?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#CE0505',
                confirmButtonText: 'Si',
                cancelButtonText: 'No',
                closeOnConfirm: true,
            },
            function() {
                //Obtener Datos
                var route = "{{url('up-status-menu')}}";
                var token = $("#token").val();
                $.ajax({
                    url: route,
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        status: '2',
                        id: id
                    },
                    success: function() {
                        $.growl.error({
                            title: "<i class='fa fa-exclamation-circle'></i> Atención",
                            message: "El estatus del item ha sido actualizado"
                        });
                        $scope.rows();
                    },
                    error: function(msj) {
                        $.growl.error({
                            title: "<i class='fa fa-exclamation-circle'></i> Error",
                            message: 'Ha ocurrido un error por favor intenta más tarde'
                        });
                    }
                });
            });
    }
    $scope.activar = function(id) {
        swal({
                title: "¿Deseas activar este item del menú?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#CE0505',
                confirmButtonText: 'Si',
                cancelButtonText: 'No',
                closeOnConfirm: true,
            },
            function() {
                //Obtener Datos
                var route = "{{url('up-status-menu')}}";
                var token = $("#token").val();
                $.ajax({
                    url: route,
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        status: '1',
                        id: id
                    },
                    success: function() {
                        $.growl.warning({
                            title: "<i class='fa fa-exclamation-circle'></i> Atención",
                            message: "El estatus del item ha sido actualizado"
                        });
                        $scope.rows();
                    },
                    error: function(msj) {
                        $.growl.error({
                            title: "<i class='fa fa-exclamation-circle'></i> Error",
                            message: 'Ha ocurrido un error por favor intenta más tarde'
                        });
                    }
                });
            });
    }
});
$(document).ready(function() {
$('#navsm').sortable({
    revert: true,
    opaitem: 0.6,
    cursor: 'move',
    update: function() {
        var order = $('#navsm').sortable("serialize") + '&action=orderState';
        $.post("{{url('move-menu')}}", order, function(theResponse) {
            window.location.reload();
        });
    }
});
});
</script>
@stop