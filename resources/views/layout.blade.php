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
				$('#example6').DataTable( {
       				 "order": [[ 0, "asc" ]]
   				 } );
				$('#example8').DataTable( {
       				 "order": [[ 0, "desc" ]]
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
function despliegaModal4( _valor ){
	document.getElementById("bgVentanaModal4").style.visibility=_valor;

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
   });
    $("#btn_reg2").click(function () {
   		   pun_prod2=$("#pun_prod2").val();
   		   id_prod2=$("#idprod2").val();
           $("#rub option:selected").each(function () {
            id = $(this).val();
            $.post("nuevoprecio", { id: id, pun:pun_prod2, idpro:id_prod2}, function(data){
                $("#tablabody").html(data);	
            });            
        });   
            document.getElementById("bgVentanaModal4").style.visibility="hidden";
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
    url: "{{ url('httpush')}}",
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
			url: "{{ url('notificaciones')}}",
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
			url: "{{ url('respuestascount2')}}",
			data: "&div="+DES_NOT,
			dataType:"html",
			success: function(data11)
			{	
				$('#noti2').html(data11);
			}
			});	
			$.ajax({
			async:	true, 
			type: "POST",
			url: "{{ url('notificacionesleidas')}}",
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
			url: "{{ url('notificacionescount')}}",
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
			url: "{{ url('notificacionesalerta')}}",
			data: "&div="+updated_at,
			dataType:"html",
			success: function(data16)
			{	
				$('#Notificacionalerta').html(data16);
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
				<li><a href="{{ url('index')}}"><span class="icon-house"></span>Inicio</a></li>
				<li class="submenu">
					<a href="{{ url('ingreso')}}"><span class="icon-folder-upload"></span>Ingresos</a>
					
				</li><li class="submenu">
					<a href="{{ url('salida')}}"><span class="icon-folder-download"></span>Salidas</span></a>
				</li>
				<li class="submenu">
					<a href="#"><span class="icon-book"></span>Reportes<span class="caret icon-arrow-down6"></span></a>
					<ul class="children">
						<li><a href="{{ url('saldospdf')}}" target="_blank">Reporte de Saldos<span class="icon-dot"></span></a></li>
						<li><a href="{{ url('ingresospdf')}}" target="_blank">Reporte de Ingresos<span class="icon-dot"></span></a></li>
						<li><a href="{{ url('kardex')}}" >Reporte de Movimientos (Kardex)<span class="icon-dot"></span></a></li>
					</ul>
				</li>
				<li class="submenu">
				<?php 
				use almacen\Producto;
				$contar=Producto::where('CAN_PRO','<=',10)->count();?>
					<a href="{{ url('alerta')}}"><span class="icon-alarm"></span>Alertas<div class="alerta"> {{$contar}} </div></a>
					
				</li>
				<li class="usuario" >
					<a href="#" ><span class="icon-user-minus"></span><?php echo $nombre=Auth::user()->NOM_USU?><span class="caret icon-arrow-down6"></span></a>
					<ul class="children">
						<li><a data-toggle = "modal" data-target = "#myModal7" >Ver Perfil<span class="icon-dot"></span></a></li>
						<li><a href="{{ url('logout')}}">Cerrar Sesión<span class="icon-dot"></span></a></li>
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
					<li> <a href="{{ url('almacen')}}">ALMACENES</a> </li>
					<li> <a href="{{ url('usuario')}}">USUARIOS</a> </li>
					<li> <a href="{{ url('solicitud')}}">SOLICITUDES</a><div id="noti">  </div> </li>
					<li> <a href="{{ url('respuesta')}}">RESPUESTAS</a><div id="noti2"></div>  </li>
					
				</ul>
			</nav>
		</header>
	</div>
		<div class="formulario">
		@yield('contenido')

</div>
</div>
<div class = "modal fade" id = "myModal7" tabindex = "-1" role = "dialog"
   aria-labelledby = "myModalLabel" aria-hidden = "true">
  <div class = "modal-dialog ">
      <div class = "modal-content">         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            <h4 class = "modal-title" id = "myModalLabel">
               <h3>Perfil de usuario</h3>
            </h4>
         </div>
  <form action="" method="POST">
    <div class = "modal-body" style="padding-top:0px;">
    <div class="form-group">
      <input type="hidden" id="id" name="id"> 
      
    </div>
    <div class="row">
  <div class="col-sm-4"><img width="100%" height="100%" src="{{url('img/perfil.png')}}" alt="..." class="img-circle"></div>
  <div class="form-group col-sm-8">
    <label class="control-label label label-primary">Numero de carnet de identidad:</label>
    <div class="col-sm-17">
        <input type="text" style="border:none" min="0" class="form-control" value="<?php echo $a=Auth::user()->CI_USU;?>" readonly>
    </div>
    </div>
    <div class="form-group col-sm-8">
    <label class="control-label label label-primary">Nombre de usuario :</label>
    <div class="col-sm-17">
        <input type="text" style="border:none" min="0" name="nro_fac" id="nro_fac1" class="form-control" value="<?php echo $a=Auth::user()->NOM_USU.' '.Auth::user()->APA_USU.' '.Auth::user()->AMA_USU;?>"  readonly placeholder="" onpaste="return false">
    </div>
    </div>
    <div class="form-group col-sm-8">
    <div class="form-group col-sm-6" style="padding:0px 5px 0px 0px;">
    <label class="control-label label label-primary">Area:</label>
    <div class="col-sm-38">
        <input type="text" value="<?php echo $a=Auth::user()->ARE_USU;?>" style="border:none" min="0" name="nro_fac" id="nro_fac1" class="form-control" readonly placeholder="" onpaste="return false">
    </div>
    </div>
    <div class="form-group col-sm-6" style="padding:0px;">
    <label class="control-label label label-primary">Cargo :</label>
    <div class="col-sm-38">
        <input type="text" style="border:none" value="<?php echo $a=Auth::user()->CAR_USU;?>" min="0" name="nro_fac" id="nro_fac1" class="form-control" readonly placeholder="" onpaste="return false">
    </div>
    </div>
  </div>
  <div class="form-group col-sm-18">
  <div class="form-group col-sm-4" >
    <label class="control-label label label-success">Nick de usuario:</label>
    <div class="col-sm-17">
        <input type="text" value="<?php echo $a=Auth::user()->NIC_USU;?>" style="border:none" min="0" name="nro_fac" id="nro_fac1" class="form-control" readonly placeholder="" onpaste="return false">
    </div>
    </div>
    <div class="form-group col-sm-4" >
    <label class="control-label label label-success">Nivel de usuario:</label>
    <div class="col-sm-17">
        <input type="text" style="border:none" value="<?php
        $a=Auth::user()->NIV_USU;
        if($a==0){
        	$a='Administrador general';
        }elseif($a==1){
        	$a='Jefe de recursos';
        }elseif($a==2){
        	$a='Solicitante';
        }
        echo $a;?>" min="0" name="nro_fac" id="nro_fac1" class="form-control" readonly placeholder="" onpaste="return false">
    </div>
    </div>
    <div class="form-group col-sm-4">
    <label class="control-label label label-success">Antiguedad:</label>
    <div class="col-sm-17">
        <input type="text" style="border:none" min="0" name="nro_fac" id="nro_fac1" value="<?php echo $a=Auth::user()->created_at->format('d/M/Y');?>" class="form-control" readonly placeholder="" onpaste="return false">
    </div>
    </div>
</div>
</div>
  </form> 
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

</body>
</html>
