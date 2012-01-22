<div id="path">
<?php
echo '<p>';
echo '<a href="index.php?main_list=" accesskey="1">Main page</a>';
if ($_SESSION['system_id'] != 0) {
	
	$select  = 'SELECT `id`, ' .
	                  '`name` ';
	$from    = 'FROM `systems` ';
	$where   = 'WHERE `id` = "'.$_SESSION['system_id'].'"';
	$query = $select . $from . $where;
	
	$result = mysql_query($query) or die(error_message($query));
	$nb = mysql_num_rows($result);
	
	if ($nb == 1) {
		$row = mysql_fetch_array($result);
		
		
		echo ' &gt; <a id="system_'.$_SESSION['system_id'].'_path" href="index.php" onclick="process'."('php/', 'ajax.php', 'go=go_system&amp;key=".$_SESSION['system_id']."', 'zone_configuration')".';">'.$row['name'].'</a>';
		
		if ( !isset($_SESSION['system_connect']) && !isset($_SESSION['root']) ) echo ' (read-only)';
		else                                     echo ' (connected)';
	} else echo '<p><span class="error">The occur system is not in the database.</span></p>'."\n";
}
echo '</p>'."\n";
?>
</div>
