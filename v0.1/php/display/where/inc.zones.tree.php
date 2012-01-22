<?php

$query_zones = $select . $from . $where . $orderBy;

$result_zones = mysql_query($query_zones) or die(error_message($query_zones));
$nb_zones = mysql_num_rows($result_zones);

if ($nb_zones > 0) {
	
	echo '<dl>'."\n";
	
	while($row_zones = mysql_fetch_array($result_zones)) {
		
		echo '<dt><a id="zone_'.$row_zones['id'].'" href="#" '; ?>
onclick="process('php/', 'ajax.php', 'go=go_zone&amp;key=<?php echo $row_zones['id']; ?>', 'zone_configuration');" 
<?php echo '>'.$row_zones['name'].'</a></dt>'."\n";
		echo '<dd>'."\n";
		
		include 'php/display/who/inc.objects.php';
		
		echo '</dd>'."\n";
		
	}
	
	echo '</dl>'."\n";
	
}

?>