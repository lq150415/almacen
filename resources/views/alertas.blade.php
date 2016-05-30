	@extends ('layout')
	@section ('contenido')
		<fieldset class="fieldcuerpo" align="left">
					<legend style="margin-bottom: 0;">ALERTAS</legend>
	  	<div>
	  
		<table id="example" class="table table-hover" >
	<thead class="danger">
		<tr class="danger">
			<th width="1%">ID</th>
			<th width="15%">ALMACEN</th>
			<th width="10%">RUBRO</th>
            <th width="50%">DESCRIPCION DEL PRODUCTO</th>
			<th width="10%">PRECIO</th>
			<th width="1%" class="danger">CANTIDAD</th>
		</tr>
	</thead>
	
	<tbody style="font-size:11px;">
		<?php if(count($query)>0){?>
		<tr>
		<?php  
					foreach ($query as $query):
				         $s= ($query->PUN_PRO);
				         $t=  $query->CAN_PIN;
				         $u=$t*$s;
					?>
						<th><?php echo $query->id;?></th>
						<th><?php echo $query->NOM_ALM;?></th>
						<th><?php echo $query->NOM_RUB;?></th>
						<th><?php echo $query->DES_PRO;?></th>
						<th ><?php echo $query->PUN_PRO;?></th>
						<th class="danger"><?php echo $query->CAN_PRO;?></th>
		</tr>
				<?php	endforeach;}
			
			?>
	</tbody>
</table>

</fieldset>
	@stop