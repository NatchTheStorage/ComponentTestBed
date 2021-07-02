<?php

namespace App\Models;

use App\Elements\SliderElement;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;

class SliderElementCell extends DataObject {
    private static $table_name = "SliderElementCell";
    private static $singular_name = "Slider Element Cell";
    private static $plural_name = "Slider Element Cells";

    private static $db = [
        "Title" => "Text",
        "Content" => "Text",
        "SortOrder" => "Int"
    ];

    private static $has_one = [
        "BelongsTo" => SliderElement::class,
    ];

    private static $default_sort = "SortOrder ASC";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'SortOrder',
            'BelongsToID',
        ]);

        $fields->addFieldsToTab("Root.Main", [
            TextField::create("Title", "Title"),
            TextareaField::create("Content", 'Content'),
        ]);

        return $fields;
    }

    public function canView($member = null)
    {
        return Permission::check('EDIT_DATAOBJECTS', 'any', $member);
    }

    public function canEdit($member = null)
    {
        return Permission::check('EDIT_DATAOBJECTS', 'any', $member);
    }

    public function canDelete($member = null)
    {
        return Permission::check('EDIT_DATAOBJECTS', 'any', $member);
    }

    public function canCreate($member = null, $context = [])
    {
        return Permission::check('EDIT_DATAOBJECTS', 'any', $member);
    }
}