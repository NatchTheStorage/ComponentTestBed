<?php

namespace App\Extensions;

use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\ORM\DataExtension;

class ElementExtension extends DataExtension {

  private static $db = [
    'IndexTitle' => 'Text',
    'ShowIndexTitle' => 'Boolean'
  ];

  private static $defaults = [
    'IndexTitle' => '',
    'ShowIndexTitle' => false
  ];

  public function updateCMSFields(FieldList $fields)
  {
    $fields->addFieldsToTab('Root.Main', [
      TextField::create('IndexTitle')
      ->setDescription("This is the title that shows up in the index element, to generate anchor links"),
      CheckboxField::create('ShowIndexTitle')
      ->setDescription('This box must be checked for the anchor link to show up in the index element')
    ]);
  }

}
