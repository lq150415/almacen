<?php namespace almacen\Http\Controllers;
use almacen\Http\Requests;
use almacen\Http\Controllers\Controller;
use almacen\Almacen;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class AlmacenController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::user()->NIV_USU==0){
		$almacenes = Almacen::get();
        return view('almacen')->with('almacenes', $almacenes);
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
		$mensaje2="Almacen creado correctamente";
		$almacenes = new Almacen;
		$almacenes->NOM_ALM = $request->input('nom_alm');
        $almacenes->UBI_ALM = $request->input('ubi_alm');
        $almacenes->created_at = Carbon::now();
        $almacenes->updated_at = Carbon:: now();
		$almacenes->save();
        return redirect()->route('almacen')->with('mensaje2',$mensaje2);
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function modificar(Request $request)
	{
		$mensaje2="Almacen modificado correctamente";
		$id= $request->input('id_alm');
		$modifica= Almacen::find($id);
		$modifica->NOM_ALM= $request->input('nombre_alm');
		$modifica->UBI_ALM= $request->input('ubicacion_alm');
		$modifica->save();
		return redirect()->route('almacen')->with('mensaje2',$mensaje2);
	}

	public function elialmacen(Request $request)
	{
		Almacen::where('id','=',$request->input('id'))->delete();
		$mensaje="Almacen eliminado";
			  return redirect()->route('almacen.index')->with('mensaje',$mensaje);
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