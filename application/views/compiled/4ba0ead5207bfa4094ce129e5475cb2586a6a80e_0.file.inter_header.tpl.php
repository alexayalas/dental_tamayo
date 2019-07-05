<?php /* Smarty version 3.1.27, created on 2019-07-04 09:24:49
         compiled from "C:\xampp5\htdocs\WebMultident\httpdocs\application\views\templates\admin\structure\inter_header.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:314435d1e0c31ead230_75569851%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ba0ead5207bfa4094ce129e5475cb2586a6a80e' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\WebMultident\\httpdocs\\application\\views\\templates\\admin\\structure\\inter_header.tpl',
      1 => 1562189623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '314435d1e0c31ead230_75569851',
  'variables' => 
  array (
    'emp_imagen' => 0,
    'emp_fullname' => 0,
    'emp_gdescription' => 0,
    'base_url' => 0,
    'emp_grade' => 0,
    'seguridad_activo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d1e0c32122383_33688682',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d1e0c32122383_33688682')) {
function content_5d1e0c32122383_33688682 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '314435d1e0c31ead230_75569851';
?>
<!-- sidebar-collapse para comprimir el menu lateral -->
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>M</b>D</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">MULTIDENT</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo $_smarty_tpl->tpl_vars['emp_imagen']->value;?>
" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $_smarty_tpl->tpl_vars['emp_fullname']->value;?>
 </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['emp_imagen']->value;?>
" class="img-circle" alt="User Image">
                                    <p>
                                        <?php echo $_smarty_tpl->tpl_vars['emp_fullname']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['emp_gdescription']->value;?>

                                        
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a class="btn btn-default btn-flat m-password">Cambiar Password</a>
                                    </div>
                                    <div class="pull-right">
                                        <span class="response"></span>
                                        <a data-url="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/login/salir" class="btn btn-default btn-flat sclose">Salir</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo $_smarty_tpl->tpl_vars['emp_imagen']->value;?>
" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $_smarty_tpl->tpl_vars['emp_fullname']->value;?>
</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <li class="header">MENU PRINCIPAL</li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/home">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['emp_grade']->value == '1' || $_smarty_tpl->tpl_vars['emp_grade']->value == '2') {?>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/usuario/listar">
                            <i class="fa fa-user"></i> <span> Usuarios</span>
                        </a>
                    </li>
					
					<li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/staff/listar">
                            <i class="fa fa-user-md"></i> <span> Staff Médico</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/slider/listar">
                            <i class="fa fa-image"></i> <span> Slider</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/referencia/listar">
                            <i class="fa fa-list-alt"></i> <span> Referencia</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/especialidad/listar">
                            <i class="fa fa-list-alt"></i> <span> Especialidad</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/convenio/listar">
                            <i class="fa fa-image"></i> <span> Convenios</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/promocion/listar">
                            <i class="fa fa-image"></i> <span> Promociones</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/sede/listar">
                            <i class="fa fa-map-marker"></i> <span> Sedes</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/formulario_web/listar">
                            <i class="fa fa-envelope"></i> <span> Formulario Web</span>
                        </a>
                    </li>
					
					<li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/formulario_helpingdent/listar">
                            <i class="fa fa-envelope"></i> <span> Formulario HelpingDent</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/formulario_facebook/listar">
                            <i class="fa fa-envelope"></i> <span> Formulario Facebook</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/suscriptor/listar">
                            <i class="fa fa-users"></i> <span> Suscriptores de la Web</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/popup/listar">
                            <i class="fa fa-image"></i> <span> Popup</span>
                        </a>
                    </li>
					
					<li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/Streaming/listar">
                            <i class="fa fa-camera"></i> <span> Lista de Accesos Streaming</span>
                        </a>
                    </li>


                    <li class="header">MENU BLOG</li>
                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/publicacion/listar">
                            <i class="fa fa-newspaper-o"></i> <span> Publicaciones</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/autor/listar">
                            <i class="fa fa-users"></i> <span> Autores</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/categoria/listar">
                            <i class="fa fa-list"></i> <span> Categorias</span>
                        </a>
                    </li>

                    <li class="treeview <?php if (isset($_smarty_tpl->tpl_vars['seguridad_activo']->value)) {
echo $_smarty_tpl->tpl_vars['seguridad_activo']->value;
}?>">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Seguridad</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/accesos/listar">
                                    <i class="fa fa-list"></i> <span> Historial de Accesos</span>
                                </a>
                            </li>

                            <li class="treeview">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/cambios/listar">
                                    <i class="fa fa-list"></i> <span> Historial de Cambios</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <?php } elseif ($_smarty_tpl->tpl_vars['emp_grade']->value == '3') {?>
                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/usuario/listar">
                            <i class="fa fa-user"></i> <span> Usuarios</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/slider/listar">
                            <i class="fa fa-image"></i> <span> Slider</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/referencia/listar">
                            <i class="fa fa-list-alt"></i> <span> Referencia</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/especialidad/listar">
                            <i class="fa fa-list-alt"></i> <span> Especialidad</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/convenio/listar">
                            <i class="fa fa-image"></i> <span> Convenios</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/promocion/listar">
                            <i class="fa fa-image"></i> <span> Promociones</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/sede/listar">
                            <i class="fa fa-map-marker"></i> <span> Sedes</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/popup/listar">
                            <i class="fa fa-image"></i> <span> Popup</span>
                        </a>
                    </li>

                    <li class="header">MENU BLOG</li>
                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/publicacion/listar">
                            <i class="fa fa-newspaper-o"></i> <span> Publicaciones</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/autor/listar">
                            <i class="fa fa-users"></i> <span> Autores</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/categoria/listar">
                            <i class="fa fa-list"></i> <span> Categorias</span>
                        </a>
                    </li>
                    
                    <?php } elseif ($_smarty_tpl->tpl_vars['emp_grade']->value == '4') {?>
                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/sede/listar">
                            <i class="fa fa-map-marker"></i> <span> Sedes</span>
                        </a>
                    </li>

                    <?php } elseif ($_smarty_tpl->tpl_vars['emp_grade']->value == '5') {?>
                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/convenio/listar">
                            <i class="fa fa-image"></i> <span> Convenios</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/promocion/listar">
                            <i class="fa fa-image"></i> <span> Promociones</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/popup/listar">
                            <i class="fa fa-image"></i> <span> Popup</span>
                        </a>
                    </li>

                    <?php } elseif ($_smarty_tpl->tpl_vars['emp_grade']->value == '6') {?>
                    <li class="header">MENU BLOG</li>
                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/publicacion/listar">
                            <i class="fa fa-newspaper-o"></i> <span> Publicaciones</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/autor/listar">
                            <i class="fa fa-users"></i> <span> Autores</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/categoria/listar">
                            <i class="fa fa-list"></i> <span> Categorias</span>
                        </a>
                    </li>
					<?php } elseif ($_smarty_tpl->tpl_vars['emp_grade']->value == '7') {?>
                    <li class="treeview">
                        <a href="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/staff/listar">
                            <i class="fa fa-user-md"></i> <span> Staff Médico</span>
                        </a>
                    </li>
                    <?php }?>
                                       

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside><?php }
}
?>