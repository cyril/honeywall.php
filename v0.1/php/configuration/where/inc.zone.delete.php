<?php

if (isset($_POST['id'])) {
	$row_zone['id'] = $_POST['id'];
	unset($_POST['id']);
	if (!isset($error)) $error = 0;
	echo '<h1>Delete</h1>'."\n";
}

echo '<ul>'."\n";

echo '<li>Delete of zone '.$row_zone['id'].'... '."\n";

$query_object = 'SELECT objects.`id` 
                 FROM `zones`, 
                      `objects` 
                 WHERE zones.`id` = objects.`zone_id` AND 
                       zones.`id` = "'.$row_zone['id'].'" 
                 ORDER BY `id` ASC';
$result_object = mysql_query($query_object) or die(error_message($query_object));
$nb_object = mysql_num_rows($result_object);
if ($nb_object > 0) {
	while($row_object = mysql_fetch_array($result_object)) {
		include 'configuration/who/inc.object.delete.php';
	}
}

$query = 'DELETE FROM `zones` WHERE `id` = "'.$row_zone['id'].'"';
mysql_query($query) or die(error_message($query));

$query = 'SELECT `id` FROM `zones` WHERE `id` = "'.$row_zone['id'].'"';
$result = mysql_query($query) or die(error_message($query));
$error += mysql_num_rows($result);

if ($error == 0) echo '<span class="done">zone deleted.</span></li>'."\n";
else echo '<span class="error">Error!</span> The zone was not deleted.</li>'."\n";

echo '</ul>'."\n";

?>