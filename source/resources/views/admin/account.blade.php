@extends('layouts.template')
@section('content')
<!-- Breadcrumb Area -->
<div class="page-header">
   <div class="row">
      <div class="col-lg-6">
         <h3>Mi cuenta</h3>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url('dashboard');?>" title="Escritorio" alt="Escritorio"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Datos de cuenta</li>
         </ol>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-8 col-sm-8 col-xs-12">
      <div class="card user-settings-box mb-30">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Información Personal</h3>
         </div>
         <div class="card-body">
           
            {!!Form::model($user,['route'=>['dashboard.update',$user],'method'=>'PUT'])!!}
            <div class="row">
               <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                     <label>Nombre <small style="color: #fd2923">*</small></label>
                     {!!Form::text('name',null, ['class'=>'form-control','placeholder'=>'Ingresa el nombre'])!!}
                  </div>
               </div>
               <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                     <label>Correo electrónico <small style="color: #fd2923">*</small></label>
                     {!!Form::text('email',null, ['class'=>'form-control','placeholder'=>'Ingresa el correo electrónico'])!!}
                  </div>
               </div>
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                     <label>Contraseña</label>
                     {!!Form::password('password', ['class' => 'form-control','placeholder'=>'Ingresa la contraseña'])!!}
                  </div>
                  <div class="form-group">
                     <p style="color: #fd2923!important">Campos requeridos (*)</p>
                  </div>
                  <div class="form-group">
                     <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
                  </div>
               </div>
            </div>
            {!! Form::close() !!}
         </div>
      </div>
   </div>
   <div class="col-md-4 col-sm-4 col-xs-12">
      <div class="card user-photos-box mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Perfil (200x200px)</h3>
            <button type="button" class="photo-upload-btn btn-primary" id="upload"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Actualizar</button>
         </div>
         <div class="card-body">
            <img src="<?php echo url('/')?>/uploads/<?php echo Auth::guard('admin')->User()->image;?>" alt="<?php echo Auth::guard('admin')->User()->name;?>" title="<?php echo Auth::guard('admin')->User()->name;?>" class="avv">
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $("#upload").click(function() {
       var t = $("#upload");
       new AjaxUpload(t, {
           action: $("#url").val() + "/avatar",
           name: "file",
           onSubmit: function(t, e) {
               this.disable(); 
               document.getElementById("upload").innerHTML = '<div class="spinner-border spinner-border-sm" role="status"></div> Cargando';
           },
           onComplete: function(t, e) {
               document.getElementById("upload").innerHTML = '<i class="bx bx-upload"></i> Actualizar';
                this.enable(); 
                location.reload();
           }
       })
   })
</script>
@stop