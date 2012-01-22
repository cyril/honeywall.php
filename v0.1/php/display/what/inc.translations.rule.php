<?php

$query_translations = $select . $from . $where . $orderBy;

$result_translations = mysql_query($query_translations) or die(error_message($query_translations));
$nb_translations = mysql_num_rows($result_translations);

if ($nb_translations > 0) {
	echo '<dl id="rule">'."\n";
	if ($_SESSION['system_id'] != 0) {
		while($row_translations = mysql_fetch_array($result_translations)) {
			//bloc dont la fonction est de n afficher que les regles appartement a un system ouvert
			$select  = 'SELECT systems.`id`, 
			                   systems.`name`, 
			                   translations.`id` AS `translations_id` ';
			$from    = 'FROM `translations`, 
			                 `objects_targets_translations`, 
			                 `objects`, 
			                 `zones`, 
			                 `interfaces`, 
			                 `systems` ';
			$where   = 'WHERE objects_targets_translations.`translation_id` = translations.`id` AND 
			                  objects_targets_translations.`object_id` = objects.`id` AND 
			                  zones.`id` = objects.`zone_id` AND 
			                  interfaces.`id` = zones.`interface_id` AND 
			                  systems.`id` = interfaces.`system_id` AND 
			                  systems.`id` = "'.$_SESSION['system_id'].'" AND 
			                  translations.`id` = "'.$row_translations['id'].'" ';
			$orderBy = 'ORDER BY (systems.`id`) ASC';
			
			$query_tmp = $select . $from . $where . $orderBy;
			
			$result_tmp = mysql_query($query_tmp) or die(error_message($query_tmp));
			$nb_tmp = mysql_num_rows($result_tmp);
			
			if ($nb_tmp == 0) continue;
			
			//fin du bloc
		
		
		?>
<dt>Id <a id="ip_<?php echo $row_translations['id']; ?>" href="#" onclick="process('php/', 'ajax.php', 'go=go_translation&amp;key=<?php echo $row_translations['id']; ?>', 'zone_configuration');">
<?php echo $row_translations['id']; ?>
</a></dt>
<dd>
<table>
<tr>
<td><span class="action"><?php echo $row_translations['actions_name']; ?></span></td>
<td><span class="interface"><?php echo $row_translations['interfaceways_name']; ?></span></td>
<td><?php
$query_s = 'SELECT objects.`id`, objects.`name` 
            FROM `translations`, 
                 `objects`, 
                 `targets`, 
                 `objects_targets_translations` 
            WHERE objects_targets_translations.`translation_id` = translations.`id` AND
                  objects_targets_translations.`object_id` = objects.`id` AND
                  objects_targets_translations.`target_id` = targets.`id` AND
                  targets.`name` = "source" AND
                  translations.`id` = "'.$row_translations['id'].'"';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s == 1) {
	$row_s = mysql_fetch_array($result_s);
	?><span class="source"><a id="object_<?php echo $row_s['id']; ?>_<?php echo $row_translations['id']; ?>_from" href="#" onclick="process('php/', 'ajax.php', 'go=go_object&amp;key=<?php echo $row_s['id']; ?>', 'zone_configuration');"><?php echo $row_s['name']; ?></a></span><?php } ?></td>
<?php if ($row_translations['srcport'] != 0) echo '<td>port '.$row_translations['srcport'].'</td>'."\n"; ?>
<td><?php
$query_s = 'SELECT objects.`id`, objects.`name` 
            FROM `translations`, 
                 `objects`, 
                 `targets`, 
                 `objects_targets_translations` 
            WHERE objects_targets_translations.`translation_id` = translations.`id` AND
                  objects_targets_translations.`object_id` = objects.`id` AND
                  objects_targets_translations.`target_id` = targets.`id` AND
                  targets.`name` = "destination" AND
                  translations.`id` = "'.$row_translations['id'].'"';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s == 1) {
	$row_s = mysql_fetch_array($result_s);
	?><span class="destination"><a id="object_<?php echo $row_s['id']; ?>_<?php echo $row_translations['id']; ?>_to" href="#" onclick="process('php/', 'ajax.php', 'go=go_object&amp;key=<?php echo $row_s['id']; ?>', 'zone_configuration');"><?php echo $row_s['name']; ?></a></span><?php } ?></td>
<?php if ($row_translations['dstport'] != 0) echo '<td>port '.$row_translations['dstport'].'</td>'."\n"; ?>
<td><?php
$query_s = 'SELECT objects.`id`, objects.`name` 
            FROM `translations`, 
                 `objects`, 
                 `targets`, 
                 `objects_targets_translations` 
            WHERE objects_targets_translations.`translation_id` = translations.`id` AND 
                  objects_targets_translations.`object_id` = objects.`id` AND 
                  objects_targets_translations.`target_id` = targets.`id` AND 
                  targets.`name` = "forward" AND 
                  translations.`id` = "'.$row_translations['id'].'"';
$result_s = mysql_query($query_s) or die(error_message($query_s));
$nb_s = mysql_num_rows($result_s);
if ($nb_s == 1) {
	$row_s = mysql_fetch_array($result_s);
	?><span class="forward"><a id="object_<?php echo $row_s['id']; ?>_<?php echo $row_translations['id']; ?>_fwd" href="#" onclick="process('php/', 'ajax.php', 'go=go_object&amp;key=<?php echo $row_s['id']; ?>', 'zone_configuration');"><?php echo $row_s['name']; ?></a></span><?php } ?></td>
<?php if ($row_translations['staticport'] != 0) echo '<td>port '.$row_translations['staticport'].'</td>'."\n"; ?>
</tr>
</table>
</dd>
<?php
		}
	} else {
		if ($nb_translations > 1) $s = 's'; else $s = '';
		echo '<p>There is '.$nb_translations.' translation'.$s.'. Select a system for publish them.</p>'."\n";
	}
	echo '</dl>'."\n";
} else echo '<p><span class="error">There is not any translation.</p>'."\n";
?>