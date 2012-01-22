<?php
$query = 'UPDATE `interfaces` 
          SET `name`="'.$_POST['name'].'", 
              `macro`="'.$_POST['macro'].'", 
              `ip`="'.$_POST['ip'].'", 
              `mask`="'.$_POST['mask'].'", 
              `system_id`="'.$_SESSION['system_id'].'" 
          WHERE `id`="'.$_POST['id'].'"';
$result = mysql_query($query) or die(error_message($query));
if ($result) echo '<span class="done">Update complet.</span>'."\n";
else echo '<span class=error>Error.</span>'."\n";
?>