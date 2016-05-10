<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Control de Almacenes e Inventarios (SCAI)</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="<?php echo asset('assets/js/ajax.js')?>"></script>
	<link rel="stylesheet" href="<?php echo asset('assets/css/bootstrap.css')?>" type="text/css">  
	<script src="<?php echo asset('assets/js/bootstrap.js')?>"></script>
	<link rel="stylesheet" href="<?php echo asset('css/menu.css')?>" type="text/css"/> 
	<link rel="stylesheet" href="<?php echo asset('css/form.css')?>" type="text/css"/> 
	<link rel="stylesheet" href="<?php echo asset('css/font/menu.css')?>" type="text/css"/>  
	<link rel="stylesheet" type="text/css" href="<?php echo asset('css/table/jquery.dataTables.css')?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo asset('css/table/shCore.css')?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo asset('css/table/demo.css')?>"/>
		<style type="text/css" class="init">
		</style>
		<script type="text/javascript" language="javascript" src="<?php echo asset('js/table/jquery.js')?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo asset('js/table/jquery.dataTables.js')?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo asset('js/table/shCore.js')?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo asset('js/table/demo.js')?>"></script>
		<script type="text/javascript" language="javascript" class="init">
			$(document).ready(function() {
				$('#example').DataTable();
				$('#example4').DataTable();
				$('#example5').DataTable();
			} );
		</script>
		<style type="text/css">
 
#tabla{		width: 100%; }
#tabla tbody tr{  }
.fila-base{ display: none; } /* fila base oculta */
.eliminar{ cursor: pointer; color: #fff; }
input[type="text"]{ } /* ancho a los elementos input="text" */
 
</style>
<script type="text/javascript">
function despliegaModal2( _valor ){
	document.getElementById("bgVentanaModal2").style.visibility=_valor;
	$('#alm2').val($('#alm').val());
	$('#rub2').val($('#rub').val());

	}
function despliegaModal2a( _valor ){
	document.getElementById("bgVentanaModal2").style.visibility=_valor;

	}
</script>
<script type="text/javascript">
	var ind=1;
 	var ind2=1;
$(function(){
	
	// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
	$("#agregar").on('click', function(){
		
		if(ind<=1){
			ind=2;

		}else
		{
			ind2++;
			$("#tabla tbody tr:eq(0)").clone().prependTo("#tabla tbody");
			
		}

	});
 
	// Evento que selecciona la fila y la elimina 

	$(document).on("click",".eliminar",function(){
		if(ind2==1){
			ind--;
			
			
			$('#producto').val(' ');
			$('#producto2').val(' ');
			$('#pre_pro').val(' ');
			$('#sub_pro').val(' ');
			$('#can_pro').val(' ');
			$('#total').val('0');
			
		}else{
		var parent = $(this).parents().get(0);
		$(parent).remove();
		ind2--;
		
		}
	});
 
	$(document).on("click",".eliminar2",function(){
		if(ind2==1){
			ind--;
	
			$('#producto').val(' ');
			$('#producto2').val(' ');
			$('#pre_pro').val(' ');
			$('#sub_pro').val(' ');
			$('#can_pro').val(' ');
			$('#total').val('0');
			
		}else{
  document.getElementById("tabla").deleteRow(1);
		ind2--;
		}
	});
});

</script>
<script language="javascript">
var updated_at = null;
function cargar_push() 
{  
	$.ajax({
	async:	true, 
    type: "POST",
    url: "../../httpush2",
    data: "&timestamp="+updated_at,
	dataType:"html",
    success: function(data10)
	{	
		var json    	   = eval("(" + data10 + ")");
		updated_at		   = json.updated_at;
		DES_NOT     	   = json.DES_NOT;
		AUT_NOT        		   = json.AUT_NOT;
		REA_NOT      	   = json.REA_NOT;
		TIP_NOT      	   = json.TIP_NOT;
		ID_PSO			   = json.ID_PSO;	
		
		if(updated_at == null)
		{
		
		}
		else
		{
			$.ajax({
			async:	true, 
			type: "POST",
			url: "../../notificaciones7",
			data: "&div="+DES_NOT,
			dataType:"html",
			success: function(data7)
			{	
				$('#solicitud7').html(data7);
			}
			});	

			$.ajax({
			async:	true, 
			type: "POST",
			url: "../../notificacionesleidas8",
			data: "&div="+DES_NOT,
			dataType:"html",
			success: function(data8)
			{	
				$('#leidas7').html(data8);
			}
			});	
			$.ajax({
			async:	true, 
			type: "POST",
			url: "notificacionescountjrh",
			data: "&div="+DES_NOT,
			dataType:"html",
			success: function(data6)
			{	
				$('#noti2').html(data6);
			}
			});	
			$.ajax({
			async:	true, 
			type: "POST",
			url: "respuestascount",
			data: "&div="+DES_NOT,
			dataType:"html",
			success: function(data6)
			{	
				$('#noti3').html(data6);
			}
			});	
		}
		setTimeout('cargar_push()',6000);
		    	
    }
	});		
}

$(document).ready(function()
{
	cargar_push();
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

</head>
<body style="padding: 0; overflow: auto;">
	<header class="clie">
		<nav style="">
			<a class="tituloclie" href="index" title="Inicio">SISTEMA DE CONTROL DE ALMACENES E INVENTARIOS</a>
			<ul>
				<li class="usuario" >
					<a href="#" ><span class="icon-user-minus"></span><?php echo $nombre=Auth::user()->NOM_USU.' '.Auth::user()->APA_USU.' '.Auth::user()->AMA_USU?><span class="caret icon-arrow-down6"></span></a>
					<ul class="children">
						<li><a href="#">Ver Perfil<span class="icon-dot"></span></a></li>
						<li><a href="#">Editar Perfil<span class="icon-dot"></span></a></li>
						<li><a href="logout">Cerrar Sesión<span class="icon-dot"></span></a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>
	<div>
	@yield('cuerpo')
	</div>
	</body>
</html>