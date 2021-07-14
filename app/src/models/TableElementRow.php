<?php

namespace App\Models;

use App\Elements\TableElement;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataObject;

class TableElementRow extends DataObject
{
    private static $table_name = "TableElementRows";
    private static $singular_name = "Table Element Row";
    private static $plural_name = "Table Element Rows";

    private static $db = [
        "Title" => "Text",
        "SortOrder" => "Int"
    ];

    private static $summary_fields = [
        'Title'
    ];

    private static $has_one = [
        'BelongsToTable' => TableElement::class,

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
            TextareaField::create("Title"),

        ]);

        return $fields;
    }
}
