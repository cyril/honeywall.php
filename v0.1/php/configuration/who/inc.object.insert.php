<?php
$query = "INSERT INTO `objects` (`id`, 
                                 `name`, 
                                 `objectoption_id`, 
                                 `zone_id`) 
          VALUES ('', 
                  '".$_POST['name']."', 
                  '".$_POST['objectoption_id']."', 
                  '".$_POST['zone_id']."')";
$result = mysql_query($query) or die(error_message($query));
if ($result) echo '<span class="done">Done.<br />Id of the new object: <tt>'.mysql_insert_id().'</tt></span>'."\n";
else echo '<span class=error>Error.</span>'."\n";
?>