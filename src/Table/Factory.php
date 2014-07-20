<?php

class Table_Factory {
    public static function getTableClassFromName($tableName) {
        // malt -> Table_Malt
        // mash_steps -> Table_Mash Steps
        $tableClassName = 'Table_'.implode('',array_map('ucfirst',explode('_', $tableName)));

        if (class_exists($tableClassName)) {
            $tableClass = new $tableClassName();
        } else {
            $tableClass = false;
        }
        
        return $tableClass;
    }

    public static function getTemplateFile($tableClass, $pathEndings) {
        $className = get_class($tableClass);
        $templateFile = false;

        $ending = '/'.implode('/', $pathEndings).'.php';
        $beginning = TEMPLATES.'/';
        
        while ($className != '') {
            $checkFile = $beginning.str_replace('_', '/', $className).$ending;
            if (file_exists($checkFile)) {
                $templateFile = $checkFile;
                break;
            }
            // Didn't find the file
            $className = get_parent_class($className);
        }

        if (!$templateFile) {
            throw new Exception("Couldn't find a template for path:".implode(',', $pathEndings)." for class: ".get_class($tableClass));
        }
        return $templateFile;
    }
}