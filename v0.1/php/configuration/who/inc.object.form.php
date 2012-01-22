<form id="objects_form" action="#" method="post">
<fieldset>
<legend>Editor</legend>
<div id="form_info"></div>
<p><input id="table" value="objects" type="hidden" /></p>
<table>
<caption>objects</caption>
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
<th><label for="objectoption_id">Option:</label></th>
<td><?php
$query_s = '
SELECT `id`, `name` 
FROM `objectoptions` 
ORDER BY `id` ASC';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s > 0) {
	echo '<select id="objectoption_id">'."\n";
	while($row_s = mysql_fetch_array($result_s))
	{
		$foo = '';
		if ($objectoption_id != '') {
			if ($objectoption_id == $row_s['id']) {
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
<tr>
<th><label for="zone_id">Zone:</label></th>
<td><?php

$query_s = 'SELECT interfaces.`id`, interfaces.`name` 
            FROM `systems`, `interfaces` 
            WHERE systems.`id` = interfaces.`system_id` AND 
                  systems.`id` = "'.$_SESSION['system_id'].'" 
            ORDER BY interfaces.`name` ASC';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s > 0) {
	echo '<select id="zone_id">'."\n";
	while ($row_s = mysql_fetch_array($result_s)) {
		
		echo '<optgroup label="'.$row_s['name'].'">'."\n";
		
		
		
		$query_ss = 'SELECT zones.`id`, zones.`name` 
		             FROM `systems`, `interfaces`, `zones` 
		             WHERE systems.`id` = interfaces.`system_id` AND 
		                   interfaces.`id` = zones.`interface_id` AND 
		                   systems.`id` = "'.$_SESSION['system_id'].'" AND 
		                   interfaces.`id` = "'.$row_s['id'].'" 
		             ORDER BY zones.`name` ASC';
		$result_ss = mysql_query($query_ss) or die(error_message($query_ss));
		$nb_ss = mysql_num_rows($result_ss);
		if ($nb_ss > 0) {
			
			while ($row_ss = mysql_fetch_array($result_ss)) {
				$foo = '';
				if ($zone_id != '') {
					if ($zone_id == $row_ss['id']) {
						$foo = ' selected="selected"';
					}
				}
				echo '<option value="'.$row_ss['id'].'"'.$foo.'>'.$row_ss['name'].'</option>'."\n";
			}
			
		} /*else {
			echo '<span class="error">No found.</span>'."\n";
			$enable = false;
		}*/
		
		echo '</optgroup>'."\n";
		
	}
} else {
	echo '<span class="error">No found.</span>'."\n";
	$enable = false;
}



?></td>
</tr>
</table>
<?php
if ($enable == 'true') require_once 'inc.object.form.action.php';
?>
</fieldset>
</form>