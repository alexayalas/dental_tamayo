<div class="row">                       
    <form action="{$base_url}formulario/change_password" class="form" method="POST">
    <div class="response"></div>
                            
    <div class="col-md-12">
        <div class="form-group has-feedback">
            <label>Contraseña Actual:</label>
            <input type="password" class="form-control"  name="password" value="" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group has-feedback">
            <label>Nueva Contraseña:</label>
            <input type="password" class="form-control"  name="newpassword" value="" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group has-feedback">
            <label>Confirmar Contraseña:</label>
            <input type="password" class="form-control"  name="confirmarpassword" value="" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-10 col-sm-6 col-xs-12">
            <button class="btn btn-social btn-primary btn-regist save" data-toggle="tooltip" title="Guardar">
                <i class="fa fa-save"></i> Guardar
            </button><i class="load"></i>
            <a class="btn btn-social btn-danger m-close" data-toggle="tooltip" title="Cancelar"><i class="fa fa-times"></i> Cancelar</a>
        </div>
    </div>
    </form>
</div>