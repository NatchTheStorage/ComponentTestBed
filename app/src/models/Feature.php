<?php

namespace App\Models;

use App\Elements\FeaturesElement;
use gorriecoe\Link\Models\Link;
use SilverShop\HasOneField\HasOneButtonField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\TextField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Security\Permission;

class Feature extends DataObject {
    private static $table_name = "Features";
    private static $singular_name = "Feature";
    private static $plural_name = "Feature";

    private static $db = [
        "Title" => "Text",
        "Content" => "Text",
        "SortOrder" => "Int"
    ];

    private static $has_one = [
        "Image" => Image::class,
        "FeaturesElement" => FeaturesElement::class,
        'Link' => Link::class
    ];

    private static $owns = [
        "Image",
        'Link'
    ];

    private static $default_sort = "SortOrder ASC";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'SortOrder',
            'FeaturesElementID',
            'LinkID'
        ]);

        $fields->addFieldsToTab("Root.Main", [
            TextField::create("Title", "Title"),
            TextareaField::create("Content", 'Content'),
            HasOneButtonField::create($this, "Link")
                ->setDescription("The text of this link will only appear as 'READ MORE', the title of this link will not be used"),
            UploadField::create("Image")
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