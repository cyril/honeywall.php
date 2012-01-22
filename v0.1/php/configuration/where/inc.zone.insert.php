<?php
$query = "INSERT INTO `zones` (`id`, 
                                    `name`, 
                                    `interface_id`) 
          VALUES ('', 
                  '".$_POST['name']."', 
                  '".$_POST['interface_id']."')";
$result = mysql_query($query) or die(error_message($query));
if ($result) echo '<span class="done">Done.<br />Id of the new zone: <tt>'.mysql_insert_id().'</tt></span>'."\n";
else echo '<span class=error>Error.</span>'."\n";
?>