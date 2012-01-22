<?php

$query_objects = $select . $from . $where . $orderBy;

$result_objects = mysql_query($query_objects) or die(error_message($query_objects));
$nb_objects = mysql_num_rows($result_objects);

if ($nb_objects > 0) {
	
	
	
	while($row_objects = mysql_fetch_array($result_objects)) {
		include 'php/display/who/inc.ips.php';
		echo '<li>';
		
		
		if ( $_SESSION['system_id'] != 0 ) {
			echo '<a id="object_'.$row_objects['id'].'" href="#" '; ?>
onclick="process('php/', 'ajax.php', 'go=go_object&amp;key=<?php echo $row_objects['id']; ?>', 'zone_configuration');" 
<?php echo '>';
		}
		
		$nb_ips += 8;
		if ($nb_ips > 50) $nb_ips = 50;
		
		echo '<span style="font-size: '.$nb_ips.'px;">'.$row_objects['name'].'</span>';
		if ( $_SESSION['system_id'] != 0 ) {
			echo '</a>';
		}
		
		echo '</li>'."\n";
	}
}

?>