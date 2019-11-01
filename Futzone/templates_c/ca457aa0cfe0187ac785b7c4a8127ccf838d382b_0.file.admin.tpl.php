<?php
/* Smarty version 3.1.33, created on 2019-11-01 03:08:03
  from 'C:\xampp\htdocs\Web1\Futzone\templates\admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5dbb9383214fa6_10547923',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca457aa0cfe0187ac785b7c4a8127ccf838d382b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web1\\Futzone\\templates\\admin.tpl',
      1 => 1572574080,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5dbb9383214fa6_10547923 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <hr class="margenhr bg-success">
    <h1 class="text-center">Administrador</h1>
    <br>
    <h1 class="text-center">Editar Borrar Ligas</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Liga</th>
                <th scope="col">Pais</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ligas']->value, 'liga');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['liga']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['liga']->value['nombre'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['liga']->value['pais'];?>
</td>
                    <td><a class="btn btn-outline-secondary" href="mostrarEditarLiga/<?php echo $_smarty_tpl->tpl_vars['liga']->value['id_liga'];?>
" role="button">EDITAR</a></td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
    <h1 class="text-center">Agregar Liga</h1>
    <form method="post" action="agregarLiga">
        <div class="form-group">
            <label>Nombre</label>
            <input type="input" class="form-control" name="ligaId" id="ligaId" placeholder="Supercopa">
        </div>
        <div class="form-group">
            <label>Pais</label>
            <input type="input" class="form-control" name="paisId" id="paisId" placeholder="Argentina">
        </div>
        <br>
        <button type="submit" class="btn bg-dark btn-dark">Listo</button>
    </form>
    
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
