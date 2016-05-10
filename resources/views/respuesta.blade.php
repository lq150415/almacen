	@extends ('layout')
	@section ('contenido')
	<script type='text/javascript' language='javascript' class='init'> 
    function revisar(data1, data2, data3){
    $('#fec_sol').val(data1);
    $('#usu_sol').val(data2);
    $('#id_sol').val(data3);
    var id=data3;
    $.post('prod_sol', {id:id}, function(data){
        $('#prod_sol').html(data);
        });  
    }
    </script>
		<fieldset class="fieldcuerpo" align="left">
					<legend style="margin-bottom: 0;">RESPUESTAS</legend>
	  	<div>
	  
		<table id="example8" class="table table-hover" cellspacing="5" width="100%" style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
	<thead style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
            <th>FECHA DE SOLICITUD</th>
			<th>USUARIO</th>
			<th>ESTADO DE SOLICITUD</th>
			<th>ENTREGADO</th>
			<th>ACCIONES</th>	
		</tr>
	</thead>
	<tfoot style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
            <th>FECHA DE SOLICITUD</th>
			<th>USUARIO</th>
			<th>ESTADO DE SOLICITUD</th>
			<th>ENTREGADO</th>
			<th>ACCIONES</th>		
		</tr>
	</tfoot>
	<tbody style="font-size:11px;">
	<?php if(count($respuestas)>0){?>
	<tr>
		<?php
					foreach ($respuestas as $respuesta):
						if($respuesta->ALE_NOT==1){
							$a='Aprobado';
						}else{
							$a='Rechazado';
						}
						 $fechas=$respuesta->created_at->format('d/m/Y');
        				 $nombres=$respuesta->NOM_USU.' '.$respuesta->APA_USU.' '.$respuesta->AMA_USU;
        				 $fecha= "'".$fechas."'";
        				 $nombre= "'".$nombres."'";
					?>
						<th><?php echo $respuesta->id?></th>
						<th><?php echo $respuesta->created_at->format('d - m - Y');?></th>
						<th><?php echo $respuesta->NOM_USU.' '.$respuesta->APA_USU.' '.$respuesta->AMA_USU;?></th>
						<?php if ($respuesta->ALE_NOT==2){echo '<th class="danger">'.$a;}else{echo '<th class="success">'.$a;}?></th>
						<?php if ($respuesta->REA_NOT==3){echo '<th class="danger">No';}else{echo '<th class="success">Si';}?></th>
						<?php if ($respuesta->ALE_NOT==2){?>
						<th><button data-toggle = "modal" data-target = "#myModal" onClick="revisar(<?php echo $fecha.','.$nombre.','.$respuesta->ID_PSO?>);"  href="" class="btn btn-success" title="Detalle"> <span class="glyphicon glyphicon-search"> </span> </button></th><?php }else{?>
						<th><button data-toggle = "modal" data-target = "#myModal" onClick="revisar(<?php echo $fecha.','.$nombre.','.$respuesta->ID_PSO?>);"  href="" class="btn btn-success" title="Detalle"> <span class="glyphicon glyphicon-search"> </span> </button> <button data-toggle = "modal" title="Imprimir formulario" data-target = "#myModal2" href="" class="btn btn-primary"> <span class="glyphicon glyphicon-print"> </span> </button> </th>	<?php }?>
		</tr>
				<?php	endforeach;}
			
			?>
	</tbody>
</table>

</fieldset>
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            <h4 class = "modal-title" id = "myModalLabel">
               Detalle de la solicitud 
            </h4>
         </div>
       <form class="form-horizontal" name="" action="enviarevision" method="POST">
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