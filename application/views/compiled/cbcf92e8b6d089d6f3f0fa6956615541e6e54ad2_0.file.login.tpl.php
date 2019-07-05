<?php /* Smarty version 3.1.27, created on 2019-07-04 09:24:09
         compiled from "C:\xampp5\htdocs\WebMultident\httpdocs\application\views\templates\admin\view\login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:84895d1e0c09154d23_04550704%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cbcf92e8b6d089d6f3f0fa6956615541e6e54ad2' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\WebMultident\\httpdocs\\application\\views\\templates\\admin\\view\\login.tpl',
      1 => 1562189642,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84895d1e0c09154d23_04550704',
  'variables' => 
  array (
    'base_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d1e0c0915f1f0_53465592',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d1e0c0915f1f0_53465592')) {
function content_5d1e0c0915f1f0_53465592 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '84895d1e0c09154d23_04550704';
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