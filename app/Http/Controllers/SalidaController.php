<?php namespace almacen\Http\Controllers;

use almacen\Http\Requests;
use almacen\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use almacen\Almacen;
use almacen\Rubro;
use almacen\Producto;
use almacen\Salidaproducto;
use almacen\Salida;
use Carbon\Carbon;
class SalidaController extends Controller {

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
			$query = Salidaproducto::join('productos','productos.id','=','salidaproductos.ID_PRO')
						   ->join('salidas','salidas.id','=','salidaproductos.ID_SAL')
						   ->select('FEC_SAL', 'DGA_SPR', 'DES_SPR','DES_PRO', 'CAN_PRO', 'PUN_PRO', 'CAN_SPR', 'ID_SAL')
                           ->get();
		return view('salida')->with('almacenes',$almacenes)->with('rubros',$rubros)->with('productos',$productos)->with('consultas',$query);
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
		$salidas = new Salida;
		
		$salidas->FEC_SAL = Carbon::now();
        $salidas->ID_USU = Auth::user()->id;
        $salidas->created_at = Carbon::now();
        $salidas->updated_at = Carbon:: now();
		$salidas->save();
		$j=count($request->input('nro_com'));
		for($i=0; $i < count($request->input('nro_com')) ;$i++){
			$salidaproductos = new Salidaproducto;
			$salidaproductos->DGA_SPR = $request->input('nro_com.'.$i);
        	$salidaproductos->CAN_SPR = $request->input('can_pro.'.$i);
        	$salidaproductos->DES_SPR = $request->input('pro_pin.'.$i);
        	$salidaproductos->ID_PRO = $request->input('idproducto.'.$i);
        	$salidaproductos->ID_SAL = 	$salidas->id;
        	$salidaproductos->created_at = Carbon::now();
        	$salidaproductos->updated_at = Carbon::now();
			$salidaproductos->save();

			$cantidades = new Producto;
			$id = $request->input('idproducto.'.$i);
			$cantidades= $cantidades->find($id);
			$cantidades->CAN_PRO -= $request->input('can_pro.'.$i);
			$cantidades->save();
		}
		$mensaje="Salida registrada correctamente";
        return redirect()->route('salida.index')->with('mensaje3',$mensaje);
	}
	

	public function datos_prosal()
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
		$ab ="'visible'";
        $html2 ='
        <table id="example2" class="display table table-hover" width="100%" >
	<thead>
		<tr class="info">
			<th>Id</th>
			<th>Item </th>
            <th>Descripcion del producto</th>
			<th>Precio</th>
			<th>Agregar</th>	
		</tr>
	</thead><tbody id="tablabody">'.'<tr>'.'<th>'.$producto->id.'</th>'.'<th>'.$producto->ITM_PRO.'</th>'.'<th>'.$producto->DES_PRO.'</th>'.'<th>'.$producto->PUN_PRO.'</th>'.'<th><a href="javascript:agregavalor('.$h.','.$b.','.$d.','.$f.');" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span></a></th>'.'</tr>';
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
		
			$html2 = '<tr>'.'<th>'.$producto->id.'</th>'.'</th>'.'<th>'.$producto->ITM_PRO.'<th>'.$producto->DES_PRO.'</th>'.'<th>'.$producto->PUN_PRO.'</th>'.'<th>'.'<a href="javascript:agregavalor('.$h.','.$b.','.$d.','.$f.');" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span></a></th>'.'</tr>';
			echo $html2;
		}
		endforeach;
		
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
		//
	}

}
