<?php

$query_translations = $select . $from . $where . $orderBy;

$result_translations = mysql_query($query_translations) or die(error_message($query_translations));
$nb_translations = mysql_num_rows($result_translations);

$foo = '';

if ($nb_translations > 0) {
	echo '	<g class="translation">'."\n";
	echo '		<defs>'."\n";
	echo '			<marker id="Triangle" '."\n";
	echo '			        viewBox="0 0 10 10" '."\n";
	echo '			        refX="10" '."\n";
	echo '			        refY="5" '."\n";
	echo '			        markerUnits="strokeWidth" '."\n";
	echo '			        markerWidth="10" '."\n";
	echo '			        markerHeight="8" '."\n";
	echo '			        orient="auto">'."\n";
	echo '				<path d="M 0 0 L 10 5 L 0 10 z" />'."\n";
	echo '			</marker>'."\n";
	echo '		</defs>'."\n";
	
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
		
		echo '		<g>'."\n";
		if      ($row_translations['actions_name'] == 'nat') require 'inc.translations.design.nat.php';
		else if ($row_translations['actions_name'] == 'rdr') require 'inc.translations.design.rdr.php';
		echo '		</g>'."\n";
	}
	echo '	</g>'."\n";
}

?>