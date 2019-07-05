<div class="page-top clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 ">
                <h1 class="entry-title">Carillas de Porcelana</h1>
                <nav class="bread-crumb">
                    <ul class="breadcrumb clearfix">
                    <li><a href="{$base_url}site">Multident</a><span class="divider"></span></li><li class="active">Carillas de Porcelana</li></ul>                
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="blog-page default-page full-width clearfix">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="blog-page-single clearfix">
                    <article id="post-1003" class=" clearfix post-1003 page type-page status-publish hentry">
                        <div class="full-width-contents">
                            <div class="entry-content" itemprop="text">
                                <h1 class="h1" style="text-align: center;">¿Qué son las Carillas de Porcelana?</h1><br>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="arrow-list-two">
                                            <ul>
                                                <li>Las carillas de porcelana son láminas muy delgadas de un material altamente estético llamado porcelana dental.</li>
                                                <li>Estas son adheridas ala superficie externa de los dientes, maquillando de forma permanente cualquier imperfección de la forma, tamaño o color.</li>
                                                <li>Los resultados son muy estéticos, logrando con ellas alcanzar la sonrisa ideal.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <a href="{$base_url}public/imagen/especialidad/multident-tratamiento-carillas-de-porcelana.png"> 
                                            <img src="{$base_url}public/imagen/especialidad/multident-tratamiento-carillas-de-porcelana.png" alt="multident-tratamiento-carillas-de-porcelana" /> 
                                        </a> 
                                    </div>  
                                </div>
                            </div>
                        </div>
                        
                        <h2 class="h2 text-center">Con Carillas de Porcelana puedes tener la sonrisa que siempre soñaste de forma rápida y segura.</h2>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <h3 class="h3 text-center">¿Cuánto tiempo dura el procedimiento para colocarme las carillas?</h3>
                                <p style="text-align: justify;">Las carillas pueden ser fabricadas en el lapso de una semana o menos! En la primera cita se toma un molde de los dientes para mandarlas a fabricar a medida al laboratorio dental. En la segunda cita las carillas son probadas y adheridas de forma segura y permanente.</p>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <h3 class="h3 text-center">¿Cuánto tiempo duran las Carillas de Porcelana?</h3>
                                <p style="text-align: justify;">Las carillas pueden tener una durabilidad de 8 años a más. Por supuesto, es importante que el paciente acuda a sus controles periódicos, que mantenga una excelente higiene bucal y que evite hábitos nocivos como apretar los dientes.</p>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <h3 class="h3 text-center">¿Soy candidato a Carillas de Porcelana?</h3>
                                <p style="text-align: justify;">Eres candidato a carillas de porcelana si presentas dientes pequeños, desgastados, espaciados, ligeramente girados o con restauraciones antiguas en la zona estética.</p>
                            </div>
                        </div>

                        <h2 class="h2 text-center">¿Por qué elegir nuestro Tratamiento de Carillas de Porcelana?</h2><br><br>
                        <div class="row" style="margin-bottom:50px">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="arrow-list-two">
                                    <ul>
                                        <li><b>Clínica Dental Líder del Perú:</b>Somos la Red de Clínicas Dentales Líder a nivel nacional con 38 sedes.</li>
                                        <li><b>Staff de Reconocida Trayectoria:</b>Somos un Equipo de más de 50 especialistas certificados en en Carillas de Porcelana por universidades e instituciones internacionales, hemos tratado miles de casos con excelentes resultados.</li>
                                        <li><b>La Más Avanzada Tecnología:</b>Contamos con la más avanzada tecnología para el diagnóstico y tratamiento correcto de nuestros pacientes.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <img src="{$base_url}public/imagen/especialidad/multident-tratamiento-ortodoncia1.png" alt="multident-tratamiento-ortodoncia"/> 
                            </div>
                        </div>

                        <h2 class="h2" style="text-align: center;">Más de 200 Prestigiosas y Reconocidas empresas confían en Multident</h2>
                        <div class="row text-center">
                            {if isset($convenio)}
                                    {foreach $convenio as $co}
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <img class="aligncenter size-full " src="{$base_url}public/imagen/convenio/{$co['imagen']}" alt="{$co['nombre']}" width="169" height="67" />
                                        </div>
                                    {/foreach}
                                    {/if}
                        </div>
                        <div class="row"></div>
                        
                        <h1 class="h1" style="text-align: center;">Solicitar una Cita.</h1>
						<p class="h2 text-center">Ahora atendemos de Lunes a Sábado de 8am a 8pm</p>
                        <p style="text-align: center;">Complete el formulario y una de nuestras ejecutivas se estará comunicando a la brevedad con usted.</p>

                        <div class="row cajon-recla">

        <form action="{$base_url}formulario/accion_especialidad" class="form" method="POST">
            <div class="response"></div>
                            
            <div class="col-md-offset-2 col-md-8">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control frm-regist"  name="nombre" value="" placeholder="Nombres y Apellidos..." />
                    <span class="fa fa-user form-control-feedback gly-regist"></span>
                </div>
            </div>

            <div class="col-md-offset-2 col-md-5">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control frm-regist"  name="email" value="" placeholder="Correo Electronico..." />
                    <span class="fa fa-at form-control-feedback gly-regist"></span>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control frm-regist"  name="telefono" value="" placeholder="Telefono o Celular" />
                    <span class="fa fa-phone form-control-feedback gly-regist"></span>
                </div>
            </div>

            <div class="col-md-offset-2 col-md-4">
                <div class="form-group has-feedback">
                    {if isset($referencia)}
                    {$referencia}
                    {else}
                    <select  name="referencia" class="form-control selectpicker" data-live-search="true">
                        <option value="">--- Como se entero ---</option>
                    
                    </select>
                    {/if}
                </div>
            </div>

            <div class=" col-md-4">
                <div class="form-group has-feedback">
                    {if isset($sede)}
                    {$sede}
                    {else}
                    <select  name="sede" class="form-control selectpicker" data-live-search="true">
                        <option value="">Seleccione una Sede</option>                    
                    </select>
                    {/if}
                </div>
            </div>

            <div class="col-md-offset-2 col-md-2">
                <div class="form-group has-feedback">
                    <input type="text" style="padding: 0px;height:51px" class="form-control frm-regist datepicker2"  name="fecha" placeholder="Fecha" />
                    <span class="fa fa-calendar form-control-feedback gly-regist"></span>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group has-feedback">
                    <input type="time" style="padding: 0px;" class="form-control frm-regist frm-hour"  name="hora" value="" placeholder="Hora" />
                    <span class="fa fa-clock-o form-control-feedback gly-regist"></span>
                </div>
            </div>

            <div class="col-md-offset-2 col-md-8">
                <div class="form-group has-feedback">
                    <textarea name="comentario" class="form-control frm-regist" rows="4" placeholder="Ingrese un comentario..."></textarea>
                </div>
            </div>
			
			<div class="col-md-offset-2 col-md-8">
                <div class="form-group has-feedback">
                    <label style="font-size: 14px;">
                        <input type="checkbox" value="1" name="terminos"> He leído, entendido y acepto los términos y condiciones de sus <a href="#" class="m-terminos"> <u>Políticas de Privacidad. </u></a>
                    </label>
                </div>
            </div>

            <div class="col-md-offset-2 col-md-8">
                <!-- <div class="g-recaptcha" id="captcha" data-sitekey="6LeizisUAAAAAAlgxeditjer-NR21hAa4eQWBiT_" data-callback="correctCaptcha"></div> -->
                <div class="g-recaptcha" id="Recaptcha2"></div>
            </div>
                     
            <div class="col-md-12 text-center">
                    <button class="btn btn-social btn-primary save btn-regist" data-toggle="tooltip" title="Enviar">
                        <i class="fa fa-paper-plane"></i> Enviar</button><i class="load"></i>
                        <input type="hidden" name="espec" value="2">
                        <input type="hidden" name="origen" value="{if isset($origen)}{$origen}{/if}">
						<input type="hidden" name="uri" value="{if isset($uriActual)}{$uriActual}{/if}"/>
				        <input type="hidden" name="u" value="{if isset($uri)}{$uri}{/if}">
            </div>

            <div class="col-md-offset-2 col-md-10">
                <label style="color:red;font-size:12px">*La fecha y hora de la solicitud de cita va estar sujeta a disponibidad de vacantes en la sede </label>
            </div>
        </form>
    </div>

                        
                    </article>
                </div>
            </div>

        </div>
    </div>
</div>