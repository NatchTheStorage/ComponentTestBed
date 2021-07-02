<?php

namespace App\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Forms\TextField;

class VideoElement extends BaseElement
{
    private static $table_name = "VideoElement";
    private static $singular_name = 'Video Element';
    private static $plural_name = 'Video Elements';
    private static $description = 'An element containing a video';
    private static $icon = 'font-icon-block-video';

    private static $db = [
        "VideoLink"=> "Varchar(200)"
    ];

    private static $inline_editable = false;

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeFieldsFromTab('Root.Main', [
            'Title'
        ]);
        $fields->addFieldsToTab('Root.Main', [
            TextField::create("Title")
            ->setDescription('This title does not show on the page, only for CMS organisation'),
            TextField::create("VideoLink", "Video Link")
                ->setDescription("Add a Youtube Video link here!"),
        ]);
        return $fields;
    }

    public function getType()
    {
        return self::$singular_name;
    }

    // Returns just the video ID of the youtube link
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