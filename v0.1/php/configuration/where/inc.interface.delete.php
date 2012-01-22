<?php

if (isset($_POST['id'])) {
	$row_interface['id'] = $_POST['id'];
	unset($_POST['id']);
	if (!isset($error)) $error = 0;
	echo '<h1>Delete</h1>'."\n";
}

echo '<ul>'."\n";

echo '<li>Delete of interface '.$row_interface['id'].'... '."\n";

$query_zone = 'SELECT zones.`id` 
               FROM `interfaces`, 
                    `zones` 
               WHERE interfaces.`id` = zones.`interface_id` AND 
                     interfaces.`id` = "'.$row_interface['id'].'" 
               ORDER BY `id` ASC';
$result_zone = mysql_query($query_zone) or die(error_message($query_zone));
$nb_zone = mysql_num_rows($result_zone);
if ($nb_zone > 0) {
	while($row_zone = mysql_fetch_array($result_zone)) {
		include 'configuration/where/inc.zone.delete.php';
	}
}

$query = 'DELETE FROM `interfaces` WHERE `id` = "'.$row_interface['id'].'"';
mysql_query($query) or die(error_message($query));

$query = 'SELECT `id` FROM `interfaces` WHERE `id` = "'.$row_interface['id'].'"';
$result = mysql_query($query) or die(error_message($query));
$error += mysql_num_rows($result);

if ($error == 0) echo '<span class="done">interface deleted.</span></li>'."\n";
else echo '<span class="error">Error!</span> The interface was not deleted.</li>'."\n";

echo '</ul>'."\n";

?>