<?php

$query_zones = $select . $from . $where . $orderBy;

$result_zones = mysql_query($query_zones) or die(error_message($query_zones));
$nb_zones = mysql_num_rows($result_zones);

if ($nb_zones > 0) {
	while($row_zones = mysql_fetch_array($result_zones)) {
		include 'php/display/who/inc.objects.php';
	}
}

?>