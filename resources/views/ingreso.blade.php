	@extends ('layout')
	@section ('VM')
		<div id="bgVentanaModal" class="bgventanaModal">

<div class="modal-dialog modal-lg" style="box-shadow: 0px 0px 1px #000;"> <div class="modal-content">
 <div class = "modal-header">
            <button onClick="javascript:despliegaModal('hidden');" title="Cerrar" class="close"><span style="float: right; color: #000; font-size: 19px;">&times;</span></button>
            <h4 class = "modal-title" id = "myModalLabel">
               REGISTRO DE NUEVO INGRESO
            </h4>
         </div>
			<form class="form-horizontal" name="almacen_form" action="reg_ingreso" method="POST">
			<div class = "modal-body">
			<div class="form-group">
				<label class="col-lg-2 control-label">Almacen :</label>
         		<div class="col-md-4">
           		<select id="alm" class="form-control" placeholder="ELIJA EL ALMACEN" >
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
           		 <select id="rub" class="form-control" placeholder="ELIJA EL RUBRO" onpaste="return false">
								</select>
        		</div>
         		</div>
         	
         <div class="form-group">
            	<label class="col-lg-3 control-label">Nro de factura :</label>
         		<div class="col-md-8">
           		 <input type="number" min="0" name="nro_fac" required="yes" id="nro_fac1" class="form-control" placeholder="NUMERO DE FACTURA" onpaste="return false">
        		</div>
         		</div>
         <div class="form-group">
            	<label class="col-lg-3 control-label">Nro de orden de compra :</label>
         		<div class="col-md-8">
           		 <input type="number" name="nro_com" min="0" id="nro_com1" required="yes" value="" class="form-control" placeholder="NUMERO DE ORDEN DE COMPRA" onpaste="return false">
        		</div>
         		</div>
		 <div class="form-group">
            	<label class="col-lg-3 control-label">Procedencia :</label>
         		<div class="col-md-8">
           		 <input type="text" required="yes" id="pro_pin1" name="pro_pin" value="" class="form-control" placeholder="PROCEDENCIA" onpaste="return false">
        		</div>
         		</div>	
					<table class="table-responsive">
						<button type="button" id="agregar" onclick="javascript:despliegaModal2('visible');" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Agregar Producto</button>
					</table>
</br>
<div class="table-responsive">
				<table id="tabla" class="table table-responsive table-hover">
	<!-- Cabecera de la tabla -->
						<thead>
							<tr>
								<th width="48%">Producto</th>
								<th width="11%">Precio</th>
								<th width="9%">Cantidad</th>
								<th width="9%" class="info">Subtotal</th> 
								<th width="10%">&nbsp;</th>
							</tr>
						</thead>
 
	<!-- Cuerpo de la tabla con los campos -->
						<tbody>
		<!-- fila base para clonar y agregar al final -->
							<tr> 
								<td><input type="text" class="form-control" required="yes" id="producto" name="producto[]" readonly="readonly"/></td>
								<input type="hidden" class="form-control" id="idproducto" name="idproducto[]" required="yes" />
								<input type="hidden" class="form-control" id="pro_pin" name="pro_pin[]"  readonly="readonly"/>
								<td><input type="text" required="required" class="form-control" id="pre_pro" name="pre_pro[]" readonly="readonly"/></td>
								<td><input type="number" step="1" min="0" id="can_pro" value="0" class="form-control" name="can_pro[]" /></td>
								<td class="info"><input type="text" class="form-control" id="sub_pro" name="sub_pro[]" readonly="readonly"/></td>
								<td class="btn btn-danger eliminar"><span class="glyphicon glyphicon-remove"></span> Eliminar</td>								
							</tr>
		<!-- fin de código: fila base -->
 
		<!-- Fila de ejemplo -->
							
		<!-- fin de código: fila de ejemplo -->
 
						</tbody>
					</table>
					<div id="demo" class="alert alert-danger" style="height: auto;"></div>
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
<td class="eliminar2" style="background-color: transparent;"><a href="javascript:despliegaModal2a('hidden');" title="Cerrar" class="eliminar2 close">&times;</a></td>
<h4 class = "modal-title" id = "myModalLabel">
               Agregar productos
            </h4>
</div>
<form class="form-horizontal">
	<div class="modal-body">
		
			
<div id="tablabody" style="overflow: auto;">
		
</div>
	</div>
	</div>

		</fieldset>
</div>
</form>
</div>
<div id="bgVentanaModal3" class="bgventanaModal3">
<div id="" class="modal-dialog">
<div class="modal-content">
<div class = "modal-header">
<a href="javascript:despliegaModal3('hidden');" title="Cerrar" class="close">&times;</a>
<h4 class = "modal-title" id = "myModalLabel">
               Registro de nuevo producto
            </h4>
</div>
	 <div class = "modal-body">
	<form class="form-horizontal">
				<div class="form-group">
            	<label class="col-lg-3 control-label">Item del producto :</label>
         		<div class="col-md-8">
           		<input type="number" min="0" name="" id="itm_prod" value="" class="form-control" placeholder="NUMERO DE ITEM" onpaste="return false">
        		</div>
         		</div>
				<div class="form-group">
            	<label class="col-lg-3 control-label">Descripcion del producto :</label>
         		<div class="col-md-8">
           		<textarea class="form-control" id="des_prod" placeholder="DESCRIPCION DEL PRODUCTO" cols="55" rows="5" onpaste="return false" ></textarea>
        		</div>
         		</div>		
				<div class="form-group">
            	<label class="col-lg-3 control-label">Precio unitario :</label>
         		<div class="col-md-8">
           		<input type="number" step="any" name="" id="pun_prod" class="form-control" placeholder="P/U en Bs." onpaste="return false" >
        		</div>
         		</div>				
					
				<div class = "modal-footer" style="border-top: 0;">
            	<button type = "button" class = "btn btn-danger" onclick="javascript:despliegaModal3('hidden');"><span class="glyphicon glyphicon-remove" style="font-size: 10px;"></span>
               Cancelar
            	</button>
            
            	<button type="button" name="" id="btn_reg"  class = "btn btn-primary"><span style="font-size: 10px;" class="glyphicon glyphicon-plus"></span>
               Registrar
           		</button>
         		</div>		
					
			</form>
	</div>
		</div>
</div>
</div>
<div id="bgVentanaModal4" class="bgventanaModal4">
<div id="" class="modal-dialog">
<div class="modal-content">
 <div class = "modal-header">
<a href="javascript:despliegaModal4('hidden');" title="Cerrar" class="close">&times;</a>
<h4 class = "modal-title" id = "myModalLabel">
               Registro de nuevo producto
            </h4>
</div>
	 <div class = "modal-body">
	<form class="form-horizontal">
				<div class="form-group">
            	<label class="col-lg-3 control-label">Item del producto :</label>
         		<div class="col-md-8">
           		<input type="number" min="0" name="" id="itm_prod2" value="" class="form-control" readonly="readonly" placeholder="NUMERO DE ITEM" onpaste="return false">
        		</div>
         		</div>
				<div class="form-group">
            	<label class="col-lg-3 control-label">Descripcion del producto :</label>
         		<div class="col-md-8">
           		<textarea class="form-control" readonly="readonly" id="des_prod2" placeholder="DESCRIPCION DEL PRODUCTO" cols="55" rows="5" onpaste="return false" ></textarea>
        		</div>
         		</div>		
				<div class="form-group">
            	<label class="col-lg-3 control-label">Precio unitario :</label>
         		<div class="col-md-8">
           		<input type="number" step="any" name="" id="pun_prod2" class="form-control" placeholder="P/U en Bs." onpaste="return false" >
        		</div>
         		</div>				
					
				<div class = "modal-footer" style="border-top: 0;">
            	<button type = "button" class = "btn btn-danger" onclick="javascript:despliegaModal3('hidden');"><span class="glyphicon glyphicon-remove" style="font-size: 10px;"></span>
               Cancelar
            	</button>
            
            	<button type="button" name="" id="btn_reg"  class = "btn btn-primary"><span style="font-size: 10px;" class="glyphicon glyphicon-plus"></span>
               Registrar
           		</button>
         		</div>		
					
			</form>
	</div>
		</div>
</div>
</div>
	@stop
	@section ('contenido')
		<fieldset class="fieldcuerpo"  align="left">
					<legend style="margin-bottom: 0;">Ingresos</legend>
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

	  	<a class="btn btn-success" href="javascript:despliegaModal('visible');"><span class="glyphicon glyphicon-plus"></span> Nuevo ingreso</a>
	  </br>
	  	  </br>
		<table id="example4" class="display" cellspacing="5" width="100%" style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
	<thead style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
            <th>FECHA DE INGRESO</th>
            <th>NRO ORDEN DE COMPRA</th>
            <th>PROCEDENCIA</th>
			<th>PRODUCTO</th>
			<th>CANTIDAD</th>
			<th>PRECIO TOTAL Bs.</th>
			<th>ID INGRESO</th>	
		</tr>
	</thead>
	<tfoot style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
            <th>FECHA DE INGRESO</th>
            <th>NRO ORDEN DE COMPRA</th>
            <th>PROCEDENCIA</th>
			<th>PRODUCTO</th>
			<th>CANTIDAD</th>
			<th>PRECIO TOTAL Bs.</th>
			<th>ID INGRESO</th>
		</tr>
	</tfoot>
	<tbody style="font-size:11px;">
		<?php if(count($consultas)>0){?>
		<tr>
		<?php  
					foreach ($consultas as $consultas):
				         $s= ($consultas->PUN_PRO);
				         $t=  $consultas->CAN_PIN;
				         $u=$t*$s;
					?>
						<th><?php echo $consultas->FEC_ING;?></th>
						<th><?php echo $consultas->NOC_PIN;?></th>
						<th><?php echo $consultas->PRO_PIN;?></th>
						<th><?php echo $consultas->DES_PRO;?></th>
						<th><?php echo $consultas->CAN_PIN;?></th>
						<th><?php echo $u;?></th>
						<th><?php echo $consultas->ID_ING;?></th>	
		</tr>
				<?php	endforeach;}
			
			?>
	</tbody>
</table>

</fieldset>
	@stop