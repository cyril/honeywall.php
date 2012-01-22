<?php

$query_systems = $select . $from . $where . $orderBy;

$result_systems = mysql_query($query_systems) or die(error_message($query_systems));
$nb_systems = mysql_num_rows($result_systems);

$foo_system = '';

if ($nb_systems > 0) {
	echo '<div id="tagcloud_list">'."\n";
	echo '<dl>'."\n";
	
	
	while($row_systems = mysql_fetch_array($result_systems)) {
		
		if ($foo_system != $row_systems['id']) {
			
			$foo_system = $row_systems['id'];
			echo '<dt>';
			echo '<a id="system_'.$row_systems['id'].'" href="#" onclick="process('."'php/', 'ajax.php', 'go=go_system&amp;key=".$row_systems['id']."', 'zone_configuration'".');">'.$row_systems['name'].'</a>';
			
			if ( $_SESSION['system_id'] != 0 && !isset($_SESSION['system_connect']) ) {
				echo ' - <a id="connect_'.$row_systems['id'].'" href="#" '; ?>
	onclick="process('php/', 'ajax.php', 'go=go_connect&amp;key=<?php echo $row_systems['id']; ?>', 'zone_configuration');" 
	<?php echo ' style ="font-weight: normal; font-size: .9em">Logging in?</a>';
			}
			
			echo '</dt>'."\n";
		}
		
		echo '<dd>'."\n";
		echo '<ul>'."\n";
		
		include 'php/display/where/inc.interfaces.php';
		
		echo '</ul>'."\n";
		echo '</dd>'."\n";
	}
	
	
	echo '</dl>'."\n";
	echo '</div>'."\n";
	
} else echo '<p><span class="error">There is not any system.</p>'."\n";

?>