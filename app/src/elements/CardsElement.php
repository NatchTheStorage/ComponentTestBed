<?php

namespace App\Elements;

use App\Models\Card;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use UndefinedOffset\SortableGridField\Forms\GridFieldSortableRows;

class CardsElement extends BaseElement {
    private static $table_name = "CardsElements";
    private static $singular_name = "Cards Element";
    private static $plural_name = "Cards Elements";
    private static $inline_editable = false;
    private static $icon = 'font-icon-page-multiple';

    private static $db = [
        'Title' => 'Text',
        'Content' => 'Text',

        'HideTitle' => 'Boolean',
    ];

    private static $has_many = [
        'Cards' => Card::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeFieldsFromTab('Root.Main', [
           'Title', 'Content', 'HideTitle'
        ]);
        $fields->addFieldsToTab('Root.Main', [
            TextField::create('Title'),
            CheckboxField::create('HideTitle', 'Hide Title?'),
            TextareaField::create('Content'),
            GridField::create('Cards', 'Cards', $this->Cards(),
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