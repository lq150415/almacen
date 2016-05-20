	@extends ('layout')
		
	@section ('contenido')
	
		<fieldset class="fieldcuerpo" align="left">
					<legend style="margin-bottom: 0;">RUBROS</legend>
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
                  <div class="mensajewarning alert alert-success" style="margin-bottom: 10px;"><label><?php echo Session::get('mensaje2');?></label></div>
         <?php endif;?>
          
	  	<button data-toggle = "modal" data-target = "#myModal3" href="" class="btn btn-success btn-sm"> <span class="glyphicon glyphicon-plus"> </span> Nuevo Rubro </button> 
	 	</br>
	  	</br>	  	
	  	<span class="titulo">ID Almacen : </span><span class="subtitulo"><?php echo $query[0]->id;?></span> 
	  	</br>	
	  	</br>
	  	<span class="titulo">Nombre del almacen : </span><span class="subtitulo"><?php echo $query[0]->NOM_ALM;?></span>
	  	</br>	
	  	</br>
	  	<span class="titulo">Ubicacion del almacen : </span><span class="subtitulo"><?php echo $query[0]->UBI_ALM;?></span>
	  	</div>	
	  	</br>
	  	<fieldset class="fieldcuerpo" align="left">
	  <legend style="margin-bottom: 0;">Productos mas solicitados</legend>  		  	
	  	<span class="titulo">Producto #1 : </span><span  class="subtitulo"><?php echo $query2[0]->DES_PRO.' - CANTIDAD   '.$query2[0]->solicitado;?></span> 
	  	</br>	
	  	</br>	  		  	
	  	<span class="titulo">Producto #2 : </span><span  class="subtitulo"><?php echo $query2[1]->DES_PRO.' - CANTIDAD   '.$query2[1]->solicitado;?></span>
	  	</br>	
	  	</br>	  		  	
	  	<span class="titulo">Producto #3 : </span><span  class="subtitulo"><?php echo $query2[2]->DES_PRO.' - CANTIDAD   '.$query2[2]->solicitado;?></span>
	  </fieldset> 
	  	<fieldset class="fieldcuerpo" align="left">
					<legend style="margin-bottom: 0;">DETALLE</legend>
		<table id="example" class="display" cellspacing="5"  style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
	<thead style="font-size:13px;color:#FFF;background-color:#444444;">
		<tr>
			<th>ID</th>
            <th width="20%;">NOMBRE DEL RUBRO</th>
			<th width="50%;">DESCRIPCION DEL RUBRO</th>
			<th data-orderable="false">ACCIONES</th>	
		</tr>
	</thead>
	<tfoot style="font-size:13px;color:#FFF;background-color:#444444;">
		<tr>
			<th>ID</th>
            <th>NOMBRE DEL RUBRO</th>
			<th>DESCRIPCION DEL RUBRO</th>
			<th>ACCIONES</th>	
		</tr>
	</tfoot>
	<tbody style="font-size:11px;">
		<?php if(count($rubros)>0){?>
		<tr>
		<?php  

					foreach ($rubros as $rubro):
					?>
						<th><?php echo $rubro->id;?></th>
						<th><?php echo $rubro->NOM_RUB;?></th>
            			<th><?php echo $rubro->DES_RUB;?></th>
						<th><a class="btn btn-success" title="Ver productos" href="producto/<?php echo $rubro->id;?>"><span class="glyphicon glyphicon-search"> </span> </a> <button data-toggle = "modal" title="Modificar rubro" data-target = "#myModal2" href="" class="btn btn-primary"> <span class="glyphicon glyphicon-pencil"> </span> </button> <button onclick="javascript:idenvio(<?php echo $rubro->id;?>);" data-toggle = "modal" title="Eliminar rubro" data-target = "#myModal" href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> </span> </button></th>	
		</tr>
				<?php	endforeach;}
			
			?>
	</tbody>
</table>
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
               Confirmar eliminacion
            </h4>
         </div>
         <form action="<?php echo $id;?>/elirubro" method="POST">
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
</div>
 <div class = "modal fade" id = "myModal3" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel3" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Registrar nuevo Rubro
            </h4>
         </div>
         <div class = "modal-body">
         		<form class="form-horizontal" method="POST" action="<?php echo $id;?>/registro">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				 <div class="form-group">
            	<label class="col-lg-3 control-label">Nombre :</label>
         		<div class="col-md-8">
           		 <input placeholder="NOMBRE DEL RUBRO" class="form-control" name="nom_rub">
        		</div>
         		</div>
         <div class="form-group">
            <label class="col-lg-3 control-label">Descripcion :</label>
         <div class="col-md-8">
            <textarea class="form-control" name="des_rub" placeholder="DESCRIPCION DEL RUBRO" ></textarea>
         </div>
         </div>
        
         <input type="hidden" id="idalm">
         <div class = "modal-footer" style="border-top: 0;">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal"><span class="glyphicon glyphicon-remove" style="font-size: 10px;"></span>
               Cancelar
            </button>
            
            <button type = "submit" class = "btn btn-primary"><span style="font-size: 10px;" class="glyphicon glyphicon-plus"></span>
               Registrar
            </button>
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->
</div>
 
 <div class = "modal fade" id = "myModal2" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Modificar Almacen
            </h4>
         </div>
         <div class = "modal-body">
         <form class="form-horizontal" action="actualizarcomp" method="POST">	
         <div class="form-group">
            <label class="col-lg-3 control-label">Nombre :</label>
         <div class="col-md-8">
            <input class="form-control" id="nomcomp">
         </div>
         </div>
                  <div class="form-group">
            <label class="col-lg-3 control-label">Descripcion :</label>
         <div class="col-md-8">
            <input class="form-control" id="descomp">
         </div>
         </div>
       

        
         <input type="hidden" id="idalm">
         <div class = "modal-footer" style="border-top: 0;">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal"><span class="glyphicon glyphicon-remove" style="font-size: 10px;"></span>
               Cancelar
            </button>
            
            <button type = "submit" class = "btn btn-primary"><span style="font-size: 10px;" class="glyphicon glyphicon-plus"></span>
               Modificar
            </button>
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->

 	

	@stop