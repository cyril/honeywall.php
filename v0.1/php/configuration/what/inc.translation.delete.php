<?php

if (isset($_POST['id'])) {
	$row_translation['id'] = $_POST['id'];
	unset($_POST['id']);
	if (!isset($error)) $error = 0;
	echo '<h1>Delete</h1>'."\n";
}

echo '<ul>'."\n";

echo '<li>Delete of translation '.$row_translation['id'].'... '."\n";

$query_objecttargettranslation = 'SELECT objects_targets_translations.`translation_id` 
                                  FROM `translations`, 
                                       `objects_targets_translations` 
                                  WHERE translations.`id` = objects_targets_translations.`translation_id` AND 
                                        translations.`id` = "'.$row_translation['id'].'" 
                                  ORDER BY translations.`id` ASC';
$result_objecttargettranslation = mysql_query($query_objecttargettranslation) or die(error_message($query_objecttargettranslation));
$nb_objecttargettranslation = mysql_num_rows($result_objecttargettranslation);
if ($nb_objecttargettranslation > 0) {
	while($row_objecttargettranslation = mysql_fetch_array($result_objecttargettranslation)) {
		include 'configuration/what/inc.objecttargettranslation.delete.php';
	}
}

$query = 'DELETE FROM `translations` WHERE `id` = "'.$row_translation['id'].'"';
mysql_query($query) or die(error_message($query));

$query = 'SELECT `id` FROM `translations` WHERE `id` = "'.$row_translation['id'].'"';
$result = mysql_query($query) or die(error_message($query));
$error += mysql_num_rows($result);

if ($error == 0) echo '<span class="done">translation deleted.</span></li>'."\n";
else echo '<span class="error">Error!</span> The translation was not deleted.</li>'."\n";

echo '</ul>'."\n";

?>