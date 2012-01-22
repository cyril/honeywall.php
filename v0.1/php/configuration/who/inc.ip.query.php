<?php

$select  = 'SELECT `id`, ' .
                  '`address`, ' .
                  '`object_id` ';
$from    = 'FROM `ips` ';
$where   = 'WHERE `id` = "'.$_POST['key'].'" ';
$orderBy = 'ORDER BY (`id`) ASC';

?>