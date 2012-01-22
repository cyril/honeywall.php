<?php

$select  = 'SELECT `id`, ' .
                  '`srcport`, ' .
                  '`dstport`, ' .
                  '`staticport`, ' .
                  '`interfaceway_id`, ' .
                  '`action_id`, ' .
                  '`stickyconnection_id`, ' .
                  '`log_id`, ' .
                  '`networkprotocol_id`, ' .
                  '`transportprotocol_id`, ' .
                  '`addresspool_id`, ' .
                  '`enabletranslation_id`, ' .
                  '`passtranslation_id` ';
$from    = 'FROM `translations` ';
$where   = 'WHERE `id` = "'.$_POST['key'].'" ';
$orderBy = 'ORDER BY (`id`) ASC';

?>