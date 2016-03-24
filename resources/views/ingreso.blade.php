	@extends ('layout')
	@section ('VM')
		<div id="bgVentanaModal" class="bgventanaModal">
<div id="VentanaModal" class="VentanaModal">
<a href="javascript:despliegaModal('hidden');" title="Cerrar"><span class="icon-switch" style="float: right; color: #000; font-size: 15px;"></span></a>
		</br>
		<fieldset class="fieldcuerpo" align="left">
			<legend>REGISTRO DE NUEVO INGRESO</legend>
			<form class="formularioreg" name="almacen_form">
			
			<table>
				<tr>
							<td width="100px" class="lblnombre">Almacen </td>
							<td width="180px">
								<select id="alm" class="txtcampo small" placeholder="ELIJA EL ALMACEN" onblur="">
									<option value="">SELECCIONE</option>
							<?php 		
									foreach ($almacenes as $almacen): ?>
									<option value="<?php echo $almacen->id;?>"><?php echo $almacen->NOM_ALM?>
									</option>
							<?php endforeach;
							?>
								</select></td>
							<td width="100px" class="lblnombre">Rubro </td>
							<td width="180px">
							<select id="rub" name="rub" class="txtcampo small" placeholder="ELIJA EL RUBRO" onpaste="return false">
									<option value="">SELECCIONE</option>
							<?php 		
									foreach ($rubros as $rubro): ?>
									<option value="<?php echo $rubro->id;?>"><?php echo $rubro->NOM_RUB?>
									</option>
							<?php endforeach;
							?>
								</select></td>
						</tr>	
			</table>	
			</br>

					<table>
						<input type="button" id="agregar" value="Agregar producto" onclick="javascript:despliegaModal2('visible');" class="botones"/>
					</table>

					<table id="tabla">
	<!-- Cabecera de la tabla -->
						<thead>
							<tr>
								<th>Nº de factura</th>
								<th>Nº orden de compra</th>
								<th>Producto</th>
								<th>Precio</th>
								<th>Cantidad</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
 
	<!-- Cuerpo de la tabla con los campos -->
						<tbody>
 
		<!-- fila base para clonar y agregar al final -->
							<tr class="fila-base"> 
								<td><input type="text" class="txtcampo small" style="width:80px;" disabled="on"/></td>
								<td><input type="text" class="txtcampo small" style="width:80px;" disabled="on"/></td>
								<td><input type="text" class="txtcampo small" style="width:280px;" disabled="on"/></td>
								<td><input type="text" class="txtcampo small" style="width:80px;" disabled="on"/></td>
							
								<td><input type="text" class="txtcampo small" style="width:60px;" /></td>
								<td class="eliminar" style="border-radius: 100%; background:red; color:#fff; font-weight: bold;">&nbsp;&nbsp;-&nbsp;</td>								
							</tr>
		<!-- fin de código: fila base -->
 
		<!-- Fila de ejemplo -->
							
		<!-- fin de código: fila de ejemplo -->
 
						</tbody>
					</table>
<!-- Botón para agregar filas -->
				
						<table style="margin-left: 30%;">
							<tr style="height: 50px;">
								<td>
									<input type="submit" name="" class="botones ico-btnsave" value="REGISTRAR">
                 					<input type="reset"  onclick="document.location.reload();" class="botones ico-btnlimpiar" value="LIMPIAR DATOS">
                 				</td>
							</tr>
						</table>
			</form>
		</fieldset>
</div>
</div>
<div id="bgVentanaModal2" class="bgventanaModal2">
<div id="VentanaModal2" class="VentanaModal2">
<a href="javascript:despliegaModal2('hidden');" title="Cerrar"><span class="icon-switch" style="float: right; color: #000; font-size: 15px;"></span></a>
</br>
		<fieldset class="fieldcuerpo" align="left">
			<legend>AGREGAR PRODUCTOS</legend>
			<div>
<table>
						<tr style="height:40px;">
							
							<td width="80px" class="lblnombre">Nro de factura</td>
							<td width="240px"><input type="text" name="" value="" class="txtcampo large" placeholder="NUMERO DE FACTURA" onpaste="return false"></td>
							<td width="130px" class="lblnombre">Nro de orden de Compra</td>
							<td width="140px"><input type="text" name="" value="" class="txtcampo large" placeholder="NUMERO DE ORDEN DE COMPRA" onpaste="return false">
							</td>
						</tr>
						<tr style="height:40px;">	
							<td width="100px" class="lblnombre">Procedencia</td>
							<td width="240px"><input type="text" name="" value="" class="txtcampo large" placeholder="PROCEDENCIA" onpaste="return false"></td>
							<td width="100px" class="lblnombre">Cantidad</td>
							<td width="240px"><input type="text" name="" value="" class="txtcampo large" placeholder="CANTIDAD " onpaste="return false"></td>
						</tr>
						
					</table>
					

	  		<fieldset class="fieldcuerpo" align="left">
			<legend>LISTADO DE PRODUCTOS</legend>
			<a href="javascript:despliegaModal3('visible');">+ Nuevo producto</a>
					 	</br>

</br>
			<table id="example2" class="display" cellspacing="5" width="100%" style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
	<thead style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
            <th>DESCRIPCION DEL PRODUCTO</th>
			<th>PRECIO UNITARIO</th>
			<th>ACCIONES</th>	
		</tr>
	</thead>
	<tfoot style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
            <th>DESCRIPCION DEL PRODUCTO</th>
			<th>PRECIO UNITARIO</th>
			<th>ACCIONES</th>	
		</tr>
	</tfoot>
	<tbody style="font-size:11px;">
		<tr>
		<?php
		if(isset($clave)){
			$clave=utf8_decode($_POST['clave']);
			$productos2 = DB::table('productos')->where('ID_RUB','=',$clave)->get();
			foreach ($productos2 as $producto):
		?>
			<th><?php echo $producto->id;?></th>
            <th><?php echo $producto->DES_PRO;?></th>
			<th><?php echo $producto->PUN_PRO;?></th>
			<th>ACCIONES</th>	
		</tr>
			<?php	
			endforeach;}else{ echo 'nada';
		}?>

			
	</tbody>
	</table>
	</div>
		</fieldset>
</div>
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
							<td width="250px"><input type="text" name="" class="txtcampo large2" placeholder="NOMBRE DEL PRODUCTO" onkeypress="return sololetras(event);" onpaste="return false" ></td>
						</tr>
						<tr style="height: 50px;">
							<td width="130px" class="lblnombre">Descripcion del producto</td>
							<td><textarea class="txtcampo textarea" placeholder="DESCRIPCION DEL PRODUCTO" cols="55" rows="5" onpaste="return false" ></textarea></td>
						</tr>
						<tr style="height: 50px;">
							<td width="130px" class="lblnombre">Precio unitario </td>
							<td width="250px"><input type="text" name="" class="txtcampo large" placeholder="P/U en Bs." onkeypress="return sololetras(event);" onpaste="return false" ></td>
						</tr>
							
					</table>
					<table style="margin-left: 30%;">
						<tr style="height: 50px;">
							<td>
								<input type="button" name="" class="botones ico-btnsave" value="REGISTRAR">
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
		<fieldset class="fieldcuerpo" align="left">
					<legend>Ingresos</legend>
	  	<div>

	  	<a href="javascript:despliegaModal('visible');">+ Nuevo ingreso</a>
	  	<fieldset class="fieldcuerpo" align="left">
					<legend>DETALLE</legend>
		<table id="example" class="display" cellspacing="5" width="100%" style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
	<thead style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
            <th>FECHA DE SOLICITUD</th>
			<th>USUARIO</th>
			<th>ACCIONES</th>	
		</tr>
	</thead>
	<tfoot style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
            <th>FECHA DE SOLICITUD</th>
			<th>USUARIO</th>
			<th>ACCIONES</th>		
		</tr>
	</tfoot>
	<tbody style="font-size:11px;">
		
	</tbody>
</table>
</fieldset>
</fieldset>
	@stop