<?php

echo '<head>'."\n";

if ( !isset($head_title) ) $head_title = 'Honeywall - The public infrastructure for distributed network';
echo '<title>'.$head_title.'</title>'."\n";

echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'."\n";

echo '<link rel="stylesheet" type="text/css" media="screen" href="../styles/screen/" />'."\n";
echo '<link rel="shortcut icon" type="image/png" href="../images/favicon.png" />'."\n";

if ( !isset($head_href) ) $head_href = 'rss/';
echo '<link rel="alternate" type="application/rss+xml" title="Honeywall RSS Feed" href="'.$head_href.'" />'."\n";
echo '<script type="text/javascript" src="../scripts/ajax/"></script>'."\n";
echo '<script type="text/javascript" src="../scripts/main.js"></script>'."\n";
echo '<script type="text/javascript" src="../scripts/func.js"></script>'."\n";
echo '</head>'."\n";

?>