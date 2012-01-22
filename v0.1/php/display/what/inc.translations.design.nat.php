<?php
$stroke = 'black';

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
	$query_ss = 'SELECT interfaces.`id`, interfaces.`name` 
							 FROM `interfaces`, 
										`zones`, 
										`objects` 
							 WHERE interfaces.`id` = zones.`interface_id` AND 
										 zones.`id` = objects.`zone_id` AND 
										 objects.`id` = "'.$row_s['id'].'"';
	$result_ss = mysql_query($query_ss) or die(error_message($query_ss));
	$nb_ss = mysql_num_rows($result_ss);
	if ($nb_ss > 0) {
		while($row_ss = mysql_fetch_array($result_ss)) {
			for ($i = 0 ; $i < sizeof($interface_link) ; $i++) {
				if ($interface_link[$i] == $row_ss['id']) {
					$x_interface1 = $interface_cx[$i];
					$y_interface1 = $interface_cy[$i];
					$stroke = $style_color[$i];
				}
			}
		}
	}
	for ($i = 0 ; $i < sizeof($object_link) ; $i++) {
		if ($object_link[$i] == $row_s['id']) {
			$x1_source1 = $object_x[$i];
			$y1_source1 = $object_y[$i];
		}
	}
}



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
	$query_ss = 'SELECT interfaces.`id`, interfaces.`name` 
							 FROM `interfaces`, 
										`zones`, 
										`objects` 
							 WHERE interfaces.`id` = zones.`interface_id` AND 
										 zones.`id` = objects.`zone_id` AND 
										 objects.`id` = "'.$row_s['id'].'"';
	$result_ss = mysql_query($query_ss) or die(error_message($query_ss));
	$nb_ss = mysql_num_rows($result_ss);
	if ($nb_ss > 0) {
		while($row_ss = mysql_fetch_array($result_ss)) {
			for ($i = 0 ; $i < sizeof($interface_link) ; $i++) {
				if ($interface_link[$i] == $row_ss['id']) {
					$x_interface2 = $interface_cx[$i];
					$y_interface2 = $interface_cy[$i];
				}
			}
		}
	}
	for ($i = 0 ; $i < sizeof($object_link) ; $i++) {
		if ($object_link[$i] == $row_s['id']) {
			$x1_destination1 = $object_x[$i];
			$y1_destination1 = $object_y[$i];
		}
	}
}



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
	/*$query_ss = 'SELECT interfaces.`id`, interfaces.`name` 
							 FROM `interfaces`, 
										`zones`, 
										`objects` 
							 WHERE interfaces.`id` = zones.`interface_id` AND 
										 zones.`id` = objects.`zone_id` AND 
										 objects.`id` = "'.$row_s['id'].'"';
	$result_ss = mysql_query($query_ss) or die(error_message($query_ss));
	$nb_ss = mysql_num_rows($result_ss);
	if ($nb_ss > 0) {
		while($row_ss = mysql_fetch_array($result_ss)) {
			for ($i = 0 ; $i < sizeof($interface_link) ; $i++) {
				if ($interface_link[$i] == $row_ss['id']) {
					$x_interface2 = $interface_cx[$i];
					$y_interface2 = $interface_cy[$i];
				}
			}
		}
	}*/
	for ($i = 0 ; $i < sizeof($object_link) ; $i++) {
		if ($object_link[$i] == $row_s['id']) {
			$x1_forward1 = $object_x[$i];
			$y1_forward1 = $object_y[$i];
		}
	}
}


$stroke_dasharray = '';

echo '			<line id="translation_'.$row_translations['id'].'_a" x1="'.$x1_source1.'%" y1="'.$y1_source1.'%" x2="'.$x_interface1.'%" y2="'.$y_interface1.'%" style="fill:none; stroke:'.$stroke.'; stroke-width:1;'.$stroke_dasharray.'"/>'."\n";
if ($row_translations['interfaceways_name'] == 'internal') $stroke_dasharray = ' stroke-dasharray:8,4,2,4;';
echo '			<line id="translation_'.$row_translations['id'].'_b" x1="'.$x_interface1.'%" y1="'.$y_interface1.'%" x2="'.$x_interface2.'%" y2="'.$y_interface2.'%" style="fill:none; stroke:'.$stroke.'; stroke-width:1;'.$stroke_dasharray.'"/>'."\n";
echo '			<line id="translation_'.$row_translations['id'].'_a" x1="'.$x1_forward1.'%" y1="'.$y1_forward1.'%" x2="'.$x1_destination1.'%" y2="'.$y1_destination1.'%" style="fill:none; stroke:'.$stroke.'; stroke-width:0.5; stroke-opacity:0.5; stroke-dasharray:1,1,1,1; marker-end:url(#Triangle);"/>'."\n";
if ($row_translations['interfaceways_name'] == 'external') $stroke_dasharray = ' stroke-dasharray:8,4,2,4;';
echo '			<line id="translation_'.$row_translations['id'].'_c" x1="'.$x_interface2.'%" y1="'.$y_interface2.'%" x2="'.$x1_destination1.'%" y2="'.$y1_destination1.'%" style="fill:none; stroke:'.$stroke.'; stroke-width:1;'.$stroke_dasharray.' marker-end:url(#Triangle);"/>'."\n";

?>