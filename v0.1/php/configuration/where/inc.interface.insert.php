<?php
$query = "INSERT INTO `interfaces` (`id`, 
                                    `name`, 
                                    `macro`, 
                                    `ip`, 
                                    `mask`, 
                                    `system_id`) 
          VALUES ('', 
                  '".$_POST['name']."', 
                  '".$_POST['macro']."', 
                  '".$_POST['ip']."', 
                  '".$_POST['mask']."', 
                  '".$_SESSION['system_id']."')";
$result = mysql_query($query) or die(error_message($query));
if ($result) echo '<span class="done">Done.<br />Id of the new interface: <tt>'.mysql_insert_id().'</tt></span>'."\n";
else echo '<span class=error>Error.</span>'."\n";
?>