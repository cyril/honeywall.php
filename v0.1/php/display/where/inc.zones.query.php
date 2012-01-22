<?php

$select  = 'SELECT zones.`id`, ' .
                  'zones.`name` ';
$from    = 'FROM `zones`, ' .
                '`interfaces` ';
$where   = 'WHERE zones.`interface_id` = interfaces.`id` AND ' .
                 'zones.`interface_id` = "'.$row_interfaces['id'].'" ';
$orderBy = 'ORDER BY (`id`) ASC';

?>