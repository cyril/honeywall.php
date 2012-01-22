<?php

$query_systems = $select . $from . $where . $orderBy;

$result_systems = mysql_query($query_systems) or die(error_message($query_systems));
$nb_systems = mysql_num_rows($result_systems);

if ($nb_systems == 1) {
	
	echo '<dl>'."\n";
	
	while($row_systems = mysql_fetch_array($result_systems)) {
		
		echo '<dt><a id="system_'.$row_systems['id'].'" href="#" '; ?>
onclick="process('php/', 'ajax.php', 'go=go_system&amp;key=<?php echo $row_systems['id']; ?>', 'zone_configuration');" 
<?php echo '>'.$row_systems['name'].'</a>';
		
		
		
		if ( $_SESSION['system_id'] != 0 && !isset($_SESSION['system_connect']) ) {
			echo ' - <a id="connect_'.$row_systems['id'].'" href="#" '; ?>
onclick="process('php/', 'ajax.php', 'go=go_connect&amp;key=<?php echo $row_systems['id']; ?>', 'zone_configuration');" 
<?php echo ' style ="font-weight: normal; font-size: .9em">Logging in?</a>';
		}




		echo '</dt>'."\n";
		echo '<dd>'."\n";
		
		include 'php/display/where/inc.interfaces.php';
		
		echo '</dd>'."\n";
		
	}
	
	echo '</dl>'."\n";
	
} else if ($nb_systems > 1) {
	
	echo '<ol>'."\n";
	
	while($row_systems = mysql_fetch_array($result_systems)) {
		
		echo '<li><a id="system_'.$row_systems['id'].'" href="#" '; ?>
onclick="process('php/', 'ajax.php', 'go=go_system&amp;key=<?php echo $row_systems['id']; ?>', 'zone_configuration');" 
<?php echo '>'.$row_systems['name'].'</a></li>'."\n";
		
	}
	
	echo '</ol>'."\n";
	
} else echo '<p><span class="error">There is not any system.</p>'."\n";

?>