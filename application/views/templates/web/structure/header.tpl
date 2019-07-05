<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" lang="es-ES"><![endif]-->
<!--[if IE 8]><html class="ie ie8" lang="es-ES"><![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html>
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{$titulo_pagina}</title>
        <meta name="description" content="{$descripcion}">
        <meta name="author" content="MULTIDENT">
        <meta name="keywords" content="">
        
        <link rel="icon" href="{$base_url}public/imagen/favicon/favicon.ico" type="image/x-icon" />
        <!-- METAS PARA FACEBOOK -->
        <meta property="fb:admins" content="94846763717" />
        <meta property="article:publisher" content="MULTIDENT" />
        <meta property="og:type" content="article" />
        <meta property="og:site_name" content="MULTIDENT" />
        <meta property="og:title" content="{if isset($f_titulo)}{$f_titulo}{/if}" />
        <meta property="og:description" content="{if isset($f_descripcion)}{$f_descripcion}{/if}"/>
        <meta property="og:image" content="{if isset($f_imagen)}{$f_imagen}{/if}"/>
        <meta property="og:url" content="{if isset($f_url)}{$f_url}{/if}"/>
        <!--BOOTSTRAP-->
        <link rel="stylesheet" href="{$base_url}public/plugins/bootstrap/css/bootstrap.min.css">

        <!--GLYPHICONS-->
        <link rel="stylesheet" href="{$base_url}public/plugins/font-awesome/css/font-awesome.min.css">
        
        <!--ESTILOS-->
        <link rel="stylesheet" href="{$base_url}public/web/css/estilo.css?v=1.0">
        <link rel="stylesheet" href="{$base_url}public/web/css/estilo_base.css?v=1.1">

        <link rel='stylesheet' href='{$base_url}public/plugins/css/meanmenu.css' type='text/css' media='all' />
        <link rel='stylesheet' href='{$base_url}public/plugins//css/custom-responsive.css' type='text/css' media='all' />
        <!--SLIDER -->
        <link  rel='stylesheet' href='{$base_url}public/plugins/css/flexslider.css' type='text/css' media='all' />

        <link rel='stylesheet' href='{$base_url}public/plugins/google-map/css/mappress.css' type='text/css' media='all' />
        <link rel='stylesheet' href='{$base_url}public/plugins/fancy/source/jquery.fancybox.css' type='text/css' media='all' />

       <link rel='stylesheet' href='{$base_url}public/plugins/fancybox/css/fancybox/jquery.fancybox-buttons' type='text/css' media='all' />
        <link rel='stylesheet' href='{$base_url}public/plugins/fancybox/css/fancybox/jquery.fancybox-thumbs.css' type='text/css' media='all' />
        <link rel='stylesheet' href='{$base_url}public/plugins/fancybox/css/fancybox/jquery.fancybox.css' type='text/css' media='all' />
		
        {literal}<script type='text/javascript'>mapp = {data : []};</script>{/literal}


        <!-- ############# DATEPICKER ############# -->
        <link rel="stylesheet" media="all" type="text/css" href="{$base_url}public/plugins/datetimepicker/jquery-ui.css" />
        <link rel="stylesheet" media="all" type="text/css" href="{$base_url}public/plugins/datetimepicker/jquery-ui-timepicker-addon.css" />
		
		<!-- Google Tag Manager -->
		{literal}
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-P2NC25');</script>
		{/literal}
		<!-- End Google Tag Manager -->
		
		<!-- Facebook Pixel Code -->
		{literal}
		<script>
		!function(f,b,e,v,n,t,s)
		{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};
		if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
		n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];
		s.parentNode.insertBefore(t,s)}(window,document,'script',
		'https://connect.facebook.net/en_US/fbevents.js');
		 fbq('init', '149798685684281'); 
		fbq('track', 'PageView');
		</script>
		<noscript>
		 <img height="1" width="1" 
		src="https://www.facebook.com/tr?id=149798685684281&ev=PageView
		&noscript=1"/>
		</noscript>
		{/literal}
		<!-- End Facebook Pixel Code -->


        <link rel="stylesheet" href="{$base_url}public/plugins/datatable/css/dataTables.bootstrap.min.css">
        

    </head>