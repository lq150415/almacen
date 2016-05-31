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
			url: "{{ url('notificacionesalerta')}}",
			data: "&div="+updated_at,
			dataType:"html",
			success: function(data16)
			{	
				$('#Notificacionalerta3').html(data16);
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
<div id="Notificacionalerta" style="width: 300px;   bottom: 2%;margin-right: 3%;  position: fixed; right: -2%;"></div>
</div>
	<header class="clie">
		<nav style="">
			<a class="tituloclie" href="index" title="Inicio">SISTEMA DE CONTROL DE ALMACENES E INVENTARIOS</a>
			<ul>
				<li class="usuario" >
					<a href="#" ><span class="icon-user-minus"></span><?php echo $nombre=Auth::user()->NOM_USU.' '.Auth::user()->APA_USU.' '.Auth::user()->AMA_USU?><span class="caret icon-arrow-down6"></span></a>
					<ul class="children">
						<li><a data-toggle = "modal" data-target = "#myModal7" >Ver Perfil<span class="icon-dot"></span></a></li>
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