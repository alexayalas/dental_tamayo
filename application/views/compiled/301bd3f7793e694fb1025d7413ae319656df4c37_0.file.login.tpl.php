<?php /* Smarty version 3.1.27, created on 2019-07-06 09:55:41
         compiled from "C:\xampp5\htdocs\Tamayo\application\views\templates\admin\view\login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:144355d20b66de515e8_00354887%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '301bd3f7793e694fb1025d7413ae319656df4c37' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\Tamayo\\application\\views\\templates\\admin\\view\\login.tpl',
      1 => 1562189642,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '144355d20b66de515e8_00354887',
  'variables' => 
  array (
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d20b66de6c8a6_37816122',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d20b66de6c8a6_37816122')) {
function content_5d20b66de6c8a6_37816122 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '144355d20b66de515e8_00354887';
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