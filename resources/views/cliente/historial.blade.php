	@extends ('cliente/layout_clie')
	@section ('cuerpo')
	<div class="ventanamodal5">
	<script type='text/javascript' language='javascript' class='init'> 
    function revisar2(data1, data3){
    $('#fec_sol').val(data1);
    $('#id_sol').val(data3);
    var id=data3;
    $.post('prod_sol4', {id:id}, function(data){
        $('#prod_sol').html(data);
        });  
    }
    </script>
	<fieldset class="fieldcuerpo solacep" align="left" style="padding: 10px;">
					<legend style="margin-bottom: 0;">HISTORIAL DE SOLICITUDES </legend>
	  	<div>

		<table id="example" class="table table-hover">
	<thead>
		<tr class="warning">
            <th>FECHA DE SOLICITUD</th>
			<th>ESTADO</th>
			<th width="10%">ACCION</th>
		</tr>
	</thead>
	<tbody>
		<?php if(count($query)>0){ ?>
		<tr>
		<?php  
					foreach ($query as $query):
						$fecha3=\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $query->FEC_SOL)->format('d/m/Y');
					?>
						<th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $query->FEC_SOL)->format('d/m/Y')?></th>
					<?php if($query->ALE_NOT==1) {?>
						<th class="success">APROBADO</th>
					<?php }else{ ?>
						<th class="danger">RECHAZADO</th>
					<?php }?>
					<th class="warning"><button data-toggle = "modal" title="Revisar solicitud" onClick="revisar2(<?php echo "'$fecha3"."',".$query->ID_PSO;?>);" data-target = "#myModal" class="btn btn-danger"> <span class="glyphicon glyphicon-exclamation-sign"></span> Revisar</button></th>
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
               Ver respuesta 
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
         	<div class="table-responsive" id="prod_sol">
				
         
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->
</div>
@stop