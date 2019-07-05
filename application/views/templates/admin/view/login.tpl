<body style="background: #F5F5F5;">
    <div class="login-box">
    <span><img src="{$base_url}public/imagen/logo/logo-multident.png" class="img-responsive"></span>
        <div class="login-box-body" style="background: #fff;">
            <legend class="text-center"><strong>Panel de acceso</strong></legend>
            <form action="{$base_url}admin/login/ingresar" method="POST" class="form">
                <span class="response"></span>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control input-test" name="usuario" placeholder="Usuario">
                    </div>       
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-unlock-alt"></i></span>
                        <input type="password" class="form-control input-test" name="password" placeholder="Contraseña">
                    </div>       
                </div>

                <div class="social-auth-links text-center">
                    <div class="row">
                        <div class="col-md-6">
                        <button class="btn btn-default btn-comenzar save"><i class="fa fa-check"></i> Ingresar</button>   
                    </div>
                    <div class="col-md-6">
                        <button type="reset"  class="btn btn-default btn-comenzar"><i class="fa fa-refresh"></i> Limpiar</button>    
                    </div>
                    </div>
                    
                    
                </div>
            </form>
        </div>
    </div>
</body>