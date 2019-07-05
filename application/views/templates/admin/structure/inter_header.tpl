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
                                <img src="{$emp_imagen}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{$emp_fullname} </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="{$emp_imagen}" class="img-circle" alt="User Image">
                                    <p>
                                        {$emp_fullname} - {$emp_gdescription}
                                        
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a class="btn btn-default btn-flat m-password">Cambiar Password</a>
                                    </div>
                                    <div class="pull-right">
                                        <span class="response"></span>
                                        <a data-url="{$base_url}admin/login/salir" class="btn btn-default btn-flat sclose">Salir</a>
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
                        <img src="{$emp_imagen}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{$emp_fullname}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <ul class="sidebar-menu">
                    <li class="header">MENU PRINCIPAL</li>

                    <li class="treeview">
                        <a href="{$base_url}admin/home">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>
                    {if $emp_grade == '1' || $emp_grade == '2'}

                    <li class="treeview">
                        <a href="{$base_url}admin/usuario/listar">
                            <i class="fa fa-user"></i> <span> Usuarios</span>
                        </a>
                    </li>
					
					<li class="treeview">
                        <a href="{$base_url}admin/staff/listar">
                            <i class="fa fa-user-md"></i> <span> Staff Médico</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/slider/listar">
                            <i class="fa fa-image"></i> <span> Slider</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/referencia/listar">
                            <i class="fa fa-list-alt"></i> <span> Referencia</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/especialidad/listar">
                            <i class="fa fa-list-alt"></i> <span> Especialidad</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/convenio/listar">
                            <i class="fa fa-image"></i> <span> Convenios</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/promocion/listar">
                            <i class="fa fa-image"></i> <span> Promociones</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/sede/listar">
                            <i class="fa fa-map-marker"></i> <span> Sedes</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/formulario_web/listar">
                            <i class="fa fa-envelope"></i> <span> Formulario Web</span>
                        </a>
                    </li>
					
					<li class="treeview">
                        <a href="{$base_url}admin/formulario_helpingdent/listar">
                            <i class="fa fa-envelope"></i> <span> Formulario HelpingDent</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/formulario_facebook/listar">
                            <i class="fa fa-envelope"></i> <span> Formulario Facebook</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/suscriptor/listar">
                            <i class="fa fa-users"></i> <span> Suscriptores de la Web</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/popup/listar">
                            <i class="fa fa-image"></i> <span> Popup</span>
                        </a>
                    </li>
					
					<li class="treeview">
                        <a href="{$base_url}admin/Streaming/listar">
                            <i class="fa fa-camera"></i> <span> Lista de Accesos Streaming</span>
                        </a>
                    </li>


                    <li class="header">MENU BLOG</li>
                    <li class="treeview">
                        <a href="{$base_url}admin/publicacion/listar">
                            <i class="fa fa-newspaper-o"></i> <span> Publicaciones</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{$base_url}admin/autor/listar">
                            <i class="fa fa-users"></i> <span> Autores</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{$base_url}admin/categoria/listar">
                            <i class="fa fa-list"></i> <span> Categorias</span>
                        </a>
                    </li>

                    <li class="treeview {if isset($seguridad_activo)}{$seguridad_activo}{/if}">
                        <a href="#">
                            <i class="fa fa-cogs"></i> <span>Seguridad</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="{$base_url}admin/accesos/listar">
                                    <i class="fa fa-list"></i> <span> Historial de Accesos</span>
                                </a>
                            </li>

                            <li class="treeview">
                                <a href="{$base_url}admin/cambios/listar">
                                    <i class="fa fa-list"></i> <span> Historial de Cambios</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {else if $emp_grade == '3'}
                    <li class="treeview">
                        <a href="{$base_url}admin/usuario/listar">
                            <i class="fa fa-user"></i> <span> Usuarios</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/slider/listar">
                            <i class="fa fa-image"></i> <span> Slider</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/referencia/listar">
                            <i class="fa fa-list-alt"></i> <span> Referencia</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/especialidad/listar">
                            <i class="fa fa-list-alt"></i> <span> Especialidad</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/convenio/listar">
                            <i class="fa fa-image"></i> <span> Convenios</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/promocion/listar">
                            <i class="fa fa-image"></i> <span> Promociones</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/sede/listar">
                            <i class="fa fa-map-marker"></i> <span> Sedes</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/popup/listar">
                            <i class="fa fa-image"></i> <span> Popup</span>
                        </a>
                    </li>

                    <li class="header">MENU BLOG</li>
                    <li class="treeview">
                        <a href="{$base_url}admin/publicacion/listar">
                            <i class="fa fa-newspaper-o"></i> <span> Publicaciones</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{$base_url}admin/autor/listar">
                            <i class="fa fa-users"></i> <span> Autores</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{$base_url}admin/categoria/listar">
                            <i class="fa fa-list"></i> <span> Categorias</span>
                        </a>
                    </li>
                    
                    {else if $emp_grade == '4'}
                    <li class="treeview">
                        <a href="{$base_url}admin/sede/listar">
                            <i class="fa fa-map-marker"></i> <span> Sedes</span>
                        </a>
                    </li>

                    {else if $emp_grade == '5'}
                    <li class="treeview">
                        <a href="{$base_url}admin/convenio/listar">
                            <i class="fa fa-image"></i> <span> Convenios</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/promocion/listar">
                            <i class="fa fa-image"></i> <span> Promociones</span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="{$base_url}admin/popup/listar">
                            <i class="fa fa-image"></i> <span> Popup</span>
                        </a>
                    </li>

                    {else if $emp_grade == '6'}
                    <li class="header">MENU BLOG</li>
                    <li class="treeview">
                        <a href="{$base_url}admin/publicacion/listar">
                            <i class="fa fa-newspaper-o"></i> <span> Publicaciones</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{$base_url}admin/autor/listar">
                            <i class="fa fa-users"></i> <span> Autores</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="{$base_url}admin/categoria/listar">
                            <i class="fa fa-list"></i> <span> Categorias</span>
                        </a>
                    </li>
					{else if $emp_grade == '7'}
                    <li class="treeview">
                        <a href="{$base_url}admin/staff/listar">
                            <i class="fa fa-user-md"></i> <span> Staff Médico</span>
                        </a>
                    </li>
                    {/if}
                                       

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>