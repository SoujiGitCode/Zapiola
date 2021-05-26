@extends('layouts.template_frontend_error')
@section('content')
   <div class="container section-contact p-top30" style="padding-bottom: 100px">
      <div class="row text-center">
          <div class="col-md-12 text-center">
         <img src="<?php echo url('/');?>/uploads/backend/error.png" alt="No hay resultados" style="width: 30%" class="img-error">
      </div>
         <div class="col-md-12 text-center">
            <h3 class="title-error" style="color: #000;    font-family: 'Montserrat-SemiBold';">¡Lo sentimos! Ha ocurrido un error</h3>
            <p>No te preocupes, nuestro equipo de desarrollo está trabajando en ello. Por favor intentá nuevamente en unos minutos</p>
         </div>
         <div class="col-md-12 text-center">
            <a href="{{url('/')}}" class="btn btn-w50 bg-red" style="">Ir al inicio</a>
         </div>
        
      </div>
   </div>
  

@stop