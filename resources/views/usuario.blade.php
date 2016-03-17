	@extends ('layout')
	@section ('VM')
		<div id="bgVentanaModal" class="bgventanaModal">
<div id="VentanaModal" class="VentanaModal">
<a href="javascript:despliegaModal('hidden');" title="Cerrar"><span class="icon-undo2" style="float: right; color: #000; font-size: 20px;"></span></a>
		</br>
		<fieldset class="fieldcuerpo" align="left">
			<legend>REGISTRO DE NUEVO USUARIO</legend>
			<form class="formularioreg" method="POST" action="usuario/registrar">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<fieldset class="fieldcuerpo" align="left">
				<legend>DATOS PERSONALES</legend>
				<table >
						<tr style="height: 30px;">
							<td width="100px" class="lblnombre">CI</td>
							<td width="240px" ><input type="text" name="ci_usu" class="txtcampo" placeholder="NUMERO DE CARNET" onkeypress="return solonumeros(event);" onpaste="return false"></td>
							<td width="100px" class="lblnombre">Nombre</td>
							<td width="240px" ><input type="text" name="nom_usu" class="txtcampo" placeholder="NOMBRE" onkeypress="return solonumeros(event);" onpaste="return false"></td>
						</tr>
						<tr style="height: 30px;">
							<td width="100px" class="lblnombre">Ap. Paterno</td>
							<td width="240px"><input type="text" name="apa_usu" class="txtcampo" placeholder="APELLIDO PATERNO" onkeypress="return solonumeros(event);" onpaste="return false"></td>
							<td width="100px" class="lblnombre">Ap. Materno</td>
							<td width="240px" ><input type="text" name="ama_usu" class="txtcampo" placeholder="APELLIDO MATERNO" onkeypress="return solonumeros(event);" onpaste="return false"></td>
						</tr>
						<tr style="height: 30px;">
							<td width="100px" class="lblnombre">Area</td>
							<td width="240px">
								<select name="are_usu" class="txtcampo large2">
									<option value="">SELECCIONE</option>
									<option value="Recursos Humanos">Recursos humanos</option>
									<option value="Tecnologias de Informacion">Tecnologias de Informacion</option>
									<option value="Otros">etc</option>
								</select>
							</td>
							<td width="100px" class="lblnombre">Cargo</td>
							<td width="240px">
								<select name="car_usu" class="txtcampo large2">
									<option value="">SELECCIONE</option>
									<option value="Director">Director</option>
									<option value="Otros1">etc</option>
									<option value="Otros2">etc</option>
								</select>
							</td>
						</tr>
						</table>
						</fieldset>
						<fieldset class="fieldcuerpo" align="left" >
					<legend>DATOS DE CUENTA</legend>
					<table>
						<tr style="height:30px;">
							
							<td width="100px" class="lblnombre">Usuario</td>
							<td width="240px"><input type="text" name="nic_usu" value="" class="txtcampo large" placeholder="CI / NICK DE USUARIO" onpaste="return false"></td>
							<td width="100px" class="lblnombre">Nivel de usuario</td>
							<td width="240px">
								<select name="niv_usu" class="txtcampo large2">
									<option value="">SELECCIONE</option>
									<option value="0">Administrador</option>
									<option value="1">Jefe de Recursos</option>
									<option value="2">Solicitante</option>
								</select>
							</td>
						</tr>
						<tr style="height:30px;">
							
							<td width="100px" class="lblnombre">Password</td>
							<td width="240px"><input type="password" name="password" value="" class="txtcampo large" placeholder="CONTRASEÑA" onpaste="return false"></td>
						</tr>
						<tr style="height:30px;">
							<td width="100px" class="lblnombre">Repita la contraseña</td>
							<td width="240px"><input type="password" name="conf_pas" class="txtcampo large" placeholder="REPITA CONTRASEÑA"  onpaste="return false"></td>
						</tr>
					</table>	
				</fieldset>
					<table style="margin-left: 30%;">
						<tr style="height: 50px;">
							<td>
								<input type="submit" name="submit_reg_arc" class="botones ico-btnsave" value="REGISTRAR">
                 				<input type="reset"  onclick="document.location.reload();" class="botones ico-btnlimpiar" value="LIMPIAR DATOS">
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
					<legend>Usuarios</legend>
	  	<div>

	  	<a href="javascript:despliegaModal('visible');">+ Nuevo usuario</a>
	  	</br>
	  	</br>	  	
	  	</div>
	  	<fieldset class="fieldcuerpo" align="left">
					<legend>DETALLE</legend>
		<table id="example" class="display" cellspacing="5" width="100%" style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
	<thead style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
			<th>C.I.</th>
            <th>NOMBRE</th>
			<th>APELLIDO PATERNO</th>
			<th>APELLIDO MATERNO</th>
			<th>AREA</th>
			<th>CARGO</th>
			<th>NIVEL</th>
			<th>ACCIONES</th>	
		</tr>
	</thead>
		<tbody style="font-size:11px;">
		<tr>
		<?php

	
					foreach ($usuarios as $usuario):
					?>
						<th><?php echo $usuario->id;?></th>
						<th><?php echo $usuario->CI_USU;?></th>
						<th><?php echo $usuario->NOM_USU;?></th>
            			<th><?php echo $usuario->APA_USU;?></th>
						<th><?php echo $usuario->AMA_USU;?></th>
						<th><?php echo $usuario->ARE_USU;?></th>
						<th><?php echo $usuario->CAR_USU;?></th>
						<th><?php echo $usuario->NIV_USU;?></th>
						<th><a href="">Ver</a><a href="·"> Modificar</a></th>	
		</tr>
				<?php	endforeach;
			
			?>
	</tbody>
	<tfoot style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
			<th>C.I.</th>
            <th>NOMBRE</th>
			<th>APELLIDO PATERNO</th>
			<th>APELLIDO MATERNO</th>
			<th>AREA</th>
			<th>CARGO</th>
			<th>NIVEL</th>
			<th>ACCIONES</th>	
		</tr>
	</tfoot>

</table>
</fieldset>

	@stop