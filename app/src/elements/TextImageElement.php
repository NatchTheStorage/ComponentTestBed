<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use gorriecoe\Link\Models\Link;
use SilverShop\HasOneField\HasOneButtonField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\TextField;

class TextImageElement extends BaseElement
{
    private static $table_name = "TextImageElement";
    private static $singular_name = 'Text Image Element';
    private static $plural_name = 'Text Image Elements';
    private static $description = 'Text and an image';
    private static $icon = 'font-icon-block-content';

    private static $db = [
        "Content" => "HTMLText",
        "ImageOnLeft" => "Boolean",
        "VideoLink" => "Varchar(200)",
        'ShowTitle' => 'Boolean',
    ];

    private static $has_one = [
        "Image" => Image::class,
        'TextImageLink' => Link::class
    ];

    private static $owns = [
        'TextImageLink',
        "Image",
    ];

    private static $inline_editable = false;

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeFieldsFromTab('Root.Main', [
            'Title', 'ShowTitle', 'Content', 'ImageOnLeft', 'Image', 'VideoLink','TextImageLinkID'
        ]);
        $fields->addFieldsToTab('Root.Main', [
            TextField::create('Title'),
            CheckboxField::create('ShowTitle', 'Show Title?'),
            HTMLEditorField::create("Content"),
            CheckboxField::create("ImageOnLeft", "Show image on left hand side of text"),
            UploadField::create("Image"),
            TextField::create("VideoLink", "Video Link")
                ->setDescription("Add a Youtube Video link here!"),
            HasOneButtonField::create($this->owner, 'TextImageLink')
                ->setDescription('The title of this link will appear on the button.')
        ]);

        return $fields;
    }

    public function getType()
    {
        return self::$singular_name;
    }

    // Calls a method which handles yourtube links
    public function returnParsedLink()
    {
        return $this->manipulateYoutubeLink($this->VideoLink);
    }

    private static function manipulateYoutubeLink($originalLink)
    {
        // Working from the following formats
        // https://youtu.be/W8M1CNOu5ww
        //"https://www.youtube.com/embed/3wLLgJ_a7Rs";
        //"https://www.youtube.com/watch?v=_6Q53ceiesU";
        //"https://www.youtube.com/watch?v=WYA1qapa5Us&feature=youtu.be";

        //We need to extract the video ID from these so we can put it into the embed link format
        // https://www.youtube.com/embed/of0wSOfO46Q
        $id = "";

        //Most common will contain a 'watch?v='
        if (strpos($originalLink, "watch?v=")) {
            // remove any extra parameters to make our life easy
            $link = explode("&", $originalLink);
            $link = $link[0];

            //lets get that id
            $link = explode("https://www.youtube.com/watch?v=", $link);
            if (count($link) < 2) {
                return false;
            }

            $id = $link[1];
        } else if (strpos($originalLink, "youtu.be") || strpos($originalLink, "embed")) {
            $link = explode("/", $originalLink);
            $id = $link[count($link) - 1];
        } else {
            return false;
        }

        return $id;
    }
}