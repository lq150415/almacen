	@extends ('layout')

	@section ('contenido')
		<fieldset class="fieldcuerpo" align="left">
					<legend style="margin-bottom: 0;">PRODUCTOS</legend>
	  	<div>
<script type="text/javascript">
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeIn(2500); },0000); });
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeOut(2500); },5000); });
</script>
<script type="text/javascript">
   function verprod(data1,data2,data3,data4)
      {
         $('#itm_prod10').val(data1);
         $('#can_prod10').val(data2);
         $('#pun_prod10').val(data3);
         $('#des_prod10').val(data4);
      }
</script>
<script type="text/javascript">
   function pasadatosrub(data1, data2,data3)
      {
         $('#id_pro').val(data3);
         $('#item_pro').val(data1);
         $('#descripcion_pro').val(data2);
      }
</script>
         <?php if (Session::has('mensaje')):
            ?>
                  <div class="mensajewarning alert alert-danger" style="margin-bottom: 10px;"><label><?php echo Session::get('mensaje');?></label></div>

         <?php endif;?>
         <?php if (Session::has('mensaje2')):
            ?>
                  <div class="mensajewarning alert alert-success" style="margin-bottom: 10px;"><label><?php echo Session::get('mensaje2');?></label></div>
         <?php endif;?>
          
	  	<button data-toggle = "modal" data-target = "#myModal3" href="" class="btn btn-success btn-sm"> <span class="glyphicon glyphicon-plus"> </span> Nuevo producto </button> 
	  	</br>
	  	</br>	  	
	  	<span class="titulo">ID Rubro : </span><span  class="subtitulo"><?php echo $query[0]->id;?></span> 
	  	</br>	
	  	</br>
	  	<span class="titulo">Nombre del rubro : </span><span class="subtitulo"><?php echo $query[0]->NOM_RUB;?></span>
	  	</br>	
	  	</br>
	  	<span class="titulo">Cantidad de productos : </span><span class="subtitulo"><?php echo $query2;?></span>
	  	</div>	
	  	</br>
	  	<fieldset class="fieldcuerpo" align="left">
					<legend style="margin-bottom: 0;">DETALLE</legend>
		<table id="example" class="display" cellspacing="5" width="100%" style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
	<thead style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th width="8%">ID</th>
			<th width="10%">ITEM</th>
            <th data-orderable="false"  width="37%;">DESCRIPCION DEL PRODUCTO</th>
			<th data-orderable="false"  width="10%">PRECIO</th>
			<th data-orderable="false"  width="10%">STOCK</th>
			<th data-orderable="false" width="20%;;">ACCIONES</th>	
		</tr>
	</thead>
	<tfoot style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
			<th>ITEM</th>
            <th>DESCRIPCION DEL PRODUCTO</th>
			<th>PRECIO</th>
			<th>STOCK</th>
			<th>ACCIONES</th>	
		</tr>
	</tfoot>
	<tbody style="font-size:11px;">
		<?php if(count($productos)>0){?>
		<tr>
		<?php  
					foreach ($productos as $producto):
					?>
						<th><?php echo $producto->id;?></th>
						<th>
						<?php if($producto->ITM_PRO>9999)
						{
						echo "0".$producto->ITM_PRO;
						}else{
						echo "00".$producto->ITM_PRO;}?></th>	
						<th><?php echo $producto->DES_PRO;?></th>
						<th><?php echo $producto->PUN_PRO." Bs/u";?></th>
						<th><?php echo $producto->CAN_PRO." en stock";?></th>
						<th><button data-toggle = "modal" data-target = "#myModal4" onclick="javascript:verprod(<?php echo "'".trim($producto->ITM_PRO)."','".trim($producto->CAN_PRO)." unidades','".trim($producto->PUN_PRO)." Bs.','".$producto->DES_PRO."'";?>);" class="btn btn-success" title="Ver"> <span class="glyphicon glyphicon-search"> </span> </button> <button data-toggle = "modal" title="Modificar Producto" data-target = "#myModal2" onclick="javascript:pasadatosrub(<?php echo "'".trim($producto->ITM_PRO)."','".trim($producto->DES_PRO)."','".$producto->id."'";?>);" class="btn btn-primary"> <span class="glyphicon glyphicon-pencil"> </span> </button> <button title="Eliminar Producto" onclick="javascript:idenvio(<?php echo $producto->id;?>);" data-toggle = "modal" data-target = "#myModal" href="" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> </span> </button></th>	
		</tr>
				<?php	endforeach; }
			
			?>
	</tbody>
</table>
</fieldset>
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
         <form action="<?php echo $id;?>/eliproducto" method="POST">
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
               Producto 
            </h4>
         </div>
         <form >
         <div class = "modal-body">

         <input type="hidden" id="id" name="id">
            <div class="form-group col-sm-18">
  <div class="form-group col-sm-4" >
    <label class="control-label label label-primary">Item del producto:</label>
    <div class="col-sm-17">
        <input type="text" style="border:none" min="0" name="" id="itm_prod10" class="form-control" readonly placeholder="" onpaste="return false">
    </div>
    </div>
    <div class="form-group col-sm-4" >
    <label class="control-label label label-primary">Precio unitario:</label>
    <div class="col-sm-17">
        <input type="text" style="border:none" min="0" name="" id="pun_prod10" class="form-control" readonly  onpaste="return false">
    </div>
    </div>
    <div class="form-group col-sm-4">
    <label class="control-label label label-primary">Cantidad disponible:</label>
    <div class="col-sm-17">
        <input type="text" style="border:none" min="0" name="" id="can_prod10"  class="form-control" readonly placeholder="" onpaste="return false">
    </div>
    </div>
    <br/>
    <div class="form-group col-sm-12">
    <label class="control-label label label-primary">Descripcion del producto:</label>
    <div class="col-sm-17">
        <input type="text" style="border:none" min="0" name="" id="des_prod10"  class="form-control" readonly placeholder="" onpaste="return false">
    </div>
    </div>
         
         <div class = "modal-footer" style="border-top: none;">
            <button type = "button" class = "btn btn-success" data-dismiss = "modal"><span class="glyphicon glyphicon-ok" style="font-size: 10px; "></span>
               Aceptar
            </button>
            
         </div>
         </div>
        </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  </form>
</div><!-- /.modal -->

 <div class = "modal fade" id = "myModal3" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel3" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Registrar nuevo Producto
            </h4>
         </div>
         <div class = "modal-body">
         		<form class="form-horizontal" method="POST" action="<?php echo $id;?>/registro">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
				 <div class="form-group">
            	<label class="col-lg-3 control-label">Nro de item :</label>
         		<div class="col-md-8">
           		 <input placeholder="ITEM DEL PRODUCTO" class="form-control" type="number" step="1" min="0" name="itm_pro">
        		</div>
         		</div>
         <div class="form-group">
            <label class="col-lg-3 control-label">Descripcion :</label>
         <div class="col-md-8">
            <textarea class="form-control" name="des_pro" placeholder="DESCRIPCION DEL PRODUCTO" ></textarea>
         </div>
         </div>
         		<div class="form-group">
            	<label class="col-lg-3 control-label">Precio unitario:</label>
         		<div class="col-md-3">
           		 <input type="number" placeholder="P/U Bs." min="0" step="any" class="form-control" name="pun_pro">
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
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->
 <div class = "modal fade" id = "myModal2" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel2" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Modificar producto
            </h4>
         </div>
         <div class = "modal-body">
         <form class="form-horizontal" action="<?php echo $id;?>/modifpro"" method="POST">	
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id_pro" id="id_pro">
         <div class="form-group">
            <label class="col-lg-3 control-label">Item :</label>
         <div class="col-md-8">
            <input class="form-control" id="item_pro" name="item_pro">
         </div>
         </div>
                  <div class="form-group">
            <label class="col-lg-3 control-label">Descripcion :</label>
         <div class="col-md-8">
            <input class="form-control" id="descripcion_pro" name="descripcion_pro">
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

 	</div>

	@stop