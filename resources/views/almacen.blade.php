	@extends ('../layout')

	@section ('contenido')
<script type="text/javascript">
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeIn(2500); },0000); });
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeOut(2500); },5000); });
            </script>
         <?php if (Session::has('mensaje')):
            ?>
                  <div class="mensajewarning" id="mensajewarning"><label><?php echo Session::get('mensaje');?></label></div>
         <?php endif;?>
         <?php if (Session::has('mensaje2')):
            ?>
                  <div class="mensajewarning" id="mensajebien"><label><?php echo Session::get('mensaje2');?></label></div>
         <?php endif;?>
		<fieldset class="fieldcuerpo" align="left">
					<legend style="margin-bottom: 0;">ALMACENES</legend>
			  	<div>

	  	<button data-toggle = "modal" data-target = "#myModal3" href="" class="btn btn-success btn-sm"> <span class="glyphicon glyphicon-plus"> </span> Nuevo almacen </button> 
	  	</br>
	  </br>
		<table id="example" class="display" cellspacing="5" width="100%" style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
	<thead style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
            <th>NOMBRE DEL ALMACEN</th>
			<th>UBICACION DEL ALMACEN</th>
			<th data-orderable="false">ACCIONES</th>	
		</tr>
	</thead>
	<tbody style="font-size:11px;">
		<?php if(count($almacenes)>0){?>
      <tr>
      <?php  
					foreach ($almacenes as $almacen):
					?>
						<th><?php echo $almacen->id;?></th>
						<th><?php echo $almacen->NOM_ALM;?></th>
            			<th><?php echo $almacen->UBI_ALM;?></th>
						<th><a class="btn btn-success"  href="rubro/<?php echo $almacen->id;?>" title="Ver rubros"> <span class="glyphicon glyphicon-search"> </span> </a> <button data-toggle = "modal" data-target = "#myModal2" href="" class="btn btn-primary" title="Modificar almacen"> <span class="glyphicon glyphicon-pencil"> </span> </button> <button onclick="javascript:idenvio(<?php echo $almacen->id;?>);" <?php if($almacen->id==1){ echo "disabled";} ?> data-toggle = "modal" data-target = "#myModal" title="Eliminar almacen" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> </span> </button></th>	
		</tr>
				<?php	endforeach; }
			
			?>
	</tbody>
	<tfoot style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
            <th>NOMBRE DEL ALMACEN</th>
			<th>UBICACION DEL ALMACEN</th>
			<th data-orderable="false">ACCIONES</th>
			
		</tr>
	</tfoot>
	
</table>
</div>
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
         <form action="elialmacen" method="POST">
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
               Registrar nuevo Almacen
            </h4>
         </div>
         <div class = "modal-body">
         		<form class="form-horizontal" method="POST" action="almacen/registrar">
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				 <div class="form-group">
            	<label class="col-lg-3 control-label">Nombre :</label>
         		<div class="col-md-8">
           		 <input placeholder="NOMBRE DEL ALMACEN" class="form-control" name="nom_alm">
        		</div>
         		</div>
         <div class="form-group">
            <label class="col-lg-3 control-label">Ubicacion :</label>
         <div class="col-md-8">
            <input class="form-control" name="ubi_alm" placeholder="UBICACION DEL ALMACEN" id="descomp">
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