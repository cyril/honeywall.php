<?php

$query_ips = $select . $from . $where . $orderBy;

$result_ips = mysql_query($query_ips) or die(error_message($query_ips));
$nb_ips = mysql_num_rows($result_ips);

/*if ($nb_ips > 0) {
	echo '<ul>'."\n";
	while($row_ips = mysql_fetch_array($result_ips)) {
		echo '<li>';
		
		
		echo '<a id="ip_'.$row_ips['id'].'" href="#" '; ?>
onclick="process('php/', 'ajax.php', 'go=go_ip&amp;key=<?php echo $row_ips['id']; ?>', 'zone_configuration');" 
<?php echo '>'.$row_ips['address'].'</a>';
		
		
		echo '</li>'."\n";
	}
	echo '</ul>'."\n";
}*/

?>