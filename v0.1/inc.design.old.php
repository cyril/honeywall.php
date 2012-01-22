<?php

include '../inc.primitive.php';

header('Content-type: image/svg+xml; charset=UTF-8');
echo '<?xml version="1.0" encoding="UTF-8" standalone="no"?>'."\n";
echo '<?xml-stylesheet type="text/css" href="../styles/svg/"?>'."\n";
echo '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1 Tiny//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11-tiny.dtd">'."\n";

if (!isset($_GET['system_id'])) $_GET['system_id'] = 0;
if (!is_numeric($_GET['system_id'])) $_GET['system_id'] = 0;

$_SESSION['system_id'] = $_GET['system_id'];
$_SESSION['display'] = 'design';

if (MODE == 'Beta') {
	$mysql_connect_error_msg  = '<h1>Error</h1>'."\n";
	$mysql_connect_error_msg .= '<p class="error">'."\n";
	$mysql_connect_error_msg .= 'Impossible de se connecter au serveur My<abbr title="Structured Query Language" lang="en">SQL</abbr>.'."\n";
	$mysql_connect_error_msg .= '</p>'."\n";
	$mysql_select_db_error_msg  = '<h1>Error</h1>'."\n";
	$mysql_select_db_error_msg .= '<p class="error">'."\n";
	$mysql_select_db_error_msg .= 'Error lors de la s&eacute;lection de la base de donn&eacute;e <q><code>'.SQL_database.'</code></q> du serveur My<abbr title="Structured Query Language" lang="en">SQL</abbr>.'."\n";
	$mysql_select_db_error_msg .= '</p>'."\n";
} else if (MODE == 'Prod') {
	$mysql_connect_error_msg = '<h1>Error</h1>'."\n";
	$mysql_select_db_error_msg = ''."\n";
}





@mysql_connect(SQL_address, SQL_user, SQL_pass) or die($mysql_connect_error_msg);
@mysql_select_db(SQL_database) or die($mysql_select_db_error_msg);





$_GET['display'] = 'design';





$query = 'SELECT COUNT(*) AS `nb` 
          FROM `systems`, `interfaces` 
          WHERE systems.`id` = interfaces.`system_id` AND 
                systems.`id` = "'.$_GET['system_id'].'"';
$result = mysql_query($query);
$row = mysql_fetch_array($result);

       if ($row['nb'] == 1) {
	$interface_cx =      array(50);
	$interface_cy =      array(50);
} else if ($row['nb'] == 2) {
	$interface_cx =      array(44,   56);
	$interface_cy =      array(43,   57);
} else if ($row['nb'] == 3) {
	$interface_cx =      array(42.2, 53.5, 53.5);
	$interface_cy =      array(50,   39.5,   60.5);
} else if ($row['nb'] == 4) {
	$interface_cx =      array(44,   56,   56,   44);
	$interface_cy =      array(43,   43,   57,   57);
} else if ($row['nb'] == 5) {
	$interface_cx =      array(44,   56,   56,   50,   44);
	$interface_cy =      array(43,   43,   57,   61.5, 57);
} else if ($row['nb'] == 6) {
	$interface_cx =      array(44,   50,   56,   56,   50,   44);
	$interface_cy =      array(43,   38.5, 43,   57,   61.5, 57);
} else if ($row['nb'] == 7) {
	$interface_cx =      array(44,   50,   56,   56.5, 52.5, 47.5, 43.5);
	$interface_cy =      array(43,   38.5, 43,   56,   60.5, 60.5, 56);
} else if ($row['nb'] == 8) {
	$interface_cx =      array(43.5, 47.5, 52.5, 56.5, 56.5, 52.5, 47.5, 43.5);
	$interface_cy =      array(44,   39.5, 39.5, 44,   56,   60.5, 60.5, 56);
} else if ($row['nb'] == 9) {
	$interface_cx =      array(43.5, 47.5, 52.5, 56.5, 57.5, 56.5, 52.5, 47.5, 43.5);
	$interface_cy =      array(44,   39.5, 39.5, 44,   50,   56,   60.5, 60.5, 56);
} else if ($row['nb'] == 10) {
	$interface_cx =      array(43.5, 47.5, 52.5, 56.5, 57.5, 56.5, 52.5, 47.5, 43.5, 42.5);
	$interface_cy =      array(44,   39.5, 39.5, 44,   50,   56,   60.5, 60.5, 56,   50);
} else if ($row['nb'] == 11) {
	$interface_cx =      array(43.5, 46.5, 50,   53.5, 56.5, 57.5, 56.5, 52.5, 47.5, 43.5, 42.5);
	$interface_cy =      array(44,   40,   38.5, 40,   44,   50,   56,   60.5, 60.5, 56,   50);
} else if ($row['nb'] == 12) {
	$interface_cx =      array(43.5, 46.5, 50,   53.5, 56.5, 57.5, 56.5, 53.5, 50,   46.5, 43.5, 42.5);
	$interface_cy =      array(44,   40,   38.5, 40,   44,   50,   56,   60,   61.5, 60,   56,   50);
}
$interface_r = 5;

$query = 'SELECT COUNT(*) AS `nb` 
          FROM `systems`, `interfaces`, `zones` 
          WHERE systems.`id` = interfaces.`system_id` AND 
                interfaces.`id` = zones.`interface_id` AND 
                systems.`id` = "'.$_GET['system_id'].'"';
$result = mysql_query($query);
$row = mysql_fetch_array($result);

       if ($row['nb'] == 1) {
	$zone_x =      array(  0);
	$zone_y =      array(  0);
	$zone_width =  array( 30);
	$zone_height = array(100);
} else if ($row['nb'] == 2) {
	$zone_x =      array(  0,   70);
	$zone_y =      array(  0,    0);
	$zone_width =  array( 30,   30);
	$zone_height = array(100,  100);
} else if ($row['nb'] == 3) {
	$zone_x =      array(  0,   70,   70);
	$zone_y =      array(  0,    0,   60);
	$zone_width =  array( 30,   30,   30);
	$zone_height = array(100,   40,   40);
} else if ($row['nb'] == 4) {
	$zone_x =      array(  0,   70,    70,   0);
	$zone_y =      array(  0,    0,   60,   60);
	$zone_width =  array( 30,   30,   30,   30);
	$zone_height = array( 40,   40,   40,   40);
} else if ($row['nb'] == 5) {
	$zone_x =      array(  0,   70,   75,   35,    0);
	$zone_y =      array(  0,    0,   60,   70,   60);
	$zone_width =  array( 30,   30,   25,   30,   25);
	$zone_height = array( 40,   40,   40,   30,   40);
} else if ($row['nb'] == 6) {
	$zone_x =      array(  0,   35,   75,   75,   35,    0);
	$zone_y =      array(  0,    0,    0,   60,   70,   60);
	$zone_width =  array( 25,   30,   25,   25,   30,   25);
	$zone_height = array( 40,   30,   40,   40,   30,   40);
} else if ($row['nb'] == 7) {
	$zone_x =      array(  0,   35,   75,   80,   53,   27,    0);
	$zone_y =      array(  0,    0,    0,   60,   70,   70,   60);
	$zone_width =  array( 25,   30,   25,   20,   20,   20,   20);
	$zone_height = array( 40,   30,   40,   40,   30,   30,   40);
} else if ($row['nb'] == 8) {
	$zone_x =      array(  0,   27,   53,   80,   80,   53,   27,    0);
	$zone_y =      array(  0,    0,    0,    0,   60,   70,   70,   60);
	$zone_width =  array( 20,   20,   20,   20,   20,   20,   20,   20);
	$zone_height = array( 40,   30,   30,   40,   40,   30,   30,   40);
} else if ($row['nb'] == 9) {
	$zone_x =      array(  0,   27,   53,   80,   80,   80,   53,   27,    0);
	$zone_y =      array(  0,    0,    0,    0,   35,   70,   70,   70,   60);
	$zone_width =  array( 20,   20,   20,   20,   20,   20,   20,   20,   20);
	$zone_height = array( 40,   30,   30,   30,   30,   30,   30,   30,   40);
} else if ($row['nb'] == 10) {
	$zone_x =      array(  0,   27,   53,   80,   80,   80,   53,   27,    0,    0);
	$zone_y =      array(  0,    0,    0,    0,   35,   70,   70,   70,   70,   35);
	$zone_width =  array( 20,   20,   20,   20,   20,   20,   20,   20,   20,   20);
	$zone_height = array( 30,   30,   30,   30,   30,   30,   30,   30,   30,   30);
} else if ($row['nb'] == 11) {
	$zone_x =      array(  0,   27,   53,   80,   80,   80,   53,   27,    0,    0,    0);
	$zone_y =      array(  0,    0,    0,    0,   35,   70,   70,   70,   70,   52.5, 35);
	$zone_width =  array( 20,   20,   20,   20,   20,   20,   20,   20,   20,   20,   20);
	$zone_height = array( 30,   30,   30,   30,   30,   30,   30,   30,   30,   12.5, 12.5);
} else if ($row['nb'] == 12) {
	$zone_x =      array(  0,   27,   53,   80,   80,   80,   80,   53,   27,    0,    0,    0);
	$zone_y =      array(  0,    0,    0,    0,   35, 52.5,   70,   70,   70,   70,   52.5, 35);
	$zone_width =  array( 20,   20,   20,   20,   20,   20,   20,   20,   20,   20,   20,   20);
	$zone_height = array( 30,   30,   30,   30, 12.5, 12.5,   30,   30,   30,   30,   12.5, 12.5);
}

$style_color = array('red', 'navy', 'green', 'yellow', 'orange', 'purple', 'olive', 'teal', 'aqua', 'lime', 'silver', 'fuchsia');

$i_interfaces = 0;
$i_zones =      0;
$i_objects =    0;

echo '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="100%" height="100%">'."\n";
echo '<script xlink:href="../scripts/grap_main.js" type="text/ecmascript"/>'."\n";
echo '<desc>Honeywall netmap</desc>'."\n";


echo '<g id="netmap">'."\n";
require_once("php/display/which/inc.systems.php");
require_once("php/display/what/inc.translations.php");
echo '</g>'."\n";


echo '</svg>'."\n";