<?php

require_once '../inc.primitive.php';
require_once    'inc.primitive.php';

header('Content-Type: text/html; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8" standalone="no"?>'."\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<?php
require_once '../inc.head.php';
?>
<body>
<?php
require_once '../inc.header.php';
require_once '../inc.tabs.php';
//require_once 'inc.path.php';
require_once 'inc.content.php';
require_once 'inc.option.php';
echo '<hr />'."\n";
require_once '../inc.footer.php';
?>
</body>
</html>