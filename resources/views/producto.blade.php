	@extends ('layout')
	@section ('VM')
		<div id="bgVentanaModal" class="bgventanaModal">
<div id="VentanaModal" class="VentanaModal">
<a href="javascript:despliegaModal('hidden');" title="Cerrar"><span class="icon-undo2" style="float: right; color: #000; font-size: 20px;"></span></a>
		</br>
		<fieldset class="fieldcuerpo" align="left">
			<legend>REGISTRO DE NUEVO PRODUCTO</legend>
			<form class="formularioreg" method="POST" action="<?php echo $id;?>/registro">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<table style="margin-top: 4%;  margin-left: 10%;">
						<tr style="height: 50px;">
						
							<td width="130px" class="lblnombre">Item del producto</td>
							<td width="250px"><input type="text" name="itm_pro" class="txtcampo large2" placeholder="NOMBRE DEL PRODUCTO" onkeypress="return sololetras(event);" onpaste="return false" ></td>
						</tr>
						<tr style="height: 50px;">
							<td width="130px" class="lblnombre">Descripcion del producto</td>
							<td><textarea class="txtcampo textarea" placeholder="DESCRIPCION DEL PRODUCTO" cols="55" rows="5" onpaste="return false" name="des_pro"></textarea></td>
						</tr>
						<tr style="height: 50px;">
							<td width="130px" class="lblnombre">Precio unitario </td>
							<td width="250px"><input type="text" name="pun_pro" class="txtcampo large" placeholder="P/U en Bs." onkeypress="return sololetras(event);" onpaste="return false" ></td>
						</tr>
							<td width="130px" class="lblnombre">Cantidad del producto </td>
							<td width="250px"><input type="text" name="can_pro" class="txtcampo large" placeholder="CANTIDAD DEL PRODUCTO" onkeypress="return sololetras(event);" onpaste="return false" ></td>
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
					<legend>PRODUCTOS</legend>
	  	<div>

	  	<a href="javascript:despliegaModal('visible');">+ Nuevo producto</a>
	  	</br>
	  	</br>	  	
	  	<span class="titulo">ID Rubro : </span><span  class="subtitulo"><?php echo $query[0]->id;?></span> 
	  	</br>	
	  	</br>
	  	<span class="titulo">Nombre del rubro : </span><span class="subtitulo"><?php echo $query[0]->NOM_RUB;?></span>
	  	</br>	
	  	</br>
	  	<span class="titulo">Cantidad de productos : </span><span class="subtitulo"><?php echo $query2;?></span>
	  	</div>	
	  	</br>
	  	<fieldset class="fieldcuerpo" align="left">
					<legend>DETALLE</legend>
		<table id="example" class="display" cellspacing="5" width="100%" style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
	<thead style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
			<th>ITEM PRODUCTO</th>
            <th>DESCRIPCION DEL PRODUCTO</th>
			<th>PRECIO UNITARIO</th>
			<th>CANTIDAD DISPONIBLE</th>
			<th>ACCIONES</th>	
		</tr>
	</thead>
	<tfoot style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
			<th>ITEM PRODUCTO</th>
            <th>DESCRIPCION DEL PRODUCTO</th>
			<th>PRECIO UNITARIO</th>
			<th>CANTIDAD DISPONIBLE</th>
			<th>ACCIONES</th>	
		</tr>
	</tfoot>
	<tbody style="font-size:11px;">
		<tr>
		<?php
					foreach ($productos as $producto):
					?>
						<th><?php echo $producto->id;?></th>
						<th><?php echo $producto->ITM_PRO;?></th>
						<th><?php echo $producto->DES_PRO;?></th>
						<th><?php echo $producto->PUN_PRO;?></th>
						<th><?php echo $producto->CAN_PRO;?></th>
						<th><a href="producto/<?php echo $producto->id;?>">Ver &nbsp;&nbsp;&nbsp;&nbsp; </a>&nbsp;&nbsp;<a href=""> Modificar</a></th>	
		</tr>
				<?php	endforeach;
			
			?>
	</tbody>
</table>
</fieldset>
</fieldset>
	@stop