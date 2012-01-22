<?php

require_once '../../inc.primitive.php';
//require_once       'inc.primitive.php';

$select  = 'SELECT `id`, `name`, `description`, `dns`, `builddate` ';//, `password` ';
$from    = 'FROM `systems` ';
$where   = '';
$orderBy = 'ORDER BY (`id`) ASC';

$query = $select . $from . $where . $orderBy;

echo '<?xml version="1.0" encoding="UTF-8" standalone="no"?>'."\n";
echo '<rss version="2.0">'."\n";
echo '	<channel>'."\n";
echo '		<image>'."\n";
echo '			<url>../../images/logo.png</url>'."\n";
echo '			<title>Honeywall</title>'."\n";
echo '			<link>http://www.honeywall.org</link>'."\n";//la racine doit etre dynamique
echo '			<width>86</width>'."\n";
echo '			<height>86</height>'."\n";
echo '			<description>Honeywall logo</description>'."\n";
echo '		</image>'."\n";
echo '		<language>en-us</language>'."\n";
echo '		<copyright>Copyright '.date('Y').' Honeywall</copyright>'."\n";
echo '		<title>Honeywall</title>'."\n";
echo '		<link>http://www.honeywall.org</link>'."\n";
echo '		<description>The public infrastructure for distributed network.</description>'."\n";
echo '		<webMaster>contact@honeywall.org</webMaster>'."\n";
$result = mysql_query($query) or die(error_message($query));
$nb = mysql_num_rows($result);
if ($nb > 0) {
while($row = mysql_fetch_array($result)) {
echo '		<item>'."\n";
echo '			<title>'.$row['name'].'</title>'."\n";
echo '			<link>http://'.$_SERVER['SERVER_NAME'].'/demo/v0.1/?system_id='.$row['id'].'</link>'."\n";
echo '			<description>'.$row['description'].'</description>'."\n";
echo '			<author>Admin</author>'."\n";
echo '			<pubDate>'.$row['builddate'].'</pubDate>'."\n";
echo '		</item>'."\n";
}
}
echo '	</channel>'."\n";
echo '</rss>'."\n";

?>