<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use gorriecoe\Link\Models\Link;
use gorriecoe\LinkField\LinkField;

class LinksElement extends BaseElement {
    private static $table_name = "LinksElement";
    private static $singular_name = "Links Element";
    private static $plural_name = "Links Elements";

    private static $inline_editable = false;
    private static $icon = 'font-icon-link';

    private static $db = [
        'Title' => 'Text'
    ];

    private static $many_many = [
        "Links" => Link::class
    ];

    private static $many_many_extraFields = [
        'Links' => [
            'Sort' => 'Int' // Required for all many_many relationships
        ]
    ];

    private static $owns = [
        "Links"
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('Links');
        $fields->addFieldsToTab('Root.Main', [
            LinkField::create('Links', 'Links', $this)
        ]);
        return $fields;
    }

    public function getType()
    {
        return self::$singular_name;
    }
}