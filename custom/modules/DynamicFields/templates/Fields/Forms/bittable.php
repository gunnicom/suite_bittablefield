<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

function get_body(&$ss, $vardef) {
    global $app_list_strings;
    $ss->assign('hideReportable', true);
    $ss->assign('hideImportable', true);
    $ss->assign('hideDuplicatable', true);
    return $ss->fetch('custom/modules/DynamicFields/templates/Fields/Forms/bittable.tpl');
}

?>
