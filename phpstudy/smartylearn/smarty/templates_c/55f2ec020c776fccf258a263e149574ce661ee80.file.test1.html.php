<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-05-08 18:49:48
         compiled from "D:\wamp\www\phpstudy\smartylearn\smarty\templates\test1.html" */ ?>
<?php /*%%SmartyHeaderCode:16907554cd57e093257-53576217%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55f2ec020c776fccf258a263e149574ce661ee80' => 
    array (
      0 => 'D:\\wamp\\www\\phpstudy\\smartylearn\\smarty\\templates\\test1.html',
      1 => 1431103787,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16907554cd57e093257-53576217',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_554cd57e300465_67072311',
  'variables' => 
  array (
    'aa' => 0,
    'bb' => 0,
    'arr1' => 0,
    'arr2' => 0,
    'arr3' => 0,
    'num' => 0,
    'n' => 0,
    'arr4' => 0,
    'person' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_554cd57e300465_67072311')) {function content_554cd57e300465_67072311($_smarty_tpl) {?><html>
	<head>
	</head>
	<body>
		<hr>
		<ul>
			<li><?php echo $_smarty_tpl->tpl_vars['aa']->value;?>
</li>
			<li><?php echo $_smarty_tpl->tpl_vars['bb']->value;?>
</li>
		</ul>
		<hr>
			<a href="<?php echo $_smarty_tpl->tpl_vars['arr1']->value[0];?>
"><?php echo $_smarty_tpl->tpl_vars['arr1']->value[1];?>
</a><span><?php echo $_smarty_tpl->tpl_vars['arr1']->value[2];?>
</span>

		<hr>
		<?php echo $_smarty_tpl->tpl_vars['arr2']->value[0];?>
<br>
		<?php echo $_smarty_tpl->tpl_vars['arr2']->value['to'];?>


		<hr>
		<?php echo $_smarty_tpl->tpl_vars['arr3']->value[0];?>
<br>
		<?php echo $_smarty_tpl->tpl_vars['arr3']->value['to'];?>
<br>
		<?php echo $_smarty_tpl->tpl_vars['arr3']->value['word']['do'];?>
<br>
		<?php echo $_smarty_tpl->tpl_vars['arr3']->value['word'][0];?>


		<hr>
		<?php if (isset($_smarty_tpl->tpl_vars['num']->value)) {?>
			<?php if ($_smarty_tpl->tpl_vars['num']->value==5) {?>
				is 5<br>
			<?php } elseif ($_smarty_tpl->tpl_vars['num']->value>5) {?>
				bigger than 5
			<?php } else { ?>
				small than 5
			<?php }?>
		<?php }?>

		<hr>
		<ul>
			<?php $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['n']->step = 1;$_smarty_tpl->tpl_vars['n']->total = (int) ceil(($_smarty_tpl->tpl_vars['n']->step > 0 ? count($_smarty_tpl->tpl_vars['arr1']->value)+1 - (1) : 1-(count($_smarty_tpl->tpl_vars['arr1']->value))+1)/abs($_smarty_tpl->tpl_vars['n']->step));
if ($_smarty_tpl->tpl_vars['n']->total > 0) {
for ($_smarty_tpl->tpl_vars['n']->value = 1, $_smarty_tpl->tpl_vars['n']->iteration = 1;$_smarty_tpl->tpl_vars['n']->iteration <= $_smarty_tpl->tpl_vars['n']->total;$_smarty_tpl->tpl_vars['n']->value += $_smarty_tpl->tpl_vars['n']->step, $_smarty_tpl->tpl_vars['n']->iteration++) {
$_smarty_tpl->tpl_vars['n']->first = $_smarty_tpl->tpl_vars['n']->iteration == 1;$_smarty_tpl->tpl_vars['n']->last = $_smarty_tpl->tpl_vars['n']->iteration == $_smarty_tpl->tpl_vars['n']->total;?>
				<li><?php echo $_smarty_tpl->tpl_vars['n']->value;?>
</li>
			<?php }} ?>
		</ul>

		<hr>
		<ul>
			<?php $_smarty_tpl->tpl_vars['aa'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['aa']->step = 1;$_smarty_tpl->tpl_vars['aa']->total = (int) min(ceil(($_smarty_tpl->tpl_vars['aa']->step > 0 ? 20+1 - (1) : 1-(20)+1)/abs($_smarty_tpl->tpl_vars['aa']->step)),5);
if ($_smarty_tpl->tpl_vars['aa']->total > 0) {
for ($_smarty_tpl->tpl_vars['aa']->value = 1, $_smarty_tpl->tpl_vars['aa']->iteration = 1;$_smarty_tpl->tpl_vars['aa']->iteration <= $_smarty_tpl->tpl_vars['aa']->total;$_smarty_tpl->tpl_vars['aa']->value += $_smarty_tpl->tpl_vars['aa']->step, $_smarty_tpl->tpl_vars['aa']->iteration++) {
$_smarty_tpl->tpl_vars['aa']->first = $_smarty_tpl->tpl_vars['aa']->iteration == 1;$_smarty_tpl->tpl_vars['aa']->last = $_smarty_tpl->tpl_vars['aa']->iteration == $_smarty_tpl->tpl_vars['aa']->total;?>
				<li><?php echo $_smarty_tpl->tpl_vars['aa']->value;?>
</li>
			<?php }} ?>
		</ul>

		<hr>
		<ul>
			<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arr4']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value) {
$_smarty_tpl->tpl_vars['person']->_loop = true;
?>
				<li><?php echo $_smarty_tpl->tpl_vars['person']->value['name'];?>
 | <?php echo $_smarty_tpl->tpl_vars['person']->value['age'];?>
 | <?php echo $_smarty_tpl->tpl_vars['person']->value['phone'];?>
</li>
			<?php } ?>
			<br>
			<?php  $_smarty_tpl->tpl_vars['person'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['person']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arr4']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['person']->key => $_smarty_tpl->tpl_vars['person']->value) {
$_smarty_tpl->tpl_vars['person']->_loop = true;
?>
				<li><?php echo $_smarty_tpl->tpl_vars['person']->value['name'];?>
 | <?php echo $_smarty_tpl->tpl_vars['person']->value['age'];?>
 | <?php echo $_smarty_tpl->tpl_vars['person']->value['phone'];?>
</li>
			<?php } ?>
		</ul>
	</body>
</html><?php }} ?>
