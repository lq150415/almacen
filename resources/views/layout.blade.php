<!DOCTYPE html>
<html>
<head>
	<title>Sistema de Control de Almacenes e Inventarios (SCAI)</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	
	<!--modificar eliminar-->
	<script type="text/javascript">
				function idenvio(data1){
					$('#id').val(data1);
				}

				function camposenvio(data1,data2,data3,data4,data5,data6){
					$(document).ready(function(){
					 $("#tabcomp").change(function () {
          				 $("#tabcomp option:selected").each(function () {
           			 	    id = $(this).val();
          					  $.post("datos_tabla", { id: id }, function(data){
                			$("#camcomp").html(data);
                			$('#camcomp option[value="'+data4+'"]').prop('selected','selected').change();
            			}); 
                    
        			});
   					});
					 });
					$('#nomcomp').val(data1);
					$('#descomp').val(data2);
					$('#tabcomp option[value="'+data3+'"]').prop('selected','selected').change();

					$('#opecomp option[value="'+data5+'"]').prop('selected','selected').change();
					$('#idcomp').val(data6);
					
				}
				</script>

	<link rel="stylesheet" href="<?php echo asset('css/menu.css')?>" type="text/css"> 
	<link rel="stylesheet" href="<?php echo asset('css/form.css')?>" type="text/css"> 
	<link rel="stylesheet" href="<?php echo asset('css/font/menu.css')?>" type="text/css">  
	<script src="<?php echo asset('assets/js/ajax.js')?>"></script>
	<link rel="stylesheet" href="<?php echo asset('assets/css/bootstrap.css')?>" type="text/css">  
	<script src="<?php echo asset('assets/js/bootstrap.js')?>"></script>
	<script src="<?php echo asset('js/jQuery.js')?>"></script>
	<script src="<?php echo asset('js/menu.js')?>"></script>  
	<script src="<?php echo asset('js/grilla.js')?>"></script> 
	

		<link rel="stylesheet" type="text/css" href="<?php echo asset('css/table/jquery.dataTables.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo asset('css/table/shCore.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo asset('css/table/demo.css')?>">
		<style type="text/css" class="init">
		</style>
		<script type="text/javascript" language="javascript" src="<?php echo asset('js/table/jquery.js')?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo asset('js/table/jquery.dataTables.js')?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo asset('js/table/shCore.js')?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo asset('js/table/demo.js')?>"></script>
		<script type="text/javascript" language="javascript" class="init">

			$(document).ready(function() {
				
				$('#example').DataTable();
				$('#example2').DataTable();
				$('#example4').DataTable( {
       				 "order": [[ 6, "desc" ]]
   				 } );
			} );
		</script>
		<script type="text/javascript" language="javascript" >
			
			$(document).ready(function() {
				
				

			} );
		</script>
<script type="text/javascript">
function despliegaModal( _valor ){

	document.getElementById("bgVentanaModal").style.visibility=_valor;
	}
function despliegaModal2( _valor ){

	document.getElementById("bgVentanaModal2").style.visibility=_valor;
		$('#alm2').val($('#alm').val());
	$('#rub2').val($('#rub').val());
	}

function despliegaModal2b( _valor ){

	document.getElementById("bgVentanaModal2").style.visibility=_valor;
		$('#alm3').val($('#alm2').val());
	$('#rub3').val($('#rub2').val());
	}
</script>



<!--Esto es para el datepicker-->

<link rel="stylesheet" type="text/css" href="<?php echo asset('css/jquery-ui.theme.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo asset('css/jquery-ui.structure.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo asset('css/jquery-ui.css')?>">

<script type="text/javascript" language="javascript" src="<?php echo asset('js/jquery-ui.js')?>"></script>
<script type="text/javascript" language="javascript" src="<?php echo asset('js/jquery-ui.min.js')?>"></script>
<script type="text/javascript">

jQuery(function($){
	
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});    
 
$(document).ready(function() {
	
   $("#datepicker").datepicker();
   $("#datepicker2").datepicker();
   
 });
</script>
<style type="text/css">
 
#tabla{		width: 100%; }
#tabla tbody tr{  }
.fila-base{ display: none; } /* fila base oculta */
.eliminar{ cursor: pointer; color: #fff; }
input[type="text"]{ } /* ancho a los elementos input="text" */
 
</style>
<script type="text/javascript">

 var ind=1;
 var ind2=1;
$(function(){
	
	// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
	$("#agregar").on('click', function(){
		
		if(ind<=1){
			var almacen = document.getElementById("alm2").value;
			var rubro = document.getElementById("rub2").value;
			ind=2;

		}else
		{
			ind2++;
			$("#tabla tbody tr:eq(0)").clone().appendTo("#tabla tbody");
			var almacen = document.getElementById("alm2").value;
			var rubro = document.getElementById("rub2").value;
		}

	});
 
	// Evento que selecciona la fila y la elimina 

	$(document).on("click",".eliminar",function(){
		if(ind2==1){
			ind--;
			
			$('#nro_fac').val(' ');
			$('#nro_com').val(' ');
			$('#producto').val(' ');
			$('#producto2').val(' ');
			$('#pre_pro').val(' ');
			$('#can_pro').val(' ');
			
		}else{
		var parent = $(this).parents().get(0);
		$(parent).remove();
		ind2--;
		
		}
	});
});
 
</script>
<script type="text/javascript" lang="javascript">
function cierramodal(){
	$("#myModal4").modal("hide");
}
function pasadatos(){
	
	$('#alm2').val($('#alm').val());
	$('#rub2').val($('#rub').val());

	}
function despliegaModal2a( _valor ){
	document.getElementById("bgVentanaModal2").style.visibility=_valor;

	}

</script>
<script language="javascript">

$(document).ready(function(){

   $("#alm").change(function () {
           $("#alm option:selected").each(function () {
            id = $(this).val();
            $.post("datos_rub", { id: id }, function(data){
                $("#rub").html(data);
            });            
        });
       });
   $("#rub").change(function () {
           $("#rub option:selected").each(function () {
            id = $(this).val();
            $.post("datos_pro", { id: id }, function(data){
                $('#example2').DataTable();
                $("#tablabody").html(data);	
            });            
        });       
   });
   $("#btn_reg").click(function () {
   		   itm_prod=$("#itm_prod").val();
   		   des_prod=$("#des_prod").val();
   		   pun_prod=$("#pun_prod").val();
   		   can_prod=$("#can_prod").val();
           $("#rub option:selected").each(function () {
            id = $(this).val();
            $.post("datos_pro2", { id: id, itm:itm_prod, des:des_prod, pun:pun_prod,can:can_prod}, function(data){
                $("#tablabody").html(data);	
            });            
        });   
            document.getElementById("bgVentanaModal3").style.visibility="hidden";
   })
});
</script>

<script language="javascript">

$(document).ready(function(){

   $("#alm2").change(function () {
           $("#alm2 option:selected").each(function () {
            id = $(this).val();
            $.post("datos_rub", { id: id }, function(data){
                $("#rub2").html(data);
            });            
        });
       });
   $("#rub2").change(function () {
           $("#rub2 option:selected").each(function () {
            id = $(this).val();
            $.post("datos_prosal", { id: id }, function(data){
                $('#example2').DataTable();
                $("#tablabody").html(data);	
            });            
        });       
   });
  
});
</script>

<!--Parte de las notificaciones-->
<script language="javascript">
var updated_at = null;
function cargar_push() 
{  
	$.ajax({
	async:	true, 
    type: "POST",
    url: "../../httpush",
    data: "&timestamp="+updated_at,
	dataType:"html",
    success: function(data)
	{	
		var json    	   = eval("(" + data + ")");
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
			url: "../../notificaciones",
			data: "&div="+DES_NOT,
			dataType:"html",
			success: function(data)
			{	
				$('#solicitud').html(data);
			}
			});	

			$.ajax({
			async:	true, 
			type: "POST",
			url: "../../notificacionesleidas",
			data: "&div="+DES_NOT,
			dataType:"html",
			success: function(data)
			{	
				$('#leidas').html(data);
			}
			});	
			$.ajax({
			async:	true, 
			type: "POST",
			url: "../../notificacionescount",
			data: "&div="+DES_NOT,
			dataType:"html",
			success: function(data2)
			{	
				$('#noti').html(data2);
			}
			});	
			$.ajax({
			async:	true, 
			type: "POST",
			url: "../../notificacionesalerta",
			data: "&div="+updated_at,
			dataType:"html",
			success: function(data3)
			{	
				$('#Notificacionalerta').html(data3);
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

</head>
<body style="background-color: #000;">
<div id="Notificacionalerta" style="width: 300px;   bottom: 2%;margin-right: 3%;  position: fixed; right: -2%;"></div>
</div>
@yield('VM')
<div>
	<header>
		<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-home"></span>Sistema de Control de Almacenes e Inventarios</a>
		</div>
 
		<nav class="vert">
			<ul >
				<li><a href="../../index"><span class="icon-house"></span>Inicio</a></li>
				<li class="submenu">
					<a href="../../ingreso"><span class="icon-folder-upload"></span>Ingresos</a>
					
				</li><li class="submenu">
					<a href="../../salida"><span class="icon-folder-download"></span>Salidas</span></a>
				</li>
				<li class="submenu">
					<a href="#"><span class="icon-book"></span>Reportes<span class="caret icon-arrow-down6"></span></a>
					<ul class="children">
						<li><a href="#">Reporte de Saldos<span class="icon-dot"></span></a></li>
						<li><a href="#">Reporte de Ingresos<span class="icon-dot"></span></a></li>
						<li><a href="#">Reporte de Movimientos (Kardex)<span class="icon-dot"></span></a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="../../alerta"><span class="icon-alarm"></span>Alertas<div class="alerta"> 0 </div></a>
					
				</li>
				<li class="usuario" >
					<a href="#" ><span class="icon-user-minus"></span><?php echo $nombre=Auth::user()->NOM_USU?><span class="caret icon-arrow-down6"></span></a>
					<ul class="children">
						<li><a href="#">Ver Perfil<span class="icon-dot"></span></a></li>
						<li><a href="#">Editar Perfil<span class="icon-dot"></span></a></li>
						<li><a href="../../logout">Cerrar Sesión<span class="icon-dot"></span></a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</header>
	</br>
	<div class="banner">
		<div class="logo">
			<img src="<?php echo asset('img/banner.png')?>">
			</div>
		<div class="nombre">
			<img src="<?php echo asset('img/nombre.png')?>">
			</div>
	</div>
	<div class="menu_lat">
		<div class="logo2">
		<header class="lat">
			<div  class="menu_bar2" style="color: #fff; left: 12px; font-size: 20px;"><a href="#" class="bt-menu"><span class="icon-paragraph-left" style="color: #fff;"></span></a>
		
			</div>
		
			<nav class="lateral">	
				<ul>
					<li> <a href="../../almacen">ALMACENES</a> </li>
					<li> <a href="../../usuario">USUARIOS</a> </li>
					<li> <a href="../../solicitud">SOLICITUDES</a><div class="notificacion" id="noti">  </div> </li>
					<li> <a href="../../respuesta">RESPUESTAS</a> </li>
					<li> <a >CONSULTAS</a> 
						<ul class="children">
							<li><a href="../../consultapr">Por rubro<span class="icon-dot"></span></a></li>
							<li><a href="../../consultapp">Por producto<span class="icon-dot"></span></a></li>
							<li><a href="../../consultapu">Por usuario<span class="icon-dot"></span></a></li>
							<li><a href="../../consultapf">Por fechas<span class="icon-dot"></span></a></li>
							
						</ul>
					</li>
				</ul>
			</nav>
		</header>
	</div>
		<div class="formulario">
		@yield('contenido')

</div>
</div>


</body>
</html>
