	@extends ('cliente/layout_clie')
	@section ('cuerpo')
	<div class="ventanamodal5 modal-dialog">
	
	
				<script type="text/javascript">
              $(document).ready(function() { setTimeout(function(){ $(".mensajelogin").fadeIn(1500); },0000); });
              $(document).ready(function() { setTimeout(function(){ $(".mensajelogin").fadeOut(1500); },5000); });
            </script>
			<?php if (Session::has('mensaje')):
  				?>
			<div class="mensajelogin alert alert-success" ><label><?php echo Session::get('mensaje');?></label></div>
			<?php endif;?>
			<form class="form-horizontal" method="POST" action="reg_solicitud">
			
     				<div class = "modal-content">
         			<div class = "modal-header alert-success">
         			<h4 class = "modal-title" id = "myModalLabel">
              			 SOLICITUDES PARA SU APROBACION
           			</h4>
           			</div>
           			 <div class = "modal-body">
          		<div class="form-group">
            	<label class="col-lg-2 control-label">Id :</label>
         		<div class="col-md-3">
           		 <input type="text" value="<?php echo Auth::user()->id;?>" name="" id="fec_sol" class="form-control" readonly="readonly">
        		</div>
        		<label class="col-md-3 control-label">Nombre :</label>
         		<div class="col-md-3">
           		 <input type="text" value="<?php echo Auth::user()->NOM_USU?>" name="" id="fec_sol" class="form-control" readonly="readonly">
        		</div>
         		</div>
				<div class="form-group">
            	<label class="col-md-2 control-label">Ap. paterno :</label>
         		<div class="col-md-3">
           		 <input type="text" value="<?php echo Auth::user()->APA_USU;?>" name="" id="fec_sol" class="form-control" readonly="readonly">
        		</div>
        		<label class="col-md-3 control-label">Ap. materno :</label>
         		<div class="col-md-3">
           		 <input type="text" value="<?php echo Auth::user()->AMA_USU?>" name="" id="fec_sol" class="form-control" readonly="readonly">
        		</div>
         		</div>		
				
				<div class="form-group">
            	<label class="col-lg-2 control-label">Area:</label>
         		<div class="col-md-3">
           		 <input type="text" value="<?php echo Auth::user()->ARE_USU;?>" name="" id="fec_sol" class="form-control" readonly="readonly">
        		</div>
        		<label class="col-md-3 control-label">Cargo :</label>
         		<div class="col-md-3">
           		 <input type="text" value="<?php echo Auth::user()->CAR_USU?>" name="" id="fec_sol" class="form-control" readonly="readonly">
        		</div>
         		</div>
				<input type="hidden" value="0" name="dest"></input>
		</div>
			
@stop