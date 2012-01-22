<?php

if ($_POST['id'] == 4 && !isset($_SESSION['root'])) {//
	echo '<p>Sorry, <span class="error">this system is a demo on read-only</span>.<br />Only the root user is able to update it.</p>'."\n";//a user can't delete the demo system (special line)
} else {//
$query = 'UPDATE `systems` 
          SET `name`="'.$_POST['name'].'", 
              `description`="'.$_POST['description'].'", 
              `gateway`="'.$_POST['gateway'].'", 
              `dns`="'.$_POST['dns'].'", 
              `password`="'.$_POST['password'].'" 
          WHERE `id`="'.$_POST['id'].'"';
$result = mysql_query($query) or die(error_message($query));
if ($result) echo '<span class="done">Update complet.</span>'."\n";
else echo '<span class="error">Error.</span>'."\n";
}//
?>