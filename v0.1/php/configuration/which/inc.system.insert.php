<?php
$query = "INSERT INTO `systems` (`id`, 
                                 `name`, 
                                 `description`, 
                                 `gateway`, 
                                 `dns`, 
                                 `builddate`, 
                                 `password`) 
          VALUES ('', 
                  '".$_POST['name']."', 
                  '".$_POST['description']."', 
                  '".$_POST['gateway']."', 
                  '".$_POST['dns']."', 
                  '".gmdate("Y-m-d H:i:s")."', 
                  '".$_POST['password']."')";
$result = mysql_query($query) or die(error_message($query));
if ($result) echo '<span class="done">Done.<br />Id of the new system: <tt>'.mysql_insert_id().'</tt></span>'."\n";
else echo '<span class=error>Error.</span>'."\n";
?>