<?php

$query_objecttargettranslation = 'DELETE FROM `objects_targets_translations` WHERE `translation_id` = "'.$row_objecttargettranslation['translation_id'].'"';
mysql_query($query_objecttargettranslation) or die(error_message($query_objecttargettranslation));

$query_objecttargettranslation = 'SELECT `id` FROM `objects_targets_translations` WHERE `translation_id` = "'.$row_objecttargettranslation['translation_id'].'"';
$result_objecttargettranslation = mysql_query($query_objecttargettranslation) or die(error_message($query_objecttargettranslation));

?>