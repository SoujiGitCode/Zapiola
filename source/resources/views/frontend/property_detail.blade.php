@extends('layouts.template_frontend_inside')
@section('content')
<section class="page-detail">
   <div class="properties-details-area pt-115 pb-60">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <ul class="breadcrumbs-list">
               <li><a href="<?php echo url('/');?>/<?php echo $lang;?>"><?php echo ($lang == 'es') ? 'Inicio':'Home';?></a></li>
               <?php $type=DB::table('types')->where('id',$property->type_id)->first(); ?>
               <li><a href="<?php echo ($lang == 'es') ? url($type->url): url($type->url_en);?>"><?php echo ($lang == 'es') ? $type->name : $type->name_en;?></a></li>
               <li><?php echo ($lang == 'es') ? $property->title: $property->title_en;?></li>
            </ul>
            @if($property->image !="")
            <!-- pro-details-image -->
            <div class="pro-details-image mb-60">
               <div class="pro-details-big-image">
                  <div class="content-img">
                     <?php  $image= explode(',',$property->image);  ?>
                     <a href="<?php echo url('/');?>/uploads/<?php echo $image[1];?>" data-lightbox="image-1" data-title="<?php echo $property->title;?>">
                     <img src="<?php echo url('/');?>/uploads/<?php echo $image[1];?>"  alt="<?php echo $property->title;?>" style="cursor: pointer;" class="img-responsive" title="<?php echo ($lang == 'es') ? 'Hacé click  para abrir la galeria':'Click to open the gallery';?>">
                     </a>
                  </div>
                  <ul class="pro-details-navs">
                     @for ($i=2;$i<=substr_count($property->image, ',');$i++)
                     <?php  $image= explode(',',$property->image);  ?>
                     <li>
                        <a href="<?php echo url('/');?>/uploads/<?php echo $image[$i];?>" data-lightbox="image-1" data-title="<?php echo $property->title;?>">
                        <img src="<?php echo url('/');?>/uploads/<?php echo $image[$i];?>"  alt="<?php echo $property->title;?>" style="cursor: pointer;" class="img-responsive" title="<?php echo ($lang == 'es') ? 'Hacé click  para abrir la galeria':'Click to open the gallery';?>">
                        </a>
                     </li>
                     @endfor
                  </ul>
               </div>
               @endif
               <!-- pro-details-short-info -->
               <div class="pro-details-short-info mb-60 wow fadeInUp">
                  <div class="row">
                     <div class="col-sm-6 col-xs-12">
                        <div class="pro-details-condition">
                           <h5><?php echo ($lang == 'es') ? 'Especificaciones':'Condition';?></h5>
                           <div class="pro-details-condition-inner ">
                              <ul class="condition-list">
                                 <li><i class="md-icon area"></i> <?php echo ($lang == 'es') ? 'Área':'Area';?>: <?php echo $property->area;?> </li>
                                 <li><i class="md-icon bedroom"></i> <?php echo ($lang == 'es') ? 'Habitaciones':'Bedroom';?>: <?php echo $property->bedroom;?></li>
                                 <li><i class="md-icon bathroom"></i> <?php echo ($lang == 'es') ? 'Baños':'Bathroom';?>: <?php echo $property->bathroom;?></li>
                                 <li><i class="md-icon garage"></i> <?php echo ($lang == 'es') ? 'Garaje':'Garage';?>: <?php echo $property->garage;?></li>
                                 <li><i class="md-icon kitchen"></i> <?php echo ($lang == 'es') ? 'Cocina':'Kitchen';?>: <?php echo $property->kitchen;?></li>
                                 <li>$52,350</li>
                              </ul>
                              <p><i class="md-icon location"></i><?php echo $property->address;?>
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class="col-sm-6 col-xs-12">
                        <div class="pro-details-amenities">
                           <h5><?php echo ($lang == 'es') ? 'Servicios':'Amenities';?></h5>
                           <div class="pro-details-amenities-inner ">
                              <ul class="amenities-list">
                                 <?php
                                    if($property->amenities!=""){


                                     for ($c = 1; $c <= substr_count($property->amenities, ','); $c++) {
                                       $amenities = explode(',', $property->amenities);
                                       $get_amenities = DB::table('amenities')->where('id',$amenities[$c])->first();
                                       if (isset($get_amenities) != 0) {
                                         echo ($lang == 'es') ? '<li>'.trim($get_amenities->name).'</li>':'<li>'.trim($get_amenities->name_en).'</li>';
                                       }

                                     }



                                    }
                                                ?>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- pro-details-description -->
               <div class="pro-details-description mb-50 wow fadeInUp">
                  <?php echo $property->content;?>

               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <?php echo $property->google_maps;?>
                    <br>
                  <a class="btn btn-theme-1 btn-block" target="_blank"><?php echo ($lang == 'es') ? 'Agendá una cita':'Make an appointment';?></a>
         </div>
      </div>
   </div>
   <!-- PROPERTIES DETAILS AREA END -->
</section>
<?php $section = DB::table('sections')->where('id', '6')->first(); ?>
@if($section->status==1)
<section class="featured-flat-area  p99" id="propiedades">
   <div class="container">
   <div class="row">
      @if($section->status_content==1)
      <div class="col-12">
         <div class="section-title-2 text-center wow fadeInUp">
            <h2><?php echo $section->title;?> </h2>
            <?php echo $section->content;?>
         </div>
      </div>
      @endif
   </div>
   <div class="featured-flat">
      <div class="row">
         @foreach($properties as $rs)
         @if($rs->image !="" )
         <?php   $image=explode(",",$rs->image) ?>
         <!-- flat-item -->
         <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="flat-item">
               <div class="flat-item-image">
                  @if($rs->type_id==1)<span class="for-sale"><?php echo ($lang == 'es') ? 'En venta':'For Sale';?></span>@endif
                  <a href="<?php echo ($lang == 'es') ?  url('es/'.$rs->url) : url('en/'.$rs->url_en);?>"><img src="<?php echo url('/');?>/uploads/<?php echo $image[1];?>" alt="<?php echo $rs->title;?>"></a>
                  <div class="flat-link">
                     <a href="<?php echo ($lang == 'es') ?  url('es/'.$rs->url) : url('en/'.$rs->url_en);?>"><?php echo ($lang == 'es') ? 'Ver Detalles': 'More Details';?></a>
                  </div>
                  <ul class="flat-desc">
                     <li>
                        <i class="md-icon area"></i>
                        <span><?php echo $rs->area;?> sqft</span>
                     </li>
                     <li>
                        <i class="md-icon bedroom"></i>
                        <span><?php echo $rs->bedroom;?></span>
                     </li>
                     <li>
                        <i class="md-icon bathroom"></i>
                        <span><?php echo $rs->bathroom;?></span>
                     </li>
                  </ul>
               </div>
               <div class="flat-item-info">
                  <div class="flat-title-price">
                     <h5><a href="<?php echo ($lang == 'es') ?  url('es/'.$rs->url) : url('en/'.$rs->url_en);?>"><?php echo $rs->title;?></a></h5>
                     <span class="price">$ <?php echo number_format($rs->price,0, ".", ",");?></span>
                  </div>
                  <p><i class="md-icon location"></i> <?php echo $rs->address;?></p>
               </div>
            </div>
         </div>
         @endif
         @endforeach
      </div>
   </div>
</section>
@endif
@stop
