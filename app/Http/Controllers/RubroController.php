<?php namespace almacen\Http\Controllers;

use almacen\Http\Requests;
use almacen\Http\Controllers\Controller;
use almacen\Almacen;
use almacen\Rubro;
use almacen\Producto;
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

		return view('rubro')->with('rubros', $rubros)->with('id',$id)->with('query',$query);
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

        return redirect()->route('rubro',array('id'	=>$id));
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
