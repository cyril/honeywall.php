<?php

$query_interfaces = $select . $from . $where . $orderBy;

$result_interfaces = mysql_query($query_interfaces) or die(error_message($query_interfaces));
$nb_interfaces = mysql_num_rows($result_interfaces);

if ($nb_interfaces > 0) {
	
	echo '<dl>'."\n";
	
	while($row_interfaces = mysql_fetch_array($result_interfaces)) {
		
		echo '<dt><a id="interface_'.$row_interfaces['id'].'" href="#" '; ?>
onclick="process('php/', 'ajax.php', 'go=go_interface&amp;key=<?php echo $row_interfaces['id']; ?>', 'zone_configuration');" 
<?php echo '>'.$row_interfaces['name'].'</a></dt>'."\n";
		echo '<dd>'."\n";
		
		include 'php/display/where/inc.zones.php';
		
		echo '</dd>'."\n";
		
	}
	
	echo '</dl>'."\n";
	
}

?>