<?php

$submit = 'Add';
$enable = 'true';

$id = '';
$srcport = '';
$dstport = '';
$staticport = '';
$interfaceway_id = '';
$action_id = '';
$stickyconnection_id = '';
$log_id = '';
$networkprotocol_id = '';
$transportprotocol_id = '';
$addresspool_id = '';
$enabletranslation_id = '';
$passtranslation_id = '';
$srcobject_id = '';
$dstobject_id = '';
$extobject_id = '';

if (isset($_POST['key'])) {
	
	include 'inc.translation.query.php';
	
	$query = $select . $from . $where . $orderBy;
	
	$result = mysql_query($query) or die(error_message($query));
	$nb = mysql_num_rows($result);
	
	if ($nb == 1) {
		
		$row = mysql_fetch_array($result);
		
		$submit = 'Update';
		
		$id = $row['id'];
		$srcport = $row['srcport'];
		$dstport = $row['dstport'];
		$staticport = $row['staticport'];
		$interfaceway_id = $row['interfaceway_id'];
		$action_id = $row['action_id'];
		$stickyconnection_id = $row['stickyconnection_id'];
		$log_id = $row['log_id'];
		$networkprotocol_id = $row['networkprotocol_id'];
		$transportprotocol_id = $row['transportprotocol_id'];
		$addresspool_id = $row['addresspool_id'];
		$enabletranslation_id = $row['enabletranslation_id'];
		$passtranslation_id = $row['passtranslation_id'];
		
		//begin: sub-query for load srcobject_id, dstobject_id, extobject_id
		$query_s = 'SELECT objects_targets_translations.`object_id`, 
		                   objects_targets_translations.`translation_id`, 
		                   targets.`name` AS `targets_name` 
								FROM `objects_targets_translations`, 
										 `translations`, 
										 `objects`, 
										 `targets` 
								WHERE objects_targets_translations.`translation_id` = translations.`id` AND 
											objects_targets_translations.`object_id` = objects.`id` AND 
											objects_targets_translations.`target_id` = targets.`id` AND 
											translations.`id` = "'.$id.'" 
								ORDER BY `targets_name` ASC';
		$result_s = mysql_query($query_s) or die(error_message($query_s));
		$nb_s = mysql_num_rows($result_s);
		if ($nb_s > 0) {
			while($row_s = mysql_fetch_array($result_s)) {
				     if ($row_s['targets_name'] == 'source')      $srcobject_id = $row_s['object_id'];
				else if ($row_s['targets_name'] == 'destination') $dstobject_id = $row_s['object_id'];
				else if ($row_s['targets_name'] == 'forward')     $extobject_id = $row_s['object_id'];
			}
		}
		//end: sub-query for load srcobject_id, dstobject_id, extobject_id
		
	} else {
		
		echo '<span class="error">No found translation id '.$_POST['key'].'.</span>'."\n";
		$enable = 'false';
		
	}
	
}

include 'inc.translation.form.php';

?>