<?php

if (isset($_POST['id'])) {
	$row_object['id'] = $_POST['id'];
	unset($_POST['id']);
	if (!isset($error)) $error = 0;
	echo '<h1>Delete</h1>'."\n";
}

echo '<ul>'."\n";

echo '<li>Delete of object '.$row_object['id'].'... '."\n";

$query_ip = 'SELECT ips.`id` 
             FROM `objects`, 
                  `ips` 
             WHERE objects.`id` = ips.`object_id` AND 
                   objects.`id` = "'.$row_object['id'].'" 
             ORDER BY `id` ASC';
$result_ip = mysql_query($query_ip) or die(error_message($query_ip));
$nb_ip = mysql_num_rows($result_ip);
if ($nb_ip > 0) {
	while($row_ip = mysql_fetch_array($result_ip)) {
		include 'configuration/who/inc.ip.delete.php';
	}
}

$query_translation = 'SELECT translations.`id` 
                      FROM `objects_targets_translations`, 
                           `objects`, 
                           `translations` 
                      WHERE objects_targets_translations.`object_id` = objects.`id` AND 
                            objects_targets_translations.`translation_id` = translations.`id` AND 
                            objects.`id` = "'.$row_object['id'].'" 
                      ORDER BY `id` ASC';
$result_translation = mysql_query($query_translation) or die(error_message($query_translation));
$nb_translation = mysql_num_rows($result_translation);
if ($nb_translation > 0) {
	while($row_translation = mysql_fetch_array($result_translation)) {
		include 'configuration/what/inc.translation.delete.php';
	}
}

$query = 'DELETE FROM `objects` WHERE `id` = "'.$row_object['id'].'"';
mysql_query($query) or die(error_message($query));

$query = 'SELECT `id` FROM `objects` WHERE `id` = "'.$row_object['id'].'"';
$result = mysql_query($query) or die(error_message($query));
$error += mysql_num_rows($result);

if ($error == 0) echo '<span class="done">object deleted.</span></li>'."\n";
else echo '<span class="error">Error!</span> The object was not deleted.</li>'."\n";

echo '</ul>'."\n";

?>