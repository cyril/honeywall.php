<?php

$select  = 'SELECT `id`, ' .
                  '`name`, ' .
                  '`macro`, ' .
                  '`ip`, ' .
                  '`mask`, ' .
                  '`system_id` ';
$from    = 'FROM `interfaces` ';
$where   = 'WHERE `id` = "'.$_POST['key'].'" ';
$orderBy = 'ORDER BY (`id`) ASC';

?>