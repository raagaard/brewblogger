<?php

class Model_Base {
    public $label = 'Base Table, override this';
    public $fieldDefs = array();
    public $tableName = 'base_table_please_change';
    public $nameField = 'name';
    public $defaultOrderBy = '';

    public function getAdminBreadcrumb() {
        return $this->label;
    }

    public function getAdminList() {
        $templateFile = Table_Factory::getTemplateFile($this, array('Admin', 'List'));
        $rows = $this->getAllRows();


        require($templateFile);
    }

    public function getAllRows() {
        $sql = "SELECT * FROM {$this->tableName} ";
        if (!empty($this->defaultOrderBy)) {
            $sql .= "ORDER BY ".$this->defaultOrderBy;
        }

        $ret = mysql_query($sql) or die(mysql_error());
        
        $rows = array();
        while ($row = mysql_fetch_assoc($ret)) {
            $rows[] = $row;
        }

        return $rows;
    }
}