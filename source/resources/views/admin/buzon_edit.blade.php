@extends('layouts.template')
@section('content')
<!-- Breadcrumb Area -->
<div class="page-header">
   <div class="row">
      <div class="col-lg-6">
         <h3>Soporte</h3>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url('dashboard');?>" title="Escritorio" alt="Escritorio"><i data-feather="home"></i></a></li>
            <li class="breadcrumb-item">Responder mensaje</li>
         </ol>
      </div>
   </div>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card mb-30">
         <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Responder Mensaje</h3>
         </div>
         <div class="card-body">
            <div class="col-md-12">
               {!!Form::model($buzon,['route'=>['support.update',$buzon],'method'=>'PUT'])!!}
    
               <input type="hidden" name="email" value="<?php echo $buzon->email;?>">
               <input type="hidden" name="name" value="<?php echo $buzon->name;?>">
               <input type="hidden" name="id" value="<?php echo $buzon->id;?>">
               <p>De:  <?php echo $buzon->name;?> <strong onclick="open.window('mailto:<?php echo $buzon->email;?>')"><?php echo $buzon->email;?></strong></p>
               <p><?php echo $buzon->message;?></p>
               <br>
               <div class="form-group">
                  <?php $message='Hola, ' . ucwords(mb_strtolower($buzon->name)).''; ?>
                  {!! Form::textarea('response',$message,['class'=>"materialize-textarea ",'cols'=>'5','rows'=>'5','id'=>'editor1']) !!}
               </div>
               <div class="form-group">
                  <p style="color: #fd2923!important">Campos requeridos (*)</p>
               </div>
               <div class="form-group">
                  <button  class="btn btn-primary" id="enviar"><i class="fa fa-floppy-o" aria-hidden="true"></i> Responder</button>
               </div>
            </div>
            {!! Form::close() !!}
         </div>
      </div>
   </div>
</div>
@stop