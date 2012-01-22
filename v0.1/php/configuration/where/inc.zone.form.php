<?php

if ($enable == 'false') $attr = ' readonly="readonly"';
else                    $attr = '';

?>
<form id="zones_form" action="#" method="post">
<fieldset>
<legend>Editor</legend>
<div id="form_info"></div>
<p><input id="table" value="zones" type="hidden" /></p>
<table>
<caption>zones</caption>
<tr>
<th>Current system:</th>
<td><?php
$query_s = 'SELECT `name` 
            FROM `systems` 
            WHERE `id` = "'.$_SESSION['system_id'].'"';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s == 1) {
  $row_s = mysql_fetch_array($result_s);
	echo '<input type="text" value="'.$row_s['name'].'" disabled="disabled" />'."\n";
}
?></td>
</tr>
<tr<?php if ($id == '') echo ' class="hidden"'; ?>>
<th>Id:</th>
<td><input id="id" type="text" value="<?php echo $id; ?>" readonly="readonly" /></td>
</tr>
<tr>
<th><label for="name">Name:</label></th>
<td><input id="name" type="text" value="<?php echo $name; ?>"<?php echo $attr; ?> /></td>
</tr>
<tr>
<th><label for="interface_id">Interface:</label></th>
<td><?php
$query_s = 'SELECT interfaces.`id`, interfaces.`macro` 
            FROM `systems`, `interfaces` 
            WHERE systems.`id` = interfaces.`system_id` AND 
                  systems.`id` = "'.$_SESSION['system_id'].'" 
            ORDER BY interfaces.`macro` ASC';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s > 0) {
	echo '<select id="interface_id">'."\n";
	while($row_s = mysql_fetch_array($result_s))
	{
		$foo = '';
		if ($interface_id != '') {
			if ($interface_id == $row_s['id']) {
				$foo = ' selected="selected"';
			}
		}
		echo '<option value="'.$row_s['id'].'"'.$foo.'>'.$row_s['macro'].'</option>'."\n";
	}
	echo '</select>'."\n";
} else {
	echo '<span class=error>No found.</span>'."\n";
	$enable = false;
}
?></td>
</tr>
</table>
<?php
if ($enable == 'true') require_once 'inc.zone.form.action.php';
?>
</fieldset>
</form>