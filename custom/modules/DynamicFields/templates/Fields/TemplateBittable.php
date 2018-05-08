<?php

require_once('modules/DynamicFields/templates/Fields/TemplateText.php');

class TemplateBittable extends TemplateText {

    var $type = 'bittable';

    function __construct() {
        parent::__construct();
        $this->vardef_map['columnlabels'] = 'ext1';
        $this->vardef_map['rowlabels'] = 'ext2';
        $this->vardef_map['ext1'] = 'columnlabels';
        $this->vardef_map['ext2'] = 'rowlabels';
    }
    
    function get_field_def() {
        $def = parent::get_field_def();
        $def['dbType'] = 'varchar';
        $def['type'] = 'bittable';
        
        $def['columnlabels'] = (isset($this->ext1)) ? $this->ext1 : "xxx";
        $def['rowlabels'] = isset($this->ext2) ? $this->ext2 : "aaa";
        return $def;
    }


    function set($values) {
        parent::set($values);
        if (!empty($this->ext1)) {
            $this->columnlabels = $this->ext1;
        }

        if (!empty($this->ext2)) {
            $this->rowlabels = $this->ext2;
        }
    }

}
