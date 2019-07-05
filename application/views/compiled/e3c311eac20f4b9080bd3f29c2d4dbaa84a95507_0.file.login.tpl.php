<?php /* Smarty version 3.1.27, created on 2017-03-14 08:28:21
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:195895148158c7eff55eb257_17348256%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3c311eac20f4b9080bd3f29c2d4dbaa84a95507' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/admin/view/login.tpl',
      1 => 1478105380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195895148158c7eff55eb257_17348256',
  'variables' => 
  array (
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58c7eff55f2f51_17125173',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58c7eff55f2f51_17125173')) {
function content_58c7eff55f2f51_17125173 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '195895148158c7eff55eb257_17348256';
?>
<body style="background: #F5F5F5;">
    <div class="login-box">
    <span><img src="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
public/imagen/logo/logo-multident.png" class="img-responsive"></span>
        <div class="login-box-body" style="background: #fff;">
            <legend class="text-center"><strong>Panel de acceso</strong></legend>
            <form action="<?php echo $_smarty_tpl->tpl_vars['base_url']->value;?>
admin/login/ingresar" method="POST" class="form">
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
</body><?php }
}
?>