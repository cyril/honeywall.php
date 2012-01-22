<?php

if (isset($_POST['id'])) {
	$row_system['id'] = $_POST['id'];
	unset($_POST['id']);
	if (!isset($error)) $error = 0;
	echo '<h1>Delete</h1>'."\n";
}

echo '<ul>'."\n";

echo '<li>Delete of system '.$row_system['id'].'... '."\n";

if ($row_system['id'] == 4 && !isset($_SESSION['root'])) {
	echo 'This is the demo system. '."\n";//a user can't delete the demo system (special line)
	$error++;
} else {//a user can't delete the demo system (special line)

$query_interface = 'SELECT interfaces.`id` 
                    FROM `systems`, 
                         `interfaces` 
                    WHERE systems.`id` = interfaces.`system_id` AND 
                          systems.`id` = "'.$row_system['id'].'" 
                    ORDER BY `id` ASC';
$result_interface = mysql_query($query_interface) or die(error_message($query_interface));
$nb_interface = mysql_num_rows($result_interface);
if ($nb_interface > 0) {
	while($row_interface = mysql_fetch_array($result_interface)) {
		include 'configuration/where/inc.interface.delete.php';
	}
}

$query = 'DELETE FROM `systems` WHERE `id` = "'.$row_system['id'].'"';
mysql_query($query) or die(error_message($query));

$query = 'SELECT `id` FROM `systems` WHERE `id` = "'.$row_system['id'].'"';
$result = mysql_query($query) or die(error_message($query));
$error += mysql_num_rows($result);

}//a user can't delete the demo system (special line)

if ($error == 0) echo '<span class="done">system deleted.</span></li>'."\n";
else echo '<span class="error">Error!</span> The system was not deleted.</li>'."\n";

echo '</ul>'."\n";

?>