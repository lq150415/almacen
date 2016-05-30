	@extends ('cliente/layout_clie')
	@section ('cuerpo')
	<div class="ventanamodal5">
	<fieldset class="fieldcuerpo solacep" align="left" style="padding: 10px;">
					<legend style="margin-bottom: 0;">HISTORIAL DE SOLICITUDES </legend>
	  	<div>

		<table id="example" class="table table-hover">
	<thead>
		<tr class="warning">
            <th>FECHA DE SOLICITUD</th>
			<th>ESTADO</th>
		</tr>
	</thead>
	<tbody>
		<?php if(count($query)>0){?>
		<tr>
		<?php  
					foreach ($query as $query):
					?>
						<th><?php echo \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $query->FEC_SOL)->format('d/m/Y')?></th>
					<?php if($query->ALE_NOT==1) {?>
						<th class="success">APROBADO</th>
					<?php }else{ ?>
						<th class="danger">RECHAZADO</th>
					<?php }?>
		</tr>
				<?php	endforeach;}
			
			?>
	</tbody>
</table>
</fieldset>
</fieldset>
</div>
