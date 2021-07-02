<?php

namespace App\Extensions;

use gorriecoe\Link\Models\Link;
use SilverShop\HasOneField\HasOneButtonField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;

class CallToActionExtension extends DataExtension
{
    private static $db = [
        "CallToActionHeading" => "Varchar(150)",
        "CallToActionSubHeader" => "Varchar(100)"
    ];

    private static $has_one = [
        "CallToActionLink" => Link::class,
        "CallToActionImage" => Image::class
    ];

    private static $owns = [
        "CallToActionImage"
    ];

    public function updateCMSFields(FieldList $fields)
    {
        // Add fields
        $fields->addFieldsToTab("Root.CallToAction", [
            TextField::create("CallToActionHeading", 'Heading')->setDescription('The larger text in the middle part of the Call to Action'),
            TextField::create("CallToActionSubHeader", "Sub Heading")->setDescription('The smaller text below the main heading'),
            HasOneButtonField::create($this->owner, 'CallToActionLink'),
            UploadField::create("CallToActionImage")
        ]);
    }
}