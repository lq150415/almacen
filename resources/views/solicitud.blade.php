	@extends ('layout')
	@section ('VM')
	<script type="text/javascript">

 var ind1=1;
 var ind12=1;
$(function(){
	
	// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
	$("#agregar2").on('click', function(){
		
		if(ind1<=1){
			ind1=2;

		}else
		{
			ind12++;
			$("#tabla2 tbody tr:eq(0)").clone().prependTo("#tabla2 tbody");
			
		}

	});
 
	// Evento que selecciona la fila y la elimina 
			console.log(ind12);

	$(document).on("click",".eliminar3",function(){
		if(ind12==1){
			ind1--;

			
			$('#producto').val(' ');
			$('#producto2').val(' ');
			$('#pre_pro').val(' ');
			$('#sub_pro').val(' ');
			$('#can_sol').val('');
			$('#total').val('0');
			
		}else{
		var parent = $(this).parents().get(0);
		$(parent).remove();
		ind12--;
		
		}
	});
 
	$(document).on("click",".eliminar4",function(){
		if(ind12==1){
			ind1--;
	
			$('#producto').val(' ');
			$('#producto2').val(' ');
			$('#pre_pro').val(' ');
			$('#sub_pro').val(' ');
			$('#can_sol').val(' ');
			$('#total').val('0');
			
		}else{
  document.getElementById("tabla2").deleteRow(1);
		ind12--;
		}
	});
});

</script>
	<script type='text/javascript' lang='javascript'>
		function agregavalor(_value, data, data2)
		{
		document.getElementById('bgVentanaModal2').style.visibility = "hidden";
	//	$('#tabla tbody tr:eq(0)').clone().removeClass('fila-base').appendTo('#tabla tbody');
		$('#idproducto').val(data2);
		$('#producto').val(data);
		$('#producto2').val(data);
		}
		</script>
	
		<div id="bgVentanaModal" class="bgventanaModal">
<div class="modal-dialog modal-lg" style="box-shadow: 0px 0px 1px #000;"> <div class="modal-content">
 <div class = "modal-header alert alert-success">
            <button onClick="javascript:despliegaModal('hidden');" title="Cerrar" class="close"><span style="float: right; color: #000; font-size: 19px;">&times;</span></button>
            <h4 class = "modal-title" id = "myModalLabel">
              			 Nueva Solicitud 
           	</h4>
 </div>				
			<form class="form-horizontal" method="POST" action="reg_solicitud">    				
            <div class = "modal-body">
          		<div class="form-group">
            	<label class="col-lg-2 control-label">Id :</label>
         		<div class="col-md-3">
           		 <input type="text" value="<?php echo Auth::user()->id;?>" name="" id="fec_sol2" class="form-control" readonly="readonly">
        		</div>
        		<label class="col-md-3 control-label">Nombre :</label>
         		<div class="col-md-3">
           		 <input type="text" value="<?php echo Auth::user()->NOM_USU?>" name="" id="" class="form-control" readonly="readonly">
        		</div>
         		</div>
				<div class="form-group">
            	<label class="col-md-2 control-label">Ap. paterno :</label>
         		<div class="col-md-3">
           		 <input type="text" value="<?php echo Auth::user()->APA_USU;?>" name="" id="" class="form-control" readonly="readonly">
        		</div>
        		<label class="col-md-3 control-label">Ap. materno :</label>
         		<div class="col-md-3">
           		 <input type="text" value="<?php echo Auth::user()->AMA_USU?>" name="" id="" class="form-control" readonly="readonly">
        		</div>
         		</div>		
				
				<div class="form-group">
            	<label class="col-lg-2 control-label">Area:</label>
         		<div class="col-md-3">
           		 <input type="text" value="<?php echo Auth::user()->ARE_USU;?>" name="" id="" class="form-control" readonly="readonly">
        		</div>
        		<label class="col-md-3 control-label">Cargo :</label>
         		<div class="col-md-3">
           		 <input type="text" value="<?php echo Auth::user()->CAR_USU?>" name="" id="" class="form-control" readonly="readonly">
        		</div>
         		</div>
				<input type="hidden" value="0" name="dest"></input>
		</div>
			<div class = "modal-header alert-info">
           
            <h4 class = "modal-title " id = "myModalLabel">
               Productos 
            </h4>
         	</div>
         	<div class = "modal-body">
					
						<button type="button" id="agregar2" onclick="javascript:despliegaModal2('visible');" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Agregar Producto</button>
				<br/>
				<br/>
					<div class="table-responsive">
					<table id="tabla2" class="table table-hover">
	<!-- Cabecera de la tabla -->
						<thead>
							<tr class="warning">
								<th width="60%">Producto</th>
								<th width="10%">Cantidad</th>
								<th width="20%">&nbsp;</th>
							</tr>
						</thead>
 
	<!-- Cuerpo de la tabla con los campos -->
						<tbody>
		<!-- fila base para clonar y agregar al final -->
							<tr> 
								
								<td ><input type="text" required class="form-control" id="producto2" name="producto2[]" style="width:480px; font-weight: bold;" readonly /></td>
								<input type="hidden" class="txtcampo small" id="producto" name="producto[]" style="width:480px;" readonly/>
								<input type="hidden" class="txtcampo small" id="idproducto" name="idproducto[]" style="width:280px;" readonly="readonly"/>
								<input type="hidden" class="txtcampo small" id="pro_sol" name="pro_pin[]" style="width:580px;" readonly="readonly"/>
								<td><input type="number" min="1" id="can_sol" required class="form-control" name="can_sol[]" style="width:60px; font-weight: bold;" /></td>
								<td class="btn btn-danger eliminar3"><span class="glyphicon glyphicon-remove"></span> Eliminar</td>															
							</tr>
		<!-- fin de código: fila base -->
 
		<!-- Fila de ejemplo -->
							
		<!-- fin de código: fila de ejemplo -->
 
						</tbody>
					</table>
<!-- Botón para agregar filas -->
					</div>
					<div class = "modal-footer" style="border-top: none;">
           			 <button type = "submit" class = "btn btn-success"><span style="font-size: 10px; " class="glyphicon glyphicon-check"></span>
               Enviar solicitud
           			 </button>
         			</div>
						
			</form>
	</div>
</div>
</form>
</div>
</div>
</div>
<div id="bgVentanaModal2" class="bgventanaModal2">
<div id="" class="modal-dialog modal-lg">
<div class="modal-content">
  <div class = "modal-header">
<td class="eliminar2" style="background-color: transparent;"><a href="javascript:despliegaModal2a('hidden');" title="Cerrar" class="eliminar2 close">&times;</a></td>
<h4 class = "modal-title" id = "myModalLabel">
               Agregar productos
            </h4>
</div>
<form class="form-horizontal">
	<div class="modal-body">
			<table id="example" class="table table-hover" cellspacing="5" width="100%" >
	<thead>
		<tr class="info">
            <th>DESCRIPCION DEL PRODUCTO</th>
			<th data-orderable="false">ACCIONES</th>	
		</tr>
	</thead>
	
	<tbody>
		<tr>
		<?php
					foreach ($productos as $producto):
					?>
						<th><?php echo $producto->DES_PRO;?></th>
						<th><button type="button" title="Agregar producto" onClick="agregavalor(<?php echo "'hidden' ,'".$producto->DES_PRO."','".$producto->id."'"?>);" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span></button></th>
		</tr>
				<?php	endforeach;
			
			?>
	</tbody>
	</table>
			</div>
		</fieldset>
</div>
</form>
</div>
</div>
</form>
</div>
	@stop
	@section ('contenido')
	<div id="div2"></div>
		<fieldset class="fieldcuerpo" align="left">
					<legend style="margin-bottom: 0;">SOLICITUDES</legend>
	  	<div>
	  	<script type="text/javascript">
              $(document).ready(function() { setTimeout(function(){ $(".mensajelogin").fadeIn(1500); },0000); });
              $(document).ready(function() { setTimeout(function(){ $(".mensajelogin").fadeOut(1500); },5000); });
            </script>
			<?php if (Session::has('mensaje')):
  				?>
			<div class="mensajelogin alert alert-success" ><label><?php echo Session::get('mensaje');?></label></div>
			<?php endif;?>
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
           		 <input type="text" min="0"  id="fec_sol" class="form-control" readonly="readonly">
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