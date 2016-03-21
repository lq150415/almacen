	@extends ('../layout')
	
	@section ('VM')
		<div id="bgVentanaModal" class="bgventanaModal">
<div id="VentanaModal" class="VentanaModal">
		<a href="javascript:despliegaModal('hidden');" title="Cerrar"><span class="icon-undo2" style="float: right; color: #000; font-size: 20px;"></span></a>
		</br>
		<fieldset class="fieldcuerpo" align="left">
			<legend>REGISTRO DE NUEVO ALMACEN</legend>
		<form class="formularioreg" method="POST" action="almacen/registrar">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<table style="margin-top: 4%;  margin-left: 10%;">
						<tr style="height: 50px;">
							<td width="130px" class="lblnombre">Nombre del almacen</td>
							<td width="250px"><input type="text" name="nom_alm" class="txtcampo large" placeholder="NOMBRE DEL ALMACEN" onkeypress="return sololetras(event);" onpaste="return false" ></td>
						</tr>
						<tr style="height: 50px;">
							<td width="130px" class="lblnombre">Ubicación del almacen</td>
							<td width="250px"><input type="text" name="ubi_alm" class="txtcampo large" placeholder="NOMBRE DEL ALMACEN" onkeypress="return sololetras(event);" onpaste="return false" ></td>
						</tr>
					</table>
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

	@stop

	@section ('contenido')

		<fieldset class="fieldcuerpo" align="left">
					<legend>ALMACENES</legend>
			  	<div>

	  	<a href="javascript:despliegaModal('visible');">+ Nuevo almacen</a>
	  	</br>
	  </br>
		<table id="example" class="display" cellspacing="5" width="100%" style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
	<thead style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
            <th>NOMBRE DEL ALMACEN</th>
			<th>UBICACION DEL ALMACEN</th>
			<th>ACCIONES</th>	
		</tr>
	</thead>
	<tbody style="font-size:11px;">
		<tr>
		<?php
					foreach ($almacenes as $almacen):
					?>
						<th><?php echo $almacen->id;?></th>
						<th><?php echo $almacen->NOM_ALM;?></th>
            			<th><?php echo $almacen->UBI_ALM;?></th>
						<th><a href="rubro/<?php echo $almacen->id;?>">Ver &nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;</a><a href=""> Modificar</a></th>	
		</tr>
				<?php	endforeach;
			
			?>
	</tbody>
	<tfoot style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
            <th>NOMBRE DEL ALMACEN</th>
			<th>UBICACION DEL ALMACEN</th>
			<th>ACCIONES</th>
			
		</tr>
	</tfoot>
	
</table>
</div>
</fieldset>
	@stop