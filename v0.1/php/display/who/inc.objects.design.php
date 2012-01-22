<?php

$query_objects = $select . $from . $where . $orderBy;

$result_objects = mysql_query($query_objects) or die(error_message($query_objects));
$nb_objects = mysql_num_rows($result_objects);

if ($nb_objects > 0) {
	echo '				<g class="object">'."\n";
	while($row_objects = mysql_fetch_array($result_objects)) {
		
		$object_link[$i_objects] = $row_objects['id'];
		
		$object_x[$i_objects] = round(mt_rand($zone_x[$i_zones]+5, $zone_x[$i_zones]+$zone_width[$i_zones]-5), 0);
		$object_y[$i_objects] = round(mt_rand($zone_y[$i_zones]+5, $zone_y[$i_zones]+$zone_height[$i_zones]-5), 0);
		
		echo '					<circle id="object_'.$row_objects['id'].'"'.
		                      ' cx="'.$object_x[$i_objects].'%"'.
		                      ' cy="'.$object_y[$i_objects].'%"'.
		                      ' r="10"'.
		                      ' fill="white"'.
		                      ' fill-opacity="1"'.
		                      ' stroke="'.$style_color[$i_interfaces].'"'.
		                      ' stroke-width="1">'."\n";
		echo '					<title>'.$row_objects['name'].'</title>'."\n";
		echo '					</circle>'."\n";
		echo '					<text id="object_'.$row_objects['id'].'_name" x="'.$object_x[$i_objects].'%" y="'.$object_y[$i_objects].'%" font-size="9" fill="black" fill-opacity="1">'.$row_objects['name'].'</text>'."\n";
		
		$i_objects++;
	}
	echo '				</g>'."\n";
}

?>