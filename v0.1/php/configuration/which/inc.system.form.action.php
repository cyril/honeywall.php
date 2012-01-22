<?php
if ( ($_SESSION['system_id'] != 0 && (isset($_SESSION['system_connect']) || isset($_SESSION['root'])) )
  || ($_SESSION['system_id'] == 0 && isset($_SESSION['root'])) ) {
	echo '<p>'."\n";
	echo '<input type="submit" value="'.$submit.'" />'."\n";
	if ($id != '') {
		/*if ($_SESSION['system_id'] == 0) echo '<input id="open_button" type="button" value="Open" onclick="open_id(document.getElementById(\'table\').value);" />'."\n";
		else                             echo '<input id="close_button" type="button" value="Close" onclick="close_id(document.getElementById(\'table\').value);" />'."\n";*/
		echo '<input id="delete_button" type="button" value="Delete" onclick="delete_id(document.getElementById(\'table\').value);" />'."\n";
	}
	echo '</p>'."\n";
}
?>