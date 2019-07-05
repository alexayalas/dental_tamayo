<body>
	<!-- Google Tag Manager (noscript) -->
	{literal}
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2NC25"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	{/literal}
	<!-- End Google Tag Manager (noscript) -->
	
    <div class="header-top clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12  text-right">
                    <p>
                        Horario : <span>Lunes a Sábados - 8am a 8pm</span><br class="visible-xs" />&nbsp;&nbsp;Contáctenos : <span>+51 (01) 273-3333</span> 
						<!--<a href="{$base_url}site/login_streaming" class="btn btn-xs btn-danger btn-stre"><i class="fa fa-video-camera"></i> Streaming</a>-->
                    </p>
                </div>
            </div>
        </div>
    </div>

    <header id="header" itemscope="itemscope">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <!-- Website Logo -->
                    <div class="logo clearfix">
                        <a href="{$base_url}">
                            <img src="{$base_url}public/imagen/logo/logo-tamayo.png" alt="Multident" class="logo-mltd"/>
                        </a>
                    </div>

                    <!-- Main Navigation -->
                    <nav class="main-menu">
                        <ul id="menu-main-menu" class="header-nav clearfix">
                            <li class="{if isset($active1)}{$active1}{/if}">
                                <a href="{$base_url}site/"><i class="fa fa-home fa-fw"></i>Inicio</a>
                            </li>
                                
                            <li class="{if isset($active2)}{$active2}{/if}">
                                <a href="{$base_url}site/nosotros"><i class="fa fa-group fa-fw"></i>Nosotros</a>
                            </li>
                            
                            <li class="{if isset($active4)}{$active4}{/if}">
                                <a href="{$base_url}site/servicios/especialidades"><i class="fa fa-medkit fa-fw"></i>Especialidades</a>
                            </li>
                                                        
                            <li  class="{if isset($active6)}{$active6}{/if}">
                                <a href="{$base_url}site/blogs"><i class="fa fa-edit fa-fw"></i>Blog</a>
                            </li>
                            
                            <li class="{if isset($active7)}{$active7}{/if}">
                                <a href="{$base_url}site/cita-en-linea"><i class="fa fa-calendar fa-fw"></i>Cita en Línea</a>
                            </li>

                        </ul>
                    </nav>

                    <div id="responsive-menu-container"></div>

                </div>
            </div>
        </div>
    </header>

    <div class="banner clearfix" style="background-repeat: no-repeat; background-position: center top; background-image: url('{$base_url}public/imagen/extras/banner-header.jpg'); background-size: cover;"></div>