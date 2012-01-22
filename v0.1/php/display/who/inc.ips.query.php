<?php

$select  = 'SELECT ips.`id`, ' .
                  'ips.`address` ';
$from    = 'FROM `ips`, ' .
                '`objects` ';
$where   = 'WHERE ips.`object_id` = objects.`id` AND ' .
                 'ips.`object_id` = "'.$row_objects['id'].'" ';
$orderBy = 'ORDER BY (`id`) ASC';

?>