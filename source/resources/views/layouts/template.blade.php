<!DOCTYPE html>
<html lang="es">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="theme-color" content="#2196f3"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
      <link rel="shortcut icon" type="image/x-icon" href="<?php echo url('/')?>/uploads/icons/favicon.png">
      <title>Área Administrativa - Zapiola Negocios Inmobiliarios</title>
      <!-- Font Awesome-->
      <?php echo Html::style('backend/css/fontawesome.css')?>
      <!-- ico-font-->
      <?php echo Html::style('backend/css/icofont.css')?>
      <!-- Themify icon-->
      <?php echo Html::style('backend/css/themify.css')?>
      <!-- Flag icon-->
      <?php echo Html::style('backend/css/flag-icon.css')?>
      <!-- Feather icon-->
      <?php echo Html::style('backend/css/feather-icon.css')?>
      <!-- Plugins css start-->
      <?php echo Html::style('backend/css/jquery.growl.css?v='.time())?>
      <?php echo Html::style('backend/css/sweetalert.css?v='.time())?>
      <!-- Bootstrap css-->
      <?php echo Html::style('backend/css/bootstrap.css')?>
      <?php echo Html::style('backend/css/bootstrap-select.min.css')?>
      <?php echo Html::style('backend/css/bootstrap-datetimepicker.css?v='.time())?>
      <?php echo Html::style('backend/css/dropzone.css?v='.time())?>
      <!-- Plugins css Ends-->
      <!-- App css-->
      <?php echo Html::style('backend/css/style.css')?>
      <?php echo Html::style('backend/css/color-1.css')?>
      <!-- Responsive css-->
      <?php echo Html::style('backend/css/responsive.css')?>
      <!-- latest jquery-->
      <?php echo Html::script('backend/js/jquery-3.5.1.min.js')?>
      <!-- Bootstrap js-->
      <?php echo Html::script('backend/js/bootstrap/popper.min.js')?>
      <?php echo Html::script('backend/js/bootstrap/bootstrap.min.js')?>
      <?php echo Html::script('backend/js/angular.min.js')?>
      <?php echo Html::script('backend/js/ui-bootstrap-tpls.min.js')?>
   </head>
   <body>
      <div id="mask">
         <div class="loader-p">
            <div class="col-md-12 text-center">
               <div class="spinner-grow text-primary" rol_id="status">
                  <span class="sr-only">Loading...</span>
               </div>
            </div>
         </div>
      </div>
      <!-- Loader ends-->
      <!-- page-wrapper Start-->
      <div class="page-wrapper compact-wrapper" id="pageWrapper">
         <!-- Page Header Start-->
         <div class="page-main-header">
            <div class="main-header-right row m-0">
               <div class="toggle-sidebar" id="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"></i></div>
               <div class="left-menu-header col">
               </div>
               <div class="main-header-left">
                  <div class="logo-wrapper"><a href="<?php echo url('dashboard')?>"><img class="img-fluid l14" src="<?php echo url('/')?>/uploads/backend/logo.png" alt="Zabiola"></a></div>
               </div>
               <div class="nav-right col pull-right right-menu">
                  <ul class="nav-menus">
                     <li class="onhover-dropdown hidden-xs">
                        <a href="<?php echo url('mailbox-received')?>">
                           <i data-feather="message-square"></i>

                        <?php $notifications=DB::table('comments')->where('status','1')->count(); ?>
                        @if($notifications!=0)
                        <span class="badge badge-pill badge-secondary"><?php echo $notifications;?></span>
                        @endif
                        
                     </a>
                     </li>
                     <li class="hidden-xs"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                     <li class="onhover-dropdown p-0">
                        <div class="media profile-media">
                           <img class="b-r-10" src="<?php echo url('/')?>/uploads/<?php echo Auth::guard('admin')->User()->image;?>" alt="<?php echo Auth::guard('admin')->User()->name;?>">
                           <div class="media-body">
                              <p class="mb-0 font-roboto"><?php echo Auth::guard('admin')->User()->name;?> <i class="middle fa fa-angle-down"></i></p>
                           </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div">
                           <li><a href="<?php echo url('/')?>"  target="_blank"><i data-feather="globe"></i><span>Ver sitio</span></a></li>
                           <li><a href="<?php echo url('my-account')?>"><i data-feather="user"></i><span>Mi cuenta</span></a></li>
                           <li><a href="<?php echo url('logout')?>"><i data-feather="log-in"> </i><span>Cerrar sesión</span></a></li>
                        </ul>
                     </li>
                  </ul>
               </div>
               <div class="d-lg-none mobile-toggle pull-right"><i data-feather="more-horizontal"></i></div>
            </div>
         </div>
         <!-- Page Header Ends                              -->
         <!-- Page Body Start-->
         <div class="page-body-wrapper sidebar-icon">
            <!-- Page Sidebar Start-->
            <header class="main-nav" id="main-nav">
               <div class="logo-wrapper"><a href="<?php echo url('dashboard')?>"><img class="img-fluid l14" src="<?php echo url('/')?>/uploads/backend/logo.png" alt="Zapiola"></a></div>
               <div class="logo-icon-wrapper"><a href="<?php echo url('dashboard')?>"><img class="img-fluid l14" src="<?php echo url('/')?>/uploads/backend/logo.png" alt="Zapiola"></a></div>
               <nav>
                  <div class="main-navbar">
                     <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                     <div id="mainnav">
                        <ul class="nav-menu custom-scrollbar">
                           <li class="back-btn">
                              <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                           </li>
                           <li ><a class="nav-link menu-title" href="<?php echo url('dashboard')?>"><i data-feather="home"></i><span>Escritorio</span></a>
                              @if (Auth::guard('admin')->User()->level=='1')
                              @foreach(DB::table('modules')->get() as $rs)
                           <li class="dropdown">
                              <a class="nav-link menu-title" href="#"><i data-feather="{{$rs->class}}"></i><span>{{$rs->name}}</span></a>
                              <ul class="nav-submenu menu-content">
                                 @foreach(DB::table('submodules')->where('module_id','=',$rs->id)->get() as $rs_s)
                                 <li><a href="<?php echo url($rs_s->url)?>">{{$rs_s->name}}</a></li>
                                 @endforeach
                              </ul>
                           </li>
                           @endforeach
                           @else
                           @foreach(DB::table('permissions')->where('rol_id','=',Auth::guard('admin')->User()->rol_id)->where('type','=','1')->where('status','=','1')->get() as $rs)
                           <?php $module=DB::table('modules')->where('id','=',$rs->module)->first(); ?>
                           <li class="dropdown">
                              <a class="nav-link menu-title" href="#"><i data-feather="{{$module->class}}"></i><span>{{$module->name}}</span></a>
                              <ul class="nav-submenu menu-content">
                                 @foreach( DB::table('permissions')->where('rol_id','=',Auth::guard('admin')->User()->rol_id)->where('module','=',$rs->module)->where('type','=','2')->where('status','=','1')->get()  as $rs_s)
                                 <?php $submodule=DB::table('submodules')->where('id','=',$rs_s->submodule)->first(); ?>
                                 <li><a href="<?php echo url($submodule->url)?>">{{$submodule->name}}</a></li>
                                 @endforeach
                              </ul>
                           </li>
                           @endforeach
                           @endif
                        </ul>
                     </div>
                     <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                  </div>
               </nav>
            </header>
            <!-- Page Sidebar Ends-->
            <div class="page-body">
               <div class="container-fluid">
                  @yield('content')
               </div>
            </div>
            <!-- footer start-->
            <footer class="footer">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-md-6 footer-copyright hidden-xs">
                        <p class="mb-0">Zapiola  {{date("Y")}} © Todos los derechos reservados.</p>
                     </div>
                     <div class="col-md-6">
                        <p class="pull-right mb-0">Desarrollado por Cognitive 
                        <div class="md-icon cognitive"></div>
                        </p>
                     </div>
                  </div>
               </div>
            </footer>
         </div>
      </div>
      <input type="hidden" id="url" value="<?php echo url('/');?>">
      <!-- feather icon js-->
      <?php echo Html::script('backend/js/icons/feather-icon/feather.min.js')?>
      <?php echo Html::script('backend/js/icons/feather-icon/feather-icon.js')?>
      <!-- Sidebar jquery-->
      <?php echo Html::script('backend/js/sidebar-menu.js')?>
      <?php echo Html::script('backend/js/jquery.growl.js')?>
      <?php echo Html::script('backend/js/sweetalert-dev.js')?>
      <!-- Functions JS -->
      <?php echo Html::script('backend/js/moment.min.js?v='.time())?>
      <?php echo Html::script('backend/js/es.js?v='.time())?>
      <?php echo Html::script('backend/js/dropzone.js')?>
      <?php echo Html::script('backend/js/bootstrap-datetimepicker.min.js?v='.time())?>
      <?php echo Html::script('backend/js/aes.js')?>
      <?php echo Html::script('backend/js/jquery-ui.js')?>
      <?php echo Html::script('backend/js/config.js')?>
      <!-- Theme js-->
      <?php echo Html::script('backend/js/script.js')?>
      <?php echo Html::script('backend/js/function_uploads.js?v='.time())?>
      <?php echo Html::script('backend/js/ajaxupload.js');?>
      <?php echo Html::script('backend/js/ckeditor/ckeditor.js?v='.time())?>
      <?php echo Html::script('backend/js/config_editor.js?v='.time())?>
      <script type="text/javascript">
         @foreach($errors->all() as $error)
         $.growl.error({title: "<i class='fa fa-exclamation-circle'></i> Error ",message: "<?php echo $error; ?>"});
         @endforeach
         
          @if(Session::has('notice'))
         $.growl.notice({title: "<i class='fa fa-exclamation-circle'></i> Atención",message: "Registro exitoso"});
         @endif
         @if(Session::has('warning'))
         $.growl.warning({title: "<i class='fa fa-exclamation-circle'></i> Atención",message: "Datos actualizados"});
         @endif
         @if(Session::has('submit'))
         $.growl.warning({title: "<i class='fa fa-exclamation-circle'></i> Atención",message: "Su respuesta ha sido enviada"});
         @endif
         @if(Session::has('error'))
         $.growl.error({title: "<i class='fa fa-exclamation-circle'></i> Error ",message: "Registro eliminado"});
         @endif
         @if(Session::has('already'))
         $.growl.error({title: "<i class='fa fa-exclamation-circle'></i> Atención",message: "El registro ya existe"});
         @endif
         
          @if(Session::has('no-results'))
         
          swal({
            type: "warning",
            title: 'Opps!',
            text: "No se encontraron resultados en el rango de fechas seleccionado",
            confirmButtonColor: '#00B9f1',
            cancelButtonColor: '#00B9f1',
            cancelButtonText: "Volver",
         },
         function() {
            location.reload();
         });
         
         @endif
         
      </script>
   </body>
</html>