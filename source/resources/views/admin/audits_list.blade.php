@extends('layouts.template')
@section('content')
<!-- Breadcrumb Area -->
<div class="page-header">
   <div class="row">
      <div class="col-lg-6">
         <h3>Administradores</h3>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url('dashboard');?>" title="Escritorio" alt="Escritorio"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Registro de actividades</li>
         </ol>
      </div>
   </div>
</div>
<div class="row" ng-app="myApp" ng-controller="paginado">
   <div class="col-md-12">
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <div class="row" style="    width: 100%;">
               <div class="col-md-3 col-sm-3 col-xs-12" style="clear: both;"> 
                  <input type='text' id='start' class="form-control bg-date" value="<?php echo date('m');?>-01-<?php echo date("Y");?>" placeholder="Desde" />
               </div>
               <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type='text' id='end' class="form-control bg-date" value="<?php echo date('m-d-Y');?>" placeholder="Hasta" />
               </div>
               <div class="col-md-3 col-sm-3 col-xs-12">
                  {!!Form::select('tech',$tech, null, ['placeholder' => 'Todos los usuarios','class'=>'form-control bg-date','id'=>'tech'])!!}
               </div>
               <div class="col-md-3 col-sm-3 col-xs-12" style="text-align: right;">
                  <a  ng-click="search_items()"  class="btn btn-primary btn-xx"><i class="fa fa-search" aria-hidden="true"></i> Buscar </a>
               </div>
            </div>
         </div>
         <div class="table-responsive">
            <table width="100%" class="table">
               <thead>
                  <tr>
                     <th style="width: 12.6%">
                        <div class="text-center"> Usuario</div>
                     </th>
                     <th style="width: 12.8%">
                        <div class="text-center">Correo electrónico</div>
                     </th>
                     <th style="width: 10%">
                        <div class="text-center">IP</div>
                     </th>
                     <th style="width: 28%">
                        <div class="text-center">Actividad</div>
                     </th>
                     <th style="width: 12.6%">
                        <div class="text-center">Fecha/Hora</div>
                     </th>
                  </tr>
               </thead>
               <tbody>
                  <tr id="loader">
                     <td colspan="6" style="text-align: center;">
                        <div class="spinner-border" role="status">
                           <span class="sr-only">Loading...</span>
                        </div>
                     </td>
                  </tr>
                  <tr ng-repeat="row in filtered = (list | filter:search | orderBy : predicate :reverse) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit"
                     >
                     <td class="text-center" style="vertical-align: middle;">
                        <div>@{{row.name}}</div>
                     </td>
                     <td class="text-center" style="vertical-align: middle;">
                        <div>@{{row.email}}</div>
                     </td>
                     <td style="vertical-align: middle; text-align: center;">
                        @{{row.ip}}
                     </td>
                     <td style="vertical-align: middle; text-align: left;">
                        @{{row.activity}}
                     </td>
                     <td style="vertical-align: middle; text-align: center;">
                        @{{row.created_at | date : MM/dd/yyyy }} 
                     </td>
                  </tr>
                  <tr ng-show="filteredItems == 0" >
                     <td colspan="6">
                        <p class="text-italic"><i data-feather="alert-circle"></i> No hay resultados para mostrar</p>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="card-body">
            <ul class="pagination" ng-show="filteredItems > 0">
               <li  pagination="" page="currentPage" on-select-page="setPage(page)" total-items="filteredItems" items-per-page="entryLimit" class="page-item" previous-text="&laquo;" next-text="&raquo;"></li>
            </ul>
            <p ng-show="filteredItems != 0" ><br>@{{totalItems}} Registro(s) encontrado(s)</p>

         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
  $("#mask").show();
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
   app.controller('paginado', function($scope, $http, $window) {
       $scope.entryLimit = 100;
       
       $scope.rows = function() {
         $http.get("{{url('audits_listing')}}").then(function successCallback(response)  {
           $scope.list = response.data;
           $scope.currentPage = 1;
           $scope.filteredItems = $scope.list.length;
           $scope.totalItems = $scope.list.length;
           $("#loader").hide();
         });
       }
       $scope.rows();
       $scope.setPage = function(pageNo) {
         $scope.currentPage = pageNo;
       };
       $scope.filter = function() {
         $scope.filteredItems = $scope.filtered.length;
         $scope.totalItems =  $scope.filtered.length
   
       };
       $scope.sort_by = function(predicate) {
         $scope.predicate = predicate;
         $scope.reverse = !$scope.reverse;
       };
       $scope.search_items = function() {
           var start = $("#start").val();
           var end = $("#end").val();
           var tech = $("#tech").val();
           if (start == "") {
               start = 0;
           }
           if (end == "") {
               end = 0;
           }
           if (tech == "") {
               tech = 0;
           }
           $http.get("{{url('/')}}/audits_search_listing/" + tech + "/" + start + '/' + end).then(function successCallback(response)  {
               $scope.list = response.data;
               $scope.currentPage = 1;
               $scope.filteredItems = $scope.list.length;
               $scope.totalItems = $scope.list.length;
           });
       }
       
       //borrar página
    
   });
   
</script>
@stop