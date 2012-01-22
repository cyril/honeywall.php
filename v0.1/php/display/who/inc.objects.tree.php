<?php

$query_objects = $select . $from . $where . $orderBy;

$result_objects = mysql_query($query_objects) or die(error_message($query_objects));
$nb_objects = mysql_num_rows($result_objects);

if ($nb_objects > 0) {
	
	echo '<dl>'."\n";
	
	while($row_objects = mysql_fetch_array($result_objects)) {
		
		echo '<dt><a id="object_'.$row_objects['id'].'" href="#" '; ?>
onclick="process('php/', 'ajax.php', 'go=go_object&amp;key=<?php echo $row_objects['id']; ?>', 'zone_configuration');" 
<?php echo '>'.$row_objects['name'].'</a></dt>'."\n";
		echo '<dd>'."\n";
		
		include 'php/display/who/inc.ips.php';
		
		echo '</dd>'."\n";
		
	}
	
	echo '</dl>'."\n";
	
}

?>