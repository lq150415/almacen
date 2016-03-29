<?php namespace almacen\Http\Controllers;

use almacen\Http\Requests;
use almacen\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use almacen\Almacen;
use almacen\Rubro;
use almacen\Producto;

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
		return view('ingreso')->with('almacenes',$almacenes)->with('rubros',$rubros)->with('productos',$productos);
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
	public function store()
	{
		
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
		foreach ($productos as $producto):          
        $html2 = '<tr>'.'<th>'.$producto->id.'</th>'.'<th>'.$producto->DES_PRO.'</th>'.'<th>'.$producto->PUN_PRO.'</th>'.'<th>'.$producto->PUN_PRO.'</th>'.'</tr>';
		echo $html2;
		endforeach;

	}



}