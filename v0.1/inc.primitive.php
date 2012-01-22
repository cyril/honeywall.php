<?php

/* BEGIN BLOC */
//when the user submit the form of: inc.system.select.form.php
if ( isset($_POST['system_id']) ) require_once('inc.primitive.system.select.php');
//when the user submit the form of: inc.system.connect.form.php
else if ( $_SESSION['system_id'] != 0 && isset($_POST['system_password']) ) require_once('inc.primitive.system.connect.php');
//when the user is root and a system is select, we can automatically connect him on it
if (isset($_SESSION['root']) && $_SESSION['system_id'] != 0 && !isset($_SESSION['system_connect'])) {
	$_SESSION['system_connect'] = '';
	$print_this[] = '<p><span class="done">Connection on the system... done.</span></p>';
}
/* END BLOC */

if ($_SESSION['system_id'] != 0) {
	$query = 'SELECT `id` FROM `systems` WHERE `id` = "'.$_SESSION['system_id'].'"';
	
	$result = mysql_query($query) or die(error_message($query));
	$nb = mysql_num_rows($result);
	
	if ($nb == 0) $_SESSION['system_id'] = 0;
}

?>