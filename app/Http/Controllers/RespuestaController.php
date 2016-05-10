<?php namespace almacen\Http\Controllers;

use almacen\Http\Requests;
use almacen\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use almacen\Notificacion;
use almacen\User;
use almacen\Solicitud;
class RespuestaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$respuesta=Notificacion::join('solicitudes','solicitudes.id','=','ID_PSO')
		->where('notificaciones.REA_NOT','=',3)
		->where('notificaciones.DES_NOT','=',2)
		->where('TIP_NOT','=','Respuesta')
		->where('AUT_NOT','=',Auth::user()->id)->get();
		$respuestasall=Notificacion::join('solicitudes','ID_PSO','=','solicitudes.id')->join('users','ID_USU','=','users.id')->where('notificaciones.REA_NOT','>=',3)
			->where('notificaciones.DES_NOT','=',2)
			->where('TIP_NOT','=','Respuesta')->select('notificaciones.id','NOM_USU','APA_USU','AMA_USU','notificaciones.created_at','ALE_NOT','REA_NOT','ID_PSO')->get();
		
		if(Auth::user()->NIV_USU==0){
		return view('respuesta')->with('respuestas',$respuestasall);
		}else{
			return view('cliente/resp_sol')->with('respuestas',$respuesta);
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
		//
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
