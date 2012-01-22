<?php

$query_interfaces = $select . $from . $where . $orderBy;

$result_interfaces = mysql_query($query_interfaces) or die(error_message($query_interfaces));
$nb_interfaces = mysql_num_rows($result_interfaces);

if ($nb_interfaces > 0) {
	while($row_interfaces = mysql_fetch_array($result_interfaces)) {
		include 'php/display/where/inc.zones.php';
	}
}

?>