<?php namespace almacen\Http\Controllers;

use almacen\Http\Requests;
use almacen\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use almacen\Almacen;
use almacen\Rubro;
use almacen\Producto;
use almacen\Ingresado;
use almacen\Ingreso;
use Carbon\Carbon;


class IngresoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::user()->NIV_USU==0){
			$almacenes = Almacen::get();
			$rubros = Rubro::get();
			$productos = Producto::get();
			//$query=
			$query = Ingresado::join('productos','productos.id','=','ingresados.ID_PRO')
						   ->join('ingresos','ingresos.id','=','ingresados.ID_ING')
						   ->select('FEC_ING', 'NOC_PIN', 'PRO_PIN', 'DES_PRO', 'CAN_PRO', 'PUN_PRO', 'CAN_PIN', 'ID_ING')
                           ->get();
		return view('ingreso')->with('almacenes',$almacenes)->with('rubros',$rubros)->with('productos',$productos)->with('consultas',$query);
		}else{
			return response('Unauthorized.', 401);
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$ingresos = new Ingreso;
		
		$ingresos->FEC_ING = Carbon::now();
        $ingresos->ID_USU = Auth::user()->id;
        $ingresos->created_at = Carbon::now();
        $ingresos->updated_at = Carbon:: now();
		$ingresos->save();
		$a =0;
		$j=count($request->input('idproducto'));
		for($i=0; $i < count($request->input('idproducto')) ;$i++){
			$ingresados = new Ingresado;
			$ingresados->NFC_PIN = $request->input('nro_fac');
        	$ingresados->NOC_PIN = $request->input('nro_com');
        	$ingresados->CAN_PIN = $request->input('can_pro.'.$i);
        	$ingresados->PRO_PIN = $request->input('pro_pin1');
        	$ingresados->ID_PRO = $request->input('idproducto.'.$i);
        	$ingresados->ID_ING = 	$ingresos->id;
        	$ingresados->created_at = Carbon::now();
        	$ingresados->updated_at = Carbon::now();
			$ingresados->save();

			$cantidades = new Producto;
			$id = $request->input('idproducto.'.$i);
			$cantidades= $cantidades->find($id);
			$cantidades->CAN_PRO += $request->input('can_pro.'.$i);
			$cantidades->save();
		}
		$mensaje="Ingreso registrado correctamente";
        return redirect()->route('ingreso.index')->with('mensaje3',$mensaje);
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{


	}
	
	public function datos_rub()
	{
		$id = $_POST['id'];
		$rubros = Rubro::where('ID_ALM','=',$id)->get();
		$i=1;          
		foreach ($rubros as $rubro): 
		if($i==1){    
        $html = '<option value="'.'">'.'SELECCIONE'.'</option>'.'<option value="'.$rubro->id.'">'.$rubro->NOM_RUB.'</option>';
			$i++;
			echo $html;
		}else{
		$html ='<option value="'.$rubro->id.'">'.$rubro->NOM_RUB.'</option>';
		echo $html;
		}
		endforeach;
	}
	public function datos_pro()
	{
		$id = $_POST['id'];
		$productos = Producto::where('ID_RUB','=',$id)->get();
		$i=1;
		foreach ($productos as $producto):   
			$a=$producto->DES_PRO;
			$b="'$a'";
			$c=$producto->PUN_PRO;
			$d="'$c'"; 
			$e=$producto->id;
			$f="'$e'";    
			$h="'hidden'"; 
			$ir=$producto->ITM_PRO;
			$ij="'$ir'";
		$ab ="'visible'";
		if($i==1){  
        $html2 ='<a class="btn btn-primary" href="javascript:despliegaModal3('.$ab.');">+ Nuevo producto</a>
					 	</br>

</br>
        <table id="example2" class="display table table-hover" width="100%" >
	<thead>
		<tr class="info">
			<th>Id</th>
			<th>Item </th>
            <th>Descripcion del producto</th>
			<th>Precio</th>
			<th>Agregar</th>	
			<th>Nuevo precio</th>	
		</tr>
	</thead><tbody id="tablabody">'.'<tr>'.'<th>'.$producto->id.'</th>'.'<th>'.$producto->ITM_PRO.'</th>'.'<th>'.$producto->DES_PRO.'</th>'.'<th>'.$producto->PUN_PRO.'</th>'.'<th><a href="javascript:agregavalor('.$h.','.$b.','.$d.','.$f.');" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span></a></th><th><a class="btn btn-success" href="javascript:agregavalor2('.$ab.','.$ij.','.$b.','.$d.','.$f.');"><span class="glyphicon glyphicon-usd"></span></a></th>'.'</tr>';
		echo "<script type='text/javascript'>";
		echo "function despliegaModal3(_valor){";
		echo "document.getElementById('bgVentanaModal3').style.visibility=_valor;";
		echo "}";
		echo "</script>";
		echo "<script type='text/javascript' language='javascript' class='init'>";

		echo "$(document).ready(function() {"; 
		echo "$('#example2').DataTable();";
		echo "} );";
		echo "</script>";  
		echo "<script type='text/javascript' lang='javascript'>";
		echo "var name = 'pre_pro[]';";
		echo "var name2 = 'can_pro[]';";
		echo "var name3 = 'sub_pro[]';";
		echo "function agregavalor(_value, data, data2,data3){";
		echo "document.getElementById('bgVentanaModal2').style.visibility = _value;";
		echo "$('#can_pro').val($('#cant').val());";
		echo "$('#idproducto').val(data3);";
		echo "$('#producto').val(data);";
		echo "$('#pre_pro').val(data2);";
		
	echo "var yea=document.getElementById('tabla').rows.length;";
	echo "yea--;";
	echo "var total=0;"; 
    echo "var campo=document.getElementsByName(name3);";
     echo "var precio=document.getElementsByName(name);";
    echo "var cantidad=document.getElementsByName(name2);";
    echo "$('#can_pro').change(function(){";
	echo "for (i = 0; i < yea; i++) { ";
	echo "campo[i].value = parseFloat(cantidad[i].value) * parseFloat(precio[i].value);";
	echo "}";
	echo"});";

	echo "$('#can_pro').change(function(){";
		echo "var total=0;"; 
	echo "for (i = 0; i < yea; i++) { ";
	echo "	total = total + parseFloat(campo[i].value);";
	echo "}";
	
	$abc='"<div class=';
	$abc2="'form-group'><label class='col-lg-4 control-label'>TOTAL</label><div class='col-lg-4'><input class='form-control col-lg-2' margin-top:0; float:right;' type='text' readonly='readonly' id='total' value='";
	$abc3='"+total+"';
	$abc4="' ></div><label class='col-sm-1 control-label'>---BS</label></div>";
	$abc5='";';
	echo "	document.getElementById('demo').innerHTML = ".$abc.$abc2.$abc3.$abc4.$abc5;
	echo"});";
	echo "}";

		echo "</script>";
		echo "<script type='text/javascript'>";
		echo "function agregavalor2(_valor, data1, data2, data3, data4){";
		echo "document.getElementById('bgVentanaModal4').style.visibility=_valor;";
		echo "$('#itm_prod2').val(data1);";
		echo "$('#des_prod2').val(data2);";
		echo "$('#pun_prod2').val(data3);";
		echo "$('#idprod2').val(data4);";	
		echo "}</script>";

		
		echo $html2; $i++; }
		else{
		
			$html2 = '<tr>'.'<th>'.$producto->id.'</th>'.'</th>'.'<th>'.$producto->ITM_PRO.'<th>'.$producto->DES_PRO.'</th>'.'<th>'.$producto->PUN_PRO.'</th>'.'<th>'.'<a href="javascript:agregavalor('.$h.','.$b.','.$d.','.$f.');" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span></a></th><th><a class="btn btn-success" href="javascript:agregavalor2('.$ab.','.$ij.','.$b.','.$d.','.$f.');"> <span class="glyphicon glyphicon-usd"></span></a>'.'</th>'.'</tr>';
			echo $html2;
		}
		endforeach;
		
	}

public function datos_pro2()
	{
		$productos2 = new Producto;
		
		$productos2->ITM_PRO = $_POST['itm'];
        $productos2->DES_PRO = $_POST['des'];
        $productos2->PUN_PRO = $_POST['pun'];
        $productos2->CAN_PRO = 0;
        $productos2->ID_RUB = $_POST['id'];
        $productos2->created_at = Carbon::now();
        $productos2->updated_at = Carbon:: now();
		$productos2->save();

	$id = $_POST['id'];
		$productos = Producto::where('ID_RUB','=',$id)->get();
		$i=1;
		foreach ($productos as $producto):   
			$a=$producto->DES_PRO;
			$b="'$a'";
			$c=$producto->PUN_PRO;
			$d="'$c'"; 
			$e=$producto->id;
			$f="'$e'";    
			$h="'hidden'"; 
			$ir=$producto->ITM_PRO;
			$ij="'$ir'";
		$ab ="'visible'";
		if($i==1){  
        $html2 ='<a class="btn btn-primary" href="javascript:despliegaModal3('.$ab.');">+ Nuevo producto</a>
					 	</br>

</br>
        <table id="example2" class="display table table-hover" width="100%" >
	<thead>
		<tr class="info">
			<th>Id</th>
			<th>Item </th>
            <th>Descripcion del producto</th>
			<th>Precio</th>
			<th>Agregar</th>	
			<th>Nuevo precio</th>	
		</tr>
	</thead><tbody id="tablabody">'.'<tr>'.'<th>'.$producto->id.'</th>'.'<th>'.$producto->ITM_PRO.'</th>'.'<th>'.$producto->DES_PRO.'</th>'.'<th>'.$producto->PUN_PRO.'</th>'.'<th><a href="javascript:agregavalor('.$h.','.$b.','.$d.','.$f.');" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span></a></th><th><a class="btn btn-success" href="javascript:agregavalor2('.$ab.','.$ij.','.$b.','.$d.','.$f.');"><span class="glyphicon glyphicon-usd"></span></a></th>'.'</tr>';
		echo "<script type='text/javascript'>";
		echo "function despliegaModal3(_valor){";
		echo "document.getElementById('bgVentanaModal3').style.visibility=_valor;";
		echo "}";
		echo "</script>";
		echo "<script type='text/javascript' language='javascript' class='init'>";

		echo "$(document).ready(function() {"; 
		echo "$('#example2').DataTable();";
		echo "} );";
		echo "</script>";  
		echo "<script type='text/javascript' lang='javascript'>";
		echo "var name = 'pre_pro[]';";
		echo "var name2 = 'can_pro[]';";
		echo "var name3 = 'sub_pro[]';";
		echo "function agregavalor(_value, data, data2,data3){";
		echo "document.getElementById('bgVentanaModal2').style.visibility = _value;";
		echo "$('#can_pro').val($('#cant').val());";
		echo "$('#pro_pin').val($('#pro_pin1').val());";
		echo "$('#idproducto').val(data3);";
		echo "$('#producto').val(data);";
		echo "$('#pre_pro').val(data2);";
		
	echo "var yea=document.getElementById('tabla').rows.length;";
	echo "yea--;";
	echo "var total=0;"; 
    echo "var campo=document.getElementsByName(name3);";
     echo "var precio=document.getElementsByName(name);";
    echo "var cantidad=document.getElementsByName(name2);";
    echo "$('#can_pro').change(function(){";
	echo "for (i = 0; i < yea; i++) { ";
	echo "campo[i].value = parseFloat(cantidad[i].value) * parseFloat(precio[i].value);";
	echo "}";
	echo"});";

	echo "$('#can_pro').change(function(){";
		echo "var total=0;"; 
	echo "for (i = 0; i < yea; i++) { ";
	echo "	total = total + parseFloat(campo[i].value);";
	echo "}";
	
	$abc='"<div class=';
	$abc2="'form-group'><label class='col-lg-4 control-label'>TOTAL</label><div class='col-lg-4'><input class='form-control col-lg-2' margin-top:0; float:right;' type='text' readonly='readonly' id='total' value='";
	$abc3='"+total+"';
	$abc4="' ></div><label class='col-sm-1 control-label'>---BS</label></div>";
	$abc5='";';
	echo "	document.getElementById('demo').innerHTML = ".$abc.$abc2.$abc3.$abc4.$abc5;
	echo"});";
	echo "}";

		echo "</script>";
		echo "<script type='text/javascript'>";
		echo "function agregavalor2(_valor, data1, data2, data3, data4){";
		echo "document.getElementById('bgVentanaModal4').style.visibility=_valor;";
		echo "$('#itm_prod2').val(data1);";
		echo "$('#des_prod2').val(data2);";
		echo "$('#pun_prod2').val(data3);";
		echo "$('#idprod2').val(data4);";	
		echo "}</script>";

		
		echo $html2; $i++; }
		else{
		
			$html2 = '<tr>'.'<th>'.$producto->id.'</th>'.'</th>'.'<th>'.$producto->ITM_PRO.'<th>'.$producto->DES_PRO.'</th>'.'<th>'.$producto->PUN_PRO.'</th>'.'<th>'.'<a href="javascript:agregavalor('.$h.','.$b.','.$d.','.$f.');" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span></a></th><th><a class="btn btn-success" href="javascript:agregavalor2('.$ab.','.$ij.','.$b.','.$d.','.$f.');"> <span class="glyphicon glyphicon-usd"></span></a>'.'</th>'.'</tr>';
			echo $html2;
		}
		endforeach;
		
	}


public function nuevoprecio()
{
	$productos3 = Producto::where('id','=',$_POST['idpro'])->get();
		$productos2= new Producto;
		$productos2->ITM_PRO = $productos3[0]->ITM_PRO;
        $productos2->DES_PRO = $productos3[0]->DES_PRO;
        $productos2->PUN_PRO = $_POST['pun'];
        $productos2->CAN_PRO = 0;
        $productos2->ID_RUB = $_POST['id'];
        $productos2->created_at = Carbon::now();
        $productos2->updated_at = Carbon:: now();
		$productos2->save();

	$id = $_POST['id'];
		$productos = Producto::where('ID_RUB','=',$id)->get();
		$i=1;
		foreach ($productos as $producto):   
			$a=$producto->DES_PRO;
			$b="'$a'";
			$c=$producto->PUN_PRO;
			$d="'$c'"; 
			$e=$producto->id;
			$f="'$e'";    
			$h="'hidden'"; 
			$ir=$producto->ITM_PRO;
			$ij="'$ir'";
		$ab ="'visible'";
		if($i==1){  
        $html2 ='<a class="btn btn-primary" href="javascript:despliegaModal3('.$ab.');">+ Nuevo producto</a>
					 	</br>

</br>
        <table id="example2" class="display table table-hover" width="100%" >
	<thead>
		<tr class="info">
			<th>Id</th>
			<th>Item </th>
            <th>Descripcion del producto</th>
			<th>Precio</th>
			<th>Agregar</th>	
			<th>Nuevo precio</th>	
		</tr>
	</thead><tbody id="tablabody">'.'<tr>'.'<th>'.$producto->id.'</th>'.'<th>'.$producto->ITM_PRO.'</th>'.'<th>'.$producto->DES_PRO.'</th>'.'<th>'.$producto->PUN_PRO.'</th>'.'<th><a href="javascript:agregavalor('.$h.','.$b.','.$d.','.$f.');" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span></a></th><th><a class="btn btn-success" href="javascript:agregavalor2('.$ab.','.$ij.','.$b.','.$d.','.$f.');"><span class="glyphicon glyphicon-usd"></span></a></th>'.'</tr>';
		echo "<script type='text/javascript'>";
		echo "function despliegaModal3(_valor){";
		echo "document.getElementById('bgVentanaModal3').style.visibility=_valor;";
		echo "}";
		echo "</script>";
		echo "<script type='text/javascript' language='javascript' class='init'>";

		echo "$(document).ready(function() {"; 
		echo "$('#example2').DataTable({
       				 ".'"order"'.': [[ 2, "asc" ]]
   				 } );';
		echo "} );";
		echo "</script>";  
		echo "<script type='text/javascript' lang='javascript'>";
		echo "var name = 'pre_pro[]';";
		echo "var name2 = 'can_pro[]';";
		echo "var name3 = 'sub_pro[]';";
		echo "function agregavalor(_value, data, data2,data3){";
		echo "document.getElementById('bgVentanaModal2').style.visibility = _value;";
		echo "$('#can_pro').val($('#cant').val());";
		echo "$('#pro_pin').val($('#pro_pin1').val());";
		echo "$('#idproducto').val(data3);";
		echo "$('#producto').val(data);";
		echo "$('#pre_pro').val(data2);";
		
	echo "var yea=document.getElementById('tabla').rows.length;";
	echo "yea--;";
	echo "var total=0;"; 
    echo "var campo=document.getElementsByName(name3);";
     echo "var precio=document.getElementsByName(name);";
    echo "var cantidad=document.getElementsByName(name2);";
    echo "$('#can_pro').change(function(){";
	echo "for (i = 0; i < yea; i++) { ";
	echo "campo[i].value = parseFloat(cantidad[i].value) * parseFloat(precio[i].value);";
	echo "}";
	echo"});";

	echo "$('#can_pro').change(function(){";
		echo "var total=0;"; 
	echo "for (i = 0; i < yea; i++) { ";
	echo "	total = total + parseFloat(campo[i].value);";
	echo "}";
	
	$abc='"<div class=';
	$abc2="'form-group'><label class='col-lg-4 control-label'>TOTAL</label><div class='col-lg-4'><input class='form-control col-lg-2' margin-top:0; float:right;' type='text' readonly='readonly' id='total' value='";
	$abc3='"+total+"';
	$abc4="' ></div><label class='col-sm-1 control-label'>---BS</label></div>";
	$abc5='";';
	echo "	document.getElementById('demo').innerHTML = ".$abc.$abc2.$abc3.$abc4.$abc5;
	echo"});";
	echo "}";

		echo "</script>";
		echo "<script type='text/javascript'>";
		echo "function agregavalor2(_valor, data1, data2, data3, data4){";
		echo "document.getElementById('bgVentanaModal4').style.visibility=_valor;";
		echo "$('#itm_prod2').val(data1);";
		echo "$('#des_prod2').val(data2);";
		echo "$('#pun_prod2').val(data3);";
		echo "$('#idprod2').val(data4);";	
		echo "}</script>";

		
		echo $html2; $i++; }
		else{
		
			$html2 = '<tr>'.'<th>'.$producto->id.'</th>'.'</th>'.'<th>'.$producto->ITM_PRO.'<th>'.$producto->DES_PRO.'</th>'.'<th>'.$producto->PUN_PRO.'</th>'.'<th>'.'<a href="javascript:agregavalor('.$h.','.$b.','.$d.','.$f.');" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span></a></th><th><a class="btn btn-success" href="javascript:agregavalor2('.$ab.','.$ij.','.$b.','.$d.','.$f.');"> <span class="glyphicon glyphicon-usd"></span></a>'.'</th>'.'</tr>';
			echo $html2;
		}
		endforeach;
		
	}
}