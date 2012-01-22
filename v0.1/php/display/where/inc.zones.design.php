<?php

$query_zones = $select . $from . $where . $orderBy;

$result_zones = mysql_query($query_zones) or die(error_message($query_zones));
$nb_zones = mysql_num_rows($result_zones);

if ($nb_zones > 0) {
	echo '			<g class="zone">'."\n";
	while($row_zones = mysql_fetch_array($result_zones)) {
		
		$text_x = $zone_x[$i_zones] + 2;
		$text_y = $zone_y[$i_zones] + 3;
		
		echo '				<text x="'.$text_x.'%" y="'.$text_y.'%" font-size="12" fill="'.$style_color[$i_interfaces].'" fill-opacity="1">'.$row_zones['name'].'</text>'."\n";
		echo '				<rect id="zone_'.$row_zones['id'].'" x="'.$zone_x[$i_zones].'%" y="'.$zone_y[$i_zones].'%" width="'.$zone_width[$i_zones].'%" height="'.$zone_height[$i_zones].'%" rx="20" ry="20" fill="'.$style_color[$i_interfaces].'" fill-opacity="0.3" stroke="'.$style_color[$i_interfaces].'" stroke-width="0" stroke-opacity="0">'."\n";
		echo '				<title>'.$row_zones['name'].'</title>'."\n";
		echo '				</rect>'."\n";
		
		include 'php/display/who/inc.objects.php';
		
		$i_zones++;
	}
	echo '			</g>'."\n";
}

?>