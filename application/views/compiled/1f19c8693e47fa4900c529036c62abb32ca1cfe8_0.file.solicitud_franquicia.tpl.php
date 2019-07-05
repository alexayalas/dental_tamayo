<?php /* Smarty version 3.1.27, created on 2017-03-16 21:06:25
         compiled from "/var/www/vhosts/multident.pe/httpdocs/application/views/templates/correo/solicitud_franquicia.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:128382095858cb44a161e785_51556879%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f19c8693e47fa4900c529036c62abb32ca1cfe8' => 
    array (
      0 => '/var/www/vhosts/multident.pe/httpdocs/application/views/templates/correo/solicitud_franquicia.tpl',
      1 => 1481294946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128382095858cb44a161e785_51556879',
  'variables' => 
  array (
    'nombre' => 0,
    'sexo' => 0,
    'correo' => 0,
    'telefono' => 0,
    'celular' => 0,
    'direccion' => 0,
    'ciudad' => 0,
    'departamento' => 0,
    'pais' => 0,
    'profesion' => 0,
    'ubicacion' => 0,
    'localpro' => 0,
    'metros' => 0,
    'empezar' => 0,
    'comentario' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_58cb44a176ba89_08554202',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_58cb44a176ba89_08554202')) {
function content_58cb44a176ba89_08554202 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '128382095858cb44a161e785_51556879';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <table width="100%" bgcolor="#f5f5f5" border="0" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>            
                    <td>                
                        <table align="center" bgcolor="#f5f5f5">
                            <tbody>
                                <tr>
                                    <td width="640">

                                        <table width="100%" bgcolor="#00B3E7" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr style="text-align: right;">
                                                    <td style="padding: 15px 5px 0px 0px;">
                                                        <img src="http://encuestamdm.mdmanagement.org/public/img/multident-logo.png">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="padding:30px" align="left"><font style="text-align:center;font-size:27px" face="&#39;HelveticaNeue-Light&#39;, &#39;Helvetica Neue Light&#39;, &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif" color="#ffffff">Solicitud para Franquicia desde la pagina web</font></td>
                                                </tr>

                                            </tbody>
                                        </table>

                                        <table width="100%" bgcolor="#fff" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" style="padding:20px" align="left">

                                                        <font style="font-size:14px" face="&#39;HelveticaNeue-Regular&#39;, &#39;Helvetica Neue Regular&#39;, &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif">Estimado(a).</font>
                                                        <br><br>
                                                        Se ha registrado una solicitud para franquicia y los datos son los siguientes:
                                                        <br><br>
                                                        1. <b>Nombre y Apellidos:</b> <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
<br>
                                                        2. <b>Sexo:</b> <?php echo $_smarty_tpl->tpl_vars['sexo']->value;?>
<br>
                                                        3. <b>Email:</b> <?php echo $_smarty_tpl->tpl_vars['correo']->value;?>
<br> 
                                                        4. <b>Telefono:</b> <?php echo $_smarty_tpl->tpl_vars['telefono']->value;?>
<br>
                                                        5. <b>Celular:</b> <?php echo $_smarty_tpl->tpl_vars['celular']->value;?>
<br>
                                                        6. <b>Dirección:</b> <?php echo $_smarty_tpl->tpl_vars['direccion']->value;?>
<br>
                                                        7. <b>Ciudad:</b> <?php echo $_smarty_tpl->tpl_vars['ciudad']->value;?>
  /  <b>Departamento:</b> <?php echo $_smarty_tpl->tpl_vars['departamento']->value;?>
 /  <b>País:</b> <?php echo $_smarty_tpl->tpl_vars['pais']->value;?>
<br>
                                                        8. <b>Profesión:</b> <?php echo $_smarty_tpl->tpl_vars['profesion']->value;?>
<br>
                                                        9. <b>Dónde desea ubicar su negocio:</b> <?php echo $_smarty_tpl->tpl_vars['ubicacion']->value;?>
<br>
                                                        10. <b>Local Propio:</b> <?php echo $_smarty_tpl->tpl_vars['localpro']->value;?>
<br>
                                                        11. <b>Metros del Local:</b> <?php echo $_smarty_tpl->tpl_vars['metros']->value;?>
<br>
                                                        12. <b>Desea empezar:</b> <?php echo $_smarty_tpl->tpl_vars['empezar']->value;?>
<br>
                                                        13. <b>Comentario:</b> <?php echo $_smarty_tpl->tpl_vars['comentario']->value;?>
<br>
                
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td style="padding-top:5px; border-top: 1px solid #00B3E7" align="left"><font style="font-size:10px" face="&#39;HelveticaNeue-Regular&#39;, &#39;Helvetica Neue Regular&#39;, &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif" color="#999999"> 
                                            
                                                        <center> Copyright @2016 - Multident. Todos los derechos reservados. </center></font></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

    </body>
</html><?php }
}
?>