{strip}
<div class="blog-page default-page full-width clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="blog-page-single clearfix">
                    <article id="post-188" class=" clearfix post-188 page type-page status-publish hentry">
                        <div class="full-width-contents">
                            <div class="entry-content" itemprop="text">
                                <h1 class="h1 text-center">Solicita Una Cita</h1>
								     <p class="h2 text-center">Ahora atendemos de Lunes a Sábado de 8am a 8pm</p>
                                <p class="text-center">Completa el formulario y nos comunicaremos contigo ¡Gracias!</p>
                                <div class="row cajon-recla">

                                    <form action="{$base_url}formulario/accion_on_cita" class="form" method="POST" id="input-mask">
                                        <div class="response"></div>
                                                        
                                        <div class="col-md-offset-2 col-md-8">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control frm-regist2"  name="nombre" value="" placeholder="Nombres y Apellidos..." />
                                            </div>
                                        </div>

                                        <div class="col-md-offset-2 col-md-5">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control frm-regist2"  name="email" value="" placeholder="Correo Electronico..." />
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group has-feedback">
                                                <input type="text" class="form-control frm-regist2"  name="telefono" value="" placeholder="Telefono o Celular" />
                                            </div>
                                        </div>

                                        <div class="col-md-offset-2 col-md-4">
                                            <div class="form-group has-feedback">
                                                {if isset($especialidad)}
                                                {$especialidad}
                                                {else}
                                                <select  name="especialidad" class="form-control selectpicker" data-live-search="true">
                                                    <option value="">Seleccione una Especialidad</option>
                                                </select>
                                                {/if}
                                            </div>
                                        </div>

                                        <div class="col-md-4">
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

                                        <div class="col-md-offset-2 col-md-3">
                                            <div class="form-group has-feedback">
                                                <input type="text" style="padding: 0px;height:51px" class="form-control frm-regist2"  name="fecha" placeholder="Fecha" data-inputmask="'alias': 'mm-dd-yyyy'" />
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group has-feedback">
                                                <input type="text" style="padding: 0px;" class="form-control frm-regist2 frm-hour"  name="hora" value="" placeholder="Hora" data-inputmask="'alias': 'hh:mm'" />
                                            </div>
                                        </div>

                                        <div class="col-md-offset-2 col-md-8">
                                            <div class="form-group has-feedback">
                                                <textarea name="comentario" class="form-control frm-regist2" rows="4" placeholder="Ingrese un comentario..."></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-offset-2 col-md-8">
                                            <div class="form-group has-feedback">
                                                <label style="font-size: 14px;">
                                                    <input type="checkbox" value="1" name="terminos"> He leído y acepto las condiciones establecidas en la <a href="#" class="m-terminos"> <u>Ley de Protección de Datos </u></a>
                                                </label>
                                            </div>
                                        </div>

                                  
                                        <div class="col-md-12 text-center">
                                            <button class="btn btn-social btn-primary save btn-regist" data-toggle="tooltip" title="Ingresar">
                                                <i class="fa fa-paper-plane"></i> Enviar</button><i class="load"></i>
                                                <input type="hidden" name="origen" value="{if isset($origen)}{$origen}{/if}">
                                                <input type="hidden" name="u" value="{if isset($uri)}{$uri}{/if}">
                                        </div>

                                        <div class="col-md-offset-2 col-md-10">
                                            <label style="color:red;font-size:12px">*La fecha y hora de la solicitud de cita va estar sujeta a disponibidad de vacantes en la sede </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTerminos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <div class="modal-header" style="border-bottom: 0px;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: #00B3E7;opacity: 1;font-weight: 100;font-size: 30px;">&times;</button>
                <h4 id="tituloModal" class="modal-title" style="color: #00B3E7 !important;">Ley de Protección de Datos Personales</h4>
            </div>
            <div id="modalContenidoBody" class="modal-body">
                <ul style="list-style-type: none;">
                    <li style="text-align: justify;">
                        MULTIDENT S.R.L., en adelante “La Empresa”, informa a EL PACIENTE que, de acuerdo a la Ley N° 29733 – Ley de Protección de Datos Personales, su reglamento aprobado mediante Decreto Supremo N° 003-2013-JUS, y las demás disposiciones complementarias, en virtud de lo señalado, EL PACIENTE autoriza expresamente a LA EMPRESA a incorporar su información al banco de datos personales de usuarios de responsabilidad de LA EMPRESA, para fines estadísticos, administrativos y de gestión comercial. EL PACIENTE acepta mantener permanentemente actualizada su información, la presente autorización es por tiempo indefinido y podrá ser revocada en cualquier momento, dirigiéndose a LA EMPRESA en forma presencial, en el horario establecido para la atención al público.
                    
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
{/strip}