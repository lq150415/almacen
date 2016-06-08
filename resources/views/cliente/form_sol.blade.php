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
              			 Nueva Solicitud 
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
			<div class = "modal-header alert-info">
           
            <h4 class = "modal-title " id = "myModalLabel">
               Productos 
            </h4>
         	</div>
         	<div class = "modal-body">
					<table>
						<button type="button" id="agregar" class="btn btn-success" value="Agregar producto" onclick="javascript:despliegaModal2('visible');"><span class="icon-cart"> </span> Agregar producto</button>
						</br></br>
					</table>
					<div class="table-responsive">
					<table id="tabla" class="table table-hover">
	<!-- Cabecera de la tabla -->
						<thead>
							<tr class="warning">
								<th width="60%">Producto</th>
								<th width="10%">Cantidad</th>
								<th width="20%">&nbsp;</th>
							</tr>
						</thead>
 
	<!-- Cuerpo de la tabla con los campos -->
						<tbody>
		<!-- fila base para clonar y agregar al final -->
							<tr> 
								
								<td ><input type="text" required class="form-control" id="producto2" name="producto2[]" style="width:480px; font-weight: bold;" readonly /></td>
								<input type="hidden" class="txtcampo small" id="producto" name="producto[]" style="width:480px;" readonly/>
								<input type="hidden" class="txtcampo small" id="idproducto" name="idproducto[]" style="width:280px;" readonly="readonly"/>
								<input type="hidden" class="txtcampo small" id="pro_sol" name="pro_pin[]" style="width:580px;" readonly="readonly"/>
								<td><input type="number" min="1"id="can_sol" required class="form-control" name="can_sol[]" style="width:60px; font-weight: bold;" /></td>
								<td class="btn btn-danger eliminar"><span class="glyphicon glyphicon-remove"></span> Eliminar</td>															
							</tr>
		<!-- fin de código: fila base -->
 
		<!-- Fila de ejemplo -->
							
		<!-- fin de código: fila de ejemplo -->
 
						</tbody>
					</table>
<!-- Botón para agregar filas -->
					</div>
					<div class = "modal-footer" style="border-top: none;">
           			 <button type = "submit" class = "btn btn-success"><span style="font-size: 10px; " class="glyphicon glyphicon-check"></span>
               Enviar solicitud
           			 </button>
         			</div>
						
			</form>
	</div>
</div>
</form>
</div>

		
<div id="bgVentanaModal2" class="bgventanaModal2">
<div class="modal-dialog modal-lg">
<div class="modal-content">
 <div class = "modal-header alert-info">
<table style="float: right;"><td class="eliminar" style="background-color: transparent;"><a href="javascript:despliegaModal2a('hidden');" title="Cerrar" class="close">&times;</a></td></table>
<h4 class = "modal-title" id = "myModalLabel">
               Agregar productos
            </h4>
</div>
			<div class="modal-body">
			<table id="example" class="table table-hover" cellspacing="5" width="100%" >
	<thead>
		<tr class="info">
            <th>DESCRIPCION DEL PRODUCTO</th>
			<th data-orderable="false">ACCIONES</th>	
		</tr>
	</thead>
	
	<tbody>
		<tr>
		<?php
					foreach ($productos as $producto):
					?>
						<th><?php echo $producto->DES_PRO;?></th>
						<th><button type="button" title="Agregar producto" onClick="agregavalor(<?php echo "'hidden' ,'".$producto->DES_PRO."','".$producto->id."'"?>);" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span></button>
		</tr>
				<?php	endforeach;
			
			?>
	</tbody>
	</table>
			</div>
		</fieldset>
</div>
</div>
</div>
@stop