<?php $site = DB::table('settings')->where('id', '1')->first();  ?> 
<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="theme-color" content="#2196f3"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

      @if(isset($title_ogg))


      <meta name="description" content="<?php echo $content_ogg;?>">
      <meta property="og:url" content="<?php echo url('/').$_SERVER['REQUEST_URI'];?>" />
      <meta property="og:type" content="article" />
      <meta property="og:title" content="<?php echo $title_ogg?>" />
      <meta property="og:description" content="<?php echo $content_ogg;?>"/>
      <meta property="og:image" content="<?php echo url('/');?>/uploads/<?php echo $ogg_img;?>">
      <meta property="og:image:alt" content="<?php echo ($lang == 'es') ? ucwords ($site->name):ucwords ($site->name_en);?> <?php echo $subtitle?>" />



      @else

      
      <meta name="description" content="<?php echo ($lang == 'es')? $site->description: $site->description_en;?>">
      <meta name="keywords" content="<?php echo ($lang == 'es')? $site->keywords: $site->keywords_en;?>">
      <meta property="og:url" content="<?php echo url('/').$_SERVER['REQUEST_URI'];?>" />
      <meta property="og:type" content="article" />
      <meta property="og:title" content="<?php echo ($lang == 'es') ? ucwords ($site->name):ucwords ($site->name_en);?>" />
      <meta property="og:description" content="<?php echo ($lang == 'es')? $site->description: $site->description_en;?>"/>
      <meta property="og:image" content="<?php echo url('/');?>/uploads/icons/zapiola.png">

      @endif



      <!-- Favicon -->
      <link rel="shortcut icon" type="image/x-icon" href="<?php echo url('/')?>/uploads/icons/favicon.png">
      
      <!--Fonts-->
      <link type="text/css" rel="stylesheet" href="<?php echo url('/');?>/frontend/css/font-awesome.css">

       <!--Alerts-->

      <link async media="all" type="text/css" rel="stylesheet" href="<?php echo url('/');?>/frontend/css/jquery.growl.css?">
      <link async media="all" type="text/css" rel="stylesheet" href="<?php echo url('/');?>/frontend/css/sweetalert.css">


      <!--Animate-->
      <link media="all" type="text/css" rel="stylesheet" href="<?php echo url('/');?>/frontend/css/animate.css">

      <!--LighBox-->
      <link async media="all" type="text/css" rel="stylesheet" href="<?php echo url('/');?>/frontend/css/lightbox.min.css">

      <!-- Theme main style -->

      <link media="all" type="text/css" rel="stylesheet" href="<?php echo url('/');?>/frontend/css/bootstrap.min.css">
      <link media="all" type="text/css" rel="stylesheet" href="<?php echo url('/');?>/frontend/css/style.css?v=<?php echo time();?>">


      <!--Captcha-->
      <script src="https://www.google.com/recaptcha/api.js?render=<?php echo env('CAPTCHA_KEY_SITE');?>"></script> 

      <!--theme scripts-->

      <?php echo Html::script('frontend/js/jquery.min.js')?>

      <!---Angular boostrap-->
      <?php echo Html::script('frontend/js/bootstrap.min.js')?>
      <?php echo Html::script('frontend/js/angular.min.js?v='.time())?>
      <?php echo Html::script('frontend/js/ui-bootstrap-tpls.min.js')?>

      <!-- animate --->
      <?php echo Html::script('frontend/js/wow.min.js')?>

      <title><?php echo ($lang == 'es') ? ucwords ($site->name):ucwords ($site->name_en);?> <?php echo $subtitle;?></title>
   </head>
   <body>
      <div class="preloader bg-2" id="mask">
         <div class="container mtop2 bg-preload">
            <div class="row">
               <div  class="col-md-12 content-spinner" >
                  <div class="spinner">
                     <div class="double-bounce1"></div>
                     <div class="double-bounce2"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- start header -->
      <header class="header-area header-wrapper">
         <a id="btn-toogle" class="btn-toogle"></a>
         <div class="header-top-bar">
            <div class="container">
               <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-6">
                     <div class="logo">
                        <a href="<?php echo url('/')?>/<?php echo $lang;?>">
                        <img src="<?php echo url('/')?>/uploads/<?php echo $site->image?>" alt="<?php echo ucwords ($site->name)?>">
                        </a>
                     </div>
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 hidden-xs d-none d-lg-block">
                     <div class="company-info clearfix">
                        <div class="company-info-item">
                           <div class="header-icon">
                              <i class="h-icon phone-call"></i>
                           </div>
                           <div class="header-info wow fadeInUp">
                              <h6 onclick="window.open('tel:<?php echo $site->phone;?>')"><?php echo $site->phone;?></h6>
                              <p><?php echo ($lang == 'es') ? $site->shedule:$site->shedule_en;?></p>
                           </div>
                        </div>
                        <div class="company-info-item">
                           <div class="header-icon">
                              <i class="h-icon email-sent"></i>
                           </div>
                           <div class="header-info wow fadeInUp">
                              <h6><a href="mailto:<?php echo $site->email;?>"><?php echo $site->email;?></a></h6>
                              <p><?php echo ($lang == 'es') ? 'Envíanos un email':'You can mail us';?></p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-6">
                     <div class="nav-language">
                        <?php if($lang=='es'){ ?>
                        <a href="<?php echo url('/');?>/<?php echo $url_en;?>"><i class="nav-icon language"></i> ENGLISH</a>
                        <?php } else { ?>
                        <a href="<?php echo url('/');?>/<?php echo $url_es;?>" ><i class="nav-icon language"></i> ESPAÑOL</a>
                        <?php } ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <ul class="main-menu hidden-md hidden-sm hidden-lg" id="menu-mobile" style="display: none;">
            <?php   $menu=DB::table('menus')->where('status','1')->orderBy('position', 'asc')->get(); ?>
            @foreach($menu as $rs)
            <li class="li-nav" >
               <a href="<?php echo ($lang == 'es') ? url('/'.$rs->url): url('/en/'.$rs->url_en);?>"><?php echo ($lang == 'es') ? $rs->title : $rs->title_en ;?></a>
            </li>
            @endforeach
            </li>
         </ul>
         <div id="sticky-header" class="header-middle-area transparent-header hidden-xs">
            <div class="full-width-mega-drop-menu">
               <div class="container">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="sticky-logo">
                           <a href="<?php echo url('/')?>/<?php echo $lang;?>">
                             <img src="<?php echo url('/')?>/uploads/<?php echo $site->image?>" alt="<?php echo ucwords ($site->name)?>">
                          </a>
                       </div>
                       <nav id="primary-menu">
                        <ul class="main-menu">
                           <?php   $menu=DB::table('menus')->where('status','1')->orderBy('position', 'asc')->get(); ?>
                              @foreach($menu as $rs)
                              <li class="li-nav @if($rs->id==3) mega-parent @endif" >
                                 <a href="<?php echo ($lang == 'es') ? url('/'.$rs->url): url('/en/'.$rs->url_en);?>"><?php echo ($lang == 'es') ? $rs->title : $rs->title_en ;?></a>
                                 @if($rs->id==3)
                                 <div class="mega-menu-area">
                                    <ul class="single-mega-item">
                                       <li>
                                          <a href="<?php echo ($lang == 'es') ? url('venta'): url('en/sale');?>"><?php echo ($lang == 'es') ? 'Venta' : 'Sale' ;?></a>
                                       </li>
                                       <li>
                                          <a href="<?php echo ($lang == 'es') ? url('alquiler'): url('en/rental');?>"><?php echo ($lang == 'es') ? 'Alquiler' : 'Rental' ;?></a>
                                       </li>
                                    </ul>
                                 </div>
                                 @endif
                              </li>
                              @endforeach
                        </ul>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </header>
      <!-- Content -->
      @yield('content')
      <!-- End Content -->  
      <section class="section-contact" @if($lang=="es") id="contacto" @else  id="contact-us" @endif>
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 center-movil">
                  <a href="<?php echo url('/')?>/<?php echo $lang;?>">
                  <img src="<?php echo url('/').'/uploads/'.$site->image_1;?>" alt="<?php echo $site->name?>" class="logo-footer1">
                  </a>
                  <ul class="social-network">
                     @if($site->facebook!='')
                     <li>
                        <a href="<?php echo $site->facebook;?>" target="_blank">
                        <i class="fa fa-facebook"></i>
                        </a>
                     </li>
                     @endif
                     @if($site->twitter!='')
                     <li>
                        <a href="<?php echo $site->twitter;?>" target="_blank">
                        <i class="fa fa-twitter"></i>
                        </a>
                     </li>
                     @endif
                     @if($site->instagram!='')
                     <li>
                        <a href="<?php echo $site->instagram;?>" target="_blank">
                        <i class="fa fa-instagram"></i>
                        </a>
                     </li>
                     @endif
                  </ul>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <h2 class="wow bold fadeInUp"><?php echo ($lang == 'es') ? 'Contáctanos':'Contact us';?></h2>
                  <ul>
                     <li onclick="window.open('tel:<?php echo $site->phone;?>')">
                        <div class="iicon"><i class="fa fa-phone"></i></div>
                        <?php echo $site->phone;?>
                     </li>
                     <li onclick="window.open('mailto:<?php echo $site->email;?>')">
                        <div class="iicon"><i class="fa fa-envelope-o"></i></div>
                        <?php echo $site->email;?>
                     </li>
                     <li>
                        <div class="iicon"><i class="fa fa-map-marker"></i></div>
                        <?php echo $site->address;?>
                     </li>
                     <li>
                        <div class="iicon"><i class="fa fa-clock-o"></i></div>
                        <?php echo ($lang == 'es') ? $site->shedule:$site->shedule_en;?>
                     </li>
                  </ul>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <h2 class="wow bold fadeInUp"><?php echo ($lang == 'es') ? 'Envia un mensaje':'Send a message';?></h2>
                  <span class="animate-border-white"></span>
                  {!! Form::open(['id'=>'form-1']) !!}
                  <input type="hidden" id="captcha" name="captcha">
                  <div class="form-group">
                     <input type="text" name="name" id="name" placeholder="<?php echo ($lang == 'es') ? 'Nombre y apellido' : 'Full Name' ;?> *" class="form-control" onkeypress="enter_name(event)">
                  </div>
                  <div class="form-group">
                     <input type="text" name="email" id="email" placeholder="<?php echo ($lang == 'es') ? 'Correo electrónico' : 'Email' ;?> *" class="form-control" onkeypress="enter_email(event)">
                  </div>
                  <div class="form-group">
                     <textarea placeholder="<?php echo ($lang == 'es') ? 'Mensaje' : 'Message' ;?> *" id="message" name="message" class="form-control" cols="5" rows="5" onkeypress="enter_message(event)" ></textarea>
                  </div>
                  <div class="form-group text-right">
                     <a onclick="sendContact()" class="btn button white button-sb-1" id="boton-1" ><?php echo ($lang == 'es') ? 'Enviar' : 'Submit' ;?></a>   
                  </div>
                  {!! Form::close() !!}
               </div>
            </div>
         </div>
         <div class="footer-bottom">
            <div class="container">
               <div class="row">
                  <div class="col-xs-12">
                     <div class="copyright text-center">
                        <p>      <a href="https://cognitive.la" target="_blank"><?php echo ($lang == 'es') ? ucwords ($site->name):ucwords ($site->name_en);?> © <?php echo date("Y")?> | <?php echo ($lang == 'es') ? 'Desarrollado por':'Developed by ';?> <span> Cognitive </span></a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <span id="top-button" class="top-button">
      <i class="fa fa-chevron-up"></i>
      </span>
      <!--Alerts-->
      <input type="hidden" name="url" id="url" value="<?php echo url('/');?>">
      <input type="hidden" id="lang" value="<?php echo $lang;?>">
      <input type="hidden" value="<?php echo env('CAPTCHA_KEY_SITE');?>" id="captcha-key">
      <script async src="<?php echo url('/');?>/frontend/js/sweetalert.min.js"></script>
      <script async src="<?php echo url('/');?>/frontend/js/jquery.growl.js"></script>
      <!--LighBox-->
      <script async src="<?php echo url('/');?>/frontend/js/ekko-lightbox.js"></script>
      <!--theme-->
      <script src="<?php echo url('/');?>/frontend/js/scripts.js?v=<?php echo time();?>"></script>
   </body>
</html>