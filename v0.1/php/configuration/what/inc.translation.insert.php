<?php
$query = "INSERT INTO `translations` (`id`, 
                                      `srcport`, 
                                      `dstport`, 
                                      `staticport`, 
                                      `interfaceway_id`, 
                                      `enabletranslation_id`, 
                                      `action_id`, 
                                      `passtranslation_id`, 
                                      `log_id`, 
                                      `networkprotocol_id`, 
                                      `transportprotocol_id`, 
                                      `addresspool_id`, 
                                      `stickyconnection_id`) 
          VALUES ('', 
                  '".$_POST['srcport']."', 
                  '".$_POST['dstport']."', 
                  '".$_POST['staticport']."', 
                  '".$_POST['interfaceway_id']."', 
                  '".$_POST['enabletranslation_id']."', 
                  '".$_POST['action_id']."', 
                  '".$_POST['passtranslation_id']."', 
                  '".$_POST['log_id']."', 
                  '".$_POST['networkprotocol_id']."', 
                  '".$_POST['transportprotocol_id']."', 
                  '".$_POST['addresspool_id']."', 
                  '".$_POST['stickyconnection_id']."')";
$result = mysql_query($query) or die(error_message($query));
if ($result) echo '<span class="done">Done.<br />Id of the new translation: <tt>'.mysql_insert_id().'</tt></span>'."\n";
else echo '<span class=error>Error.</span>'."\n";

$new_translation_id = mysql_insert_id();

$query = "INSERT INTO `objects_targets_translations` (`object_id`, 
                                                      `target_id`, 
                                                      `translation_id`) 
          VALUES ('".$_POST['srcobject_id']."', 
                  '1', 
                  '".$new_translation_id."')";
$result = mysql_query($query) or die(error_message($query));
if (!$result) echo '<span class=error>Error.</span>'."\n";

$query = "INSERT INTO `objects_targets_translations` (`object_id`, 
                                                      `target_id`, 
                                                      `translation_id`) 
          VALUES ('".$_POST['dstobject_id']."', 
                  '2', 
                  '".$new_translation_id."')";
$result = mysql_query($query) or die(error_message($query));
if (!$result) echo '<span class=error>Error.</span>'."\n";

$query = "INSERT INTO `objects_targets_translations` (`object_id`, 
                                                      `target_id`, 
                                                      `translation_id`) 
          VALUES ('".$_POST['extobject_id']."', 
                  '3', 
                  '".$new_translation_id."')";
$result = mysql_query($query) or die(error_message($query));
if (!$result) echo '<span class=error>Error.</span>'."\n";
?>