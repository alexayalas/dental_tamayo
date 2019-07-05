<nav class="navbar navbar-inverse nav-multident">
 	<div class="container-fluid">
    	<div class="navbar-header">
    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>                        
      		</button>
	     	<a class="navbar-brand" href="#"><img src="{$base_url}public/imagen/logo/multident.png" alt="Multident"/></a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	    	<ul class="nav navbar-nav">
		     	<li class="{if isset($active1)}{$active1}{/if}"><a href="{$base_url}site/Streaming"><i class="fa fa-video-camera"></i> Streaming</a></li>
		      	<li class="{if isset($active2)}{$active2}{/if}"><a href="{$base_url}site/galeria_videos"><i class="fa fa-list"></i> Galeria de Videos</a></li>
		    </ul>

		    <ul class="nav navbar-nav navbar-right">
		      	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">{$per_nombre} <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			        	<li><a href="#" data-url="{$base_url}site/change_password" class="m-add"><span class="glyphicon glyphicon-lock"></span> Cambiar Contraseña</a></li>
		      			<li><a href="{$base_url}formulario/salir"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesión</a></li>
			        </ul>
		      	</li>
		    </ul>	
	    </div>
	    
    </div>
</nav>


<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">

<object data="http://monitor.mediastream.pe/MStreamLive.swf?v=8whIwCaD" type="application/x-shockwave-flash" width="480" height="390" >
<param name="movie" value="http://monitor.mediastream.pe/MStreamLive.swf?v=8whIwCaD" />
<param name="allowScriptAccess" value="sameDomain" />
<param name="allowFullScreen" value="true" />
<param name="movie" value="http://monitor.mediastream.pe/MStreamLive.swf?v=8whIwCaD" />
<param name="quality" value="high" />
<param name="bgcolor" value="#000000" /></object>

	</div>

		<!--<div class="col-md-12 text-center">
        	<a href="{$base_url}formulario/salir" class="btn btn-social btn-danger" data-toggle="tooltip" title="Verificar">
                        <i class="fa fa-sign-out"></i> Salir</a>

       	</div>-->
	</div>
</div>


<div id="modalContenido" class="modal fade">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="tituloModal" class="modal-title"></h4>
            </div>
            <div id="modalContenidoBody" class="modal-body">
            </div>
        </div>
    </div>
</div>
