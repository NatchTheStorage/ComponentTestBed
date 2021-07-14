<?php

namespace App\Models;

use App\Elements\TableElement;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class TableElementCell extends DataObject
{
    private static $table_name = "TableElementCell";
    private static $singular_name = "Table Element Cell";
    private static $plural_name = "Table Element Cells";

    private static $db = [
        "Title" => "Text",
        'ContentStuff' => 'HTMLText',
        "SortOrder" => "Int"
    ];

    private static $summary_fields = [
        'Title', 'ContentStuff'
    ];

    private static $has_one = [
        'BelongsToColumn' => TableElementHeader::class,
        'BelongsToRow' => TableElementRow::class,
        'BelongsToTable' => TableElement::class
    ];
    private static $has_many = [

    ];

    private static $default_sort = "SortOrder ASC";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'Title', 'BelongsToTableID', 'SortOrder', 'ContentStuff'
        ]);

        $fields->addFieldsToTab("Root.Main", [
            LiteralField::create('lf1', '
      <h1>Creating an Event</h1><p>Make sure to set the "Belongs to Row" and "Belongs to Column" options to the row/column you wish to put this event in.  If left empty, this event will not appear or appear in the wrong row.
      <br>The title field is not used in the table itself.  It exists to organise events in the CMS.
      <br>The content is what will be displayed inside the table cells.</p>
      <br><hr>'),
            TextField::create("Title"),
            HTMLEditorField::create('ContentStuff', 'Content'),
            DropdownField::create('BelongsToRowID', 'Belongs to Row',
                TableElementRow::get()->filter('BelongsToTableID', $this->BelongsToTableID))
                ->setEmptyString('- select a row - '),
            DropdownField::create('BelongsToColumnID', 'Belongs to Column',
                TableElementHeader::get()->filter('BelongsToTableID', $this->BelongsToTableID))
                ->setEmptyString('- select a header/column - ')
        ]);

        return $fields;
    }

    public function getContent()
    {
        return $this->ContentStuff;
    }
}
