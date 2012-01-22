<?php
if (isset($_SESSION['display'])) {
	if ($_SESSION['display'] == 'tree') {
		echo '<h1>Structure</h1>'."\n";
		require_once('php/display/which/inc.systems.php');
	} else if ($_SESSION['display'] == 'tagcloud') {
		echo '<h1>Tag cloud</h1>'."\n";
		require_once('php/display/which/inc.systems.php');
	} else if ($_SESSION['display'] == 'rule') {
		echo '<h1>Rule</h1>'."\n";
		echo '<h2>Translation</h2>'."\n";
		require_once('php/display/what/inc.translations.php');
	} else {//then ($_SESSION['display'] == 'design')
		echo '<h1>Design</h1>'."\n";
		$select  = 'SELECT `id` ';
		$from    = 'FROM `systems` ';
		if ($_SESSION['system_id'] != 0) $where   = 'WHERE `id` = "'.$_SESSION['system_id'].'" ';
		else                             $where   = '';
		$orderBy = 'ORDER BY (`id`) ASC';
		$query_systems = $select . $from . $where . $orderBy;
		
		$result_systems = mysql_query($query_systems) or die(error_message($query_systems));
		$nb_systems = mysql_num_rows($result_systems);
		
		if ($nb_systems == 0) echo '<p><span class="error">There is not any system.</p>'."\n";
		else {
			echo '<object data="inc.design.php?system_id='.$_SESSION['system_id'];
			if (isset($_SESSION['system_connect'])) echo '&amp;system_connect=true';
			//if (isset($_SESSION['root'])) echo '&amp;root=true';
			echo '" type="image/svg+xml" width="620" height="410"></object>'."\n";
			
			
			
			
			echo '<address>'."\n";
			
			if ( ($_SESSION['system_id'] != 0) ) {
				
				$query = 'SELECT `name` FROM `systems` WHERE `id` = "'.$_SESSION['system_id'].'"';
				$result = mysql_query($query) or die(error($query));
				$nb = mysql_num_rows($result);
				if ($nb == 1) {
					$row = mysql_fetch_array($result);
					echo 'Graphical representation of: <q>'.$row['name'].'</q> - '."\n";
				}
				echo 'Focus: <q>micro</q>'."\n";
				if ( isset($_SESSION['system_connect']) ) echo ' - Status: <q>connected</q>'."\n";
				else echo ' - Status: <q>disconnected</q>'."\n";
			} else echo 'Focus: <q>macro</q>'."\n";
			
			echo ' - Generated: <q>'.date('m-M-Y').'</q>'."\n";
			
			echo '</address>'."\n";
		}
		
		
		
		
		
		
		
	}
}
?>