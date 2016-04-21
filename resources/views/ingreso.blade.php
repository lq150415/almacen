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
					<table class="table-responsive">
						<button type="button" id="agregar" onclick="javascript:despliegaModal2('visible');" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Agregar Producto</button>
					</table>
</br>
<div class="table-responsive">
					<table id="tabla" class="table table-responsive table-hover">
	<!-- Cabecera de la tabla -->
						<thead>
							<tr>
								<th width="12%">Nº de factura</th>
								<th width="12%">Nº orden de compra</th>
								<th width="48%">Producto</th>
								<th width="9%">Precio</th>
								<th width="9%">Cantidad</th>
								<th width="10%">&nbsp;</th>
							</tr>
						</thead>
 
	<!-- Cuerpo de la tabla con los campos -->
						<tbody>
		<!-- fila base para clonar y agregar al final -->
							<tr> 
								<td><input type="text" class="form-control" id="nro_fac" name="nro_fac[]" readonly="readonly"/></td>
								<td><input type="text" class="form-control" id="nro_com" name="nro_com[]"readonly="readonly"/></td>
								<td><input type="text" class="form-control" id="producto" name="producto[]" readonly="readonly"/></td>
								<input type="hidden" class="form-control" id="idproducto" name="idproducto[]" readonly="readonly"/>
								<input type="hidden" class="form-control" id="pro_pin" name="pro_pin[]"  readonly="readonly"/>
								<td><input type="text" class="form-control" id="pre_pro" name="pre_pro[]" readonly="readonly"/></td>
							
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
           	<input type="text" id="alm2" readonly="readonly" class="form-control">
        </div>
        	<label class="col-md-2 control-label">Id rubro :</label>
         <div class="col-md-2">
           <input type="text" id="rub2" value="19" readonly="readonly" class="form-control">
        		</div>
         </div>
         <div class="form-group">
            	<label class="col-lg-3 control-label">Nro de factura :</label>
         		<div class="col-md-8">
           		 <input type="number" name="" id="nro_fac1" value="" class="form-control" placeholder="NUMERO DE FACTURA" onpaste="return false">
        		</div>
         		</div>
        <div class="form-group">
            	<label class="col-lg-3 control-label">Nro de orden de compra :</label>
         		<div class="col-md-8">
           		 <input type="number" name="" id="nro_com1" value="" class="form-control" placeholder="NUMERO DE ORDEN DE COMPRA" onpaste="return false">
        		</div>
         		</div>
		 <div class="form-group">
            	<label class="col-lg-3 control-label">Procedencia :</label>
         		<div class="col-md-8">
           		 <input type="text" id="pro_pin1"name="" value="" class="form-control" placeholder="PROCEDENCIA" onpaste="return false">
        		</div>
         		</div>	
         <div class="form-group">
            	<label class="col-lg-3 control-label">Cantidad :</label>
         		<div class="col-md-8">
           		 <input type="number" id="cant" name="" value="" class="form-control" placeholder="CANTIDAD " onpaste="return false">
        		</div>
         		</div>
	</form>
			<a class="btn btn-primary" href="javascript:despliegaModal3('visible');">+ Nuevo producto</a>
					 	</br>

</br>
<div id="tablabody" style="overflow: auto;">
		
</div>
	</div>
	</div>
		</fieldset>
</div>
</form>
</div>
<div id="bgVentanaModal3" class="bgventanaModal3">
<div id="VentanaModal3" class="VentanaModal3">
<a href="javascript:despliegaModal3('hidden');" title="Cerrar"><span class="icon-switch" style="float: right; color: #000; font-size: 20px;"></span></a>
		</br>
		<fieldset class="fieldcuerpo" align="left">
			<legend>REGISTRO DE NUEVO PRODUCTO</legend>
			<form class="formularioreg">
				<table style="margin-top: 4%;  margin-left: 10%;">
						<tr style="height: 50px;">
							<td width="130px" class="lblnombre">Item del producto</td>
							<td width="250px"><input type="text" name="" id="itm_prod" class="txtcampo large2" placeholder="NOMBRE DEL PRODUCTO" onpaste="return false" ></td>
						</tr>
						<tr style="height: 50px;">
							<td width="130px" class="lblnombre">Descripcion del producto</td>
							<td><textarea class="txtcampo textarea" id="des_prod" placeholder="DESCRIPCION DEL PRODUCTO" cols="55" rows="5" onpaste="return false" ></textarea></td>
						</tr>
						<tr style="height: 50px;">
							<td width="130px" class="lblnombre">Precio unitario </td>
							<td width="250px"><input type="text" name="" id="pun_prod" class="txtcampo large" placeholder="P/U en Bs." onkeypress="return sololetras(event);" onpaste="return false" ></td>
						</tr>
						<input type="hidden" id="can_prod" value="0"></input>
							
					</table>
					<table style="margin-left: 30%;">
						<tr style="height: 50px;">
							<td>
								<input type="button" name="" id="btn_reg" class="botones ico-btnsave" value="REGISTRAR">
                 				<input type="reset"  onclick="javascript:despliegaModal3('hidden');" class="botones ico-btnlimpiar" value="LIMPIAR DATOS">
                 			</td>
						</tr>
					</table>
			</form>
		</fieldset>
</div>
</div>
	@stop
	@section ('contenido')
		<fieldset class="fieldcuerpo"  align="left">
					<legend style="margin-bottom: 0;">Ingresos</legend>
	  	<div>

	  	<a class="btn btn-success" href="javascript:despliegaModal('visible');"><span class="glyphicon glyphicon-plus"></span> Nuevo ingreso</a>
	  	<fieldset class="fieldcuerpo" align="left">
					<legend>DETALLE</legend>
		<table id="example" class="display" cellspacing="5" width="100%" style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
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
</fieldset>
	@stop