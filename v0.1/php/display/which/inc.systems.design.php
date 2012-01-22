<?php

$query_systems = $select . $from . $where . $orderBy;

$result_systems = mysql_query($query_systems) or die(error_message($query_systems));
$nb_systems = mysql_num_rows($result_systems);

if ($nb_systems > 0) {
	echo '	<g class="system">'."\n";
	if ($_GET['system_id'] != 0) {
		while($row_systems = mysql_fetch_array($result_systems)) {
			
			$system_x = 50;
			$system_y = 50;
			
			$system_r = 9;
			
			echo '		<circle id="system_'.$row_systems['id'].'" cx="'.$system_x.'%" cy="'.$system_y.'%" r="'.$system_r.'%" fill="yellow" fill-opacity="1" stroke="black" stroke-opacity="1" stroke-width="5">'."\n";
			echo '		<title>'.$row_systems['name'].'</title>'."\n";
			echo '		</circle>'."\n";
			echo '		<text id="system_'.$row_systems['id'].'_text" x="45%" y="50%" font-size="12" fill="black" fill-opacity="1">'.$row_systems['name'].'</text>'."\n";
			
			include 'php/display/where/inc.interfaces.php';
			
			if ( !isset($_GET['system_connect']) && !isset($_GET['root']) ) {
				echo '		<rect id="connect_'.$row_systems['id'].'_rect" x="45%" y="51.5%" width="60" height="9" rx="0" ry="0" stroke="white" stroke-width="0" fill="white" fill-opacity="0"/>'."\n";
				
				echo '		<text id="connect_'.$row_systems['id'].'_text" x="45%" y="53%" font-size="9" fill="black" fill-opacity="1" font-family="Verdana">&#8226; Logging in?</text>'."\n";
				
				/*echo '		<rect id="unselect_'.$row_systems['id'].'_rect" x="45%" y="53.5%" width="56" height="9" rx="0" ry="0" stroke="white" stroke-width="0" fill="white" fill-opacity="0"/>'."\n";
				
				echo '		<text id="unselect_'.$row_systems['id'].'_text" x="45%" y="55%" font-size="9" fill="black" fill-opacity="1" font-family="Verdana">&#8226; Unselect?</text>'."\n";
				
			} else if ( isset($_GET['system_connect']) ) {
				echo '		<rect id="disconnect_'.$row_systems['id'].'_rect" x="45%" y="51.5%" width="56" height="9" rx="0" ry="0" stroke="white" stroke-width="0" fill="white" fill-opacity="0"/>'."\n";
				
				echo '		<text id="disconnect_'.$row_systems['id'].'_text" x="45%" y="53%" font-size="9" fill="black" fill-opacity="1" font-family="Verdana">&#8226; Disconnect?</text>'."\n";*/
			}
		
		}
	
	} else {//if ($_GET['system_id'] == 0)
		$cpt = 0;
		while($row_systems = mysql_fetch_array($result_systems)) {
			
			/*for ($i=0 ; $i < sizeof($interface_link) ; $i++) {
				if ($interface_link[$i] == $row_ss['id']) {
					$x_interface2 = $interface_cx[$i];
					$y_interface2 = $interface_cy[$i];
				}
			}
			$interface_cx =      array(44, 56);
			$interface_cy =      array(43, 57);*/
			
			$x[$row_systems['id']] = round(mt_rand(0+5, 100-15), 0);
			$y[$row_systems['id']] = round(mt_rand(0+10, 100-10), 0);
			
			//$the_link[$row_systems['id']] = '';
			
			$system_x = $x[$row_systems['id']];
			$system_y = $y[$row_systems['id']];
			
			$text_x = $system_x - 5;
			$text_y = $system_y + 10;
			
			$system_r = 2;
			$system_r_bis = 3;
			
			
			
			
			
			
			
			
			
			
			
			echo '		<circle id="system_'.$row_systems['id'].'" cx="'.$system_x.'%" cy="'.$system_y.'%" r="'.$system_r.'%" fill="yellow" fill-opacity="1" stroke="black" stroke-width="1"/>'."\n";
			echo '		<circle id="system_'.$row_systems['id'].'_bis" cx="'.$system_x.'%" cy="'.$system_y.'%" r="'.$system_r_bis.'%" fill="yellow" fill-opacity="0.2" stroke="black" stroke-width="2">'."\n";
			echo '		<title>'.$row_systems['name'].'</title>'."\n";
			echo '		</circle>'."\n";
			echo '		<text id="system_'.$row_systems['id'].'_text" x="'.$text_x.'%" y="'.$text_y.'%" font-size="12" fill="black" fill-opacity="1">'.$row_systems['name'].'</text>'."\n";
			
			
			
			
			
			
			
			
			
			
			
			$cpt++;
		}
		
		echo '		<defs>'."\n";
		echo '			<marker id="Triangle" '."\n";
		echo '			        viewBox="0 0 10 10" '."\n";
		echo '			        refX="10" '."\n";
		echo '			        refY="5" '."\n";
		echo '			        markerUnits="strokeWidth" '."\n";
		echo '			        markerWidth="10" '."\n";
		echo '			        markerHeight="8" '."\n";
		echo '			        orient="auto">'."\n";
		echo '				<path d="M 0 0 L 10 5 L 0 10 z" />'."\n";
		echo '			</marker>'."\n";
		echo '		</defs>'."\n";
		
		
		
		$cpt = 0;
		
		//on recommence a boucler dans la meme boucle, afin de generer l affichage des passerelles par defaut
		$query_systems = $select . $from . $where . $orderBy;
		
		$result_systems = mysql_query($query_systems) or die(error_message($query_systems));
		$nb_systems = mysql_num_rows($result_systems);
		while($row_systems = mysql_fetch_array($result_systems)) {
			
			$select_s  = 'SELECT interfaces.`id` ';
			$from_s    = 'FROM `systems`, `interfaces` ';
			$where_s   = 'WHERE systems.`gateway` = interfaces.`ip` AND 
			                    systems.`id` = "'.$row_systems['id'].'"';
			$orderBy_s = 'ORDER BY (`id`) ASC';
			
			$query_s = $select_s . $from_s . $where_s . $orderBy_s;
			
			$result_s = mysql_query($query_s) or die(error_message($query_s));
			$nb_s = mysql_num_rows($result_s);
			
			if ($nb_s > 0) {
				// a ce stade, nous savons que nous sommes en presence d une liaison entre la gateway du system initial et une interface d un system que l on cherche
				$x1_forward1 = $object_x[$i];
				
				while($row_s = mysql_fetch_array($result_s)) {
					
					$select_ss  = 'SELECT systems.`id` ';
					$from_ss    = 'FROM `systems`, `interfaces` ';
					$where_ss   = 'WHERE systems.`id` = interfaces.`system_id` AND 
					                     interfaces.`id` = "'.$row_s['id'].'"';
					$orderBy_ss = 'ORDER BY (`id`) ASC';
					
					$query_ss = $select_ss . $from_ss . $where_ss . $orderBy_ss;
					
					$result_ss = mysql_query($query_ss) or die(error_message($query_ss));
					$nb_ss = mysql_num_rows($result_ss);
					
					if ($nb_ss == 1) {
						//on recupere l id du system dont un interface est la passerelle par defaut du systeme initial
						$row_ss = mysql_fetch_array($result_ss);
						
						echo '		<line id="system_'.$row_systems['id'].'_gateway" x1="'.$x[$row_systems['id']].'%" y1="'.$y[$row_systems['id']].'%" x2="'.$x[$row_ss['id']].'%" y2="'.$y[$row_ss['id']].'%" style="fill: none; stroke: black; stroke-width: 3; marker-end: url(#Triangle);"/>'."\n";
						
						
					}
					
				}
			}
			$cpt++;
			
		}
	}
	echo '	</g>'."\n";
}

?>