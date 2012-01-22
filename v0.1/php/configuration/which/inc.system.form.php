<form id="systems_form" action="#" method="post">
<fieldset>
<legend>Editor</legend>
<div id="form_info"></div>
<p><input id="table" value="systems" type="hidden" /></p>
<table>
<caption>systems</caption>
<tr<?php if ($id == '') echo ' class="hidden"'; ?>>
<th>Id:</th>
<td><input id="id" type="text" value="<?php echo $id; ?>" readonly="readonly" /></td>
</tr>
<tr>
<th><label for="name">Name:</label></th>
<td><input id="name" type="text" value="<?php echo $name; ?>" /></td>
</tr>
<tr>
<th><label for="description">Description:</label></th>
<td><textarea id="description" rows="6" cols="20"><?php echo $description; ?></textarea></td>
</tr>
<tr>
<th><label for="gateway">Default gateway:</label></th>
<td><input id="gateway" type="text" value="<?php echo $gateway; ?>" /></td>
</tr>
<tr>
<th><label for="dns">DNS:</label></th>
<td><input id="dns" type="text" value="<?php echo $dns; ?>" /></td>
</tr>
<?php
if ($id != '') {
	echo '<tr>'."\n";
	echo '<th>Build date:</th>'."\n";
	echo '<td><input type="text" value="'.$builddate.'" disabled="disabled" /></td>'."\n";
	echo '</tr>'."\n";
}

if (isset($_SESSION['system_connect']) || isset($_SESSION['root'])) {
	echo '<tr>'."\n";
	echo '<th><label for="password">Password:</label></th>'."\n";
	echo '<td><input id="password" type="password" value="" /></td>'."\n";
	echo '</tr>'."\n";
	echo '</table>'."\n";
}

if ($enable == 'true') require_once 'inc.system.form.action.php';
?>
</fieldset>
</form>