<?php
header('content-type: application/x-javascript');
echo 'var xmlHttp = createXmlHttpRequestObject();'."\n";
require_once 'inc.createXmlHttpRequestObject.js';
require_once 'inc.process.js';
require_once 'inc.handleRequestStateChange.js';
require_once 'inc.handleServerResponse.js';
?>