<?php

$_POST = array();
$_GET = array();
$_GET['system_id'] = 0;
if (isset($_SESSION['system_connect'])) unset($_SESSION['system_connect']);

$print_this = array();

$print_this[] = '<p><span class="done">System unselected.</span></p>';

?>