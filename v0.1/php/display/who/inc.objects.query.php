<?php

$select  = 'SELECT objects.`id`, ' .
                  'objects.`name` ';
$from    = 'FROM `objects`, ' .
                '`zones` ';
$where   = 'WHERE objects.`zone_id` = zones.`id` AND ' .
                 'objects.`zone_id` = "'.$row_zones['id'].'" ';
$orderBy = 'ORDER BY (`id`) ASC';

?>