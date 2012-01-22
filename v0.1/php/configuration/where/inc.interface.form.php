<form id="interfaces_form" action="#" method="post">
<fieldset>
<legend>Editor</legend>
<div id="form_info"></div>
<p><input id="table" value="interfaces" type="hidden" /></p>
<table>
<caption>interfaces</caption>
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
<td><input id="name" type="text" value="<?php echo $name; ?>" /></td>
</tr>
<tr>
<th><label for="macro">Macro:</label></th>
<td><input id="macro" type="text" value="<?php echo $macro; ?>" /></td>
</tr>
<tr>
<th><label for="ip">IP:</label></th>
<td><input id="ip" type="text" value="<?php echo $ip; ?>" /></td>
</tr>
<tr>
<th><label for="mask">Mask:</label></th>
<td><input id="mask" type="text" value="<?php echo $mask; ?>" /></td>
</tr>
</table>
<?php
if ($enable == 'true') require_once 'inc.interface.form.action.php';
?>
</fieldset>
</form>