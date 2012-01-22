<?php

if (isset($_POST['id'])) {
	$row_ip['id'] = $_POST['id'];
	unset($_POST['id']);
	if (!isset($error)) $error = 0;
	echo '<h1>Delete</h1>'."\n";
}

echo '<ul>'."\n";

echo '<li>Delete of ip '.$row_ip['id'].'... '."\n";

$query = 'DELETE FROM `ips` WHERE `id` = "'.$row_ip['id'].'"';
mysql_query($query) or die(error_message($query));

$query = 'SELECT `id` FROM `ips` WHERE `id` = "'.$row_ip['id'].'"';
$result = mysql_query($query) or die(error_message($query));
$error += mysql_num_rows($result);

if ($error == 0) echo '<span class="done">ip deleted.</span></li>'."\n";
else echo '<span class="error">Error!</span> The ip was not deleted.</li>'."\n";

echo '</ul>'."\n";

?>