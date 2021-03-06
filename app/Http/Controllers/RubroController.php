<?php namespace almacen\Http\Controllers;

use almacen\Http\Requests;
use almacen\Http\Controllers\Controller;
use almacen\Almacen;
use DB;
use almacen\Rubro;
use almacen\Producto;
use almacen\Solicitado;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RubroController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{	
		if(Auth::user()->NIV_USU==0){
		$rubros = new Rubro;
		$rubros= Rubro::where('ID_ALM','=',$id)->get();
		$almacen= new Almacen;
		$query = Almacen::where('id','=',$id)->get();
		$query2 = Solicitado::join('productos','productos.id','=','ID_PRO')->select(DB::raw('count("ID_PRO") as solicitado, "DES_PRO"'))->groupBy('DES_PRO')->orderBy('solicitado','DESC')->get();

		return view('rubro')->with('rubros', $rubros)->with('id',$id)->with('query',$query)->with('query2',$query2);
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
	public function store(Request $request, $id)
	{
		$rubro = new Rubro;
		$rubro->NOM_RUB = $request->input('nom_rub');
        $rubro->DES_RUB = $request->input('des_rub');
        $rubro->ID_ALM = $id;
        $rubro->created_at = Carbon::now();
        $rubro->updated_at = Carbon:: now();
		$rubro->save();
		$mensaje2="El rubro fue creado correctamente";
        return redirect()->route('rubro',array('id'	=>$id))->with('mensaje2',$mensaje2);
	}
	public function elirubro(Request $request, $id){

		Rubro::where('id','=',$request->input('id'))->delete();
		$mensaje="Rubro eliminado";
			  return redirect()->route('rubro',array('id'=>$id))->with('mensaje',$mensaje);

	}
	public function modificar(Request $request, $id)
	{
		$mensaje2="Rubro modificado correctamente";
		$id2= $request->input('id_rub');
		$modifica= Rubro::find($id2);

		$modifica->NOM_RUB= $request->input('nombre_rub');
		$modifica->DES_RUB= $request->input('descripcion_rub');
		$modifica->save();
		return redirect()->route('rubro',array('id'=>$id))->with('mensaje',$mensaje2);
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
