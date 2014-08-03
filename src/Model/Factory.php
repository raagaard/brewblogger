<?php

class Model_Factory {
    public static function getModelClassFromName($modelName) {
        // malt -> Model_Malt
        // mash_steps -> Model_Mash Steps
        $modelClassName = 'Model_'.implode('',array_map('ucfirst',explode('_', $modelName)));

        if (class_exists($modelClassName)) {
            $modelClass = new $modelClassName();
        } else {
            $modelClass = false;
        }
        
        return $modelClass;
    }

    public static function getTemplateFile($modelClass, $pathEndings) {
        $className = get_class($modelClass);
        $templateFile = false;

        $ending = '/'.implode('/', $pathEndings).'.html.twig';
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
            throw new Exception("Couldn't find a template for path:".implode(',', $pathEndings)." for class: ".get_class($modelClass));
        }
        return $templateFile;
    }
}