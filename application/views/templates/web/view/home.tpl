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
                    <h2>Dental Tamayo <span>Su Clínica Dental de Confianza</span></h2>

                    <p>Más de 20 años y miles de sonrisas alrededor del Perú nos respaldan como la primera y mejor Clínica Dental del pais. ¡Compruébalo tu mismo!</p>
                    <a class="read-more" href="{$base_url}site/cita-en-linea">¡Reserva tu Cita en Línea!</a>                
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 ">
                <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-6 single-feature">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 icon-wrapper">
                                <i class="fa fa-medkit"></i>                            
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <h3>
                                    <a class="home-a" href="{$base_url}site/servicios/especialidades/">Conoce nuestras Especialidades</a>                                </h3>
                                <p>Cada uno de nuestros Odontólogos destaca en su especialidad, porque para nosotros es importante brindarte calidez humana junto con tecnología de punta.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 single-feature">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 icon-wrapper">
                                <i class="fa fa-ambulance"></i>                            
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <h3>
                                    <a class="home-a" href="{$base_url}site/servicios/emergencias/">Atención 24 Horas</a>                                </h3>
                                <p>Llámanos al (01) 441-3000 y visítanos en Av. Arequipa 4105, Miraflores a toda hora, todos los días.</p>
                            </div>
                        </div>
                    </div>
                    <div class="visible-lg clearfix"></div>
                    <div class="visible-md clearfix"></div>
                    <div class="visible-sm clearfix"></div>
                    <div class="col-lg-6 col-md-6 col-sm-6 single-feature">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 icon-wrapper">
                                <i class="fa fa-building-o"></i>                            
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <h3>
                                    <a class="home-a" href="{$base_url}site/sedes/">30+ Sedes y Contando</a>                                </h3>
                                <p>En todo el Perú, crecemos año tras año buscando cada día estar más cerca a ti.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 single-feature">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 icon-wrapper">
                                <i class="fa fa-credit-card"></i>                            
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <h3>
                                    <a class="home-a" href="{$base_url}site/servicios/multident-card/">Multident Card</a>                                </h3>
                                <p>Empieza a disfrutar de múltiples beneficios para ti y 6 familiares, inscríbete en todas nuestras sedes.</p>
                            </div>
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