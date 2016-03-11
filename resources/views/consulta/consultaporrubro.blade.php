@extends ('../layout')
	@section ('contenido')

		<fieldset class="fieldcuerpo" align="left">
					<legend>CONSULTA POR RUBRO</legend>
			  <center> 
			  		<form>
	
            <div style="margin-top: 5%; margin-bottom: 10%">
       
	        <table>
	        <tr>
	            <td rowspan="5">
	            <img height="160px" width="175px" src="<?php echo asset('img/con_por_rub.png')?>">
	            </td>
	        </tr>
	        <tr>
	        <tr style="height: 50px;">
			   <td width="120px" class="lblnombre">Ingrese nombre del rubro:</td>
			   <td width="200px"><input type="text" name="nom_car" class="txtcampo" placeholder="NOMBRE DEL RUBRO" onkeypress="return alfanumerico(event);" onpaste="return false"></td>	
		    </tr>  
	        </tr>
	        <tr>
	           <td height="40px" colspan="2" style="padding-left:25px" align="center">
				<input type="submit" class="botones ico-btnsearch" value="BUSCAR">
                <input type="reset" class="botones ico-btnlimpiar" value="LIMPIAR DATOS">
               </td>
           </tr>
	</table>
			  		</form>



			  </center>

	  
</fieldset>
	@stop