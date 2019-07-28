<div class="home-slider clearfix">
    <div class="flexslider loading">
        <ul class="slides">
           
            {if isset($slider)}
            {foreach $slider as $sl}
                <li>
                    <img src="{$base_url}public/imagen/slider/{$sl['imagen']}"  alt="{$sl['titulo1']}"/>
                    <div class="content-wrapper clearfix">
                        <div class="container">
                            <div class="slide-content clearfix display-bg">
                                <h1>{$sl['titulo1']} <span>{$sl['titulo2']}</span></h1>
                                <p>{$sl['subtitulo']}</p>
                            </div>
                        </div>
                    </div>
                </li>  
            {/foreach}
            {/if}

        </ul>
    </div>
</div>


<div class="home-features clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 ">
                <div class="features-intro clearfix">
                    <h2>Nuestra Satistacción... <br/><span>Su Felicidad...</span></h2>

                    <p>Clínica Dental Tamayo a cargo de la Dr. Tatiana Quevedo Tamayo, quien cuenta con más de 20 años de experiencia en Estética y Salud Dental, tiempo el cual viene mejorando la sonrisa de todos sus pacientes en el distrito de San Borja.</p>
                    <p>Estamos comprometidos con brindarles un servicio personalizado de excelente calidad y con resultados en los tratamientos que son nuestra mejor carta de presentación.</p>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 ">
                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 single-feature">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 icon-wrapper">
                                <i class="fa fa-tags"></i>                            
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <h3 class="color-blue">
                                    Prevención
                                </h3>
                                <p>Cuida tus dientes. Cepíllate siempre y después de cada alimento. Usa hilo dental. Una sana costumbre para que tus dientes te duren toda la vida.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 single-feature">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 icon-wrapper">
                                <i class="fa fa-tags"></i>                            
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <h3 class="color-blue">
                                    Detección
                                </h3>
                                <p>Visita al dentista por lo menos dos veces al año. Más vale una revisión profesional para evitar males posteriores.</p>
                            </div>
                        </div>
                    </div>
                    <div class="visible-lg clearfix"></div>
                    <div class="visible-md clearfix"></div>
                    <div class="visible-sm clearfix"></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 single-feature">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 icon-wrapper">
                                <i class="fa fa-tags"></i>                            
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <h3 class="color-blue">
                                    Solución
                                </h3>
                                <p>Cuando tengas dolor o malestar dental, visita de inmediato al dentista. La atención profesional siempre será la mejor.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 single-feature">
                        <div class="features-intro clearfix">
                            <a class="read-more col-md-12 text-center" href="{$base_url}site/cita-en-linea">¡Reserva tu Cita en Línea!</a>                
                        </div>
                    </div>                    

                </div>
            </div>
        </div>
    </div>
</div>

<div id="modalPresentacion" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content m-content" style="min-height:500px;border-radius: 0px;max-width: 500px;">
            <!--<div class="modal-header" style="border-bottom: 0px">
                <h4 class="modal-title mo-title"></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>-->
            <div class="modal-body" style="padding: 0px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <img src="" class="img-responsive img-home">
				<a class="fancybox fan-home" id="mul" rel="group">
                    <img class="img-home" alt="">
                </a>
            </div>
        </div>
    </div>
</div>