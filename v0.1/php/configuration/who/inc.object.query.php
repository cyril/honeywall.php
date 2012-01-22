<?php

$select  = 'SELECT `id`, ' .
                  '`name`, ' .
                  '`objectoption_id`, ' .
                  '`zone_id` ';
$from    = 'FROM `objects` ';
$where   = 'WHERE `id` = "'.$_POST['key'].'" ';
$orderBy = 'ORDER BY (`id`) ASC';

?>