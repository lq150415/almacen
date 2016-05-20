<?php namespace almacen\Http\Controllers;

use almacen\Http\Requests;
use almacen\Http\Controllers\Controller;
use almacen\Notificacion;	
use almacen\Solicitado;	
use almacen\Solicitud;	
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class NotificacionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::user()->NIV_USU==1){
		$notificaciones = Notificacion::where('DES_NOT','=',1)->join('users','notificaciones.AUT_NOT','=','users.id')->select('REA_NOT','NOM_USU', 'APA_USU','AMA_USU','notificaciones.updated_at', 'notificaciones.created_at','TIP_NOT','ID_PSO')->where('TIP_NOT','=','Solicitud')->get();
        return view('cliente/notificaciones')->with('notificaciones', $notificaciones);
    }else{
			return response('Unauthorized.', 401);
		}
		
	}

	

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */

	public function prod_sol2(){
		$productos= Solicitado::where('ID_SOL','=',$_POST['id'])->join('productos','productos.id','=','solicitados.ID_PRO')->join('notificaciones','notificaciones.ID_PSO','=','solicitados.ID_SOL')->get();
		$notificacion= Notificacion::where('ID_PSO','=',$_POST['id'])->select('id')->get();
		$noti = new Notificacion;
		$noti = $noti->find($notificacion[0]->id);
		if($noti->REA_NOT==0):
		$noti->REA_NOT= 1;
		$noti->save();
		endif;
		echo "<script type='text/javascript' language='javascript' class='init'>"; 
		echo "$(document).on('click','.eliminar',function(){";
		echo "var parent = $(this).parents().get(0);";
		echo "$(parent).remove();";
		echo "ind2--;";
		
		echo "});";
		echo "</script>"; 
		echo"<table id='tabla' class='table table-responsive table-hover'>
			<thead>
			<tr>
				<th width='48%'>Producto</th>
				<th width='9%'>Cantidad</th>
				<th width='9%'>Disponible</th>";
		if($productos[0]->REA_NOT < 2){
		echo "<th width='10%'>&nbsp;</th>";}
		echo"</tr>
			</thead>
			<tbody>";
		foreach ($productos as $producto):
			echo "<tr> 				
				<td><input type='text' class='form-control' id='producto' name='producto[]' readonly='readonly' value='".$producto->DES_PRO."'/></td>
					<input type='hidden' class='form-control' id='estado' name='estado[]' value='".$producto->REA_NOT."'' readonly='readonly'/>
					<input type='hidden' class='form-control' id='idproducto' name='idproducto[]' value='".$producto->ID_PRO." readonly='readonly'/>
					<input type='hidden' class='form-control' id='pro_pin' name='pro_pin[]'  readonly='readonly'/>
							
					<td><input type='number' value='".$producto->CAN_SOL."'' id='can_pro' name='can_sol[]'"; 
					if($producto->REA_NOT == 2){
						echo " readonly ='readonly' ";
					}
					echo "class='form-control' name='can_pro[]'/></td>
					<td><input type='text' value='".$producto->CAN_PRO."'' id='can_prod'  readonly='readonly' class='form-control' name='can_pro[]'/></td>";
					if($producto->REA_NOT < 2){
				echo "<td class='btn btn-danger eliminar'><span class='glyphicon glyphicon-remove'></span> Eliminar</td>";
											
				echo "</tr>";}
		endforeach;
			echo "</tbody></table><div class = 'modal-footer' style='border-top: none;'>
            <button type = 'submit' href='rechazarsol' class = 'btn btn-danger' onclick=this.form.action='rechazarsolicitud'><span class='glyphicon glyphicon-remove' style='font-size: 10px; '></span>
               Rechazar solicitud
            </button>
            
            <button type = 'submit' href='aprobarsol' class = 'btn btn-success' onclick=this.form.action='aprobarsolicitud'><span style='font-size: 10px; ' class='glyphicon glyphicon-check'></span>
                Aprobar solicitud
            </button>
         </div>";
     
	}

	public function aprobar(Request $request)
	{	
		$solicitudresp=Solicitud::find($request->input('id_sol'));
		$solicitudresp->EST_SOL=1;
		$solicitudresp->save();
		$solicitud=Notificacion::where('ID_PSO','=',$request->input('id_sol'))->select('id')->get();
		$respuesta= Notificacion::find($solicitud[0]->id);
		$respuesta->REA_NOT=3;
		$respuesta->TIP_NOT="Respuesta";
		$respuesta->DES_NOT=2;
		$respuesta->ALE_NOT=1;
		$respuesta->save();

		$mensaje="Solicitud aprobada";
		return redirect()->route('notificacionescl')->with('mensaje',$mensaje);
	}

	public function rechazar(Request $request)
	{	
		$solicitudresp=Solicitud::find($request->input('id_sol'));
		$solicitudresp->EST_SOL=2;
		$solicitudresp->save();
		$solicitud=Notificacion::where('ID_PSO','=',$request->input('id_sol'))->select('id')->get();
		$respuesta= Notificacion::find($solicitud[0]->id);
		$respuesta->REA_NOT=3;
		$respuesta->TIP_NOT="Respuesta";
		$respuesta->DES_NOT=2;
		$respuesta->ALE_NOT=2;
		$respuesta->save();

		$mensaje2="Solicitud rechazada";
		return redirect()->route('notificacionescl')->with('mensaje2',$mensaje2);
	}

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
