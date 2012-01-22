<?php

$query_interfaces = $select . $from . $where . $orderBy;

$result_interfaces = mysql_query($query_interfaces) or die(error_message($query_interfaces));
$nb_interfaces = mysql_num_rows($result_interfaces);

if ($nb_interfaces > 0) {
	echo '		<g class="interface">'."\n";
	while($row_interfaces = mysql_fetch_array($result_interfaces)) {
		
		$interface_link[$i_interfaces] = $row_interfaces['id'];
		
		echo '			<circle id="interface_'.$row_interfaces['id'].'" cx="'.$interface_cx[$i_interfaces].'%" cy="'.$interface_cy[$i_interfaces].'%" r="'.$interface_r.'" fill="'.$style_color[$i_interfaces].'" fill-opacity="1" stroke="black" stroke-width="1" stroke-opacity="1">'."\n";
		echo '			<title>'.$row_interfaces['name'].'</title>'."\n";
		echo '			</circle>'."\n";
		
		include 'php/display/where/inc.zones.php';
		
		$i_interfaces++;
	}
	echo '		</g>'."\n";
}

?>