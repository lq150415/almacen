<?php namespace almacen\Http\Controllers;

use almacen\Http\Requests;
use almacen\Http\Controllers\Controller;
use almacen\Usuario;	
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class UsuarioController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::user()->NIV_USU==0){
		$usuarios = Usuario::get();
        return view('usuario')->with('usuarios', $usuarios);
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

	}
	public function verificausuario(){
		$usuario= Usuario::where('NIC_USU','=',$_POST['datos'])->get();
		if(count($usuario)==1){
			echo 0;
		}else{
			echo 1;
		}
	}
	public function eliusuario(Request $request)
	{
		Usuario::where('id','=',$request->input('id'))->delete();
		$mensaje="Usuario eliminado";
			  return redirect()->route('usuario.index')->with('mensaje',$mensaje);
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

		$mensaje2="El usuario fue creado correctamente";
        return redirect()->route('usuario.index')->with('mensaje2',$mensaje2);
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
