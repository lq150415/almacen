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
	public function index2()
	{
		if(Auth::user()->NIV_USU==0){
			$q = new Notificacion;
			$q = $q->join('solicitudes', 'notificaciones.ID_PSO','=','solicitudes.id')->join('users', 'solicitudes.ID_USU','=','users.id')->where('notificaciones.DES_NOT','=',0)->orwhere('notificaciones.DES_NOT','=',1)->orderBy('notificaciones.updated_at', 'DESC')->select('REA_NOT','NOM_USU', 'APA_USU','AMA_USU','notificaciones.updated_at', 'notificaciones.created_at','TIP_NOT','ID_PSO')->get();
		return view('solicitudes')->with('query',$q);}
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
        	$notificaciones->updated_at = Carbon::now();
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

	public function httpush2()
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
		$q = $q->join('solicitudes', 'notificaciones.ID_PSO','=','solicitudes.id')->join('users', 'solicitudes.ID_USU','=','users.id')->where('notificaciones.DES_NOT','=',0)->where('notificaciones.REA_NOT','=',0)->orderBy('notificaciones.updated_at', 'DESC')->select('REA_NOT','NOM_USU', 'APA_USU','AMA_USU','notificaciones.updated_at', 'notificaciones.created_at','TIP_NOT','ID_PSO')->paginate(5);
		$i=1;
		foreach ($q as $qs ) :
		echo "<script type='text/javascript' language='javascript' class='init'>"; 
		echo "function revisar(data1, data2, data3){";
		echo "$('#fec_sol').val(data1);";
		echo "$('#usu_sol').val(data2);";
		echo "$('#id_sol').val(data3);";
		echo "var id=data3;";
		echo "$.post('prod_sol', {id:id}, function(data){";
        echo "$('#prod_sol').html(data);";
        echo "});";  
		echo "}";
		echo "</script>"; 

		echo "<script type='text/javascript' language='javascript' class='init'>"; 
		echo "$(document).on('click','.eliminar',function(){";
		echo "var parent = $(this).parents().get(0);";
		echo "$(parent).remove();";
		echo "ind2--;";
		
		echo "});";
		echo "</script>"; 



			if($qs->REA_NOT==0){
				$a='No leido';
			}elseif($qs->REA_NOT==1){
				$a='Leido';
			}elseif($qs->REA_NOT==2){
				$a='Enviado a revision';
			}
			if($i==1){  
		$fechas=$qs->updated_at->format('d/m/Y');
		$nombres=$qs->NOM_USU.' '.$qs->APA_USU.' '.$qs->AMA_USU;
		$fecha= "'".$fechas."'";
		$nombre= "'".$nombres."'";
		$cr= "'created_at'";
		$html2 ='<table id="example2" class="table table-hover" cellspacing="5" width="100%" >
	<thead>
		<tr class="default">
			<th>TIPO</th>
			<th>FECHA DE SOLICITUD</th>
            <th>USUARIO</th>
            <th>ESTADO</th>
			<th>ACCION</th>	
		</tr>
	</thead><tbody style="font-size:11px;" id="tablabody">'.'<tr>'.'<th>'.$qs->TIP_NOT.'</th>'.'<th>'.$qs->created_at->format('d - m - Y').'</th>'.'<th>'.$qs->NOM_USU.' '.$qs->APA_USU.' '.$qs->AMA_USU.'</th><th>'.$a.'</th><th><button data-toggle = "modal" title="Revisar solicitud" onclick="revisar('.$fecha.','.$nombre.','.$qs->ID_PSO.');" data-target = "#myModal"  class="btn btn-danger"> <span class="glyphicon glyphicon-exclamation-sign" ></span> Revisar</button></th></tr>';
		echo "<script type='text/javascript' language='javascript' class='init'>"; 
		$ar='"bPaginate"';
		$ap='"bFilter"';
		$sd='"bInfo"';
		$sp='"bSort"';
		echo "$(document).ready(function() {"; 
		echo "$('#example2').DataTable( {
        ".$ar.": false,
        ".$ap.": false,
        ".$sp.": false,
        ".$sd.": false
                 } );";
		echo "} );";
		echo "</script>";  
		
		echo $html2; $i++; }
		else{
		$fechas=$qs->updated_at->format('d/m/Y');
		$nombres=$qs->NOM_USU.' '.$qs->APA_USU.' '.$qs->AMA_USU;
		$fecha= "'".$fechas."'";
		$nombre= "'".$nombres."'";
			$html2 ='<tr>'.'<th>'.$qs->TIP_NOT.'</th>'.'<th>'.$qs->created_at->format('d - m - Y').'</th>'.'<th>'.$qs->NOM_USU.' '.$qs->APA_USU.' '.$qs->AMA_USU.'</th><th>'.$a.'</th><th><button onclick="revisar('.$fecha.','.$nombre.','.$qs->ID_PSO.');" data-toggle = "modal" title="Revisar solicitud" data-target = "#myModal"  class="btn btn-danger"> <span class="glyphicon glyphicon-exclamation-sign"> </span> Revisar</button></th></tr>';
			echo $html2;
		}
		endforeach;
		
		

		}
	
	public function prod_sol(){
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
		if($producto->REA_NOT < 2){
			echo "</tbody></table><div class = 'modal-footer' style='border-top: none;'>
            <button type = 'button' class = 'btn btn-danger' data-dismiss = 'modal'><span class='glyphicon glyphicon-remove' style='font-size: 10px; '></span>
               Cancelar
            </button>
            
            <button type = 'submit' class = 'btn btn-success'><span style='font-size: 10px; ' class='glyphicon glyphicon-check'></span>
               Enviar a aprobacion
            </button>
         </div></form>";}
         else{
         	echo "</tbody></table><div class = 'modal-footer' style='border-top: none;'>
            <button type = 'button' class = 'btn btn-success' data-dismiss = 'modal'><span class='glyphicon glyphicon-check' style='font-size: 10px; '></span>
               Aceptar
            </button>
            
         </div>";
         }
							
	}

	public function enviarevision(Request $request){
		$notificaciones = Notificacion::where('ID_PSO','=', $request->input('id_sol'))->select('id')->get();
		$notif = Notificacion::find($notificaciones[0]->id);
		$notif->REA_NOT = 2;
		$notif->DES_NOT = 1;
		$notif->save();

		$size= count($request->input('idproducto'));
		for($i=0; $i < $size ;$i++){
			$revisados = new Solicitado;
			$revisados= $revisados->where('ID_PRO','=',$request->input('idproducto.'.$i))->where('ID_SOL','=',$request->input('id_sol'))->select('id')->get();
			$cant = new Solicitado;
			$cant = Solicitado::find($revisados[0]->id);
			$cant->CAN_SOL = $request->input('can_sol.'.$i);
			$cant->save();
		}
		$mensaje="Solicitud enviada a aprobacion";
        return redirect()->route('solicitudes.index')->with('mensaje3',$mensaje);

	}

	public function notificacionescount()
	{
		$contar=Notificacion::where('notificaciones.REA_NOT','=',0)->count();
		if($contar==0){
		$contar=Notificacion::where('notificaciones.REA_NOT','<=','1')->count();
		echo "<div class='notificacion2'>".$contar."</div>";
		}
		else
		{
			echo "<div class='notificacion'>".$contar."</div>";
		}
	}

	public function notificacionescountjrh()
	{
		$contar=Notificacion::where('notificaciones.REA_NOT','=',2)->where('notificaciones.DES_NOT','=',1)->count();
			echo $contar;
	}
	
	public function notificacionesleidas()
	{
		$contar=Notificacion::where('notificaciones.REA_NOT','<=','1')->count();
		
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
