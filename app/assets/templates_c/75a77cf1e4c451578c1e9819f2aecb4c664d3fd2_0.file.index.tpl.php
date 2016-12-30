<?php
/* Smarty version 3.1.31, created on 2016-12-31 00:19:11
  from "/home/evgen/www/tests/test_simple_php_framework/app/views/site/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5866cf4f047db8_75912052',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75a77cf1e4c451578c1e9819f2aecb4c664d3fd2' => 
    array (
      0 => '/home/evgen/www/tests/test_simple_php_framework/app/views/site/index.tpl',
      1 => 1482038448,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5866cf4f047db8_75912052 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h3>Index</h3>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['models']->value, 'model');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['model']->value) {
?>
    <li><?php echo $_smarty_tpl->tpl_vars['model']->value->title;?>
</li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
