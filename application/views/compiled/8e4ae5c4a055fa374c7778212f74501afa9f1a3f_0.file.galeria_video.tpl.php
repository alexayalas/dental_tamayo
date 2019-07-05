<?php /* Smarty version 3.1.27, created on 2017-03-13 19:04:29
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/galeria_video.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:162056717458c7338dda1e57_15398906%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e4ae5c4a055fa374c7778212f74501afa9f1a3f' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/web/view/galeria_video.tpl',
      1 => 1489449827,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162056717458c7338dda1e57_15398906',
  'variables' => 
  array (
    'base_url' => 0,
    'active1' => 0,
    'active2' => 0,
    'per_nombre' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58c7338ddcc822_95472223',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58c7338ddcc822_95472223')) {
function content_58c7338ddcc822_95472223 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '162056717458c7338dda1e57_15398906';
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
				<h2>No disponible...</h2>
		</div>

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