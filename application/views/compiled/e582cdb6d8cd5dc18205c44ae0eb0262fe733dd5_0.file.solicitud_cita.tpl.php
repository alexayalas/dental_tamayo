<?php /* Smarty version 3.1.27, created on 2019-07-25 09:56:10
         compiled from "C:\xampp5\htdocs\Tamayo\application\views\templates\correo\solicitud_cita.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:141695d39c30a216833_19287939%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e582cdb6d8cd5dc18205c44ae0eb0262fe733dd5' => 
    array (
      0 => 'C:\\xampp5\\htdocs\\Tamayo\\application\\views\\templates\\correo\\solicitud_cita.tpl',
      1 => 1564066517,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141695d39c30a216833_19287939',
  'variables' => 
  array (
    'nombre' => 0,
    'correo' => 0,
    'telefono' => 0,
    'referencia' => 0,
    'especialidad' => 0,
    'fecha' => 0,
    'comentario' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5d39c30a27d3a3_07140514',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5d39c30a27d3a3_07140514')) {
function content_5d39c30a27d3a3_07140514 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '141695d39c30a216833_19287939';
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

                                        <table width="100%" bgcolor="#337ab7" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr style="text-align: center;">
                                                    <td style="padding: 15px 5px 0px 0px;">
                                                        <img src="http://198.199.69.176/demoweb/public/imagen/logo/logo-tamayo.png" width="150" height="60">
                                                    </td>
                                                </tr>
                                                <tr style="text-align: center;">
                                                    <td style="padding:30px" align="center"><font style="text-align:center;font-size:30px" face="&#39;HelveticaNeue-Light&#39;, &#39;Helvetica Neue Light&#39;, &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif" color="#ffffff">Solicitud de cita desde la pagina web</font></td>
                                                </tr>

                                            </tbody>
                                        </table>

                                        <table width="100%" bgcolor="#fff" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td colspan="2" style="padding:20px" align="left">

                                                        <font style="font-size:14px" face="&#39;HelveticaNeue-Regular&#39;, &#39;Helvetica Neue Regular&#39;, &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif">Estimado(a).</font>
                                                        <br><br>
                                                        Se ha registrado una solicitud para cita y los datos son los siguientes:
                                                        <br><br>
                                                        1. <b>Nombre y Apellidos:</b> <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
<br>
                                                        2. <b>Email:</b> <?php echo $_smarty_tpl->tpl_vars['correo']->value;?>
<br> 
                                                        3. <b>Telefono</b> <?php echo $_smarty_tpl->tpl_vars['telefono']->value;?>
<br>
                                                        4. <b>Como se entero:</b> <?php echo $_smarty_tpl->tpl_vars['referencia']->value;?>
<br>
                                                        5. <b>Especialidad:</b> <?php echo $_smarty_tpl->tpl_vars['especialidad']->value;?>
<br>
                                                        6. <b>Fecha para la Cita:</b> <?php echo $_smarty_tpl->tpl_vars['fecha']->value;?>
<br>
                                                        7. <b>Comentario:</b> <?php echo $_smarty_tpl->tpl_vars['comentario']->value;?>
<br>
                
                                                </tr>
                                            </tbody>
                                        </table>

                                        <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td style="padding-top:5px; border-top: 1px solid #00B3E7" align="left"><font style="font-size:10px" face="&#39;HelveticaNeue-Regular&#39;, &#39;Helvetica Neue Regular&#39;, &#39;Helvetica Neue&#39;, Helvetica, Arial, sans-serif" color="#999999"> 
                                            
                                                        <center> Copyright @2019 - Dental Tamayo. Todos los derechos reservados. </center></font></td>
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


</body></html><?php }
}
?>