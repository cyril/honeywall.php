<?php
if ($_SESSION['system_id'] != 0 && (isset($_SESSION['system_connect']) || isset($_SESSION['root']))) {
	echo '<p>'."\n";
	echo '<input type="submit" value="'.$submit.'" />'."\n";
	if ($id != '') echo '<input id="delete_button" type="button" value="Delete" onclick="delete_id(document.getElementById(\'table\').value);" />'."\n";
	echo '</p>'."\n";
}
?>