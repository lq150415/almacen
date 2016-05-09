	@extends ('cliente/layout_clie')
	@section ('cuerpo')
	</br>
	</br>
	</br>
	</br>
</br>
	</br>

		<div class="VentanaModal4">
		<center>
			<a href="solicitud" class="link_boton"><div class="botonesclieupl"><span class="icon-folder-plus" style=""></span> REGISTRAR NUEVA SOLICITUD</div></a>
			<a href="respuesta" class="link_boton"><div class="botonesclieupr"><span class="icon-history" style=""></span> RESPUESTAS DE SOLICITUDES</span><div class="notificacionclie"><div id="noti3"></div></div></div></a>
			<?php if(Auth::user()->NIV_USU == 2){?>
			<a href="solacepcl" class="link_boton"><div class="botonescliedownl"><span class="icon-user-check" style=""></span>
			 SOLICITUDES ACEPTADAS
			<?php }elseif(Auth::user()->NIV_USU ==1){?>
			<a href="notificacionescl" class="link_boton"><div class="botonescliedownl"><span class="icon-user-check" style=""></span>
			
			NOTIFICACIONES DE SOLICITUDES <div class="notificacionclie"><div id="noti2"></div></div>
			<?php }?>
			</span></div></a>
			
			<?php if(Auth::user()->NIV_USU == 2){?>
			 <a href="solreccl" class="link_boton"><div class="botonescliedownr"><span class="icon-lock" style=""></span>
			 SOLICITUDES RECHAZADAS
			<?php }elseif(Auth::user()->NIV_USU ==1){?>
			<a href="#" class="link_boton"><div class="botonescliedownr"><span class="icon-lock" style=""></span>
			HISTORIAL DE SOLICITUDES
			<?php }?>
			</span></div></a>
		</center>
		</div>
@stop
