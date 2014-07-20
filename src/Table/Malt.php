<?php

class Table_Malt extends Table_Base {
    public $label = 'Grains';
    public $fieldDefs = array(
        'maltName' => array(
            'type' => 'String',
            'label' => 'Name',
            'sortable' => true,
        ),
        'maltLovibondHigh' => array(
            'type' => 'Float',
            'label' => 'Color (High)',
        ),
        'maltLovibondLow' => array(
            'type' => 'Float',
            'label' => 'Color (Low)',
        ),
        'maltLovibondRange' => array(
            'type' => 'Range',
            'label' => 'Color (Low - High)',
            'lowField' => 'maltLovibondLow',
            'highField' => 'maltLovibondHigh',
            'sortable' => true,
        ),
        'maltInfo' => array(
            'type' => 'Text',
            'label' => 'Information',
        ),
        'maltPPG' => array(
            'type' => 'String',
            'label' => 'PPG',
        ),
        'maltSupplier' => array(
            'type' => 'String',
            'label' => 'Supplier',
        ),
        'maltOrigin' => array(
            'type' => 'String',
            'label' => 'Origin',
        ),
    );
    public $tableName = 'malt';
    public $nameField = 'maltName';
    public $defaultOrderBy = 'maltName ASC';
    
}