<?php

require_once('include/SugarFields/Fields/Base/SugarFieldBase.php');

// Dateiname type ucfirst :( ebenso der Ordner
// file_exists('custom/modules/DynamicFields/templates/Fields/Template'. ucfirst($type) . '.php'
class SugarFieldBitTable extends SugarFieldBase {

    function getEditViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex, $searchView = false) {
        $displayParams['bean_id'] = 'id';
        $vardef['bittablestyle'] = "{literal}" . $this->getBitTableStyle() . "{/literal}";
        //$vardef['bittablestyle'].="<pre>" . print_r($parentFieldArray,1) . "</pre>";
        $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
        return $this->fetch($this->findTemplate('EditView'));
    }

    function getDetailViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex, $searchView = false) {
        $displayParams['bean_id'] = 'id';
        $vardef['bittablestyle'] = "{literal}" . $this->getBitTableStyle() . "{/literal}";
        //$vardef['bittablestyle'].="<pre>" . print_r($vardef,1) . "</pre>";
        $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
        return $this->fetch($this->findTemplate('DetailView'));
    }
    
    function getListViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex, $searchView = false) {
        $displayParams['bean_id'] = 'id';
        $vardef['bittablestyle'] = $this->getBitTableStyle();
        //$vardef['bittablestyle'].="<pre>" . print_r($parentFieldArray,1) . "</pre>";
        $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
        $this->ss->assign('col', strtoupper($vardef['name'])); //$vardef['name']
        return $this->fetch($this->findTemplate('ListView'));
    }
    
    function getUserEditView($parentFieldArray, $vardef, $displayParams, $tabindex, $searchView = false) {
        $displayParams['bean_id'] = 'id';
        $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex, false);
        return $this->fetch($this->findTemplate('UserEditView'));
    }

    function getUserDetailView($parentFieldArray, $vardef, $displayParams, $tabindex, $searchView = false) {
        $displayParams['bean_id'] = 'id';
        $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex, false);
        return $this->fetch($this->findTemplate('UserDetailView'));
    }

    function getSearchViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex) {
        return $this->getSmartyView($parentFieldArray, $vardef, $displayParams, $tabindex, 'SearchView');
    }

    function getBitTableStyle() {
        return <<<EOF
    <style>
        table.bittable{
            background: #dddddd;
            width: auto;
        }
        table.bittable td{
            padding: 2px 4px;
            border: 1px solid #aaaaaa;
            min-width:30px;
            min-height:20px;
        }
        table.bittable th{
            padding: 2px 4px;
            background: #dddddd;
            border: 1px solid #aaaaaa;
            min-width:30px;
            min-height:20px;
        }
        table.bittable td.bittrue{
            background: #00FF00;
        }
        table.bittable td.bitfalse{
            background: #FF8888;
        }
    </style>
EOF;
    }

}
