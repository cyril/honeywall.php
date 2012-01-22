<form id="ips_form" action="#" method="post">
<fieldset>
<legend>Editor</legend>
<div id="form_info"></div>
<p><input id="table" value="ips" type="hidden" /></p>
<table>
<caption>ips</caption>
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
<th><label for="address">Address:</label></th>
<td><?php
if ($id == '') echo '<textarea id="address" rows="6" cols="40"></textarea>'."\n";
else           echo '<input id="address" type="text" value="'.$address.'" />'."\n";
?></td>
</tr>
<tr>
<th><label for="object_id">Object:</label></th>
<td><?php
$query_s = 'SELECT objects.`id`, objects.`name` 
            FROM `systems`, `interfaces`, `zones`, `objects` 
            WHERE systems.`id` = interfaces.`system_id` AND 
                  interfaces.`id` = zones.`interface_id` AND 
                  zones.`id` = objects.`zone_id` AND 
                  systems.`id` = "'.$_SESSION['system_id'].'" 
            ORDER BY objects.`name` ASC';
$result_s=mysql_query($query_s) or die(error_message($query_s));
$nb_s=mysql_num_rows($result_s);
if ($nb_s>0) {
	echo '<select id="object_id" name="object_id">'."\n";
	while($row_s=mysql_fetch_array($result_s))
	{
		$foo = '';
		if ($object_id != '') {
			if ($object_id == $row_s['id']) {
				$foo = ' selected="selected"';
			}
		}
		echo '<option value="'.$row_s['id'].'"'.$foo.'>'.$row_s['name'].'</option>'."\n";
	}
	echo '</select>'."\n";
} else {
	echo '<span class="error">No found.</span>'."\n";
	$enable = false;
}
?></td>
</tr>
</table>
<?php
if ($enable == 'true') require_once 'inc.ip.form.action.php';
?>
</fieldset>
</form>