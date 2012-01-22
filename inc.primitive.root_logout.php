<?php

$_SESSION = array();
$_POST = array();
$_GET = array();
session_destroy();

$print_this = array();

$print_this[] = '<p><span class="done">Connection closed.</span></p>';

?>