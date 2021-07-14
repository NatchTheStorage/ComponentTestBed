<?php

namespace App\Models;

use App\Elements\CardsElement;
use gorriecoe\Link\Models\Link;
use SilverShop\HasOneField\HasOneButtonField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\TextareaField;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\TextField;

class Card extends DataObject
{
    private static $table_name = "Cards";
    private static $singular_name = "Card";
    private static $plural_name = "Cards";

    private static $db = [
        "Title" => "Text",
        'Subtitle' => 'Text',
        'Content' => 'Text',
        "SortOrder" => "Int"
    ];

    private static $summary_fields = [
        'Title', 'Content'
    ];

    private static $has_one = [
        'Image' => Image::class,
        'CardLink' => Link::class,
        'CardElement' => CardsElement::class
    ];
    private static $owns = [
        'Image'
    ];

    private static $default_sort = "SortOrder ASC";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName([
            'Title', 'Subtitle', 'Content', 'CardElementID', 'Image', 'CardLinkID', 'SortOrder'
        ]);

        $fields->addFieldsToTab("Root.Main", [
            TextField::create("Title"),
            TextField::create('Subtitle'),
            TextareaField::create('Content'),
            UploadField::create('Image'),
            HasOneButtonField::create($this, 'CardLink')
        ]);

        return $fields;
    }
}
