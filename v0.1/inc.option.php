<div id="option">

<?php
if ( ($_SESSION['system_id'] != 0) ) {
	
	
	$query = 'SELECT `name` FROM `systems` WHERE `id` = "'.$_SESSION['system_id'].'"';
	$result = mysql_query($query) or die(error($query));
	$nb = mysql_num_rows($result);
	if ($nb == 1) {
		$row = mysql_fetch_array($result);
		$name = $row['name'];
	} else $name = '<q class="error">unknown</q>';
	
	
	if ( isset($_SESSION['system_connect']) ) {
		
		echo '<p><strong>Logged on '.$name.' | <a href="?system_logout=">Disconnect</a></strong></p>'."\n";
	}
	else echo '<p><strong>'.$name.' selected | <a href="?system_unselect=">Unselect it</a></strong></p>'."\n";
	
}
?>
<div id="zone_configuration">

<?php

for ($i = 0; $i < count($print_this); $i++) {
	echo $print_this[$i]."\n";
}

if ( isset($_GET['root_login']) ) require_once('html/root.login.form.html'); ?>
</div>
</div>
