<?php

//if (isset($_SESSION['system_id'])) $_GET['system_id'] = $_SESSION['system_id'];

$select  = 'SELECT `id`, `name`, `description`, `gateway`, `dns`, `builddate`, `password` ';
$from    = 'FROM `systems` ';
if ($_SESSION['system_id'] != 0) $where   = 'WHERE `id` = "'.$_SESSION['system_id'].'" ';
else                             $where   = '';
$orderBy = 'ORDER BY (`id`) ASC';

?>