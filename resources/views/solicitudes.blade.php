@extends('layout')
@section ('contenido')

<script type='text/javascript' language='javascript' class='init'> 
    function revisar(data1, data2, data3){
    $('#fec_sol').val(data1);
    $('#usu_sol').val(data2);
    $('#id_sol').val(data3);
    var id=data3;
    $.post('prod_sol', {id:id}, function(data){
        $('#prod_sol').html(data);
        });  
    }
    </script>

	<div id="div2"></div>
		<fieldset class="fieldcuerpo" align="left">
					<legend style="margin-bottom: 0;">TODAS LAS SOLICITUDES</legend>
          <script type="text/javascript">
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeIn(2500); },0000); });
              $(document).ready(function() { setTimeout(function(){ $(".mensajewarning").fadeOut(2500); },5000); });
            </script>
         <?php if (Session::has('mensaje3')):
            ?>
                  <div class="mensajewarning alert alert-success" style="margin-bottom: 10px;"><label><?php echo Session::get('mensaje3');?></label></div>
         <?php endif;?>
	  	<div>
	  	<button onClick="javascript:despliegaModal('visible');" class="btn btn-success" style="float: left;"><span class="glyphicon glyphicon-plus"> </span> Nueva solicitud</button>
	  	</br>
	  	</br>
	  	</br>
<div class="table-responsive">
  <table id="example6" class="table table-hover" cellspacing="5" width="100%">
  <thead>
    <tr class="info">
            <th>TIPO</th>
            <th>FECHA DE SOLICITUD</th>
            <th>USUARIO</th>
      <th>ESTADO</th>
      <th>CANTIDAD</th>
    </tr>
  </thead>
  <tbody style="font-size:11px;">
    <?php if(count($query)>0){?>
    <tr>
    <?php  
       
          foreach ($query as $query):
             if($query->REA_NOT==0){
        $a='No leido';
        }elseif($query->REA_NOT==1){
        $a='Leido';
        }elseif($query->REA_NOT==2){
        $a='Enviado a revision';
        }
        $fechas=$query->updated_at->format('d/m/Y');
        $nombres=$query->NOM_USU.' '.$query->APA_USU.' '.$query->AMA_USU;
        $fecha= "'".$fechas."'";
        $nombre= "'".$nombres."'";
          ?>
            <th><?php echo $query->TIP_NOT;?></th>
            <th><?php echo $query->updated_at->format('Y/m/d');?></th>
            <th><?php echo $query->NOM_USU.' '.$query->APA_USU.' '.$query->AMA_USU;?></th>
            <th><?php echo $a;?></th>
            <th><button data-toggle = "modal" title="Revisar solicitud" onClick="revisar(<?php echo $fecha.','.$nombre.','.$query->ID_PSO?>);" data-target = "#myModal"  class="btn btn-danger"> <span class="glyphicon glyphicon-exclamation-sign" ></span> Revisar</button></th>
    </tr>
        <?php endforeach;}
      
      ?>
  </tbody>
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
               Revisar solicitud 
            </h4>
         </div>
       <form class="form-horizontal" name="" action="enviarevision" method="POST">
         <div class = "modal-body">
         <input type="hidden" id="id_sol" name="id_sol">
            <div class="form-group">
            	<label class="col-lg-3 control-label">Fecha de solicitud:</label>
         		<div class="col-md-8">
           		 <input type="text" min="0" name="" id="fec_sol" class="form-control" readonly="readonly">
        		</div>
         		</div>
         	<div class="form-group">
            	<label class="col-lg-3 control-label">Solicitante:</label>
         		<div class="col-md-8">
           		 <input type="text" name="usu_sol" id="usu_sol" value="" class="form-control" readonly="readonly">
        		</div>
         		</div>
         	<div class="table-responsive" id="prod_sol">
				
         
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->
	@stop