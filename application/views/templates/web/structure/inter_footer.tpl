<footer id="main-footer" class="site-footer clearfix">
    <div class="container">
        <div class="row">

            <div class=" col-lg-3 col-md-3 col-sm-6  ">
                <section id="text-2" class="widget animated fadeInLeft widget_text"><h3 class="title">Accesos Directos</h3>
                    <div class="textwidget">
                        <ul>
                            <li><img src="{$base_url}public/imagen/extras/arrow-list-two-bg02.png">&nbsp;&nbsp;&nbsp;<a href="{$base_url}site/promociones/">Promociones</a></li>
                            <li><img src="{$base_url}public/imagen/extras/arrow-list-two-bg02.png">&nbsp;&nbsp;&nbsp;<a href="{$base_url}site/servicios/emergencias/">Emergencias 24/7</a></li>
                            <li><img src="{$base_url}public/imagen/extras/arrow-list-two-bg02.png">&nbsp;&nbsp;&nbsp;<a href="{$base_url}site/politicas-privacidad/">Politicas de Privacidad</a></li>
                        </ul>
                    </div>
                </section>            
            </div>

            <div class=" col-lg-3 col-md-3 col-sm-6  ">
                <section id="categories-4" class="widget animated fadeInLeft widget_categories">
                    <h3 class="title">Tags más visitados</h3>    
                    {if isset($lista_tag)}
                        <ul class="gropu-cust">
                            {foreach $lista_tag as $tg}
                                <li><a href="{$base_url}site/tag/{$tg['url']}" class="btn boton-1gstag"><span class="fa fa-tag"></span> {$tg['nombre']}</a></li>
                            {/foreach}
                        </ul>  
                    {/if}
                </section>            
            </div>

            <div class="clearfix visible-sm"></div>

            <div class=" col-lg-3 col-md-3 col-sm-6  ">
                <section id="wp_email_capture_widget_class-3" class="widget animated fadeInLeft widget_wp_email_capture_widget_class">
                <h3 class="title">¡Suscríbete a Multident News!</h3>
                <div class="textwidget">
                    <p>Ofertas únicas en tu correo y noticias de gran interés </p>
                </div> 
                <div id="wp_email_capture" class="wp-email-capture wp-email-capture-widget wp-email-capture-widget-worldwide">
                    <form name="wp_email_capture" method="post" action="{$base_url}formulario/suscripcion" class="form">
                        <span class="response"></span>
                        
                        <label class="">Nombre:</label> 
                        <input name="nombre" type="text" class="" title="Nombre" /><br/>

                        <label class="">E-mail:</label> 
                        <input name="email" type="text" class="" title="Email" /><br/>

                        <input type="hidden" name="wp_capture_action" value="1" />
                        
                        <label style="font-size: 14px;">
                            <input type="checkbox" value="1" name="terminos"> He leído, entendido y acepto los términos y condiciones de sus <a href="#" class="m-terminos"> <u>Políticas de Privacidad. </u></a>
                        </label>

                            <!-- <div class="g-recaptcha" id="Recaptcha2"></div> -->
                        

                        <button class="btn btn-social btn-primary save btn-suscribir" data-toggle="tooltip" title="Enviar">
                        <i class="fa fa-paper-plane"></i> Enviar</button><i class="load"></i>

                    </form>

                </div>

                </section>            
            </div>

            <div class=" col-lg-3 col-md-3 col-sm-6  ">
                <section id="text-4" class="widget animated fadeInLeft widget_text">            
                    <div class="textwidget">
                        <center>
                            <a href="http://www.facebook.com/multidentperu" target="_blank"><img src="{$base_url}public/imagen/extras/facebook.png"></a>  
                            <a href="http://www.youtube.com/elcanaldelasonrisa" target="_blank"><img src="{$base_url}public/imagen/extras/youtube.png"></a>
                        </center>
                    </div>
                </section>
                <section id="text-3" class="widget animated fadeInLeft widget_text">          
                    <div class="textwidget">
                        <center>
                            <img width="70%" src="{$base_url}public/imagen/extras/marcaPeru.png">
                        </center>
                    </div>
                </section>            
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="footer-bottom animated fadeInDown clearfix">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 ">
                            <p>© 2016 Copyright - Todos los Derechos Reservados  <a href="{$base_url}site/">DENTAL TAMAYO</a></p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12  clearfix">
                            <ul class="footer-social-nav">
                                <li>
                                    <a target="_blank" href="http://www.facebook.com/multidentperu"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a target="_blank" href="http://www.youtube.com/elcanaldelasonrisa"><i class="fa fa-youtube"></i></a>
                                </li>                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="modal fade" id="modalTerminos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <div class="modal-header" style="border-bottom: 0px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #00B3E7;opacity: 1;font-weight: 100;font-size: 30px;">&times;</button>
                <h4 id="tituloModal" class="modal-title" style="color: #00B3E7 !important;font-size: 24px;">Políticas de Protección de la Privacidad</h4>
            </div>
            <div id="modalContenidoBody" class="modal-body">
                <p style="text-align: justify;">MULTIDENT, respeta su derecho a la privacidad on-line cuando usa nuestra página web y se comunica electrónicamente con nosotros. Por eso, como parte de nuestro compromiso para cumplir con sus expectativas, hemos establecido una política de protección de la privacidad para los usuarios de nuestra página web. La presente política formaliza nuestro compromiso con la protección y correcto uso de los datos de los usuarios y pacientes que podamos manejar.</p>

                <p style="text-align: justify;">La Ley N° 29733 - Ley de Protección de Datos Personales, su reglamento y las normas que las modifique o reemplacen, establece que para efectuar el tratamiento de los datos o información de una persona <b>es necesario su consentimiento previo</b>, informado, expreso e inequívoco. Por tal motivo, conforme a la referida ley, en el uso de medios electrónicos, MULTIDENT considerará que usted ha brindado adecuada y libremente su consentimiento, cuando disponga en “hacer clic”, “cliquear” o “pinchar”, “dar un toque”, “touch” o “pad” u otros similares cuando se le pregunte por su aceptación a los presentes términos aplicables al tratamiento de sus datos personales.</p>

                <p style="text-align: justify;">Cuando se solicita llenar los campos de información personal, con la cual usted puede ser identificado; lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este documento. Sin embargo, estas Políticas de Privacidad pueden cambiar con el tiempo o ser actualizada, por lo que le recomendamos y enfatizamos revisar continuamente esta página para asegurarse que está de acuerdo con dichos cambios.</p>

                <h3 class="h3">1. ¿Qué Información recolectamos a través de nuestro sitio web?</h3>
                <p>Sólo recolectamos los datos personales que usted nos desee proporcionar o que son necesarios para brindarle y mejorar nuestros servicios, y para los fines que se describen en el punto 4 de la presente Política y <b>que usted acepta libremente.</b> </p>

                <p style="text-align: justify;">Dependiendo del formulario que llene, podemos solicitarle información personal tales como: nombre completo, teléfono de contacto fijo o móvil, correo electrónico, dirección de residencia o del local donde desea ubicar su franquicia, profesión, etc. La autorización para el tratamiento de sus datos personales resulta <b>obligatoria</b>, para la ejecución de las actividades descritas en los formularios de la página web de MULTIDENT y aquellas señaladas en la presente Política, <b>en caso de su negativa, ellas no se podrán realizar.</b></p>


                <h3 class="h3">2. ¿Cómo manejamos su Información Personal?</h3>
                <p style="text-align: justify;">MULTIDENT nunca compartirá sus datos personales con terceros para una finalidad distinta a la que usted ha consentido. Sin embargo, es necesario que Ud. sepa que, toda la información que ingresa es almacenada en una Base de Datos creada en un Servidor ubicado en el Centro de Datos Internacionales de la empresa SOFTLAYER (Adquirida por IBM en el 2,013) ubicada en 4030 Lafayette Center Dr. Chantilly, VA20151, Washington – USA, que es un proveedor internacional de hosting web (almacenamiento en la nube) y que en Lima trabaja con el proveedor local YARKAN SAC ubicada en Av. Pablo Carriquiry 132 oficina 102 – San Isidro Lima; es decir tanto la página web, los formularios web y la base de datos donde está alojada la información que ingresa, se almacenan en un servidor físico ubicado en Washington – USA.</p>

                <p style="text-align: justify;">Siguiendo el lineamiento de la Ley de Protección de Datos Personales, MULTIDENT no venderá, cederá ni distribuirá la información personal que es recopilada sin su consentimiento, salvo que sea requerido por un juez con una orden judicial. MULTIDENT se reserva el derecho de cambiar los términos de la presente Política de Privacidad en cualquier momento. </p>


                <h3 class="h3">3. Mantenemos su información de manera segura</h3>
                <p style="text-align: justify;">Usted puede confiar que MULTIDENT ha adoptado todas las medidas técnicas y organizacionales necesarias para garantizar la seguridad y confidencialidad de su información personal y así evitar cualquier manipulación indebida, pérdida, destrucción o acceso no autorizado por parte de terceros a esta información, empleando los medios adecuados para contrarrestarlos.</p>

                <p style="text-align: justify;">Como se le informó, sus datos son almacenados en un servidor ubicado fuera del país, por lo que le recomendamos revisar también las políticas de privacidad del proveedor SOFTLAYER (Empresa de IBM y bajo cuyos términos de privacidad se rige):</p>

                <p>
                    Link Softlayer:<br>
                    <a href="http://www.softlayer.com/es" style="text-decoration: underline;" target="_blank">http://www.softlayer.com/es</a> 
                </p>

                <p>
                    Link Términos de Privacidad (ubicado en la página web de Softlayer, bajo la opción Privacidad):<br> 
                    <a href="https://www.ibm.com/privacy/us/en/" style="text-decoration: underline;" target="_blank">https://www.ibm.com/privacy/us/en/</a> (ingles)<br>
                    <a href="https://www.ibm.com/privacy/es/es/" style="text-decoration: underline;" target="_blank">https://www.ibm.com/privacy/es/es/</a> (español)                                          
                </p>

                <p style="text-align: justify;">MULTIDENT está altamente comprometido en mantener su información segura y para ello constantemente nos aseguramos que no exista ningún acceso no autorizado.</p>


                <h3 class="h3">4. Uso de la información recogida</h3>
                <p style="text-align: justify;">Usted autoriza expresamente a MULTIDENT, incorporar su información al banco de Datos Personales de Pacientes, para fines administrativos y de gestión comercial.</p>

                <p style="text-align: justify;">Los formularios de nuestra página web han sido creados con la única finalidad de solicitar información para los siguientes fines:</p>

                <ul>
                    <li>Coordinar y programar su cita de atención odontológica, para posteriormente enviarle un mensaje SMS de recordatorio de cita. </li>
                    <li>Control de asistencia e inasistencia de nuestros pacientes.</li>
                    <li>Mantener un registro de usuarios interesados en recibir promociones especiales u otra información publicitaria que consideremos relevante para usted o que pueda brindarle algún beneficio.</li>
                    <li>Registrarlo y contactarlo como interesado en implementar alguna nueva franquicia.</li>
                </ul>

                <p style="text-align: justify;">Considerando los fines descritos, usted otorga su consentimiento de manera indefinida. Si no está de acuerdo con el tratamiento posterior de su información, usted podrá revocar la presente autorización y proceder de acuerdo a lo indicado en el punto 5.</p>


                <h3 class="h3">5. Ejercicio de sus derechos como titular de datos personales</h3>
                <p style="text-align: justify;">En el momento que Usted considere conveniente, puede revocar su consentimiento o ejercer sus derechos que como titular de datos personales le asisten (acceso, rectificación, cancelación, oposición, información o revocación), de manera gratuita y sólo de la información que proporcionó y en la base de datos que corresponda: Citas en línea, Franquicia o Multident News.</p>

                <p style="text-align: justify;">Para tal efecto, usted puede apersonarse a nuestro local principal cito en Jr. Medrano Silva 401, Barranco, Lima, Perú y preguntar por el encargado del área de Soporte y Sistemas o también puede enviar un mensaje a la cuenta de correo electrónica <a href="mailto:protecciondedatos@multident.pe" style="text-decoration: underline;">protecciondedatos@multident.pe</a>, indicando lo siguiente:</p>
                <ul>
                    <li>Su nombre completo.</li>
                    <li>El formulario que uso para ingresar sus datos (Citas en Línea / Franquicia / Multident News).</li>
                    <li>Detallar lo que deseas que sea haga la información personal que registró.</li>
                </ul>


                <!-- <ul style="list-style-type: none;">
                    <li style="text-align: justify;">
                        MULTIDENT S.R.L., en adelante “La Empresa”, informa a EL PACIENTE que, de acuerdo a la Ley N° 29733 – Ley de Protección de Datos Personales, su reglamento aprobado mediante Decreto Supremo N° 003-2013-JUS, y las demás disposiciones complementarias, en virtud de lo señalado, EL PACIENTE autoriza expresamente a LA EMPRESA a incorporar su información al banco de datos personales de usuarios de responsabilidad de LA EMPRESA, para fines estadísticos, administrativos y de gestión comercial. EL PACIENTE acepta mantener permanentemente actualizada su información, la presente autorización es por tiempo indefinido y podrá ser revocada en cualquier momento, dirigiéndose a LA EMPRESA en forma presencial, en el horario establecido para la atención al público.
                    
                    </li>
                </ul>
                <p>
                    
                        

                </p> -->
            </div>
        </div>
    </div>
</div>