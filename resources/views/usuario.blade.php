	@extends ('layout')
	@section ('contenido')
	<script type="text/javascript">

	function verifica(){
		$(document).ready(function() {    
   		if($('#nic_usu').val()!= ""){
        $('#Info').html('<img src="img/loader.gif" alt="" />').fadeOut(1000);
        var username = $(this).val();        
        var dataString = 'username='+username;
        $.ajax({
            type: "POST",
            url: "verificausuario",
            data: dataString,
            success: function (data) {
            	if(data == "0")	
            {   $('div#mensajevalidacion').html("<div style='color:red;'><img height='16' src='images/error.png'> Nombre de Usuario no disponible</div>");
				$('#usuario').val ("");
				return false;
			}else{
              return true;
			}
            }
        		});
    		}
    		});              
		
		}    
	
		function compara() { 
		if (document.form1.password.value != document.form1.conf_pas.value) {
		$(document).ready(function() { setTimeout(function(){ $(".mensajevalidacion").fadeIn(2500); },0500); });
    	$(document).ready(function() { setTimeout(function(){ $(".mensajevalidacion").fadeOut(2500); },5000); });
			document.getElementById('mensajevalidacion').innerHTML = '<div class="alert alert-danger mensaje2"> Las contraseñas no coinciden </div>';
		return false; } 
		else {
		return true;
		}
		}

		function valida(){
			
			verifica();
		}
	</script>
		<fieldset class="fieldcuerpo" align="left">
				<legend style="margin-bottom: 0;">USUARIOS</legend>
	  	<div>
<script type="text/javascript">
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeIn(2500); },0000); });
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeOut(2500); },5000); });
            </script>
         <?php if (Session::has('mensaje')):
            ?>
                  <div class="mensajewarning alert alert-danger" style="margin-bottom: 10px;"><label><?php echo Session::get('mensaje');?></label></div>

         <?php endif;?>
         <?php if (Session::has('mensaje2')):
            ?>
                  <div class="mensajewarning alert alert-success"  style="margin-bottom: 10px;"><label><?php echo Session::get('mensaje2');?></label></div>
         <?php endif;?>
          
	  	<button data-toggle = "modal" data-target = "#myModal3" href="" class="btn btn-success btn-sm"> <span class="glyphicon glyphicon-plus">  </span> Nuevo usuario </button> 
	  	</br>
	  	</br>	 
	  	
		<table id="example" class="display" cellspacing="5" width="100%" style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
	<thead style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th width="5%">ID</th>
			<th width="5%">C.I.</th>
            <th width="20%">NOMBRE COMPLETO</th>
			<th width="5%">AREA</th>
			<th width="5%">CARGO</th>
			<th width="5%">NIVEL</th>
			<th width="15%">ACCIONES</th>	
		</tr>
	</thead>
		<tbody style="font-size:11px;">
		<tr>
		<?php

	
					foreach ($usuarios as $usuario):
					?>
						<th><?php echo $usuario->id;?></th>
						<th><?php echo $usuario->CI_USU;?></th>
						<th><?php echo $usuario->NOM_USU.' '.$usuario->APA_USU.' '.$usuario->AMA_USU;?></th>
						<th><?php echo $usuario->ARE_USU;?></th>
						<th><?php echo $usuario->CAR_USU;?></th>
						<th><?php echo $usuario->NIV_USU;?></th>
						<th><button data-toggle = "modal" data-target = "#myModal4" href="" class="btn btn-success" title="Ver"> <span class="glyphicon glyphicon-search"> </span> </button> <button data-toggle = "modal" title="Modificar usuario" data-target = "#myModal2" href="" class="btn btn-primary"> <span class="glyphicon glyphicon-pencil"> </span> </button> <button title="Eliminar Producto" onclick="javascript:idenvio(<?php echo $usuario->id;?>);" data-toggle = "modal" data-target = "#myModal" href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> </span> </button></th>	
		</tr>
				<?php	endforeach;
			
			?>
	</tbody>
	<tfoot style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
			<th>C.I.</th>
            <th>NOMBRE</th>
			<th>AREA</th>
			<th>CARGO</th>
			<th>NIVEL</th>
			<th>ACCIONES</th>	
		</tr>
	</tfoot>

</table>

<div class = "modal fade" id = "myModal3" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel3" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Registrar nuevo usuario
            </h4>
         </div><form class="form-horizontal" method="POST" action="usuario/registrar" name="form1">
         <div class = "modal-body">
         	<fieldset class="fieldcuerpo solacep">
         	<legend style="margin-bottom: 0;">
         	<h5 class = "modal-title" id = "myModalLabel">
               Datos personales
            </h5>
            </legend>
            	<div id="Info" style=" float: right;"></div>
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				 <div class="form-group">
            	<label class="col-lg-3 control-label">CI :</label>
         		<div class="col-md-8">
           		 <input placeholder="CARNET DE IDENTIDAD" class="form-control" type="number" step="1" min="0" name="ci_usu" id="ci_usu">
        		</div>
         		</div>
         		<div class="form-group">
            	<label class="col-lg-3 control-label">Nombre :</label>
         		<div class="col-md-8">
           		 <input placeholder="NOMBRE DEL USUARIO" class="form-control" name="nom_usu">
        		</div>
         		</div>
         		 <div class="form-group">
            	<label class="col-lg-3 control-label">Apellido Paterno :</label>
         		<div class="col-md-8">
           		 <input placeholder="APELLIDO PATERNO" class="form-control" name="apa_usu">
        		</div>
         		</div>
         		 <div class="form-group">
            	<label class="col-lg-3 control-label">Apellido Materno :</label>
         		<div class="col-md-8">
           		 <input placeholder="APELLIDO MATERNO" class="form-control" name="ama_usu">
        		</div>
         		</div>
         		 <div class="form-group">
            	<label class="col-lg-3 control-label">Area :</label>
         		<div class="col-md-8">
           		 <select class="form-control" name="are_usu">
           		 	<option value="">SELECCIONE</option>
					<option value="Recursos Humanos">Recursos humanos</option>
					<option value="Tecnologias de Informacion">Tecnologias de Informacion</option>
					<option value="Otros">Otros</option>
           		 </select>
        		</div>
         		</div>
         		 <div class="form-group">
            	<label class="col-lg-3 control-label">Cargo :</label>
         		<div class="col-md-8">
           		 <select class="form-control" name="car_usu">
									<option value="">SELECCIONE</option>
									<option value="Director">Director</option>
									<option value="Otros1">etc</option>
									<option value="Otros2">etc</option>
								</select>
           		 </select>
        		</div>
         		</div>
         </fieldset>
         <fieldset class="fieldcuerpo solacep">
         	<legend style="margin-bottom: 0;">
         	<h5 class = "modal-title">
               Datos de cuenta
            </h5>
            </legend>
            <div id="mensajevalidacion" class="mensajevalidacion"></div>
				 <div class="form-group">
            	<label class="col-lg-3 control-label">Usuario :</label>
         		<div class="col-md-8">
           		 <input placeholder="CI/ NICK DE USUARIO" class="form-control" name="nic_usu">
        		</div>
         		</div>
         		 <div class="form-group">
            	<label class="col-lg-3 control-label">Nivel de usuario :</label>
         		<div class="col-md-8">
           		<select class="form-control" name="niv_usu">
					<option value="">SELECCIONE</option>
					<option value="0">Administrador</option>
					<option value="1">Jefe de Recursos</option>
					<option value="2">Solicitante</option>
				</select>
           		 </select>
        		</div>
         		</div>
         		 <div class="form-group">
            	<label class="col-lg-3 control-label">Password :</label>
         		<div class="col-md-8">
           		 <input placeholder="CONTRASEÑA" type="password" class="form-control" name="password">
        		</div>
         		</div>
         		 <div class="form-group">
            	<label class="col-lg-3 control-label">Repita password :</label>
         		<div class="col-md-8">
           		 <input placeholder="REPITA CONTRASEÑA" type="password" class="form-control" name="conf_pas">
        		</div>
         		</div>
         </fieldset>
        		</div>
         <input type="hidden" id="idalm">
         <div class = "modal-footer" style="border-top: 0;">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal"><span class="glyphicon glyphicon-remove" style="font-size: 10px;"></span>
               Cancelar
            </button>
            
            <button type = "submit" class = "btn btn-primary" onClick="return verifica();"><span style="font-size: 10px;" class="glyphicon glyphicon-plus"></span>
               Registrar
            </button>
         </div>
         </form>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            <h4 class = "modal-title" id = "myModalLabel">
               Confirmar eliminacion
            </h4>
         </div>
         <form action="eliusuario" method="POST">
         <div class = "modal-body">
         <input type="hidden" id="id" name="id">
            <div class=" ">Desea eliminar el elemento?</div>
         
         <div class = "modal-footer" style="border-top: none;">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal"><span class="glyphicon glyphicon-remove" style="font-size: 10px; "></span>
               Cancelar
            </button>
            
            <button type = "submit" class = "btn btn-primary"><span style="font-size: 10px; " class="glyphicon glyphicon-plus"></span>
               Aceptar
            </button>
         </div>
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->
<div class = "modal fade" id = "myModal4" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            <h4 class = "modal-title" id = "myModalLabel">
               Usuario -  
            </h4>
         </div>
         <form action="" method="POST">
         <div class = "modal-body">
         <input type="hidden" id="id" name="id">
            <div class=" ">Perfil de usuario</div>
         
         <div class = "modal-footer" style="border-top: none;">
            <button type = "button" class = "btn btn-success" data-dismiss = "modal"><span class="glyphicon glyphicon-ok" style="font-size: 10px; "></span>
               Aceptar
            </button>
            
         </div>
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->

	@stop