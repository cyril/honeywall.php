<?php

$select  = 'SELECT interfaces.`id`, ' .
                  'interfaces.`name`, ' .
                  'interfaces.`macro`, ' .
                  'interfaces.`ip`, ' .
                  'interfaces.`mask`, ' .
                  'interfaces.`system_id` ';
$from    = 'FROM `interfaces`, ' .
                '`systems` ';
$where   = 'WHERE interfaces.`system_id` = systems.`id` AND ' .
                 'interfaces.`system_id` = "'.$row_systems['id'].'" ';
$orderBy = 'ORDER BY (`id`) ASC';

?>