	@extends ('layout')
	@section ('VM')
		

		<div id="bgVentanaModal" class="bgventanaModal">
<div id="VentanaModal" class="VentanaModal">
<a href="javascript:despliegaModal('hidden');" title="Cerrar"><span class="icon-switch" style="float: right; color: #000; font-size: 15px;"></span></a>

<center>
	<fieldset class="fieldcuerpo" align="left">
			<legend  style="margin-bottom: 0;">REGISTRO DE NUEVA SOLICITUD</legend>
			<form class="formularioreg">
				<fieldset class="fieldcuerpo" align="left">
				<legend style="margin-bottom: 0;">DATOS GENERALES</legend>
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
					<legend style="margin-bottom: 0;">PRODUCTOS</legend>
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
					<legend style="margin-bottom: 0;">SOLICITUDES</legend>
	  	<div>
	  	<button onClick="javascript:despliegaModal('visible');" class="btn btn-success" style="float: left;"><span class="glyphicon glyphicon-plus"> </span> Nueva solicitud</button>
	  	<a href="solicitudes" class="btn btn-info" style="float: right;"><span class="glyphicon glyphicon-search"> </span> Ver todas las solicitudes <span class="btn btn-danger" style="padding: 2px;"id="leidas"></span></a>
	  	</br>
	  	</br>
	  	 <div class = "modal-header alert-success">
            <h4 class = "modal-title" id = "myModalLabel">
               Recientes 
            </h4>
         </div>
		<div id="solicitud"></div>

</fieldset>
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
               Revisar solicitud 
            </h4>
         </div>
       <form class="form-horizontal" name="almacen_form" action="enviarevision" method="POST">
         <div class = "modal-body">
         <input type="hidden" id="id_sol" name="id_sol">
            <div class="form-group">
            	<label class="col-lg-3 control-label">Fecha de solicitud:</label>
         		<div class="col-md-8">
           		 <input type="text" min="0" name="" id="fec_sol" class="form-control" readonly="readonly">
        		</div>
         		</div>
         	<div class="form-group">
            	<label class="col-lg-3 control-label">Solicitante:</label>
         		<div class="col-md-8">
           		 <input type="text" name="usu_sol" id="usu_sol" value="" class="form-control" readonly="readonly">
        		</div>
         		</div>
         	<div class="table-responsive" id="prod_sol">
					
				</div>
         
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->
	@stop