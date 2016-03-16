@extends ('../layout')
	@section ('contenido')


<div id="portada" style="padding-top: 20%;">
		<div style="border: 0px solid #036; background-color: rgba(0, 136, 153, 0.5); height: 50%; padding-top: 40px;">
			<center>
			<h1 class="mensaje_bienvenida"> Bienvenido/a </br></br>  <?php echo $idUsuario = Auth::user()->NOM_USU.' '.Auth::user()->APA_USU.' '.Auth::user()->AMA_USU?> </h1>
			</center>
		</div>
		</div>
		@stop