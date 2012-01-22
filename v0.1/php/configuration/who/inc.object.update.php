<?php
$query = 'UPDATE `objects` 
          SET `name`="'.$_POST['name'].'", 
              `objectoption_id`="'.$_POST['objectoption_id'].'", 
              `zone_id`="'.$_POST['zone_id'].'" 
          WHERE `id`="'.$_POST['id'].'"';
$result = mysql_query($query) or die(error_message($query));
if ($result) echo '<span class="done">Update complet.</span>'."\n";
else echo '<span class=error>Error.</span>'."\n";
?>