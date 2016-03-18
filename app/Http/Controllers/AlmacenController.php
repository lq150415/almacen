<?php namespace almacen\Http\Controllers;
use almacen\Http\Requests;
use almacen\Http\Controllers\Controller;
use almacen\Almacen;
use Illuminate\Http\Request;
use Carbon\Carbon;
class AlmacenController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$almacenes = Almacen::get();
        return view('almacen')->with('almacenes', $almacenes);
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
		$almacenes = new Almacen;
		$almacenes->NOM_ALM = $request->input('nom_alm');
        $almacenes->UBI_ALM = $request->input('ubi_alm');
        $almacenes->created_at = Carbon::now();
        $almacenes->updated_at = Carbon:: now();
		$almacenes->save();
        return redirect()->route('almacen.index');
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