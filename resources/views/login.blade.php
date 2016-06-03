<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Control de Almacenes e Inventarios (SCAI)</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="<?php echo asset('css/menu.css')?>" type="text/css"> 
	<link rel="stylesheet" href="<?php echo asset('css/form.css')?>" type="text/css"> 
	<link rel="stylesheet" href="<?php echo asset('css/font/menu.css')?>" type="text/css">  

	<link rel="stylesheet" href="<?php echo asset('assets/css/bootstrap.css')?>" type="text/css">  
	<script src="<?php echo asset('js/jQuery.js')?>"></script>
	<script src="<?php echo asset('assets/js/ajax.js')?>"></script>
	<script src="<?php echo asset('assets/js/bootstrap.js')?>"></script>
</head>
<body style="background-color: #000;">
<script type="text/javascript">
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeIn(5500); },0000); });
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeOut(1500); },2000); });
</script>
 
<div id="Ventanalogin">
	<div class="titulologin">
	<p style="padding: 25px 15px 15px 130px ; font-style: inherit; font-size: 16px;">SISTEMA DE CONTROL DE ALMACENES E INVENTARIOS </br></p>
	</div>
		 
	<?php if(isset($mensaje)):?>
			<div class="mensajelogin" id="mensaje"><label><?php echo $mensaje;?></label></div>
	<?php endif;?>
	
	<div>
		<div class="cuerpologin">
		</div>
	<div class="cuerpoblogin">
	  @if (Session::has('errors'))
		    <div  class="mensajewarning alert alert-danger" role="alert">
			
	            <strong>Usuario y/o contraseña incorrectos </strong>
			    
		    </div>
		@endif
		<form method="POST" action="login" class="form-horizontal">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
		<div class="col-sm-14" >
    		<label class="control-label">Usuario</label><br/>
   		<div class="col-sm-14">
        	<input type="text" style="border:none" min="0" name="NIC_USU" id="" class="form-control"  placeholder="NOMBRE DE USUARIO" onpaste="return false">
    	</div>
    	</div>
    	<div class="col-sm-13 " >
    		<label class="control-label ">Password</label>
   		<div class="col-sm-13">
        	<input type="password" style="border:none" min="0" name="password" id="" class="form-control"  placeholder="PASSWORD" onpaste="return false">
    	</div>
    	</div><br/>
    	
		<div class = "modal-footer" style="border-top: 0;">
             <button type = "submit" class = "btn btn-primary"><span style="font-size: 10px;" class="glyphicon glyphicon-log-in"></span>
               Ingresar
            </button>
            <button type = "reset" class = "btn btn-danger" ><span class="glyphicon glyphicon-trash" style="font-size: 10px;"></span>
               Limpiar campos
            </button>
            
           
         </div>

		</form>

			
		</div>
		
	</div>
</div>

</body>
</html>
