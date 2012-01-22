<?php

$select  = 'SELECT `id`, ' .
                  '`name`, ' .
                  '`interface_id` ';
$from    = 'FROM `zones` ';
$where   = 'WHERE `id` = "'.$_POST['key'].'" ';
$orderBy = 'ORDER BY (`id`) ASC';

?>