<?php

$submit = 'Add';
$enable = 'true';

$id = '';
$address = '';
$object_id = '';

if (isset($_POST['key'])) {
	
	include 'inc.ip.query.php';
	
	$query = $select . $from . $where . $orderBy;
	
	$result = mysql_query($query) or die(error_message($query));
	$nb = mysql_num_rows($result);
	
	if ($nb == 1) {
		
		$row = mysql_fetch_array($result);
		
		$submit = 'Update';
		
		$id = $row['id'];
		$address = $row['address'];
		$object_id = $row['object_id'];
		
	} else {
		
		echo '<span class="error">No found ip id '.$_POST['key'].'.</span>'."\n";
		$enable = 'false';
		
	}
	
}

if ($_SESSION['system_id'] != 0) include 'inc.ip.form.php';
else echo '<p class="error">You need to select one system first.</p>'."\n";

?>