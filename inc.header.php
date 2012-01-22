<div id="header">
<div id="header-right">
<div id="controls">
<?php
if (!isset($_SESSION['root'])) echo '<a href="?root_login=">Login</a>'."\n";
else                           echo 'Logged as root | <a href="?root_logout=">Disconnect</a>'."\n";
?>
</div>
</div>
<a href="http://www.honeywall.org" title="Honeywall project"><img alt="Honeywall" src="../images/header/header.png" /></a>
</div>
<div id="loading">
</div>
