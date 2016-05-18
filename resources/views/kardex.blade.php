@extends ('../layout')
@section ('contenido')

<fieldset class="fieldcuerpo" align="left">
					<legend style="margin-bottom: 0;">PRODUCTOS</legend>
	  	<div>
	  	
<div class="table-responsive">
  <table id="example6" class="table table-hover" cellspacing="5" width="100%">
  <thead>
    <tr class="info">
            <th>ID</th>
            <th>ITEM</th>
            <th>DESCRIPCION</th>
     		<th data-orderable="false"></th>
    </tr>
  </thead>
  <tbody style="font-size:11px;">
    <?php if(count($productos)>0){?>
    <tr>
    <?php  
       
          foreach ($productos as $producto):
          ?>
            <th><?php echo $producto->id;?></th>
            <th><?php echo $producto->ITM_PRO?></th>
            <th><?php echo $producto->DES_PRO;?></th>
            <th><a class="btn btn-warning" href="kardexpdf/<?php echo $producto->id;?>" target="_blank"> <span class="glyphicon glyphicon-list-alt" ></span> Ver kardex</button> </th>
    </tr>
        <?php endforeach;}
      
      ?>
  </tbody>
  </table>

</div>
</fieldset>
@stop
