	@extends ('layout')
	@section ('VM')
		<div id="bgVentanaModal" class="bgventanaModal">
<div id="VentanaModal" class="VentanaModal">
<a href="javascript:despliegaModal('hidden');" title="Cerrar"><span class="icon-undo2" style="float: right; color: #000; font-size: 20px;"></span></a>
		</br>
		<fieldset class="fieldcuerpo" align="left">
			<legend>REGISTRO DE NUEVO PRODUCTO</legend>
			<form class="formularioreg">
				<table style="margin-top: 4%;  margin-left: 10%;">
						<tr style="height: 50px;">
							<td width="130px" class="lblnombre">Nombre del producto</td>
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
							<td width="130px" class="lblnombre">Cantidad del producto </td>
							<td width="250px"><input type="text" name="" class="txtcampo large" placeholder="CANTIDAD DEL PRODUCTO" onkeypress="return sololetras(event);" onpaste="return false" ></td>
						</tr>
					</table>
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
					<legend>PRODUCTOS</legend>
	  	<div>

	  	<a href="javascript:despliegaModal('visible');">+ Nuevo producto</a>
	  	</br>
	  	</br>	  	
	  	<span class="titulo">ID Rubro : </span><span  class="subtitulo"># rubro</span> 
	  	</br>	
	  	</br>
	  	<span class="titulo">Nombre del rubro : </span><span class="subtitulo"># rubro</span>
	  	</br>	
	  	</br>
	  	<span class="titulo">Cantidad de productos : </span><span class="subtitulo"># rubro</span>
	  	</div>	
	  	</br>
	  	<fieldset class="fieldcuerpo" align="left">
					<legend>DETALLE</legend>
		<table id="example" class="display" cellspacing="5" width="100%" style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
	<thead style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
            <th>NOMBRE DEL PRODUCTO</th>
			<th>PRECIO UNITARIO</th>
			<th>CANTIDAD DISPONIBLE</th>
			<th>ACCIONES</th>	
		</tr>
	</thead>
	<tfoot style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
            <th>NOMBRE DEL PRODUCTO</th>
			<th>PRECIO UNITARIO</th>
			<th>CANTIDAD DISPONIBLE</th>
			<th>ACCIONES</th>	
		</tr>
	</tfoot>
	<tbody style="font-size:11px;">
		
	</tbody>
</table>
</fieldset>
</fieldset>
	@stop