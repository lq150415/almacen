	@extends ('layout')
	@section ('VM')
		<div id="bgVentanaModal" class="bgventanaModal">

<div class="modal-dialog modal-lg" style="box-shadow: 0px 0px 1px #000;"> <div class="modal-content">
 <div class = "modal-header">
            <button onClick="javascript:despliegaModal('hidden');" title="Cerrar" class="close"><span style="float: right; color: #000; font-size: 19px;">&times;</span></button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               REGISTRO DE NUEVA SALIDA
            </h4>
         </div>
			<form class="form-horizontal" name="almacen_form" action="reg_salida" method="POST">
			<div class = "modal-body">
			<div class="form-group">
				<label class="col-lg-2 control-label">Almacen :</label>
         		<div class="col-md-4">
           		<select id="alm2" class="form-control" placeholder="ELIJA EL ALMACEN" >
									<option value="">SELECCIONE</option>
							<?php 		
									foreach ($almacenes as $almacen): 
									 echo '<option value="'.$almacen->id.'">'.$almacen->NOM_ALM.'</option>';
							endforeach;
							?>
								</select>
        		</div>
        		<label class="col-lg-1 control-label">Rubro :</label>
         		<div class="col-md-4">
           		 <select id="rub2" class="form-control" placeholder="ELIJA EL RUBRO" onpaste="return false">
								</select>
        		</div>
         		</div>
					<table class="table-responsive">
						<button type="button" id="agregar" onclick="javascript:despliegaModal2b('visible');" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Agregar Producto</button>
					</table>
</br>
<div class="table-responsive">
					<table id="tabla" class="table table-responsive table-hover">
	<!-- Cabecera de la tabla -->
						<thead>
							<tr>
								<th width="12%">Nº form DGAA</th>
								<th width="48%">Producto</th>
								<th width="9%">Cantidad</th>
								<th width="10%">&nbsp;</th>
							</tr>
						</thead>
 
	<!-- Cuerpo de la tabla con los campos -->
						<tbody>
		<!-- fila base para clonar y agregar al final -->
							<tr> 
								<td><input type="text" class="form-control" id="nro_com" name="nro_com[]"readonly="readonly"/></td>
								<td><input type="text" class="form-control" id="producto" name="producto[]" readonly="readonly"/></td>
								<input type="hidden" class="form-control" id="idproducto" name="idproducto[]" readonly="readonly"/>
								<input type="hidden" class="form-control" id="pro_pin" name="pro_pin[]"  readonly="readonly"/>
							
								<td><input type="text" id="can_pro" class="form-control" name="can_pro[]"readonly="readonly"/></td>
								<td class="btn btn-danger eliminar"><span class="glyphicon glyphicon-remove"></span> Eliminar</td>								
							</tr>
		<!-- fin de código: fila base -->
 
		<!-- Fila de ejemplo -->
							
		<!-- fin de código: fila de ejemplo -->
 
						</tbody>
					</table>
					</div>
<!-- Botón para agregar filas -->
				 <div class = "modal-footer" style="border-top: 0;">
            <button type = "button"  onClick="javascript:despliegaModal('hidden');" class = "btn btn-danger"><span class="glyphicon glyphicon-trash" style="font-size: 10px;"></span>
               Limpiar campos
            </button>
            
            <button type = "submit" class = "btn btn-success"><span style="font-size: 10px;" class="glyphicon glyphicon-check"></span>
               Registrar
            </button>
         </div>
         </form>						
		</div>
		</div>
</div>
</div>
<div id="bgVentanaModal2" class="bgventanaModal2">
<div id="" class="modal-dialog modal-lg">
<div class="modal-content">
  <div class = "modal-header">
<table style="float: right;"><td class="eliminar" style="background-color: transparent;"><a href="javascript:despliegaModal2a('hidden');" title="Cerrar" class="close">&times;</a></td></table>
<h4 class = "modal-title" id = "myModalLabel">
               Agregar productos
            </h4>
</div>
<form class="form-horizontal">
	<div class="modal-body">
		<div class="form-group">
            <label class="col-md-4 control-label">Id almacen :</label>
        <div class="col-md-2">
           	<input type="text" id="alm3" readonly="readonly" class="form-control">
        </div>
        	<label class="col-md-2 control-label">Id rubro :</label>
         <div class="col-md-2">
           <input type="text" id="rub3" value="19" readonly="readonly" class="form-control">
        		</div>
         </div>
        <div class="form-group">
            	<label class="col-lg-3 control-label">Nro de formulario DGAA :</label>
         		<div class="col-md-8">
           		 <input type="number" name="" min="0" id="nro_com1" value="" class="form-control" placeholder="NUMERO DE FORMULARIO DGAA" onpaste="return false">
        		</div>
         		</div>
		 <div class="form-group">
            	<label class="col-lg-3 control-label">Destino :</label>
         		<div class="col-md-8">
           		 <input type="text" id="pro_pin1"name="" value="" class="form-control" placeholder="DESTINO" onpaste="return false">
        		</div>
         		</div>	
         <div class="form-group">
            	<label class="col-lg-3 control-label">Cantidad :</label>
         		<div class="col-md-8">
           		 <input type="number" id="cant" min="0" name="" value="" class="form-control" placeholder="CANTIDAD " onpaste="return false">
        		</div>
         		</div>
	</form>
			
<div id="tablabody" style="overflow: auto;">
		
</div>
	</div>
	</div>
		</fieldset>
</div>
</form>
</div>
	@stop
	@section ('contenido')
		<fieldset class="fieldcuerpo"  align="left">
					<legend style="margin-bottom: 0;">Salidas</legend>
	  	<div>	
	  	<script type="text/javascript">
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeIn(2500); },0000); });
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeOut(2500); },5000); });
            </script>
         <?php if (Session::has('mensaje')):
            ?>
                  <div class="mensajewarning alert alert-danger" style="margin-bottom: 10px;"><label><?php echo Session::get('mensaje');?></label></div>
         <?php endif;?>
         <?php if (Session::has('mensaje3')):
            ?>
                  <div class="mensajewarning alert alert-success"  style="margin-bottom: 10px;"><label><?php echo Session::get('mensaje3');?></label></div>
         <?php endif;?>

	  	<a class="btn btn-success" href="javascript:despliegaModal('visible');"><span class="glyphicon glyphicon-plus"></span> Nueva salida</a>
	  </br>
	  	  </br>
		<table id="example" class="display" cellspacing="5" width="100%" style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
	<thead style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
            <th>FECHA DE SALIDA</th>
            <th>DGAA</th>
            <th>DESTINO</th>
			<th>PRODUCTO</th>
			<th>CANTIDAD</th>
			<th>ID SALIDA</th>	
		</tr>
	</thead>
	<tfoot style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
            <th>FECHA DE SALIDA</th>
            <th>DGAA</th>
            <th>DESTINO</th>
			<th>PRODUCTO</th>
			<th>CANTIDAD</th>
			<th>ID SALIDA</th>	
		</tr>
	</tfoot>
	<tbody style="font-size:11px;">
		<?php if(count($consultas)>0){?>
		<tr>
		<?php  
					foreach ($consultas as $consultas):
					?>
						<th><?php echo $consultas->FEC_SAL;?></th>
						<th><?php echo $consultas->DGA_SPR;?></th>
						<th><?php echo $consultas->DES_SPR;?></th>
						<th><?php echo $consultas->DES_PRO;?></th>
						<th><?php echo $consultas->CAN_SPR;?></th>
						<th><?php echo $consultas->ID_SAL;?></th>	
		</tr>
				<?php	endforeach;}
			
			?>
	</tbody>
</table>

</fieldset>
	@stop