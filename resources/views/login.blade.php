<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Control de Almacenes e Inventarios (SCAI)</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="<?php echo asset('css/menu.css')?>" type="text/css"> 
	<link rel="stylesheet" href="<?php echo asset('css/form.css')?>" type="text/css"> 
	<link rel="stylesheet" href="<?php echo asset('css/font/menu.css')?>" type="text/css">  
<head>
<body>
<div id="Ventanalogin">
	<div class="titulologin">
	<p style="padding: 25px 15px 15px 130px ; font-style: inherit; font-size: 16px;">SISTEMA DE CONTROL DE ALMACENES E INVENTARIOS </br></p>
	</div>
		 <script type="text/javascript">
              $(document).ready(function() { setTimeout(function(){ $(".mensajelogin").fadeIn(1500); },0000); });
              $(document).ready(function() { setTimeout(function(){ $(".mensajelogin").fadeOut(1500); },5000); });
            </script>
	<?php if(isset($mensaje)):?>
			<div class="mensajelogin" id="mensaje"><label><?php echo $mensaje;?></label></div>
	<?php endif;?>
	<div>
		<div class="cuerpologin">
		</div>
		<form method="POST" action="login">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="cuerpoblogin">

    <table style="padding-top:25px;">
						<tr style="height: 50px;">
							<td width="100px" class="lblnombre">Usuario</td>
							<td width="100px"><input type="text" name="NIC_USU"  class="txtcampo" placeholder="NOMBRE DE USUARIO" onkeypress="return alfanumerico(event);" onpaste="return false"></td>	
						</tr>
						<tr>
							<td width="100px" class="lblnombre">Password</td>
							<td width="100px"><input type="password" name="password"  class="txtcampo"  placeholder="PASSWORD" onkeypress="return alfanumerico(event);" onpaste="return false"></td>
				    	</tr> 
				    	</table>
				    	
    					<center>
    					<table>
						<tr style="height: 80px; padding-left:60px;" >
							<td style="padding-right:30px;"><input type="submit" class="botones ico-btnsave" value="INGRESAR"></td>
                 			<td><input type="reset" class="botones ico-btnlimpiar" value="LIMPIAR DATOS"></td>
						</tr>
				        </td>
				        </tr>
				    </table>
				    </center>

</form>

			
		</div>
		
	</div>
</div>

</body>
</html>
