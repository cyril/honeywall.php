<?php

$select  = 'SELECT translations.`id`, 
                   translations.`srcport`, 
                   translations.`dstport`, 
                   translations.`staticport`, 
                   interfaceways.`id` AS `interfaceways_id`, 
                   interfaceways.`name` AS `interfaceways_name`, 
                   enabletranslations.`value` AS `enabletranslations_value`, 
                   actions.`name` AS `actions_name`, 
                   passtranslations.`value` AS `passtranslations_value`, 
                   logs.`status` AS `logs_status`, 
                   networkprotocols.`name` AS `networkprotocols_name`, 
                   transportprotocols.`name` AS `transportprotocols_name`, 
                   addresspools.`name` AS `addresspools_name`, 
                   stickyconnections.`status` AS `stickyconnections_status` ';
$from    = 'FROM `translations`, 
                 `interfaceways`, 
                 `enabletranslations`, 
                 `actions`, 
                 `passtranslations`, 
                 `logs`, 
                 `networkprotocols`, 
                 `transportprotocols`, 
                 `addresspools`, 
                 `stickyconnections` ';
$where   = 'WHERE translations.`interfaceway_id` = interfaceways.`id` AND 
                  translations.`enabletranslation_id` = enabletranslations.`id` AND 
                  translations.`action_id` = actions.`id` AND 
                  translations.`passtranslation_id` = passtranslations.`id` AND 
                  translations.`log_id` = logs.`id` AND 
                  translations.`networkprotocol_id` = networkprotocols.`id` AND 
                  translations.`transportprotocol_id` = transportprotocols.`id` AND 
                  translations.`addresspool_id` = addresspools.`id` AND 
                  translations.`stickyconnection_id` = stickyconnections.`id` ';
$orderBy = 'ORDER BY (`actions_name`) ASC';

?>