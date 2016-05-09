	@extends ('cliente/layout_clie')
	@section ('cuerpo')
	<div class="ventanamodal5 modal-dialog">
	<script type='text/javascript' language='javascript' class='init'> 
    function revisar(data1, data2, data3){
    $('#fec_sol').val(data1);
    $('#usu_sol').val(data2);
    $('#id_sol').val(data3);
    var id=data3;
    $.post('prod_sol2', {id:id}, function(data){
        $('#prod_sol').html(data);
        });  
    }
    </script>
	<script type="text/javascript">
        $(document).ready(function() { setTimeout(function(){ $(".mensajelogin").fadeIn(1500); },0000); });
        $(document).ready(function() { setTimeout(function(){ $(".mensajelogin").fadeOut(1500); },5000); });
    </script>
			<?php if (Session::has('mensaje')):
  				?>
			<div class="mensajelogin alert alert-success"><label><?php echo Session::get('mensaje');?></label></div>
			<?php endif;?>
			<?php if (Session::has('mensaje2')):
  				?>
			<div class="mensajelogin alert alert-danger"><label><?php echo Session::get('mensaje2');?></label></div>
			<?php endif;?>
			<div class = "modal-content">
         			<div class = "modal-header alert-success">
         			<h4 class = "modal-title" id = "myModalLabel">
              			 SOLICITUDES PARA SU APROBACION
           			</h4>
           			</div>
           			 <div class = "modal-body">
			<div class="table-responsive">
  <table id="example" class="table table-hover" cellspacing="5" width="100%">
  <thead>
    <tr class="info">
            <th>TIPO</th>
            <th>FECHA DE SOLICITUD</th>
            <th>USUARIO</th>
      		<th>ESTADO</th>
      		<th data-orderable="false"></th>
    </tr>
  </thead>
  <tbody style="font-size:11px;">
    <?php if(count($notificaciones)>0){?>
    <tr>
    <?php  
       
          foreach ($notificaciones as $notificaciones):
             if($notificaciones->REA_NOT==0){
        $a='No leido';
        }elseif($notificaciones->REA_NOT==1){
        $a='Leido';
        }elseif($notificaciones->REA_NOT==2){
        $a='Esperando respuesta';
        }
        $fechas=$notificaciones->updated_at->format('d/m/Y');
        $nombres=$notificaciones->NOM_USU.' '.$notificaciones->APA_USU.' '.$notificaciones->AMA_USU;
        $fecha= "'".$fechas."'";
        $nombre= "'".$nombres."'";
          ?>
            <th><?php echo $notificaciones->TIP_NOT;?></th>
            <th><?php echo $notificaciones->updated_at->format('d/m/Y');?></th>
            <th><?php echo $notificaciones->NOM_USU.' '.$notificaciones->APA_USU.' '.$notificaciones->AMA_USU;?></th>
            <th><?php echo $a;?></th>
            <th><button data-toggle = "modal" title="Revisar solicitud" onClick="revisar(<?php echo $fecha.','.$nombre.','.$notificaciones->ID_PSO?>);" data-target = "#myModal"  class="btn btn-danger"> <span class="glyphicon glyphicon-exclamation-sign" ></span> Revisar</button></th>
    </tr>
        <?php endforeach;}
      
      ?>
  </tbody>
  </table>

</div>
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            <h4 class = "modal-title" id = "myModalLabel">
               Revisar solicitud 
            </h4>
         </div>
       <form class="form-horizontal" name=""  method="POST">
         <div class = "modal-body">
         <input type="hidden" id="id_sol" name="id_sol">
            <div class="form-group">
            	<label class="col-lg-3 control-label">Fecha de solicitud:</label>
         		<div class="col-md-8">
           		 <input type="text" min="0" name="" id="fec_sol" class="form-control" readonly="readonly">
        		</div>
         		</div>
         	<div class="form-group">
            	<label class="col-lg-3 control-label">Solicitante:</label>
         		<div class="col-md-8">
           		 <input type="text" name="usu_sol" id="usu_sol" value="" class="form-control" readonly="readonly">
        		</div>
         		</div>
         	<div class="table-responsive" id="prod_sol">
				
         
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->
@stop