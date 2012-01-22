<?php

$submit = 'Add';
$enable = 'true';

$id = '';
$name = '';
$description = '';
$gateway = '';
$dns = '';

if (isset($_POST['key'])) {
	
	include 'inc.system.query.php';
	
	$query = $select . $from . $where . $orderBy;
	
	$result = mysql_query($query) or die(error_message($query));
	$nb = mysql_num_rows($result);
	
	if ($nb == 1) {
		
		$row = mysql_fetch_array($result);
		
		$submit = 'Update';
		
		$id = $row['id'];
		$name = $row['name'];
		$description = $row['description'];
		$gateway = $row['gateway'];
		$dns = $row['dns'];
		$builddate = $row['builddate'];
		
	} else {
		
		echo '<span class="error">No found system id '.$_POST['key'].'.</span>'."\n";
		$enable = 'false';
		
	}
	
}

//case 1: a user was clicking on a element of a system (ex: system, interface, zone, objects...)
if (isset($_POST['key'])) {
	//if the system is yet selected
	if ($_SESSION['system_id'] != 0) {
		//if the user want to connect on the occur system
		if ($_POST['go'] == 'go_connect') require_once '../html/system.connect.form.html';
		
		else if ($_POST['go'] == 'go_disconnect') require_once '../html/system.disconnect.form.html';
		else if ($_POST['go'] == 'go_unselect') require_once '../html/system.unselect.form.html';
		
		//then we just print the form of the occur system for displaying its informations
		else require_once 'inc.system.form.php';
	//if the user want to select a system
	} else require_once '../html/system.select.form.html';

//case 2: a user is opening a system
} else {
	//if the user is root
	if (isset($_SESSION['root'])) {
		if ($_SESSION['system_id'] == 0) require_once 'inc.system.form.php';//the user want to create a new system (when all systems are closed)
		else echo '<p><span class="error">Sorry, you need to close the occur system before to create a new one.</span></p>'."\n";
	} else echo '<p><span class="error">Sorry, root only is able to create a new system.</span></p>'."\n";
}

?>