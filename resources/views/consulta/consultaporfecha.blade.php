@extends ('../layout')
	@section ('contenido')

		<fieldset class="fieldcuerpo" align="left">
					<legend>CONSULTA POR FECHAS</legend>
		<center> 
			<form>
			<div style="margin-top: 5%; margin-bottom: 10%">
			<table>
	       		<tr>
	            	<td rowspan="5">
	            	<img height="160px" width="175px" src="<?php echo asset('img/con_por_ing.png')?>">
	            	</td>
	        	</tr>
	        
	       		<tr style="height: 50px;">
			   		<td width="160px" class="lblnombre">Ingrese una fecha inicial</td>
			   		<td width="200px">
  					<input type="text" name="datepicker" id="datepicker" readonly="readonly" size="12" /></td>	
  				</tr>
  				<tr>
  					<td width="160px" class="lblnombre">Ingrese una fecha final</td>
			    	<td width="200px">
  						<input type="text" name="datepicker" id="datepicker2" readonly="readonly" size="12" /></td>	
  				</tr>
  				<tr>
  					<td width="120px" class="lblnombre">Categoria</td>
  					<td height="40px">
  					<select>
  						<option>INGRESOS</option>
  						<option>SALIDAS</option>
  						<option>SOLICITUDES</option>
  				    	<option>RESPUESTAS</option>
  					</select>
  					</td>
  				</tr>
				<tr>
	            	<td height="60px" colspan="4" style="padding-left:25px" align="center">
						<input type="submit" class="botones ico-btnsearch" value="BUSCAR">
                		<input type="reset" class="botones ico-btnlimpiar" value="LIMPIAR DATOS">
               		</td>
            	</tr>
			</table>
			</div>
			</form>



			  </center>

	  
</fieldset>
	@stop