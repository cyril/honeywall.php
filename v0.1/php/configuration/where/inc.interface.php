<?php

$submit = 'Add';
$enable = 'true';

$id = '';
$name = '';
$macro = '';
$ip = '';
$mask = '';

$tmp = $_SESSION['system_id'];//pour eviter un bug qui a parfois lieu selon la version de php (part 1/2)

$system_id = '';

$_SESSION['system_id'] = $tmp;//pour eviter un bug qui a parfois lieu selon la version de php (part 2/2)

if (isset($_POST['key'])) {
	
	include 'inc.interface.query.php';
	
	$query = $select . $from . $where . $orderBy;
	
	$result = mysql_query($query) or die(error_message($query));
	$nb = mysql_num_rows($result);
	
	if ($nb == 1) {
		
		$row = mysql_fetch_array($result);
		
		$submit = 'Update';
		
		$id = $row['id'];
		$name = $row['name'];
		$macro = $row['macro'];
		$ip = $row['ip'];
		$mask = $row['mask'];
		$system_id = $row['system_id'];
		
	} else {
		
		echo '<span class="error">No found interface id '.$_POST['key'].'.</span>'."\n";
		$enable = 'false';
		
	}
	
}

if ($_SESSION['system_id'] != 0) include 'inc.interface.form.php';
else echo '<p class="error">You need to select one system first.</p>'."\n";

?>