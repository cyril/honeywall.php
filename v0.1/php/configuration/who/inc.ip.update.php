<?php
$query = 'UPDATE `ips` 
          SET `address`="'.$_POST['address'].'", 
              `object_id`="'.$_POST['object_id'].'" 
          WHERE `id`="'.$_POST['id'].'"';
$result = mysql_query($query) or die(error_message($query));
if ($result) echo '<span class="done">Update complet.</span>'."\n";
else echo '<span class=error>Error.</span>'."\n";
?>