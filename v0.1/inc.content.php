<div id="content">
<div id="zone_display">
<?php
if (isset($_GET['about'])) require_once('html/about.html');
else /*if (isset($_POST['address'], $_POST['object_id'])) {
	$_GET['address'] = $_POST['address'];
	unset($_POST['address']);
	$_GET['object_id'] = $_POST['object_id'];
	unset($_POST['object_id']);
	require_once('php/configuration/who/inc.ip.insert.php');
} else*/ require_once('php/display/routes.php');
?>
</div>
</div>
