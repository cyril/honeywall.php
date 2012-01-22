<?php

echo '<ul id="outer-tabs" class="tabs">'."\n";

echo '<li'; if ($_SESSION['display'] == 'design') echo ' class="active"'; echo '><a id="display_graphic" href="?display=design">Design</a></li>'."\n";
echo '<li'; if ($_SESSION['display'] == 'rule') echo ' class="active"'; echo '><a id="display_action" href="?display=rule">Rule</a></li>'."\n";
echo '<li'; if ($_SESSION['display'] == 'tagcloud') echo ' class="active"'; echo '><a id="display_tagcloud" href="?display=tagcloud">Tag cloud</a></li>'."\n";
echo '<li'; if ($_SESSION['display'] == 'tree') echo ' class="active"'; echo '><a id="display_tree" href="?display=tree">Tree</a></li>'."\n";
echo '</ul>'."\n";

$tmp_1 = ' class="hidden"';
$tmp_2 = ' class="hidden"';
if ($_SESSION['system_id'] == 0 && isset($_SESSION['root']))           $tmp_1 = '';
if ($_SESSION['system_id'] != 0 && isset($_SESSION['system_connect'])) $tmp_2 = '';
if ($tmp_1 == ' class="hidden"' && $tmp_2 == ' class="hidden"') $tmp = 'hidden';
else $tmp = 'tabs';

echo '<ul id="inner-tabs" class="'.$tmp.'">'."\n";

echo '<li'.$tmp_1.'><a id="go_system" href="#">System</a></li>'."\n";

echo '<li'.$tmp_2.'><a id="go_interface" href="#">Interface</a></li>'."\n";
echo '<li'.$tmp_2.'><a id="go_zone" href="#">Zone</a></li>'."\n";
echo '<li'.$tmp_2.'><a id="go_object" href="#">Object</a></li>'."\n";
echo '<li'.$tmp_2.'><a id="go_ip" href="#">IP</a></li>'."\n";

echo '<li'.$tmp_2.'><a id="go_translation" href="#">Translation</a></li>'."\n";

echo '</ul>'."\n";
