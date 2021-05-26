@extends('layouts.template_frontend_inside')
@section('content')
<?php  $section = DB::table('sections')->where('id', '4')->first();  ?>
@if($section->status==1)
<?php
   $image='';
   if($section->image!=''){
      $image=explode(",",$section->image);
      $image=$image[1];
   }
   ?>
<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area" style="background-image: url('<?php echo url('/');?>/uploads/<?php echo $image;?>');">
   <div class="container">
      <div class="row">
         @if($section->status_content==1)
         <div class="col-md-12 ">
            <div class="breadcrumbs">
               <h2 class="breadcrumbs-title wow fadeInUp" data-wow-delay="0.2s"><?php echo  $section->title;?></h2>
               <div class="banner-form-box wow fadeInUp" data-wow-delay="0.4s">
                  <div class="default-form">
                     <div class="row clearfix">
                        <div class="col-md-3 col-sm-4 col-xs-12">
                           <select class="custom-select-box" id="area">
                              <option value="0"><?php echo ($lang == 'es') ? 'Área':'Area';?></option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                           </select>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                           <select class="custom-select-box " id="bedroom">
                              <option value="0"><?php echo ($lang == 'es') ? 'Habitaciones':'Bedrooms';?></option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                           </select>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                           <select class="custom-select-box " id="bathroom">
                              <option value="0"><?php echo ($lang == 'es') ? 'Baños':'Bathrooms';?></option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                           </select>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                           <button type="submit" class="theme-btn btn-style-one" onclick="searchFilter()"><i class="fa fa-search"></i> <?php echo ($lang == 'es') ? 'Buscar':'Search';?></button>
                        </div>
                     </div>
                  </div>
               </div>
               <ul class="breadcrumbs-list">
                  <li><a href="<?php echo url('/');?>/<?php echo $lang;?>"><?php echo ($lang == 'es') ? 'Inicio':'Home';?></a></li>
                  <li><?php echo  $section->title;?></li>
               </ul>
            </div>
         </div>
         @endif
      </div>
   </div>
</div>
<!-- BREADCRUMBS AREA END -->
@endif
<!-- Start page content -->
<section  class="page-wrapper" ng-app="myApp" ng-controller="paginado">
   <!-- FEATURED FLAT AREA START -->
   <div class="featured-flat-area">
   <div class="container">
   <div class="row">
      <div  class="col-md-12 content-spinner preload" >
         <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
         </div>
      </div>
      <div id="properties" style="display: none;">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row" ng-show="filteredItems <= 0">
               <div ng-show="filteredItems <= 0" class="col-md-12 noresult text-center">
                  <img src="<?php echo url('/');?>/uploads/icons/noresult.png" alt="No hay resultados">
                  <p><?php echo ($lang == 'es') ? 'No hay resultados disponibles en este momento':'No results available at this time';?></p>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12 text-right" ng-show="filteredItems > 0">
                  <label><?php echo ($lang == 'es') ? 'Ordenar por:':'Sort by:';?></label>
                  <select class="select-filter" onchange="sortyBy()" id="filter">
                     <option value="price_1"><?php echo ($lang == 'es') ? 'Precio Mayor':'Higher Price';?></option>
                     <option value="price_1"><?php echo ($lang == 'es') ? 'Precio Menor':'Lower Price';?></option>
                     <option value="bathroom"><?php echo ($lang == 'es') ? 'Nº Baños':'No. Bathrooms';?></option>
                     <option value="bedroom"><?php echo ($lang == 'es') ? 'Nº Habitaciones':'No. Rooms';?></option>
                  </select>
               </div>
               <!-- flat-item -->
               <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" ng-repeat="row in filtered = (list | filter:search) | orderBy : propertyName :reverse | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                  <div class="flat-item">
                     <div class="flat-item-image">
                        <a href="<?php echo url('/');?>/<?php echo $lang;?>/@{{row.url}}"><img src="<?php echo url('/');?>/uploads/@{{row.image}}" alt="@{{row.title}}"></a>
                        <div class="flat-link">
                           <a href="<?php echo url('/');?>/<?php echo $lang;?>/@{{row.url}}"><?php echo ($lang == 'es') ? 'Ver Detalles': 'More Details';?></a>
                        </div>
                        <ul class="flat-desc">
                           <li>
                              <i class="md-icon area"></i>
                              <span>@{{row.area}}</span>
                           </li>
                           <li>
                              <i class="md-icon bedroom"></i>
                              <span>@{{row.bedroom}}</span>
                           </li>
                           <li>
                              <i class="md-icon bathroom"></i>
                              <span>@{{row.bathroom}}</span>
                           </li>
                        </ul>
                     </div>
                     <div class="flat-item-info">
                        <div class="flat-title-price">
                           <h5><a href="<?php echo url('/');?>/<?php echo $lang;?>/@{{row.url}}">@{{row.title}}</a></h5>
                           <span class="price">$ @{{row.price}}</span>
                        </div>
                        <p><i class="md-icon location"></i> @{{row.address}}</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row wow fadeInUp">
               <div class="col-md-12 text-center" ng-show="filteredItems > 0" style="clear: both;">
                  <ul class="pagination ">
                     <li  pagination="" page="currentPage" on-select-page="setPage(page)"  total-items="totalItems" items-per-page="entryLimit" class="page-item" previous-text="&laquo;" next-text="&raquo;"></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- FEATURED FLAT AREA END -->
</section>
<!-- End page content -->
<input type="hidden" id="type_id" value="2">
<?php echo Html::script('frontend/js/properties.js?v='.time())?>
@stop