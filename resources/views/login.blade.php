<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Control de Almacenes e Inventarios (SCAI)</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo asset('css/menu.css')?>" type="text/css"> 
	<link rel="stylesheet" href="<?php echo asset('css/form.css')?>" type="text/css"> 
	<link rel="stylesheet" href="<?php echo asset('css/font/menu.css')?>" type="text/css">  
<head>
<body>
<div id="Ventanalogin">
	<div class="titulologin">
	<p style="padding: 25px 15px 15px 130px ; font-style: inherit; font-size: 16px;">SISTEMA DE CONTROL DE ALMACENES E INVENTARIOS </br></p>
	</div>
	<div>
		<div class="cuerpologin">
		</div>
		<div class="cuerpoblogin">
			<table style="padding-top:40px;">
						<tr style="height: 50px;">
							<td width="100px" class="lblnombre">Usuario</td>
							<td width="100px"><input type="text" name="nic_usu"  class="txtcampo" placeholder="NOMBRE DE USUARIO" onkeypress="return alfanumerico(event);" onpaste="return false"></td>	
						</tr>
						<tr>
							<td width="100px" class="lblnombre">Password</td>
							<td width="100px"><input type="password" name="pas_usu"  class="txtcampo"  placeholder="PASSWORD" onkeypress="return alfanumerico(event);" onpaste="return false"></td>
				    	</tr>   
						<tr style="height: 80px; padding-left:60px;" align="center">
							<td><input type="submit" name="submit_log" class="botones ico-btnsave" value="INGRESAR"></td>
                 			<td><input type="reset" class="botones ico-btnlimpiar" value="LIMPIAR DATOS"></td>
						</tr>
				        </td>
				        </tr>
				    </table>
		</div>
	</div>
</div>

</body>
</html>
