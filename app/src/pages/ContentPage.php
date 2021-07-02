<?php

namespace App\Pages;

use Page;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;

class ContentPage extends Page
{
    private static $table_name = "ContentPages";
    private static $singular_name = "Content Page";
    private static $plural_name = "Content Pages";

    private static $db = [
        "FreeText" => "HTMLText",
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab("Root.Main", [
            TextField::create("ContentTitle", "Content Title")
                ->setDescription("The title of the lower text content area."),
            HTMLEditorField::create('FreeText', 'HTML'),
        ], "Content");

        return $fields;
    }
}