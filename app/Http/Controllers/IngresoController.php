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
		$j=count($request->input('nro_fac'));
		for($i=0; $i < count($request->input('nro_fac')) ;$i++){
			$ingresados = new Ingresado;
			$ingresados->NFC_PIN = $request->input('nro_fac.'.$i);
        	$ingresados->NOC_PIN = $request->input('nro_com.'.$i);
        	$ingresados->CAN_PIN = $request->input('can_pro.'.$i);
        	$ingresados->PRO_PIN = $request->input('pro_pin.'.$i);
        	$ingresados->ID_PRO = $request->input('idproducto.'.$i);
        	$ingresados->ID_ING = 	$ingresos->id;
        	$ingresados->created_at = Carbon::now();
        	$ingresados->updated_at = Carbon::now();
			$ingresados->save();
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
		if($i==1){  
        $html2 ='<table id="example2" class="display" cellspacing="5" width="100%" style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
	<thead style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
			<th>ITEM </th>
            <th>DESCRIPCION DEL PRODUCTO</th>
			<th>PRECIO UNITARIO</th>
			<th>ACCION</th>	
			<th>NUEVO PRECIO</th>	
		</tr>
	</thead><tbody style="font-size:11px;" id="tablabody">'.'<tr>'.'<th>'.$producto->id.'</th>'.'<th>'.$producto->ITM_PRO.'</th>'.'<th>'.$producto->DES_PRO.'</th>'.'<th>'.$producto->PUN_PRO.'</th>'.'<th><a href="javascript:agregavalor('.$h.','.$b.','.$d.','.$f.');">Agregar</a></th><th><a href=""> Nuevo Precio</th>'.'</tr>';
		echo "<script type='text/javascript' language='javascript' class='init'>"; 
		echo "$(document).ready(function() {"; 
		echo "$('#example2').DataTable();";
		echo "} );";
		echo "</script>";  
		echo "<script type='text/javascript' lang='javascript'>";
		echo "function agregavalor(_value, data, data2,data3){";
		echo "document.getElementById('bgVentanaModal2').style.visibility = _value;";
	//	echo "$('#tabla tbody tr:eq(0)').clone().removeClass('fila-base').appendTo('#tabla tbody');";
		echo "$('#nro_fac').val($('#nro_fac1').val());";
		echo "$('#can_pro').val($('#cant').val());";
		echo "$('#pro_pin').val($('#pro_pin1').val());";
		echo "$('#idproducto').val(data3);";
		echo "$('#producto').val(data);";
		echo "$('#pre_pro').val(data2);";
		echo "$('#nro_com').val($('#nro_com1').val());}";
		echo "</script>";

		
		echo $html2; $i++; }
		else{
		
			$html2 = '<tr>'.'<th>'.$producto->id.'</th>'.'</th>'.'<th>'.$producto->ITM_PRO.'<th>'.$producto->DES_PRO.'</th>'.'<th>'.$producto->PUN_PRO.'</th>'.'<th>'.'<a href="javascript:agregavalor('.$h.','.$b.','.$d.','.$f.');">Agregar</a></th><th><a href=""> Nuevo Precio</a>'.'</th>'.'</tr>';
			echo $html2;
		}
		endforeach;
		echo "<tfoot style='font-size:13px;color:#FFF;background-color:#444444;height:40px;''>
		<tr>
			<th>ID</th>
			<th>ITEM</th>			
            <th>DESCRIPCION DEL PRODUCTO</th>
			<th>PRECIO UNITARIO</th>
			<th>ACCION</th>	
			<th>NUEVO PRECIO</th>			
		</tr>
	</tfoot></table>";
	}

public function datos_pro2()
	{
		$productos2 = new Producto;
		
		$productos2->ITM_PRO = $_POST['itm'];
        $productos2->DES_PRO = $_POST['des'];
        $productos2->PUN_PRO = $_POST['pun'];
        $productos2->CAN_PRO = $_POST['can'];
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
		if($i==1){  
        $html2 ='<table id="example2" class="display" cellspacing="5" width="100%" style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
	<thead style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>ID</th>
			<th>ITEM </th>
            <th>DESCRIPCION DEL PRODUCTO</th>
			<th>PRECIO UNITARIO</th>
			<th>ACCION</th>	
			<th>NUEVO PRECIO</th>	
		</tr>
	</thead><tbody style="font-size:11px;" id="tablabody">'.'<tr>'.'<th>'.$producto->id.'</th>'.'<th>'.$producto->ITM_PRO.'</th>'.'<th>'.$producto->DES_PRO.'</th>'.'<th>'.$producto->PUN_PRO.'</th>'.'<th><a href="javascript:agregavalor('.$h.','.$b.','.$d.','.$f.');">Agregar</a></th><th><a href=""> Nuevo Precio</th>'.'</tr>';
		echo "<script type='text/javascript' language='javascript' class='init'>"; 
		echo "$(document).ready(function() {"; 
		echo "$('#example2').DataTable();";
		echo "} );";
		echo "</script>";  
		echo "<script type='text/javascript' lang='javascript'>";
		echo "function agregavalor(_value, data, data2,data3){";
		echo "document.getElementById('bgVentanaModal2').style.visibility = _value;";
	//	echo "$('#tabla tbody tr:eq(0)').clone().removeClass('fila-base').appendTo('#tabla tbody');";
		echo "$('#nro_fac').val($('#nro_fac1').val());";
		echo "$('#can_pro').val($('#cant').val());";
		echo "$('#pro_pin').val($('#pro_pin1').val());";
		echo "$('#idproducto').val(data3);";
		echo "$('#producto').val(data);";
		echo "$('#pre_pro').val(data2);";
		echo "$('#nro_com').val($('#nro_com1').val());}";
		echo "</script>";

		
		echo $html2; $i++; }
		else{
		
			$html2 = '<tr>'.'<th>'.$producto->id.'</th>'.'</th>'.'<th>'.$producto->ITM_PRO.'<th>'.$producto->DES_PRO.'</th>'.'<th>'.$producto->PUN_PRO.'</th>'.'<th>'.'<a href="javascript:agregavalor('.$h.','.$b.','.$d.','.$f.');">Agregar</a></th><th><a href=""> Nuevo Precio</a>'.'</th>'.'</tr>';
			echo $html2;
		}
		endforeach;
		echo "<tfoot style='font-size:13px;color:#FFF;background-color:#444444;height:40px;''>
		<tr>
			<th>ID</th>
			<th>ITEM</th>			
            <th>DESCRIPCION DEL PRODUCTO</th>
			<th>PRECIO UNITARIO</th>
			<th>ACCION</th>	
			<th>NUEVO PRECIO</th>			
		</tr>
	</tfoot></table>";
	}




}