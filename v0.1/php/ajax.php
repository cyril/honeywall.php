<?php
include '../../inc.primitive.php';
if (isset($_POST['go'])) {
	     if ($_POST['go'] == 'go_system')      require_once('configuration/which/inc.system.php');
	else if ($_POST['go'] == 'go_interface')   require_once('configuration/where/inc.interface.php');
	else if ($_POST['go'] == 'go_zone')        require_once('configuration/where/inc.zone.php');
	else if ($_POST['go'] == 'go_object')      require_once('configuration/who/inc.object.php');
	else if ($_POST['go'] == 'go_ip')          require_once('configuration/who/inc.ip.php');
	else if ($_POST['go'] == 'go_translation') require_once('configuration/what/inc.translation.php');
	else if ($_POST['go'] == 'go_connect')     require_once('configuration/which/inc.system.php');
	else if ($_POST['go'] == 'go_disconnect')  require_once('configuration/which/inc.system.php');
	else if ($_POST['go'] == 'go_unselect')  require_once('configuration/which/inc.system.php');
	else echo '<span class=error>Element not found.</span>'."\n";
} else if (isset($_POST['insert'])) {
	if ($_POST['insert'] == 'configuration_system'           && $_SESSION['system_id'] == 0 && isset($_SESSION['root']) )
		require_once('configuration/which/inc.system.insert.php');
	else if ($_POST['insert'] == 'configuration_interface'   && $_SESSION['system_id'] != 0 && isset($_SESSION['system_connect']))
		require_once('configuration/where/inc.interface.insert.php');
	else if ($_POST['insert'] == 'configuration_zone'        && $_SESSION['system_id'] != 0 && isset($_SESSION['system_connect']))
		require_once('configuration/where/inc.zone.insert.php');
	else if ($_POST['insert'] == 'configuration_object'      && $_SESSION['system_id'] != 0 && isset($_SESSION['system_connect']))
		require_once('configuration/who/inc.object.insert.php');
	else if ($_POST['insert'] == 'configuration_ip'          && $_SESSION['system_id'] != 0 && isset($_SESSION['system_connect']))
		require_once('configuration/who/inc.ip.insert.php');
	else if ($_POST['insert'] == 'configuration_translation' && $_SESSION['system_id'] != 0 && isset($_SESSION['system_connect']))
		require_once('configuration/what/inc.translation.insert.php');
	else echo '<span class=error>Element not found. Impossible to insert.</span>'."\n";
} else if (isset($_POST['update'])) {
	if ($_POST['update'] == 'configuration_system' && $_SESSION['system_id'] != 0 && isset($_SESSION['system_connect']))
		require_once('configuration/which/inc.system.update.php');
	else if ($_POST['update'] == 'configuration_interface' && $_SESSION['system_id'] != 0 && isset($_SESSION['system_connect']))
		require_once('configuration/where/inc.interface.update.php');
	else if ($_POST['update'] == 'configuration_zone' && $_SESSION['system_id'] != 0 && isset($_SESSION['system_connect']))
		require_once('configuration/where/inc.zone.update.php');
	else if ($_POST['update'] == 'configuration_object' && $_SESSION['system_id'] != 0 && isset($_SESSION['system_connect']))
		require_once('configuration/who/inc.object.update.php');
	else if ($_POST['update'] == 'configuration_ip' && $_SESSION['system_id'] != 0 && isset($_SESSION['system_connect']))
		require_once('configuration/who/inc.ip.update.php');
	else if ($_POST['update'] == 'configuration_translation' && $_SESSION['system_id'] != 0 && isset($_SESSION['system_connect']))
		require_once('configuration/what/inc.translation.update.php');
	else echo '<span class=error>Element not found. Update impossible.</span>'."\n";
} else if (isset($_POST['delete'])) {
	if ($_POST['delete'] == 'configuration_system' && $_SESSION['system_id'] != 0 && isset($_SESSION['system_connect']))
		require_once('configuration/which/inc.system.delete.php');
	else if ($_POST['delete'] == 'configuration_interface' && $_SESSION['system_id'] != 0 && isset($_SESSION['system_connect']))
		require_once('configuration/where/inc.interface.delete.php');
	else if ($_POST['delete'] == 'configuration_zone' && $_SESSION['system_id'] != 0 && isset($_SESSION['system_connect']))
		require_once('configuration/where/inc.zone.delete.php');
	else if ($_POST['delete'] == 'configuration_object' && $_SESSION['system_id'] != 0 && isset($_SESSION['system_connect']))
		require_once('configuration/who/inc.object.delete.php');
	else if ($_POST['delete'] == 'configuration_ip' && $_SESSION['system_id'] != 0 && isset($_SESSION['system_connect']))
		require_once('configuration/who/inc.ip.delete.php');
	else if ($_POST['delete'] == 'configuration_translation' && $_SESSION['system_id'] != 0 && isset($_SESSION['system_connect']))
		require_once('configuration/what/inc.translation.delete.php');
	else echo '<span class=error>Element not found. Impossible to delete.</span>'."\n";
	/*$_SESSION = array();
	session_destroy();*/
} else echo '<span class=error>Page not found.</span>'."\n";
?>