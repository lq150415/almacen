<?php namespace almacen\Http\Controllers;

use almacen\Http\Requests;
use almacen\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use almacen\Almacen;
use almacen\Rubro;
use almacen\Producto;
use almacen\User;
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
        	$notificaciones->ALE_NOT =0;
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
		$mensaje="Solicitud enviada";
		if(Auth::user()->NIV_USU==0){
			return view('solicitud')->with('mensaje',$mensaje);}
			else{
				$productos= Producto::join('rubros','rubros.id','=','productos.ID_RUB')->where('ID_ALM','=','1')
		->select('productos.id','DES_PRO','ID_ALM')
		->get();
			return redirect()->route('solicitud.index')->with('mensaje',$mensaje);

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

	public function httpush()
	{
		set_time_limit(0); //Establece el número de segundos que se permite la ejecución de un script.
		$fecha_ac = isset($_POST['timestamp']) ? $_POST['timestamp']:0;
		$query2    = new Notificacion;
		$con1= $query2->select('updated_at')->orderBy('updated_at','DESC')->first();
		$fecha_bd = $con1->updated_at;

		while( $fecha_bd <= $fecha_ac )
			{	
				$query3    = new Notificacion;
				$con       =$query3->select('updated_at')->orderBy('updated_at','DESC')->first();
				$ro        = $con->updated_at;
		
				usleep(100000);//anteriormente 10000
				clearstatcache();
				$fecha_bd  = strtotime($ro);
			}

		$query       =new Notificacion;
		$datos_query =$query->orderBy('updated_at','DESC')->first()->get();
		foreach ($datos_query as  $query):

			$ar["updated_at"]          = strtotime($query->updated_at);	
			$ar["DES_NOT"] 	 		  = $query->DES_NOT;	
			$ar["AUT_NOT"] 		          = $query->AUT_NOT;	
			$ar["REA_NOT"]           = $query->REA_NOT;	
			$ar["TIP_NOT"]           = $query->TIP_NOT;	
			$ar["ID_PSO"]           = $query->ID_PSO;	
		endforeach;
		$dato_json   = json_encode($ar);
		echo $dato_json;
			}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function notificaciones()
	{
		$q = new Notificacion;
		$q = $q->join('solicitudes', 'notificaciones.ID_PSO','=','solicitudes.id')->join('users', 'solicitudes.ID_USU','=','users.id')->where('notificaciones.DES_NOT','=',$_POST['div'])->orderBy('notificaciones.updated_at', 'DESC')->get();
		$i=1;
		foreach ($q as $qs ) :
			if($qs->REA_NOT==0){
				$a='No leido';
			}elseif($qs->REA_NOT==1){
				$a='Leido';
			}elseif($qs->REA_NOT==2){
				$a='Enviado a revision';
			}
			if($i==1){  
		$html2 ='<table id="example2" class="display" cellspacing="5" width="100%" style="border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;border:1px #444444 solid;">
	<thead style="font-size:13px;color:#FFF;background-color:#444444;height:40px;">
		<tr>
			<th>TIPO</th>
			<th>FECHA DE SOLICITUD</th>
            <th>USUARIO</th>
            <th>ESTADO</th>
			<th>ACCION</th>	
		</tr>
	</thead><tbody style="font-size:11px;" id="tablabody">'.'<tr>'.'<th>'.$qs->TIP_NOT.'</th>'.'<th>'.$qs->updated_at.'</th>'.'<th>'.$qs->NOM_USU.' '.$qs->APA_USU.' '.$qs->AMA_USU.'</th><th>'.$a.'</th><th><a href="">Revisar</a></th></tr>';
		echo "<script type='text/javascript' language='javascript' class='init'>"; 
		echo "$(document).ready(function() {"; 
		echo "$('#example2').DataTable();";
		echo "} );";
		echo "</script>";  
		
		echo $html2; $i++; }
		else{
		
			$html2 ='<tr>'.'<th>'.$qs->TIP_NOT.'</th>'.'<th>'.$qs->updated_at.'</th>'.'<th>'.$qs->NOM_USU.' '.$qs->APA_USU.' '.$qs->AMA_USU.'</th><th>'.$a.'</th><th><a href="">Revisar</a></th></tr>';
			echo $html2;
		}
		endforeach;
		echo "<tfoot style='font-size:13px;color:#FFF;background-color:#444444;height:40px;''>
		<tr>
			<th>ID</th>
			<th>FECHA DE SOLICITUD</th>
            <th>USUARIO</th>
            <th>ESTADO</th>
			<th>ACCION</th>			
		</tr>
	</tfoot></table>";
		

		}
	
	public function notificacionescount()
	{
		$contar=Notificacion::where('notificaciones.REA_NOT','=',$_POST['div'])->count();
		
			echo $contar;

	
	}
	public function notificacionesalerta()
	{	
		$query2    = new Notificacion;
		$con5= $query2->orderBy('updated_at','DESC')->first();
		$usuario= User::where('id','=',$con5->AUT_NOT)->get();

		if($con5->ALE_NOT ==0){

 		echo "<script type='text/javascript'>";
        echo "$(document).ready(function() { setTimeout(function(){ $('.mensajelogin').fadeIn(1500); },0000); });";
        echo "$(document).ready(function() { setTimeout(function(){ $('.mensajelogin').fadeOut(1500); },5000); });";
        echo "</script>";
       

			echo "<div class='mensajelogin' id='mensaje'> <h1>Mensaje nuevo</h1>Tiene una nueva solicitud del usuario </br> ".$usuario[0]->NOM_USU.' '.$usuario[0]->APA_USU.' '.$usuario[0]->AMA_USU."</div>";
			$con5->ALE_NOT =1;
			$con5->save();
		}else{}
	
	}

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
