	@extends ('cliente/layout_clie')
	@section ('cuerpo')
	<div class="ventanamodal5">
	
	<fieldset class="fieldcuerposol" align="left">
				<script type="text/javascript">
              $(document).ready(function() { setTimeout(function(){ $(".mensajelogin").fadeIn(1500); },0000); });
              $(document).ready(function() { setTimeout(function(){ $(".mensajelogin").fadeOut(1500); },5000); });
            </script>
			<?php if (Session::has('mensaje')):
  				?>
						<div class="mensajelogin" id="mensajebien"><label><?php echo Session::get('mensaje');?></label></div>
			<?php endif;?>
			<legend style="margin-bottom: 0;">REGISTRO DE NUEVA SOLICITUD</legend>
			<form class="formularioreg" method="POST" action="reg_solicitud">
				<fieldset class="fieldcuerpo" align="left">
				<legend style="margin-bottom: 0;">DATOS GENERALES</legend>
				<table >
						<tr style="height: 30px; font-weight: bold;">
							<td width="100px" class="lblnombre">ID</td>
							<td width="240px" class="txtcampo"><?php echo Auth::user()->id?></td>
							<td width="100px" class="lblnombre">Nombre</td>
							<td width="240px" class="txtcampo"><?php echo Auth::user()->NOM_USU?></td>
						</tr>
						<tr style="height: 30px; font-weight: bold;">
							<td width="100px" class="lblnombre">Ap. Paterno</td>
							<td width="240px"class="txtcampo"><?php echo Auth::user()->APA_USU?></td>
							<td width="100px" class="lblnombre">Ap. Materno</td>
							<td width="240px" class="txtcampo"><?php echo Auth::user()->AMA_USU?></td>
						</tr>
						<tr style="height: 30px; font-weight: bold;">
							<td width="100px" class="lblnombre">Area</td>
							<td width="240px"class="txtcampo"><?php echo Auth::user()->ARE_USU?>
							</td>
							<td width="100px" class="lblnombre">Cargo</td>
							<td width="240px"class="txtcampo"><?php echo Auth::user()->CAR_USU?>
							</td>
							<input type="hidden" value="0" name="dest"></input>
						</tr>
						</table>
						</fieldset>
				<fieldset class="fieldcuerpo" align="left" >
					<legend style="margin-bottom: 0;">PRODUCTOS</legend>
					<table>
						<button type="button" id="agregar" style="background-color: #0c6; padding: 7px 5px 7px 3px;" value="Agregar producto" onclick="javascript:despliegaModal2('visible');" class="botones"><span class="icon-cart"> </span> Agregar producto</button>
					</table>

					<table id="tabla">
	<!-- Cabecera de la tabla -->
						<thead>
							<tr>
								<th>Producto</th>
								<th>Cantidad</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
 
	<!-- Cuerpo de la tabla con los campos -->
						<tbody>
		<!-- fila base para clonar y agregar al final -->
							<tr> 
								
								<td ><input type="text" required class="txtcampo small" id="producto2" name="producto2[]" style="width:480px; font-weight: bold;" readonly /></td>
								<input type="hidden" class="txtcampo small" id="producto" name="producto[]" style="width:480px;" readonly/>
								<input type="hidden" class="txtcampo small" id="idproducto" name="idproducto[]" style="width:280px;" readonly="readonly"/>
								<input type="hidden" class="txtcampo small" id="pro_sol" name="pro_pin[]" style="width:580px;" readonly="readonly"/>
								<td><input type="number" min="1"id="can_sol" required class="txtcampo small" name="can_sol[]" style="width:60px; font-weight: bold;" /></td>
								<td class="eliminar" style="">Eliminar</td>								
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
									<input type="submit" name="" class="botones ico-btnsave" value="ENVIAR SOLICITUD">
                 					<input type="reset"  onclick="document.location.reload();" class="botones ico-btnlimpiar" value="LIMPIAR DATOS">
                 				</td>
							</tr>
						</table>
			

				</fieldset>
					
			</form>
		</fieldset>
	
		
<div id="bgVentanaModal2" class="bgventanaModal2">
<div id="VentanaModal2" class="VentanaModal2">
<table style="float: right;"><td class="eliminar" style="padding: 0; background-color: transparent;"><a href="javascript:despliegaModal2a('hidden');" title="Cerrar"><span class="icon-switch" style="float: right; color: #000; font-size: 15px;"></span></a></td></table>
</br>
		<fieldset class="fieldcuerpo" align="left">
			<legend style="margin-bottom: 0;">AGREGAR PRODUCTOS</legend>
			<div>
			<table id="example" class="display" cellspacing="5" width="100%" style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
	<thead style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
            <th>DESCRIPCION DEL PRODUCTO</th>
			<th>ACCIONES</th>	
		</tr>
	</thead>
	<tfoot style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
            <th>DESCRIPCION DEL PRODUCTO</th>
			<th>ACCIONES</th>	
		</tr>
	</tfoot>
	<tbody style="font-size:11px;">
		<tr>
		<?php
					foreach ($productos as $producto):
					?>
						<th><?php echo $producto->id;?></th>
						<th><?php echo $producto->DES_PRO;?></th>
						<th><a href="javascript:agregavalor(<?php echo "'hidden' ,'".$producto->DES_PRO."','".$producto->id."'"?>);">Agregar</a>
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