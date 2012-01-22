<?php

$select  = 'SELECT `id`, ' .
                  '`name`, ' .
                  '`description`, ' .
                  '`gateway`, ' .
                  '`dns`, ' .
                  '`builddate` ';
$from    = 'FROM `systems` ';
$where   = 'WHERE `id` = "'.$_POST['key'].'" ';
$orderBy = 'ORDER BY (`id`) ASC';

?>