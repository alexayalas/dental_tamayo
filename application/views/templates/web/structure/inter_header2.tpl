<body>
	<!-- Google Tag Manager (noscript) -->
	{literal}
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2NC25"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	{/literal}
	<!-- End Google Tag Manager (noscript) -->
	
    <div class="header-top clearfix">
        <nav class="navbar mb-n navbar-expand-lg ftco_navbar navbar-light bg-light flex-row">
            <div class="container">
                <div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">

                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 d-md-block">
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 pr-0">
                            <div class="logo clearfix">
                                <a href="{$base_url}">
                                    <img src="{$base_url}public/imagen/logo/logo-tamayo-blanco.png" alt="Multident" class="logo-mltd"/>
                                </a>
                            </div>                            
                        </div>                    

                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 d-flex topper align-items-center pr-0 pt-4">
                            <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="fa fa-map-o fa-24"></span></div>
                            <span class="text"><strong>Dirección: </strong> Av. San Borja Sur 589 Dpto. 301 - San Borja.</span>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 d-flex topper align-items-center pr-0 pt-4">
                            <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="fa fa-phone fa-24"></span></div>
                            <span class="text"><strong>Teléfono: </strong> +51 226 1277 </span>
                        </div>                            
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 d-flex topper align-items-center pr-0 pt-4">
                            <div class="icon bg-white mr-2 d-flex justify-content-center align-items-center"><span class="fa fa-clock-o fa-24"></span></div>
                            <span class="text"><strong>Horario: </strong> Lunes a Sabado 8 am a 8 pm</span>
                        </div>

                    </div>
                </div>
            </div>
        </nav>
    </div>

    <header id="header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <!-- Main Navigation -->
                    <nav class="main-menu pull-left">
                        <ul id="menu-main-menu" class="header-nav clearfix">
                            <li class="{if isset($active1)}{$active1}{/if}">
                                <a href="{$base_url}site"><i class="fa fa-home fa-fw"></i>Inicio</a>
                            </li>
                                
                            <li class="{if isset($active2)}{$active2}{/if}">
                                <a href="{$base_url}site/nosotros"><i class="fa fa-group fa-fw"></i>Nosotros</a>
                                <ul class="sub-menu">
                                    <li class="">
                                        <a href="{$base_url}site/nosotros/convenios">Convenios</a>
                                    </li>
                                </ul>                                
                            </li>

                            <li class="{if isset($active9)}{$active9}{/if}">
                                <a href="{$base_url}site/staff"><i class="fa fa-user-md fa-fw"></i>Staff</a>
                            </li>

                            <li class="{if isset($active4)}{$active4}{/if}">
                                <a href="{$base_url}site/servicios/especialidades"><i class="fa fa-medkit fa-fw"></i>Especialidades</a>
                            </li>
                            
                            <li  class="{if isset($active6)}{$active6}{/if}">
                                <a href="{$base_url}site/blogs"><i class="fa fa-edit fa-fw"></i>Blog</a>
                            </li>

                            <li  class="{if isset($active5)}{$active5}{/if}">
                                <a href="{$base_url}site/contactenos"><i class="fa fa-phone fa-fw"></i>Contáctenos</a>
                            </li>                            
                            
                            <!--<li class="{if isset($active7)}{$active7}{/if}">
                                <a href="{$base_url}site/cita-en-linea"><i class="fa fa-calendar fa-fw"></i>Cita en Línea</a>
                            </li>-->

                        </ul>
                    </nav>
                    <div class="text-center pb-4">
                        <a href="{$base_url}site/cita-en-linea" class="btn btn-xs btn-primary btn-stre"><i class="fa fa-calendar"></i> Reserva tu Cita</a>
                    </div>

                    <div id="responsive-menu-container"></div>

                </div>
            </div>
        </div>
    </header>

    <div class="banner clearfix" style="background-repeat: no-repeat; background-position: center top; background-image: url('{$base_url}public/imagen/extras/banner-header-tamayo.jpg'); background-size: cover;"></div>