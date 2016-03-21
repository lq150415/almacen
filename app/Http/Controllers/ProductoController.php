<?php namespace almacen\Http\Controllers;

use almacen\Http\Requests;
use almacen\Http\Controllers\Controller;
use almacen\Almacen;
use almacen\Rubro;
use almacen\Producto;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class ProductoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)

	{	if(Auth::user()->NIV_USU==0){
		$productos = new Producto;
		$productos= Producto::where('ID_RUB','=',$id)->get();
		$rubros= new Rubro;
		$query = Rubro::where('id','=',$id)->get();
		$query2 = Producto::where('ID_RUB','=',$id)->orderBy('ID_RUB')->count();
		return view('producto')->with('productos', $productos)->with('id',$id)->with('query',$query)->with('query2',$query2);
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
		$productos = new Producto;
		$productos->ITM_PRO = $request->input('itm_pro');
        $productos->DES_PRO = $request->input('des_pro');
        $productos->PUN_PRO = $request->input('pun_pro');
        $productos->CAN_PRO = $request->input('can_pro');
        $productos->ID_RUB = $id;
        $productos->created_at = Carbon::now();
        $productos->updated_at = Carbon:: now();
		$productos->save();

        return redirect()->route('producto',array('id'=>$id));
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
