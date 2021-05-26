@extends('layouts.template_frontend')
@section('content')
    <?php $site = DB::table('settings')->where('id', '1')->first();  ?>
    <?php  $section = DB::table('sections')->where('id', '1')->first();  ?>
    <?php
    $image='';
    if($section->image!=''){
        $image=explode(",",$section->image);
        $image=$image[1];
    }
    ?>
    @if($section->status==1)
        <section class="banner-video" @if($lang=="es") id="inicio" @else id="home" @endif style="background-image: url('<?php echo url('/');?>/uploads/<?php echo $image;?>');" >
            <div class="content-video">
                <div class="container">
                    @if($section->status_content==1)
                        <div class="area-title text-center wow fadeInUp" data-wow-delay="0.2s">
                            <h2  class="wow bold  w-text"><?php echo ($lang == 'es') ? $section->title: $section->title_en;?></h2>
                            <?php echo  ($lang == 'es') ? $section->content : $section->content_en;?>

                            @if($section->button_name!="" && $lang=='es')
                                <a  class="btn btn-theme" href="<?php echo $section->button_url;?>"><?php echo $section->button_name ;?></a>
                            @endif

                            @if($section->button_name_en!="" && $lang=='en')
                                <a  class="btn btn-theme" href="<?php echo $section->button_url_en;?>"><?php echo $section->button_name_en ;?></a>
                            @endif

                        </div>
                    @endif
                    <div class="banner-form-box wow fadeInUp" data-wow-delay="0.4s">
                        <div class="default-form">
                            <div class="row clearfix">
                                <div class="col-md-3 col-sm-4 col-xs-12">
                                    <select class="custom-select-box " id="select-type">
                                        <option value="<?php echo ($lang == 'es') ? 'venta' : 'sale' ;?>"><?php echo ($lang == 'es') ? 'Venta' : 'Sale' ;?></option>
                                        <option value="<?php echo ($lang == 'es') ? 'alquiler' : 'rental' ;?>"><?php echo ($lang == 'es') ? 'Alquiler' : 'Rental' ;?></option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-4 col-xs-12">
                                    <input type="text"  value="" id="address"  onkeypress="enter_address(event)" placeholder="<?php echo ($lang == 'es') ? 'Ingresá una dirección ':'Please enter an address';?>" >
                                </div>
                                <div class="col-md-3 col-sm-4 col-xs-12">
                                    <button type="button" onclick="buscar()" class="theme-btn btn-style-one"><i class="fa fa-search"></i> <?php echo ($lang == 'es') ? 'Buscar':'Search';?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <?php $section = DB::table('sections')->where('id', '2')->first(); ?>
    @if($section->status==1)
        <section class="about-sheltek-area" @if($lang=="es") id="nosotros" @else id="about-us" @endif>
            <div class="container">
                <div class="row">
                    @if($section->status_content==1)
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="section-title mb-30 wow fadeInUp ">
                                <h3> <?php echo ($lang == 'es') ? $section->subtitle: $section->subtitle_en;?>  </h3>
                                <h2> <?php echo ($lang == 'es') ? $section->title: $section->title_en ;?> </h2>


                            </div>
                            <div class="about-sheltek-info">
                                <?php echo ($lang == 'es') ? $section->content: $section->content_en;?>
                            </div>

                            @if($section->button_name!="" && $lang=='es')
                                <a  class="btn btn-theme-1" href="<?php echo $section->button_url;?>"><?php echo $section->button_name ;?></a>
                            @endif

                            @if($section->button_name_en!="" && $lang=='en')
                                <a  class="btn btn-theme-1" href="<?php echo $section->button_url_en;?>"><?php echo $section->button_name_en ;?></a>
                            @endif
                        </div>
                    @endif
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="about-image wow fadeInUp">
                            @if($section->image!="")
                                <?php
                                $imagen = explode(',', $section->image);
                                ?>
                                <img src="<?php echo url('/')?>/uploads/<?php echo $imagen[1];?>" class="about-i-1" alt="<?php echo ucwords($site->name) ?>">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <?php $section = DB::table('sections')->where('id', '3')->first(); ?>
    @if($section->status==1)
        <section class="featured-flat-area p99" @if($lang=="es") id="propiedades" @else id="properties" @endif>
            <div class="container">
                <div class="row">
                    @if($section->status_content==1)
                        <div class="col-12">
                            <div class="section-title-2 text-center wow fadeInUp">
                                <h2><?php echo ($lang == 'es') ? $section->title: $section->title_en;?></h2>
                                <?php echo ($lang == 'es') ? $section->content: $section->content_en;?>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="featured-flat">
                    <div class="col-md-12 text-center wow  fadeInUp ppbotom">
                        <a class="btn btn-theme" id="btn-2" data-toggle="tab" href="#category-2" role="tab" ><?php echo ($lang == 'es') ? 'Venta' : 'Sale' ;?></a>
                        <a class="btn btn-theme active" id="btn-1" data-toggle="tab" href="#category-1" role="tab"><?php echo ($lang == 'es') ? 'Alquiler' : 'Rental' ;?></a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="category-1" role="tabpanel" aria-labelledby="category-1">
                            <div class="row">
                            @foreach($rental as $rs)
                                @if($rs->image !="" )
                                    <?php   $image=explode(",",$rs->image) ?>
                                    <!-- flat-item -->
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="flat-item">
                                                <div class="flat-item-image">
                                                    @if($rs->type_id==2)<span class="for-sale"><?php echo ($lang == 'es') ? 'En venta':'For Sale';?></span>@endif
                                                    @if($rs->type_id==1)<span class="for-sale rental"><?php echo ($lang == 'es') ? 'Alquiler':'Rental';?></span>@endif
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
                                                        <h5><a href="<?php echo ($lang == 'es') ?  url('es/'.$rs->url) : url('en/'.$rs->url_en);?>">
                                                                <?php echo ($lang == 'es') ? $rs->title:$rs->title_en;?>
                                                            </a>
                                                        </h5>
                                                        <span class="price">$ <?php echo number_format($rs->price,0, ".", ",");?></span>
                                                    </div>
                                                    <p><i class="md-icon location"></i> <?php echo $rs->address;?></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="col-md-12 text-center">
                                    <a class="btn btn-theme-1" href="<?php echo ($lang == 'es') ? url('alquiler'): url('en/rental');?>"><?php echo ($lang == 'es') ? 'Ver más' : 'View more' ;?></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="category-2" role="tabpanel" aria-labelledby="category-2">
                            <div class="row">
                            @foreach($sales as $rs)
                                @if($rs->image !="" )
                                    <?php   $image=explode(",",$rs->image) ?>
                                    <!-- flat-item -->
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                            <div class="flat-item">
                                                <div class="flat-item-image">
                                                    @if($rs->type_id==2)<span class="for-sale"><?php echo ($lang == 'es') ? 'En venta':'For Sale';?></span>@endif
                                                    @if($rs->type_id==1)<span class="for-sale rental"><?php echo ($lang == 'es') ? 'Alquiler':'Rental';?></span>@endif
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
                                                        <h5><a href="<?php echo ($lang == 'es') ?  url('es/'.$rs->url) : url('en/'.$rs->url_en);?>">
                                                                <?php echo ($lang == 'es') ? $rs->title:$rs->title_en;?>
                                                            </a>
                                                        </h5>
                                                        <span class="price">$ <?php echo number_format($rs->price,0, ".", ",");?></span>
                                                    </div>
                                                    <p><i class="md-icon location"></i> <?php echo $rs->address;?></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="col-md-12 text-center">
                                    <a class="btn btn-theme-1" href="<?php echo ($lang == 'es') ? url('venta'): url('en/sale');?>"><?php echo ($lang == 'es') ? 'Ver más' : 'View more' ;?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    @endif

    <?php $section = DB::table('sections')->where('id', '7')->first(); ?>
    @if($section->status==1)
        <?php
        $image='';
        if($section->image!=''){
            $image=explode(",",$section->image);
            $image=$image[1];
        }
        ?>
        <section class="features-area fix" style="background-image:url('<?php echo url('/');?>/uploads/<?php echo $image;?>');">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12 hidden-sm hidden-xs"></div>
                    @if($section->status_content==1)
                        <div class="col-lg-7 col-md-7 col-sm-7 offset-lg-5">
                            <div class="features-info ">
                                <div class="section-title mb-30 wow  fadeInUp">
                                    <h3><?php echo ($lang == 'es') ? $section->subtitle: $section->subtitle_en;?></h3>
                                    <h2 class="h1"><?php echo ($lang == 'es') ? $section->title: $section->title_en;?></h2>
                                </div>
                                <div class="features-desc">
                                    <?php echo ($lang == 'es') ? $section->content: $section->content_en;?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 center-movil wow  fadeInUp mptop22">
                                        <a class="btn btn-theme-1" href="<?php echo ($lang == 'es') ? url('venta'): url('en/sale');?>"><?php echo ($lang == 'es') ? 'Propiedades en Venta' : 'Sale Properties' ;?></a>
                                        <a class="btn btn-theme-1" href="<?php echo ($lang == 'es') ? url('alquiler'): url('en/rental');?>"><?php echo ($lang == 'es') ? 'Propiedades en Alquiler' : 'Rental Properties' ;?></a>
                                    </div>
                                </div>


                            </div>
                            @endif
                        </div>
                </div>
        </section>
    @endif



@stop
