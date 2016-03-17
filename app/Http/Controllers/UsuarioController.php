<?php namespace almacen\Http\Controllers;

use almacen\Http\Requests;
use almacen\Http\Controllers\Controller;
use almacen\Usuario;	
use Illuminate\Http\Request;
use Carbon\Carbon;
class UsuarioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$usuarios = Usuario::get();
        return view('usuario')->with('usuarios', $usuarios);

		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$usuario = new Usuario;
		$usuario->NOM_USU = $request->input('nom_usu');
        $usuario->APA_USU = $request->input('apa_usu');
        $usuario->AMA_USU = $request->input('ama_usu');
        $usuario->ARE_USU = $request->input('are_usu');
        $usuario->CAR_USU =$request->input('car_usu');
        $usuario->CI_USU =$request->input('ci_usu');
        $usuario->NIV_USU = $request->input('niv_usu');
        $usuario->NIC_USU =$request->input('nic_usu');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->created_at = Carbon::now();
        $usuario->updated_at = Carbon:: now();
		$usuario->save();

        return redirect()->route('usuario.index');
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
