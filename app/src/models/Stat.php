<?php

namespace App\Models;

use App\Elements\StatsElement;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;

class Stat extends DataObject {
    private static $table_name = "Stats";
    private static $singular_name = "Stat";
    private static $plural_name = "Stats";

    private static $summary_fields = [
        'Title', 'Description'
    ];

    private static $db = [
        "Title" => "Text",
        'Description' => 'Text',
        "SortOrder" => "Int"
    ];

    private static $has_one = [
        "StatsElement" => StatsElement::class
    ];

    private static $default_sort = "SortOrder ASC";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            "SortOrder",
            "StatsElementID",
            'Description'
        ]);

        $fields->addFieldsToTab("Root.Main", [
            TextField::create('Description')->setDescription('The larger text that displays the stat'),
            TextField::create('Title', 'Title')
                ->setDescription("The smaller normal text used as the description of the statistic")
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