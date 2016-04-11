	@extends ('layout')
	@section ('VM')
		

		<div id="bgVentanaModal" class="bgventanaModal">
<div id="VentanaModal" class="VentanaModal">
<a href="javascript:despliegaModal('hidden');" title="Cerrar"><span class="icon-switch" style="float: right; color: #000; font-size: 15px;"></span></a>
</br>

<center>
	<fieldset class="fieldcuerpo" align="left">
			<legend>REGISTRO DE NUEVA SOLICITUD</legend>
			<form class="formularioreg">
				<fieldset class="fieldcuerpo" align="left">
				<legend>DATOS GENERALES</legend>
				<table >
						<tr style="height: 30px;">
							<td width="100px" class="lblnombre">ID</td>
							<td width="240px" ><input type="label" name="ntm_arc" class="txtcampo" placeholder="ID DE USUARIO" onkeypress="return solonumeros(event);" onpaste="return false"></td>
							<td width="100px" class="lblnombre">Nombre</td>
							<td width="240px" ><input type="text" name="ncj_arc" class="txtcampo" placeholder="NOMBRE" onkeypress="return solonumeros(event);" onpaste="return false"></td>
						</tr>
						<tr style="height: 30px;">
							<td width="100px" class="lblnombre">Ap. Paterno</td>
							<td width="240px"><input type="text" name="foj_arc" class="txtcampo" placeholder="APELLIDO PATERNO" onkeypress="return solonumeros(event);" onpaste="return false"></td>
							<td width="100px" class="lblnombre">Ap. Materno</td>
							<td width="240px" ><input type="text" name="ncj_arc" class="txtcampo" placeholder="APELLIDO MATERNO" onkeypress="return solonumeros(event);" onpaste="return false"></td>
						</tr>
						<tr style="height: 30px;">
							<td width="100px" class="lblnombre">Area</td>
							<td width="240px">
								<select name="cub_arc" class="txtcampo large2">
									<option value="">SELECCIONE</option>
									<option value="Carpetilla">Recursos humanos</option>
									<option value="Carpeta de palanca">Tecnologias de Informacion</option>
									<option value="Otros">etc</option>
								</select>
							</td>
							<td width="100px" class="lblnombre">Cargo</td>
							<td width="240px">
								<select name="cub_arc" class="txtcampo large2">
									<option value="">SELECCIONE</option>
									<option value="Carpetilla">Director</option>
									<option value="Carpeta de palanca">etc</option>
									<option value="Otros">etc</option>
								</select>
							</td>
						</tr>
						</table>
						</fieldset>
						<fieldset class="fieldcuerpo" align="left" >
					<legend>PRODUCTOS</legend>
					<table>
						<tr style="height:30px;">
							
							<td width="100px" class="lblnombre">Usuario</td>
							<td width="240px"><input type="text" name="nic_usu" value="" class="txtcampo large" placeholder="CI / NICK DE USUARIO" onpaste="return false"></td>
							<td width="100px" class="lblnombre">Nivel de usuario</td>
							<td width="240px">
								<select name="cub_arc" class="txtcampo large2">
									<option value="">SELECCIONE</option>
									<option value="Carpetilla">Administrador</option>
									<option value="Carpeta de palanca">Jefe de Recursos</option>
									<option value="Otros">Solicitante</option>
								</select>
							</td>
						</tr>
						<tr style="height:30px;">
							
							<td width="100px" class="lblnombre">Password</td>
							<td width="240px"><input type="password" name="pas_usu" value="" class="txtcampo large" placeholder="CONTRASEÑA" onpaste="return false"></td>
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
		</center>
</div>
</div>

	@stop
	@section ('contenido')
	<div id="div2"></div>
		<fieldset class="fieldcuerpo" align="left">
					<legend>SOLICITUDES</legend>
	  	<div>

	  	<a href="javascript:despliegaModal('visible');">+ Nueva solicitud</a>
	  	<fieldset class="fieldcuerpo" align="left">
					<legend>DETALLE</legend>
		<div id="solicitud"></div>

</fieldset>
</fieldset>
	@stop