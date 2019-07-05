<?php /* Smarty version 3.1.27, created on 2017-03-28 09:45:57
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/streaming.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:87352724058da7725a3ea71_24377764%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d1cb8b3e5411d75c644d3d462a9bbaf4407d07e' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/streaming.tpl',
      1 => 1490712351,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87352724058da7725a3ea71_24377764',
  'variables' => 
  array (
    'base_url' => 0,
    'active1' => 0,
    'active2' => 0,
    'per_nombre' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58da7725ae6641_46618504',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58da7725ae6641_46618504')) {
function content_58da7725ae6641_46618504 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '87352724058da7725a3ea71_24377764';
?>
<nav class="navbar navbar-inverse nav-multident">
 	<div class="container-fluid">
    	<div class="navbar-header">
    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>                        
      		</button>
	     	<a class="navbar-brand" href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/imagen/logo/multident.png" alt="Multident"/></a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	    	<ul class="nav navbar-nav">
		     	<li class="<?php if (isset($_smarty_tpl->tpl_vars['active1']->value)) {
echo $_smarty_tpl->tpl_vars['active1']->value;
}?>"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/Streaming"><i class="fa fa-video-camera"></i> Streaming</a></li>
		      	<li class="<?php if (isset($_smarty_tpl->tpl_vars['active2']->value)) {
echo $_smarty_tpl->tpl_vars['active2']->value;
}?>"><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/galeria_videos"><i class="fa fa-list"></i> Galeria de Videos</a></li>
		    </ul>

		    <ul class="nav navbar-nav navbar-right">
		      	<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_smarty_tpl->tpl_vars['per_nombre']->value;?>
 <span class="caret"></span></a>
			        <ul class="dropdown-menu">
			        	<li><a href="#" data-url="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
site/change_password" class="m-add"><span class="glyphicon glyphicon-lock"></span> Cambiar Contraseña</a></li>
		      			<li><a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
formulario/salir"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesión</a></li>
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
        	<a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
formulario/salir" class="btn btn-social btn-danger" data-toggle="tooltip" title="Verificar">
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
<?php }
}
?>