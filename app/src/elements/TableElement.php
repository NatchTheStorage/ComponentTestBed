<?php

namespace App\Elements;

use App\Models\TableElementCell;
use App\Models\TableElementHeader;
use App\Models\TableElementRow;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\TextField;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class TableElement extends BaseElement
{
    private static $table_name = "TableElements";
    private static $singular_name = "Table Element";
    private static $plural_name = "Table Elements";
    private static $description = 'A table, with editable cells, headers and rows';
    private static $icon = 'font-icon-block-numbers';

    private static $db = [
        "Title" => "Text",
        "Footnote" => 'HTMLText',
        'ShowTitle' => 'Boolean',
        "SortOrder" => "Int",
    ];

    private static $summary_fields = [
        'Title'
    ];

    private static $has_many = [
        'Headers' => TableElementHeader::class,
        'Rows' => TableElementRow::class,
        'Events' => TableElementCell::class
    ];

    private static $inline_editable = false;
    private static $default_sort = "SortOrder ASC";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'Title', 'SortOrder', 'ShowTitle', 'Headers', 'Rows', 'Events', 'Footnote'
        ]);

        $fields->addFieldsToTab("Root.Main", [
            TextField::create("Title"),
            CheckboxField::create('ShowTitle', 'Show Title'),
            HTMLEditorField::create('Footnote'),
            LiteralField::create('lf2', '
      <h1>Adding Table Events</h1><p>There are 3 main setions to the table:  Headers, Rows and Events
      <br>Headers are at the top of the table, forming the top of each column.
      Adding a header will form a new column.  The headers will be displayed in the order in which they are displayed in the grid below.
      <br>Rows are at the left end of the table, and will form a new row for events to be placed into.</p>
      <br>Events are the cells in the grid of the table.  They must be assigned to a row and column, and they will appear at the intersecting point of their row and column.
      <br><hr>'),
            GridField::create('Headers', 'Table Headers', $this->Headers(),
                GridFieldConfig_RecordEditor::create()
                    ->addComponent(new GridFieldOrderableRows('SortOrder'))),
            GridField::create('Rows', 'Table Rows', $this->Rows(),
                GridFieldConfig_RecordEditor::create()
                    ->addComponent(new GridFieldOrderableRows('SortOrder'))),
            GridField::create('Events', 'Table Events', $this->Events(),
                GridFieldConfig_RecordEditor::create()
                    ->addComponent(new GridFieldOrderableRows('SortOrder')))
        ]);

        return $fields;
    }

    public function getType()
    {
        return self::$singular_name;
    }
}
