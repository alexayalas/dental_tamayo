<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            <h2>Panel de Acceso para Streaming</h2>
        </div>
        <div class="col-md-12">
            <form action="{$base_url}formulario/login" class="form" method="POST">
                <div class="response"></div>
                <div class="col-md-offset-3 col-md-6">
                    <div class="form-group has-feedback">
                        <label></label>
                        <input type="text" class="form-control frm-regist"  name="correo" value="" placeholder="ingrese su usuario"  />
                        <span class="fa fa-user form-control-feedback gly-regist"></span>
                    </div>
                </div>

                <div class="col-md-offset-3 col-md-6">
                    <div class="form-group has-feedback">
                        <label></label>
                        <input type="password" class="form-control frm-regist"  name="password" value="" placeholder="ingrese su contraseña" />
                        <span class="fa fa-lock form-control-feedback gly-regist"></span>
                    </div>
                </div>


                <div class="col-md-12 text-center">
                    <button class="btn btn-social btn-primary save btn-regist" data-toggle="tooltip" title="Verificar">
                        <i class="fa fa-sign-in"></i> Ingresar</button><i class="load"></i>

                    <button type="reset" class="btn btn-social btn-primary btn-regist" data-toggle="tooltip" title="Limpiar">
                        <i class="fa fa-refresh"></i> Limpiar</button>
                </div>
            </form>
        </div>
    </div>
</div>
