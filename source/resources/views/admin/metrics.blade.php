@extends('layouts.template_analytics')
@section('content')
<?php
function month($mes) {
  setlocale(LC_TIME, 'spanish');
  $nombre = strftime("%B", mktime(0, 0, 0, $mes, 1, 2000));
  return ucwords($nombre);
}
function getDay($day){
  if($day=='0'){
    return 'Domingo';
  }
  if($day=='1'){
    return 'Lunes';
  }
  if($day=='2'){  
    return 'Martes';
  }
  if($day=='3'){
    return 'Miércoles';
  }
  if($day=='4'){
    return 'Jueves';
  }
  if($day=='5'){
    return 'Viernes';
  }
  if($day=='6'){
    return 'Sábado';  
  }
}
$Objdays=array();
foreach($days as $rs): 
  $Objdays[]=array(
    'y'=>getDay($rs->day),
    'a'=>$rs->total
  );
endforeach;
$Objhours=array();
foreach($hours as $rs): 
  $Objhours[]=array(
    'y'=>date("H:i",strtotime($rs->visit_hour)),
    'item1'=>$rs->total
  );
endforeach;
$Objvisits='';
$i=0; 
foreach($users_month as $rs): $i=$i+1; 
  $Objvisits.=$rs->total; if(count($users_month)!=$i): $Objvisits.=','; endif;
endforeach; 

 $total=$desktop+$mobiles+$tablets; 
 if($desktop!=0){
   $desktop=round($desktop*100/$total);
 }
 if($mobiles!=0){
   $mobiles=round($mobiles*100/$total);
 }
 if($tablets!=0){
   $tablets=round($tablets*100/$total);
 }

?>

<!-- Breadcrumb Area -->
<div class="page-header">
   <div class="row">
      <div class="col-lg-6">
         <h3>Bienvenido {{Auth::guard('admin')->User()->name}}</h3>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url('dashboard');?>" title="Escritorio" alt="Escritorio"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Métricas</li>
         </ol>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-3 col-sm-3 col-xs-12">
      <br>
      <input type='text' id='fecha_inicial' class="form-control bg-date" value="<?php echo date('m-d-Y',strtotime($init));?>" placeholder="Desde" />
   </div>
   <div class="col-md-3 col-sm-3 col-xs-12">
      <br>
      <input type='text' id='fecha_final' class="form-control bg-date" value="<?php echo date('m-d-Y',strtotime($end));?>" placeholder="Hasta" />
   </div>
   <div class="col-md-3 col-sm-3 col-xs-12">
      <br>
      <a  class="btn btn-primary btn-xx" onclick="buscar_fecha()" ><i class="fa fa-search"></i> Buscar</a>
   </div>
</div>
<div class="row" ng-app="myApp"  ng-controller="paginado" style="margin-top: 30px">



   <div class="col-md-15 col-sm-15 col-xs-12">
      <div class="card">
         <div class="card-body">
          <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12">
              <i data-feather="globe" class="text-primary ticon"></i>
            </div>
            <div class="col-md-10 col-sm-10 col-xs-12 text-center">
              <h3 class="text-primary text-bold"><?php echo $total;?></h3>
              <p> Visitas <br> al sitio</p>
            </div>
          </div>
         </div>
      </div>
  </div>
  <div class="col-md-7"></div>
   <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="card">
         <div class="card-header">
            <h3>¿Qué páginas visitan sus usuarios?</h3>
         </div>
         <div class="table-responsive">
            <table width="100%" class="table">
               <thead>
                  <tr>
                     <th>
                        <strong>Página</strong>
                     </th>
                     <th>
                        <strong>Visitas</strong>
                     </th>
                  </tr>
               </thead>
               <tbody>
                  <tr ng-repeat="row in list_views" class="text-center">
                     <td style="font-size: 12px; vertical-align: middle; text-align: left;"> @{{row.page}}</td>
                     <td style="font-size: 12px; vertical-align: middle;text-align: center;">@{{row.views}} </td>
                  </tr>
                  <tr ng-show="filteredItems == 0" >
                     <td colspan="2">
                         <p class="text-italic"><i data-feather="alert-circle"></i> No hay resultados para mostrar</p>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <div class="col-md-8 col-sm-8 col-xs-12">
      <div class="card">
         <div class="card-header">
            <h3>Usuarios por hora del día</h3>
         </div>
         <div class="card-body">
            @if(empty($Objhours))
            <i data-feather="alert-circle"></i> No hay resultados para mostrar
            @else
            <div id="hero-graph-2"></div>
            @endif
         </div>
      </div>
   </div>
</div>
<div class="row" >
   <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="card">
         <div class="card-header">
            <h3>Sesiones por dispositivo</h3>
         </div>
         <div class="card-body">
            @if($total!=0)
            <div id="donut"></div>
            @else
            <i data-feather="alert-circle"></i> No hay resultados para mostrar
            @endif
         </div>
      </div>
   </div>
   <div class="col-md-8 col-sm-8 col-xs-12">
      <div class="card">
         <div class="card-header">
            <h3>Usuarios por día de la semana</h3>
         </div>
         <div class="card-body">
            @if(empty($Objdays))
            <i data-feather="alert-circle"></i> No hay resultados para mostrar
            @else
            <div id="bar-chart" style="height: 250px; margin-bottom: 30px;" ></div>
            @endif
         </div>
      </div>
   </div>
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="card">
         <div class="card-header">
            <h3>Usuarios en el mes</h3>
         </div>
         <div class="card-body">
            @if($Objvisits=='')
            <i data-feather="alert-circle"></i> No hay resultados para mostrar
            @else
            <span id="sparkline2"></span>
            @endif
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
 history.pushState(null, null, null);
 window.addEventListener('popstate', function() {
  history.pushState(null, null, null);
});
 (function(global) {
  if (typeof(global) === "undefined") {
    throw new Error("window is undefined");
  }
  var _hash = "!";
  var noBackPlease = function() {
    global.location.href += "#";
    global.setTimeout(function() {
      global.location.href += "!";
    }, 50);
  };
  global.onhashchange = function() {
    if (global.location.hash !== _hash) {
      global.location.hash = _hash;
    }
  };
  global.onload = function() {
    noBackPlease();
    document.body.onkeydown = function(e) {
      var elm = e.target.nodeName.toLowerCase();
      if (e.which === 8 && (elm !== 'input' && elm !== 'textarea')) {
        e.preventDefault();
      }
      e.stopPropagation();
    };
  };
})(window);
$(function() {
 $('#fecha_inicial').datetimepicker({
   format: 'MM-DD-YYYY'
 });
 $('#fecha_final').datetimepicker({
   format: 'MM-DD-YYYY'
 });

});
$(function() {

  @if($total!=0)
  Morris.Donut({
   element: 'donut',
   data: [
   {value: <?php echo $desktop;?>, label: 'Computadoras'},
   {value: <?php echo $mobiles;?>, label: 'Móviles'},
   {value: <?php echo $tablets;?>, label: 'Tablets'}
   ],
   backgroundColor: '#e5e5e5',
   labelColor: '#131313',
   colors: ['#EA2D40','#00359f','#666669'],
   formatter: function (x) { return x + "%"}
 }); 
  @endif
  @if(!empty($Objdays))
  Morris.Bar({
   element: 'bar-chart',
   data: <?php echo json_encode($Objdays);?>,
   xkey: 'y',
   ykeys: ['a'],
   labels: ['Nº visitas'],
   barColors: ['#00359f','#EA2D40']
 });
  @endif

  @if(!empty($Objhours))
  var line_2 = new Morris.Line({
    element: 'hero-graph-2',
    resize: true,
    parseTime: false,
    data: <?php echo json_encode($Objhours);?>,
    xkey: 'y',
    ykeys: ['item1'],
    labels: ['Visitas'],
    lineColors: ['#EA2D40'],
    hideHover: 'auto'
  });
  @endif
  @if($Objvisits!="")
  $("#sparkline-3").sparkline([<?php echo $Objvisits ?>], {
    type: 'line',
    width: '100%',
    height: '100%',
    lineColor: '#5E65AE',
   fillColor: '#5E65AE',
   spotColor: '#5E65AE',
   minSpotColor: '#5E65AE',
   maxSpotColor: '#5E65AE',
   highlightSpotColor: '#5E65AE',
 });
  @endif
});

var app = angular.module('myApp', ['ui.bootstrap']);
app.controller('paginado', function($scope, $http, $window) {

 $scope.rows_views = function() {
   $scope.list_views=[];
   $http.get("{{url('views_pages_listing')}}").then(function successCallback(response)  {
     $scope.list_views = response.data;
     $scope.filteredItems = $scope.list_views.length;
   });
 }
 $scope.rows_views();

});

var app = angular.module('myApp', ['ui.bootstrap']);
app.controller('paginado', function($scope, $http, $window) {

 $scope.rows_views = function() {
   $scope.list_views=[];
   $http.get("{{url('/')}}/views_pages_listing_date/{{$init}}/{{$end}}").then(function successCallback(response)  {
     $scope.list_views = response.data;
     $scope.filteredItems = $scope.list_views.length;
   });
 }
 $scope.rows_views();

});

function buscar_fecha() {
if ($('#fecha_inicial').val() == "") {
    $.growl.error({
      title: "<i class='fa fa-exclamation-circle'></i> Error",
      message: "Selecciona una fecha"
    });
    $('#fecha_inicial').focus();
    return (false);
  }
  if ($('#fecha_final').val() == "") {
    $.growl.error({
      title: "<i class='fa fa-exclamation-circle'></i> Error",
      message: "Selecciona una fecha"
    });
    $('#fecha_final').focus();
    return (false);
  }else{
    var fecha_inicial =document.getElementById("fecha_inicial").value;
    var fecha_final =document.getElementById("fecha_final").value;
      var url="<?php echo url('/');?>/metrics/"+fecha_inicial+"/"+fecha_final;
    if(fecha_final!="" && fecha_inicial!=""){
      var a = document.createElement("a");
      a.href = url;
      a.click();
    }
  }
}

</script>
@stop