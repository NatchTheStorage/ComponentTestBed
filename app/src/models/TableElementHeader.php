<?php

namespace App\Models;

use App\Elements\TableElement;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class TableElementHeader extends DataObject
{
    private static $table_name = "TableElementHeader";
    private static $singular_name = "Table Element Header";
    private static $plural_name = "Table Element Headers";

    private static $db = [
        "Title" => "Text",
        "SortOrder" => "Int"
    ];

    private static $summary_fields = [
        'Title'
    ];

    private static $has_one = [
        'BelongsToTable' => TableElement::class
    ];
    private static $has_many = [
        'Events' => TableElementCell::class
    ];

    private static $default_sort = "SortOrder ASC";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeFieldsFromTab('Root.Main', [
            'Title', 'SortOrder', 'BelongsToTableID'
        ]);

        $fields->addFieldsToTab("Root.Main", [
            TextField::create("Title"),
        ]);

        return $fields;
    }

    public function GetEvent($rowID) {
        foreach ($this->Events() as $event) {
            if ($event->BelongsToRow->ID == $rowID) {
                return $event;
            }
        }
        return '';
    }
}
