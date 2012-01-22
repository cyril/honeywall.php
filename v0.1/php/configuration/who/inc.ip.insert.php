<?php
echo '<h1>Insert</h1>'."\n";
echo '<ol>'."\n";
$table_of_ip_address = explode(';', $_POST['address']);
for ($i = 0; $i < count($table_of_ip_address); $i++) {
	echo '<li><strong>'.$table_of_ip_address[$i].'</strong>... ';
	$query = "INSERT INTO `ips` (`id`, 
	                             `address`, 
	                             `object_id`) 
	          VALUES ('', 
	                  '".$table_of_ip_address[$i]."', 
	                  '".$_POST['object_id']."')";
	$result = mysql_query($query) or die(error_message($query));
	if ($result) echo '<span class="done">Done. Id of the new ip: <tt>'.mysql_insert_id().'</tt></span>';
	else echo '<span class=error>Error.</span>';
	echo '</li>'."\n";
}
echo '</ol>'."\n";
?>