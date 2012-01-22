<form id="menu_configuration_translations" action="#" method="post">
<fieldset>
<legend>Editor</legend>
<div id="form_info"></div>
<p><input id="table" value="translations" type="hidden" /></p>
<table>
<caption>translations</caption>
<tr<?php if ($id == '') echo ' class="hidden"'; ?>>
<th><label for="id">Id:</label></th>
<td><input id="id" type="text" value="<?php echo $id; ?>" readonly="readonly" /></td>
</tr>
<tr>
<th><label for="enabletranslation_id">Enable:</label></th>
<td><?php
$query_s='
SELECT `id`, `value` 
FROM `enabletranslations` 
ORDER BY `id` ASC';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s>0) {
	echo '<select id="enabletranslation_id">'."\n";
	while($row_s = mysql_fetch_array($result_s))
	{
		$foo = '';
		if ($enabletranslation_id != '') {
			if ($enabletranslation_id == $row_s['id']) $foo = ' selected="selected"';
		}
		echo '<option value="'.$row_s['id'].'"'.$foo.'>'.$row_s['value'].'</option>'."\n";
	}
	echo '</select>'."\n";
} else {
	echo '<span class="error">No found.</span>'."\n";
	$enable = 'false';
}
?></td>
</tr>
<tr>
<th><label for="action_id">Action:</label></th>
<td><?php
$query_s='
SELECT `id`, `name` 
FROM `actions` 
ORDER BY `id` ASC';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s>0) {
	echo '<select id="action_id">'."\n";
	while($row_s = mysql_fetch_array($result_s))
	{
		$foo = '';
		if ($action_id != '') {
			if ($action_id == $row_s['id']) $foo = ' selected="selected"';
		}
		echo '<option value="'.$row_s['id'].'"'.$foo.'>'.$row_s['name'].'</option>'."\n";
	}
	echo '</select>'."\n";
} else {
	echo '<span class="error">No found.</span>'."\n";
	$enable = 'false';
}
?></td>
</tr>
<tr>
<th><label for="passtranslation_id">Pass without filter:</label></th>
<td><?php
$query_s='
SELECT `id`, `value` 
FROM `passtranslations` 
ORDER BY `id` ASC';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s>0) {
	echo '<select id="passtranslation_id">'."\n";
	while($row_s = mysql_fetch_array($result_s))
	{
		$foo = '';
		if ($passtranslation_id != '') {
			if ($passtranslation_id == $row_s['id']) $foo = ' selected="selected"';
		}
		echo '<option value="'.$row_s['id'].'"'.$foo.'>'.$row_s['value'].'</option>'."\n";
	}
	echo '</select>'."\n";
} else {
	echo '<span class="error">No found.</span>'."\n";
	$enable = 'false';
}
?></td>
</tr>
<tr>
<th><label for="log_id">Enable log:</label></th>
<td><?php
$query_s='
SELECT `id`, `status` 
FROM `logs` 
ORDER BY `id` ASC';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s>0) {
	echo '<select id="log_id">'."\n";
	while($row_s = mysql_fetch_array($result_s))
	{
		$foo = '';
		if ($log_id != '') {
			if ($log_id == $row_s['id']) $foo = ' selected="selected"';
		}
		echo '<option value="'.$row_s['id'].'"'.$foo.'>'.$row_s['status'].'</option>'."\n";
	}
	echo '</select>'."\n";
} else {
	echo '<span class="error">No found.</span>'."\n";
	$enable = 'false';
}
?></td>
</tr>
<tr>
<th><label for="interfaceway_id">Interface:</label></th>
<td><?php
$query_s='
SELECT `id`, `name` 
FROM `interfaceways` 
ORDER BY `id` ASC';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s > 0) {
	echo '<select id="interfaceway_id">'."\n";
	while($row_s = mysql_fetch_array($result_s))
	{
		$foo = '';
		if ($interfaceway_id != '') {
			if ($interfaceway_id == $row_s['id']) $foo = ' selected="selected"';
		}
		echo '<option value="'.$row_s['id'].'"'.$foo.'>'.$row_s['name'].'</option>'."\n";
	}
	echo '</select>'."\n";
} else {
	echo '<span class="error">No found.</span>'."\n";
	$enable = 'false';
}
?></td>
</tr>
<tr>
<th><label for="networkprotocol_id">Network protocol:</label></th>
<td><?php
$query_s='
SELECT `id`, `name` 
FROM `networkprotocols` 
ORDER BY `name` ASC';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s>0) {
	echo '<select id="networkprotocol_id">'."\n";
	while($row_s = mysql_fetch_array($result_s))
	{
		$foo = '';
		if ($networkprotocol_id != '') {
			if ($networkprotocol_id == $row_s['id']) $foo = ' selected="selected"';
		}
		echo '<option value="'.$row_s['id'].'"'.$foo.'>'.$row_s['name'].'</option>'."\n";
	}
	echo '</select>'."\n";
} else {
	echo '<span class="error">No found.</span>'."\n";
	$enable = 'false';
}
?></td>
</tr>
<tr>
<th><label for="transportprotocol_id">Transport protocol:</label></th>
<td><?php
$query_s='
SELECT `id`, `name` 
FROM `transportprotocols` 
ORDER BY `name` ASC';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s>0) {
	echo '<select id="transportprotocol_id">'."\n";
	while($row_s = mysql_fetch_array($result_s))
	{
		$foo = '';
		if ($transportprotocol_id != '') {
			if ($transportprotocol_id == $row_s['id']) $foo = ' selected="selected"';
		}
		echo '<option value="'.$row_s['id'].'"'.$foo.'>'.$row_s['name'].'</option>'."\n";
	}
	echo '</select>'."\n";
} else {
	echo '<span class="error">No found.</span>'."\n";
	$enable = 'false';
}
?></td>
</tr>
<tr>
<th><label for="srcobject_id">Source object:</label></th>
<td><?php
$query_s = 'SELECT objects.`id`, 
                   objects.`name`, 
                   zones.`name` AS `zones_name` 
            FROM `objects`, 
                 `zones`, 
                 `interfaces`, 
                 `systems` 
            WHERE zones.`id` = objects.`zone_id` AND 
                  interfaces.`id` = zones.`interface_id` AND 
                  systems.`id` = interfaces.`system_id` AND 
                  systems.`id` = "'.$_SESSION['system_id'].'" 
            ORDER BY `zones_name` ASC, `name` ASC';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s > 0) {
	echo '<select id="srcobject_id">'."\n"; $bar = '';
	while($row_s = mysql_fetch_array($result_s)) {
		if ($bar != $row_s['zones_name']) { $bar = $row_s['zones_name']; if ($bar != '') echo '</optgroup>'."\n"; echo '<optgroup label="'.$bar.'">'."\n"; } $foo = '';
		if ($srcobject_id != '') { if ($srcobject_id == $row_s['id']) $foo = ' selected="selected"'; }
		echo '<option value="'.$row_s['id'].'"'.$foo.'>'.$row_s['name'].'</option>'."\n";
	}
	echo '</optgroup>'."\n";
	echo '</select>'."\n";
} else {
	echo '<span class="error">No found.</span>'."\n";
	$enable = 'false';
}
?></td>
</tr>
<tr>
<th><label for="srcport">Source port:</label></th>
<td><input id="srcport" type="text" value="<?php echo $srcport; ?>" /></td>
</tr>
<tr>
<th><label for="dstobject_id">Destination object:</label></th>
<td><?php
$query_s = 'SELECT objects.`id`, 
                   objects.`name`, 
                   zones.`name` AS `zones_name` 
            FROM `objects`, 
                 `zones`, 
                 `interfaces`, 
                 `systems` 
            WHERE zones.`id` = objects.`zone_id` AND 
                  interfaces.`id` = zones.`interface_id` AND 
                  systems.`id` = interfaces.`system_id` AND 
                  systems.`id` = "'.$_SESSION['system_id'].'" 
            ORDER BY `zones_name` ASC, `name` ASC';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s > 0) {
	echo '<select id="dstobject_id">'."\n"; $bar = '';
	while($row_s = mysql_fetch_array($result_s))
	{
		if ($bar != $row_s['zones_name']) { $bar = $row_s['zones_name']; if ($bar != '') echo '</optgroup>'."\n"; echo '<optgroup label="'.$bar.'">'."\n"; } $foo = '';
		if ($dstobject_id != '') { if ($dstobject_id == $row_s['id']) $foo = ' selected="selected"'; }
		echo '<option value="'.$row_s['id'].'"'.$foo.'>'.$row_s['name'].'</option>'."\n";
	}
	echo '</optgroup>'."\n";
	echo '</select>'."\n";
} else {
	echo '<span class="error">No found.</span>'."\n";
	$enable = 'false';
}
?></td>
</tr>
<tr>
<th><label for="dstport">Destination port:</label></th>
<td><input id="dstport" type="text" value="<?php echo $dstport; ?>" /></td>
</tr>
<tr>
<th><label for="extobject_id">External object:</label></th>
<td><?php
$query_s = 'SELECT objects.`id`, 
                   objects.`name`, 
                   zones.`name` AS `zones_name` 
            FROM `objects`, 
                 `zones`, 
                 `interfaces`, 
                 `systems` 
            WHERE zones.`id` = objects.`zone_id` AND 
                  interfaces.`id` = zones.`interface_id` AND 
                  systems.`id` = interfaces.`system_id` AND 
                  systems.`id` = "'.$_SESSION['system_id'].'" 
            ORDER BY `zones_name` ASC, `name` ASC';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s > 0) {
	echo '<select id="extobject_id">'."\n"; $bar = '';
	while($row_s = mysql_fetch_array($result_s))
	{
		if ($bar != $row_s['zones_name']) { $bar = $row_s['zones_name']; if ($bar != '') echo '</optgroup>'."\n"; echo '<optgroup label="'.$bar.'">'."\n"; } $foo = '';
		if ($extobject_id != '') { if ($extobject_id == $row_s['id']) $foo = ' selected="selected"'; }
		echo '<option value="'.$row_s['id'].'"'.$foo.'>'.$row_s['name'].'</option>'."\n";
	}
	echo '</optgroup>'."\n";
	echo '</select>'."\n";
} else {
	echo '<span class="error">No found.</span>'."\n";
	$enable = 'false';
}
?></td>
</tr>
<tr>
<th><label for="addresspool_id">Address pool:</label></th>
<td><?php
$query_s='
SELECT `id`, `name` 
FROM `addresspools` 
ORDER BY `name` ASC';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s>0) {
	echo '<select id="addresspool_id">'."\n";
	while($row_s = mysql_fetch_array($result_s))
	{
		$foo = '';
		if ($addresspool_id != '') {
			if ($addresspool_id == $row_s['id']) $foo = ' selected="selected"';
		}
		echo '<option value="'.$row_s['id'].'"'.$foo.'>'.$row_s['name'].'</option>'."\n";
	}
	echo '</select>'."\n";
} else {
	echo '<span class="error">No found.</span>'."\n";
	$enable = 'false';
}
?></td>
</tr>
<tr>
<th><label for="stickyconnection_id">Sticky connection:</label></th>
<td><?php
$query_s='
SELECT `id`, `status` 
FROM `stickyconnections` 
ORDER BY `id` ASC';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s>0) {
	echo '<select id="stickyconnection_id">'."\n";
	while($row_s = mysql_fetch_array($result_s))
	{
		$foo = '';
		if ($stickyconnection_id != '') {
			if ($stickyconnection_id == $row_s['id']) $foo = ' selected="selected"';
		}
		echo '<option value="'.$row_s['id'].'"'.$foo.'>'.$row_s['status'].'</option>'."\n";
	}
	echo '</select>'."\n";
} else {
	echo '<span class="error">No found.</span>'."\n";
	$enable = 'false';
}
?></td>
</tr>
<tr>
<th><label for="staticport">Static port:</label></th>
<td><input id="staticport" type="text" value="<?php echo $staticport; ?>" /></td>
</tr>
</table>
<?php
if ($enable == 'true') require_once 'inc.translation.form.action.php';
?>
</fieldset>
</form>