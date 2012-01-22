<?php
$query = 'UPDATE `translations` 
          SET `srcport`="'.$_POST['srcport'].'", 
              `dstport`="'.$_POST['dstport'].'", 
              `staticport`="'.$_POST['staticport'].'", 
              `interfaceway_id`="'.$_POST['interfaceway_id'].'", 
              `enabletranslation_id`="'.$_POST['enabletranslation_id'].'", 
              `action_id`="'.$_POST['action_id'].'", 
              `passtranslation_id`="'.$_POST['passtranslation_id'].'", 
              `log_id`="'.$_POST['log_id'].'", 
              `networkprotocol_id`="'.$_POST['networkprotocol_id'].'", 
              `transportprotocol_id`="'.$_POST['transportprotocol_id'].'", 
              `addresspool_id`="'.$_POST['addresspool_id'].'", 
              `stickyconnection_id`="'.$_POST['stickyconnection_id'].'" 
          WHERE `id`="'.$_POST['id'].'"';
$result = mysql_query($query) or die(error_message($query));
if ($result) echo '<span class="done">Update complet.</span>'."\n";
else echo '<span class=error>Error.</span>'."\n";

$query = 'UPDATE `objects_targets_translations` 
          SET `object_id`="'.$_POST['srcobject_id'].'" 
          WHERE `translation_id`="'.$_POST['id'].'" AND 
                `target_id`="1"';
$result = mysql_query($query) or die(error_message($query));

$query = 'UPDATE `objects_targets_translations` 
          SET `object_id`="'.$_POST['dstobject_id'].'" 
          WHERE `translation_id`="'.$_POST['id'].'" AND 
                `target_id`="2"';
								
$result = mysql_query($query) or die(error_message($query));

$query = 'UPDATE `objects_targets_translations` 
          SET `object_id`="'.$_POST['extobject_id'].'" 
          WHERE `translation_id`="'.$_POST['id'].'" AND 
                `target_id`="3"';
$result = mysql_query($query) or die(error_message($query));
?>