<?php
/**
 * Brewblogger autoloader, will load classes out of the src/ directory.
 * 
 * It is mostly PSR-4 compliant, except that brewblogger classes aren't namespaced
 * Also loads in the composer autoloader after we have registered our autoloader
 */


require_once(VENDORS_DIR.'autoload.php');

function brewblogger_autoloader( $className ) {
    // Since we are dealing with strings that convert into filenames, we should be paranoid
    if (strpos($className, '/') !== false 
        || strpos($className, '\\') !== false
        || strpos($className, '..') !== false 
        || strpos($className, '.') !== false) {
        return;
    }
    
    $classParts = explode('_', $className);
    
    $func = function($pathPart) {
        return basename($pathPart);
    };
    $classParts = array_map($func, $classParts);
    $fileName = SRC_DIR.implode('/', $classParts).'.php';

    if (file_exists($fileName)) {
        require_once($fileName);
    }
}

spl_autoload_register('brewblogger_autoloader', true, true);