<?php
$query = 'UPDATE `zones` 
          SET `name`="'.$_POST['name'].'", 
              `interface_id`="'.$_POST['interface_id'].'" 
          WHERE `id`="'.$_POST['id'].'"';
$result = mysql_query($query) or die(error_message($query));
if ($result) echo '<span class="done">Update complet.</span>'."\n";
else echo '<span class=error>Error.</span>'."\n";
?>