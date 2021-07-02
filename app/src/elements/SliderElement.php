<?php

namespace App\Elements;

use App\Models\SliderElementCell;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class SliderElement extends BaseElement {
    private static $table_name = "SliderElement";
    private static $singular_name = "Slider Element";
    private static $plural_name = "Slider Elements";
    private static $inline_editable = false;
    private static $icon = 'font-icon-block-carousel';

    private static $db = [
    ];

    private static $has_many = [
        'Cells' => SliderElementCell::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName("Cells");
        $fields->addFieldsToTab('Root.Main', [
            GridField::create('Features', 'Features', $this->Cells(),
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