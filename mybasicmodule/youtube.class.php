<?php

class YoutubeComment extends ObjectModel
{

    public $id;
    public $comment;
    public static $definition = [
        'table' => 'psyoutubecomment',
        'primary' => 'id_youtubecomment',
        'multilang' => false,
        'multilang_shop' => true,
        'fields' => [
            'comment' => ['type' => self::TYPE_STRING, 'shop' => true, 'validate' => 'isCleanHtml', 'size' => 255],
        ]
    ];
    // define a active record for a database table

}
