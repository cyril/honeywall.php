<?php

$select  = 'SELECT `id`, ' .
									'`password` ';
$from    = 'FROM `systems` ';
$where   = 'WHERE `id` = "'.$_SESSION['system_id'].'" AND 
									`password` = "'.$_POST['system_password'].'" ';
$orderBy = 'ORDER BY (`id`) ASC';

$query = $select . $from . $where . $orderBy;

$result = mysql_query($query) or die(error_message($query));
$nb = mysql_num_rows($result);

if ($nb == 1) {
	$_SESSION['system_connect'] = '';
	$print_this[] = '<p><span class="done">Connection on the system... done.</span></p>';
} else $print_this[] = '<p><span class="error">Invalid password.</span></p>'."\n".'<p>Please try again.</p>';

?>