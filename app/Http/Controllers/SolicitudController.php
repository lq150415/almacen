<?php namespace almacen\Http\Controllers;

use almacen\Http\Requests;
use almacen\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use almacen\Almacen;
use almacen\Rubro;
use almacen\Producto;
use Carbon\Carbon;
use almacen\Solicitud;
use almacen\Solicitado;
use almacen\Notificacion;

class SolicitudController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::user()->NIV_USU==0){
		return view('solicitud');}
		else{

		$productos= Producto::join('rubros','rubros.id','=','productos.ID_RUB')->where('ID_ALM','=','1')
		->select('productos.id','DES_PRO','ID_ALM')
		->get();
		return view('cliente/form_sol')->with('productos',$productos);
		}
	}
	
	public function indexclac()
	{
		return view('cliente/sol_ace');
	}
	public function indexclrec()
	{
		return view('cliente/sol_rec');
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
		if($request->input('idproducto.0')==0 || $request->input('idproducto.0')==' ')	{
			$mensaje="Debe ingresar al menos 1 producto";
			if(Auth::user()->NIV_USU==0){
			return view('solicitud')->with('mensaje',$mensaje);}
			else{
				$productos= Producto::join('rubros','rubros.id','=','productos.ID_RUB')->where('ID_ALM','=','1')
		->select('productos.id','DES_PRO','ID_ALM')
		->get();
			return view('cliente/form_sol')->with('mensaje',$mensaje)->with('productos',$productos);
			}
		}else{
			$solicitudes = new Solicitud;
			$solicitudes->FEC_SOL = Carbon::now();
			$solicitudes->EST_SOL = 0;
			$solicitudes->ID_USU = Auth::user()->id;
			$solicitudes->save();

			$notificaciones = new Notificacion; 
			$notificaciones->DES_NOT = $request->input('dest');
    		$notificaciones->AUT_NOT = Auth::user()->id;
        	$notificaciones->TIP_NOT = "Solicitud";
        	$notificaciones->REA_NOT = 0;
        	$notificaciones->ID_PSO = $solicitudes->id;
        	$notificaciones->created_at = Carbon::now();
        	$notificaciones->updated_at = Carbon:: now();
			$notificaciones->save();
		for($i=0; $i < count($request->input('idproducto')) ;$i++){
			$solicitados = new Solicitado;
			$solicitados->CAN_SOL = $request->input('can_sol.'.$i);
        	$solicitados->ID_PRO = $request->input('idproducto.'.$i);
        	$solicitados->ID_SOL = 	$solicitudes->id;
        	$solicitados->created_at = Carbon::now();
        	$solicitados->updated_at = Carbon::now();
			$solicitados->save();
		}
		$mensaje="registrado correctamente";
		if(Auth::user()->NIV_USU==0){
			return view('solicitud')->with('mensaje',$mensaje);}
			else{
				$productos= Producto::join('rubros','rubros.id','=','productos.ID_RUB')->where('ID_ALM','=','1')
		->select('productos.id','DES_PRO','ID_ALM')
		->get();
			return view('cliente/form_sol')->with('mensaje',$mensaje)->with('productos',$productos);
			}
		}

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
