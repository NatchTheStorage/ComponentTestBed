<?php

namespace App\Models;

use App\Elements\AccordionElement;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;

class Accordion extends DataObject
{
    private static $table_name = "Accordion";
    private static $singular_name = "Accordion";

    private static $db = [
        "SortOrder" => "Int",
        "Title" => "Text",
        "Content" => "HTMLText"
    ];

    private static $default_sort = "SortOrder";

    private static $summary_fields = [
        "Title"
    ];

    private static $has_one = [
        "AccordionElement" => AccordionElement::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            "SortOrder",
            "AccordionElementID",
        ]);

        $fields->addFieldsToTab("Root.Main", [
            TextField::create("Title"),
            HTMLEditorField::create("Content")
        ]);

        return $fields;
    }

    public function canView($member = false)
    {
        return true;
    }

    public function canEdit($member = false)
    {
        return true;
    }

    public function canDelete($member = null)
    {
        return true;
    }

    public function canCreate($member = null, $context = [])
    {
        return true;
    }
}