<?php

namespace App\Elements;

use App\Models\Stat;
use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\TextField;

class StatsElement extends BaseElement
{
    private static $table_name = "StatsElement";
    private static $singular_name = 'Stat Element';
    private static $plural_name = 'Stat Elements';
    private static $description = 'A statistic and a text description';
    private static $icon = 'font-icon-block-numbers';

    private static $db = [
        'Title' => 'Text',
    ];

    private static $has_many = [
        "Stats" => Stat::class
    ];

    private static $owns = [
        "Stats"
    ];

    private static $inline_editable = false;

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName("Stats");
        $fields->removeFieldsFromTab('Root.Main', [
            'Stats', 'Title',
        ]);
        $fields->addFieldsToTab('Root.Main', [
            TextField::create('Title')->setDescription('The title is not shown on the page, only used in the CMS for organisation'),
            GridField::create('Stats', 'Stats to be displayed',$this->Stats(), GridFieldConfig_RecordEditor::create())
        ]);
        return $fields;
    }

    public function getType()
    {
        return 'Stat Element';
    }
}