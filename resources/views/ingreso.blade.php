	@extends ('layout')
	@section ('VM')
		<div id="bgVentanaModal" class="bgventanaModal">
<div id="VentanaModal" class="VentanaModal">
<a href="javascript:despliegaModal('hidden');" title="Cerrar"><span class="icon-switch" style="float: right; color: #000; font-size: 15px;"></span></a>
		</br>
		<fieldset class="fieldcuerpo" align="left">
			<legend>REGISTRO DE NUEVO INGRESO</legend>
			<form class="formularioreg" name="almacen_form" action="reg_ingreso" method="POST">
			<table>
				<tr>
				
							<td width="100px" class="lblnombre">Almacen </td>
							<td width="180px">
								<select id="alm" class="txtcampo small" placeholder="ELIJA EL ALMACEN" onblur="">
									<option value="">SELECCIONE</option>
							<?php 		
									foreach ($almacenes as $almacen): 
									 echo '<option value="'.$almacen->id.'">'.$almacen->NOM_ALM.'</option>';
							endforeach;
							?>
								</select></td>
							<td width="100px" class="lblnombre">Rubro</td>
							<td width="180px">
							<select id="rub" class="txtcampo small" placeholder="ELIJA EL RUBRO" onpaste="return false">
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
							<tr> 
								<td><input type="text" class="txtcampo small" id="nro_fac" name="nro_fac[]" style="width:80px;" readonly="readonly"/></td>
								<td><input type="text" class="txtcampo small" id="nro_com" name="nro_com[]"style="width:80px;" readonly="readonly"/></td>
								<td><input type="text" class="txtcampo small" id="producto" name="producto[]" style="width:280px;" readonly="readonly"/></td>
								<input type="hidden" class="txtcampo small" id="idproducto" name="idproducto[]" style="width:280px;" readonly="readonly"/>
								<input type="hidden" class="txtcampo small" id="pro_pin" name="pro_pin[]" style="width:280px;" readonly="readonly"/>
								<td><input type="text" class="txtcampo small" id="pre_pro" name="pre_pro[]" style="width:80px;" readonly="readonly"/></td>
							
								<td><input type="text" id="can_pro" class="txtcampo small" name="can_pro[]" style="width:60px;" readonly="readonly"/></td>
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
<table style="float: right;"><td class="eliminar" ><a href="javascript:despliegaModal2a('hidden');" title="Cerrar"><span class="icon-switch" style="float: right; color: #000; font-size: 15px;"></span></a></td></table>
</br>
		<fieldset class="fieldcuerpo" align="left">
			<legend>AGREGAR PRODUCTOS</legend>
			<div>
			<table>
						<tr style="height:40px;">
							  <td width="80px" class="lblnombre">ID Almacen: </td>
							  <td width="240px"><input type="text" id="alm2" disabled="yes" class="txtcampo large"></td>
							  <td width="80px" class="lblnombre">ID Rubro: </td>
							  <td width="240px"><input type="text" id="rub2" value="19" disabled="yes" class="txtcampo large"></td>
						</tr>

						<tr style="height:40px;">
							<td width="80px" class="lblnombre">Nro de factura</td>
							<td width="240px"><input type="text" name="" id="nro_fac1" value="" class="txtcampo large" placeholder="NUMERO DE FACTURA" onpaste="return false"></td>
							<td width="130px" class="lblnombre">Nro de orden de Compra</td>
							<td width="140px"><input type="text" name="" id="nro_com1" value="" class="txtcampo large" placeholder="NUMERO DE ORDEN DE COMPRA" onpaste="return false">
							</td>
						</tr>
						<tr style="height:40px;">	
							<td width="100px" class="lblnombre">Procedencia</td>
							<td width="240px"><input type="text" id="pro_pin1"name="" value="" class="txtcampo large" placeholder="PROCEDENCIA" onpaste="return false"></td>
							<td width="100px" class="lblnombre">Cantidad</td>
							<td width="240px"><input type="text" id="cant" name="" value="" class="txtcampo large" placeholder="CANTIDAD " onpaste="return false"></td>
						</tr>
						
					</table>
					

	  		<fieldset class="fieldcuerpo" align="left">
			<legend>LISTADO DE PRODUCTOS</legend>
			<a href="javascript:despliegaModal3('visible');">+ Nuevo producto</a>
					 	</br>

</br>
<div id="tablabody" style="overflow: auto;">
		
</div>
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
		<fieldset class="fieldcuerpo" align="left">
					<legend>Ingresos</legend>
	  	<div>

	  	<a href="javascript:despliegaModal('visible');">+ Nuevo ingreso</a>
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