<?php

namespace App\Elements;

use App\Models\Feature;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class FeaturesElement extends BaseElement {
    private static $table_name = "FeaturesElement";
    private static $singular_name = "Features Element";
    private static $plural_name = "Features Elements";
    private static $inline_editable = false;
    private static $icon = 'font-icon-page-multiple';

    private static $db = [
        'Title' => 'Text',
        'DisplayTitle' => 'Boolean'
    ];

    private static $has_many = [
        'Features' => Feature::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeFieldsFromTab('Root.Main' , [
            'Title', 'Content', 'DisplayTitle'
        ]);

        $fields->addFieldsToTab('Root.Main', [
            TextField::create('Title'),
            CheckboxField::create('DisplayTitle', 'Display Title?'),

            GridField::create('Features', 'Features', $this->Features(),
                GridFieldConfig_RecordEditor::create(10)
                    ->addComponent(new GridFieldSortableRows('SortOrder')))
        ]);


        return $fields;
    }

    public function getType()
    {
        return self::$singular_name;
    }
}